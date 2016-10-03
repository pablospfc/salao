<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 24/09/2016
 * Time: 16:07
 */
class Tipo_Movimentacao_Model extends CI_Model
{
    private $table = "tb_tipo_movimentacao_produto";

    function __construct(){
        parent::__construct();
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE id <> 7");
        return $result->result();
    }

}