<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 13/08/2016
 * Time: 12:15
 */
class Estoque_Model extends CI_Model
{
    private $table = "tb_empresa";

    function __construct(){
        parent::__construct();
    }

    public function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }
}