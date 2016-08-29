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
        $result = $this->db->query("SELECT * FROM {$this->table}");
        return $result->result();
    }

    function del($id){
        $this->db->where('md5(id)', md5($id));
        $this->db->delete($this->table);
        return (bool) $this->db->affected_rows();
    }

}