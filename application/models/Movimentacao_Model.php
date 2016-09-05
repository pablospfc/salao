<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 04/09/2016
 * Time: 14:07
 */
class Movimentacao_Model extends CI_Model
{
    private $table = "tb_movimentacao_produto";

    function __construct(){
        parent::__construct();
    }
    
    public function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

}