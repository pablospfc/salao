<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 27/05/2016
 * Time: 12:30
 */
class Cidade_Model extends CI_Model
{
    private $table = "tb_cidade";
    function __construct(){
        parent::__construct();
    }

    function getCidadesByUF($idEstado) {
        $result =  $this->db->query("SELECT * FROM tb_cidade WHERE id_estado = ".$idEstado);
        return $result->result();
    }

}