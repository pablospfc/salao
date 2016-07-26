<?php

/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 22/07/16
 * Time: 16:28
 */
class Usuario_Model extends CI_Model
{
    private $table = "tb_usuario";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    function changing($id, $data){
        $this->db->where('md5(id)', md5($id));

        $this->db->update($this->table, $data);

        return (bool) $this->db->affected_rows();
    }

    function getById($id) {
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE id = ".$id);
        return $result;
    }
    
    function getList() {
        $result = $this->db->query("SELECT 
                                           tb_usuario.id as id,
                                           tb_usuario.nome as nome,
                                           tb_usuario.email as email,
                                           tb_usuario.login as login,
                                           tb_usuario.id_perfil as id_perfil,
                                           tb_perfil.nome as perfil,
                                           if (tb_usuario.ativo = 1, 'Ativo', 'Inativo' ) AS situacao,
                                           DATE_FORMAT(tb_usuario.data_cadastro,'%d/%m/%Y %H:%m:%s') as data_cadastro
                                    FROM {$this->table}
                                    INNER JOIN tb_perfil ON tb_perfil.id = tb_usuario.id_perfil
                                    "
                                    );
        return $result->result();
    }

    function del($id){
        $this->db->where('md5(id)', md5($id));
        $this->db->delete($this->table);
        return (bool) $this->db->affected_rows();
    }

}