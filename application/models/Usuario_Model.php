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

}