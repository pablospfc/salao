<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 26/06/2016
 * Time: 20:08
 */
class Tipo_Operacao_Model extends CI_Model
{
    private $table = "tb_tipo_operacao";

    function __construct(){
        parent::__construct();
    }

    function getAll() {
        $result = $this->db->query("SELECT * FROM {$this->table}");
        return $result->result();
    }

}