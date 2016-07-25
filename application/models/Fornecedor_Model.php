<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 11/06/2016
 * Time: 12:25
 */
class Fornecedor_Model extends CI_Model
{
    private $table = "tb_fornecedor";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    function getAll() {
        $result = $this->db->query("SELECT * FROM {$this->table}");
        return $result->result();
    }

    function getById($id) {
        $result = $this->db->query("SELECT 
                                           tb_fornecedor.id as id,
                                           tb_fornecedor.nome as nome,
                                           tb_fornecedor.telefone as telefone,
                                           tb_fornecedor.celular as celular,
                                           tb_fornecedor.email as email,
                                           tb_fornecedor.cep as cep,
                                           tb_fornecedor.endereco as endereco,
                                           tb_fornecedor.numero as numero,
                                           tb_fornecedor.complemento as complemento,
                                           tb_fornecedor.bairro as bairro,
                                           tb_fornecedor.site as site,
                                           tb_fornecedor.cnpj as cnpj,
                                           tb_fornecedor.inscricao_estadual as inscricao_estadual,
                                           tb_fornecedor.inscricao_municipal as inscricao_municipal,
                                           tb_cidade.id as id_cidade,
                                           tb_estado.id as id_estado
                                    FROM {$this->table}
                                    INNER JOIN tb_cidade on tb_cidade.id = tb_fornecedor.id_cidade
                                    INNER JOIN tb_estado on tb_estado.id = tb_cidade.id_estado
                                    WHERE tb_fornecedor.id =  ".$id);
        return $result;
    }

    function getInfoFornecedor($id) {
        $result  = $this->db->query("SELECT 
                                            tb_fornecedor.id as id,
                                            tb_fornecedor.nome as nome,
                                            tb_fornecedor.telefone as telefone,
                                            tb_fornecedor.celular as celular,
                                            tb_fornecedor.email as email,
                                            tb_fornecedor.cep as cep,
                                            tb_fornecedor.endereco as endereco,
                                            tb_fornecedor.numero as numero,
                                            tb_fornecedor.complemento as complemento,
                                            tb_fornecedor.bairro as bairro,
                                            tb_cidade.nome as cidade,
                                            tb_estado.uf as uf,
                                            tb_fornecedor.site as site,
                                           tb_fornecedor.cnpj as cnpj,
                                           tb_fornecedor.inscricao_estadual as inscricao_estadual,
                                           tb_fornecedor.inscricao_municipal as inscricao_municipal
                                     FROM {$this->table}
                                     INNER JOIN tb_cidade on tb_cidade.id = tb_fornecedor.id_cidade
                                     INNER JOIN tb_estado on tb_estado.id = tb_cidade.id_estado
                                     WHERE tb_fornecedor.id = ".$id);
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