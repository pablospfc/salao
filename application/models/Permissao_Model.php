<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 28/08/2016
 * Time: 22:02
 */
class Permissao_Model extends CI_Model
{
    private $table = "tb_permissoes";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    function getAll() {
        $result = $this->db->query("SELECT 
    tb_modulos.id AS id_modulo,
    tb_modulos.nome AS modulo,
    tb_metodos.id AS id_metodo,
    tb_metodos.nome AS metodo,
    (SELECT IF (id_metodo is null,'0','1') as metodo_id FROM tb_permissoes WHERE id_metodo = tb_metodos.id) as checked
FROM
    tb_metodos
        INNER JOIN
    tb_modulos ON tb_modulos.id = tb_metodos.id_modulo
    WHERE tb_metodos.privado = 1
    ORDER BY tb_modulos.id");
        return $this->trataDados($result->result_array());
    }

    public function trataDados($data) {
        error_log(var_export($data, true));
        $modulos  = [];
        $metodoTemp = null;

        foreach ($data as $value) {

            $metodoTemp = [ 'id' => $value[ 'id_metodo' ], 'metodo' => $value[ 'metodo' ], 'checked' => $value["checked"] ];

            if (isset($modulos[$value['modulo']]))
                array_push( $modulos[ $value[ 'modulo' ] ][ 'metodos' ], $metodoTemp );

            else
                $modulos[ $value[ 'modulo' ] ] = [
                    'metodos'          => [ $metodoTemp, ],
                    'modulo'              =>$value['modulo'],
                ];
        }

        foreach ($modulos as $key => &$modulo)
            $modulo['modulo'] = $key;

        error_log(var_export(array_values($modulos), true), 3,'/var/www/html/salao/log.log');

        //error_log(var_export(array_values($modulos),true));

        return array_values($modulos);

    }

    function del($id){
        $this->db->where('md5(id)', md5($id));
        $this->db->delete($this->table);
        return (bool) $this->db->affected_rows();
    }

}