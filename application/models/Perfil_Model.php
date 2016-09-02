<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 24/07/2016
 * Time: 20:39
 */
class Perfil_Model extends CI_Model
{
    private $table = "tb_perfil";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    function getAll() {
        $result = $this->db->query("SELECT * FROM {$this->table}");
        return $result->result();
    }

    function del($id){
        $this->db->where('md5(id)', md5($id));
        $this->db->delete($this->table);
        return (bool) $this->db->affected_rows();
    }

    function changing($id, $data){
        $this->db->where('md5(id)', md5($id));

        $this->db->update($this->table, $data);

        return (bool) $this->db->affected_rows();
    }

    function getById($id)
    {
        $result = $this->db->query("SELECT * FROM {$this->table}
                                    WHERE id = " . $id);
        return $result;
    }
}