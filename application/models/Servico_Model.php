<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 04/06/2016
 * Time: 13:43
 */
class servico_model extends CI_Model
{
    private $table = "tb_servico";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    function getAll() {
        $result = $this->db->query("SELECT 
                                           tb_servico.id as id,
                                           tb_servico.nome as nome,
                                           format(tb_servico.custo,2,'de_DE') as custo,
                                           format(tb_servico.preco,2,'de_DE') as preco,
                                           tb_servico.duracao as duracao,
                                           tb_tipo_servico.nome as tipo_servico
                                     FROM {$this->table}
                                     INNER JOIN tb_tipo_servico ON tb_tipo_servico.id = tb_servico.id_tipo_servico");
        return $result->result();
    }

    function getById($id) {
        $result = $this->db->query("SELECT id, nome, id_tipo_servico, format(tb_servico.custo,2,'de_DE') as custo, format(tb_servico.preco,2,'de_DE') as preco, desconto_maximo, desconto_promocional, duracao FROM {$this->table} WHERE id=".$id);
        return $result;
    }

    function getInfoServico($id) {
        $result  = $this->db->query("SELECT 
                                           tb_servico.id as id,
                                           tb_servico.nome as nome,
                                           format(tb_servico.custo,2,'de_DE') as custo,
                                           format(tb_servico.preco,2,'de_DE') as preco,
                                           tb_servico.desconto_maximo as desconto_maximo,
                                           tb_servico.desconto_promocional as desconto_promocional,
                                           tb_servico.duracao as duracao,
                                           tb_tipo_servico.nome as tipo_servico
                                     FROM {$this->table}
                                     INNER JOIN tb_tipo_servico ON tb_tipo_servico.id = tb_servico.id_tipo_servico
                                     WHERE tb_servico.id=".$id);
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