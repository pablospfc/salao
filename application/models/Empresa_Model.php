<?php

/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 22/07/16
 * Time: 11:05
 */
class Empresa_Model extends CI_Model
{
    private $table = "tb_empresa";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    function changing($id, $data){
        $this->db->where('md5(id)', md5($id));

        $this->db->update($this->table, $data);

        return (bool) $this->db->affected_rows();
    }

    function getById($id) {
        $result = $this->db->query("SELECT 
                                           tb_empresa.id as id,
                                           tb_empresa.nome_fantasia as nome_fantasia,
                                           tb_empresa.razao_social as razao_social,
                                           tb_empresa.cnpj as cnpj,
                                           tb_empresa.email as email,
                                           tb_empresa.telefone as telefone,
                                           tb_empresa.cep as cep,
                                           tb_empresa.logradouro as logradouro,
                                           tb_empresa.bairro as bairro,
                                           tb_empresa.site as site,
                                           tb_cidade.id as id_cidade,
                                           tb_estado.id as id_estado
                                    FROM {$this->table}
                                    INNER JOIN tb_cidade on tb_cidade.id = tb_empresa.id_cidade
                                    INNER JOIN tb_estado on tb_estado.id = tb_cidade.id_estado
                                    WHERE tb_empresa.id = ".$id);
        return $result;
    }

}