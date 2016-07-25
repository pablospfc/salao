<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 26/05/2016
 * Time: 11:38
 */
class Cliente_Model extends CI_Model
{
    private $table = "tb_cliente";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    function getAll() {
        $result = $this->db->query("SELECT * FROM tb_cliente");
        return $result->result();
    }

    function getById($id) {
        $result = $this->db->query("SELECT 
                                           tb_cliente.id as id,
                                           tb_cliente.nome as nome,
                                           tb_cliente.data_nascimento as data_nascimento,
                                           tb_cliente.telefone as telefone,
                                           tb_cliente.celular as celular,
                                           tb_cliente.email as email,
                                           tb_cliente.cep as cep,
                                           tb_cliente.endereco as endereco,
                                           tb_cliente.numero as numero,
                                           tb_cliente.complemento as complemento,
                                           tb_cliente.bairro as bairro,
                                           tb_cidade.id as id_cidade,
                                           tb_estado.id as id_estado
                                    FROM tb_cliente
                                    INNER JOIN tb_cidade on tb_cidade.id = tb_cliente.id_cidade
                                    INNER JOIN tb_estado on tb_estado.id = tb_cidade.id_estado
                                    WHERE tb_cliente.id =  ".$id);
        return $result;
    }

    function getInfoCliente($id) {
        $result  = $this->db->query("SELECT 
                                            tb_cliente.id as id,
                                            tb_cliente.nome as nome,
                                            DATE_FORMAT(tb_cliente.data_nascimento, '%d/%m/%Y') as data_nascimento,
                                            tb_cliente.telefone as telefone,
                                            tb_cliente.celular as celular,
                                            tb_cliente.email as email,
                                            tb_cliente.cep as cep,
                                            tb_cliente.endereco as endereco,
                                            tb_cliente.numero as numero,
                                            tb_cliente.complemento as complemento,
                                            tb_cliente.bairro as bairro,
                                            tb_cidade.nome as cidade,
                                            tb_estado.uf as uf
                                     FROM tb_cliente
                                     INNER JOIN tb_cidade on tb_cidade.id = tb_cliente.id_cidade
                                     INNER JOIN tb_estado on tb_estado.id = tb_cidade.id_estado
                                     WHERE tb_cliente.id = ".$id);
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