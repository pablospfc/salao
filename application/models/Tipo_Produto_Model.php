<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 11/06/2016
 * Time: 12:00
 */
class Tipo_Produto_Model extends CI_Model
{
    private $table = "tb_tipo_produto";

    function __construct(){
        parent::__construct();
    }

    function getAll() {
        $result = $this->db->query("SELECT * FROM {$this->table}");
        return $result->result();
    }

}