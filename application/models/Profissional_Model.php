<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 04/06/2016
 * Time: 11:15
 */
class profissional_model extends CI_Model
{
    private $table = "tb_profissional";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    function getAll() {
        $result = $this->db->query("SELECT * FROM tb_profissional");
        return $result->result();
    }

    function getById($id) {
        $result = $this->db->query("SELECT 
tb_profissional.id as id,
tb_profissional.nome as nome,
tb_profissional.data_nascimento as data_nascimento,
tb_profissional.telefone as telefone,
tb_profissional.celular as celular,
tb_profissional.email as email,
tb_profissional.cep as cep,
tb_profissional.endereco as endereco,
tb_profissional.numero as numero,
tb_profissional.complemento as complemento,
tb_profissional.bairro as bairro,
tb_cidade.id as id_cidade,
tb_estado.id as id_estado
FROM tb_profissional
INNER JOIN tb_cidade on tb_cidade.id = tb_profissional.id_cidade
INNER JOIN tb_estado on tb_estado.id = tb_cidade.id_estado
 WHERE tb_profissional.id =  ".$id);
        return $result;
    }

    function getInfoProfissional($id) {
        $result  = $this->db->query("SELECT 
tb_profissional.id as id,
tb_profissional.nome as nome,
DATE_FORMAT(tb_profissional.data_nascimento, '%d/%m/%Y') as data_nascimento,
tb_profissional.telefone as telefone,
tb_profissional.celular as celular,
tb_profissional.email as email,
tb_profissional.cep as cep,
tb_profissional.endereco as endereco,
tb_profissional.numero as numero,
tb_profissional.complemento as complemento,
tb_profissional.bairro as bairro,
tb_cidade.nome as cidade,
tb_estado.uf as uf
FROM tb_profissional
INNER JOIN tb_cidade on tb_cidade.id = tb_profissional.id_cidade
INNER JOIN tb_estado on tb_estado.id = tb_cidade.id_estado
 WHERE tb_profissional.id = ".$id);
        return $result;
    }

    function changing($id, $data){
        $this->db->where('md5(id)', md5($id));

        $this->db->update($this->table, $data);

        return (bool) $this->db->affected_rows();
    }

    function del($id){
        $this->db->where('md5(id)', md5($id));
        $this->db->delete($this->table);
        return (bool) $this->db->affected_rows();
    }

}