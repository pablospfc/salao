<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 26/11/2016
 * Time: 21:54
 */
class Venda_Model extends CI_Model
{
    private $table = "tb_venda";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

}