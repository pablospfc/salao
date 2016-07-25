<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 04/06/2016
 * Time: 14:16
 */
class tipo_servico_model extends CI_Model
{
    private $table = "tb_tipo_servico";

    function __construct(){
        parent::__construct();
    }

    function getAll() {
        $result = $this->db->query("SELECT * FROM {$this->table}");
        return $result->result();
    }

}