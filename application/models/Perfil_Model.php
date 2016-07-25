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

    function getAll() {
        $result = $this->db->query("SELECT * FROM {$this->table}");
        return $result->result();
    }
}