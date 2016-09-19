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
        $dados['id_perfil'] = $data['id_perfil'];
        $dadosCadastrados = $this->getMetodosCadastrados($dados['id_perfil']);
        $metodos = array_diff($data['metodos'],$dadosCadastrados);
        $diferenca = array_diff($dadosCadastrados,$data['metodos']);
       // error_log(var_export($diferenca, true), 3,'C:/xampp/htdocs/salao/log.log');
        foreach ($metodos as $metodo) {
            $dados['id_metodo'] = $metodo;
            $result = $this->db->insert($this->table, $dados);
        }
        return $result;
    }

    function getMetodosCadastrados($idPerfil) {
        $metodos = array();
        $result = $this->db->query("SELECT id_metodo FROM tb_permissoes WHERE id_perfil = {$idPerfil}");
        $dados = $result->result_array();
        foreach ($dados as $dado){
            $metodos[] = $dado['id_metodo'];
        }
        return $metodos;
    }

    function getAll($idPerfil) {
        $result = $this->db->query("SELECT 
    tb_modulos.id AS id_modulo,
    tb_modulos.nome AS modulo,
    tb_metodos.id AS id_metodo,
    tb_metodos.nome AS metodo,
    (SELECT IF (id_metodo is null,'0','1') as metodo_id FROM tb_permissoes WHERE id_metodo = tb_metodos.id AND id_perfil ={$idPerfil}) as checked
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

        //error_log(var_export(array_values($modulos), true), 3,'/var/www/html/salao/log.log');

        //error_log(var_export(array_values($modulos),true));

        return array_values($modulos);

    }

    function del($id){
        $this->db->where('md5(id)', md5($id));
        $this->db->delete($this->table);
        return (bool) $this->db->affected_rows();
    }

}