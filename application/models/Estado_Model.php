<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 27/05/2016
 * Time: 12:29
 */
class Estado_Model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function getEstados() {
        $result = $this->db->query("SELECT * FROM tb_estado");
        return $result->result();
    }

}