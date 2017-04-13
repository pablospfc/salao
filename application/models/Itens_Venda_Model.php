<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 27/02/2017
 * Time: 16:18
 */
class Itens_Venda_Model extends CI_Model
{
    private $table = "tb_itens_venda";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

}