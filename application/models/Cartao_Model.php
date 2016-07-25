<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 26/06/2016
 * Time: 20:04
 */
class Cartao_Model extends CI_Model
{
    private $table = "tb_cartao";

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

    function del($id){
        $this->db->where('md5(id)', md5($id));
        $this->db->delete($this->table);
        return (bool) $this->db->affected_rows();
    }
    
    function getAll() {
        $result = $this->db->query("SELECT 
                                           tb_cartao.id as id,
                                           tb_tipo_operacao.nome as tipo_operacao,
                                           tb_cartao.id_tipo_operacao as id_tipo_operacao,
                                           tb_cartao.bandeira as bandeira_cartao,
                                           tb_cartao.numero_maximo_parcelas as numero_maximo_parcelas
                                    FROM {$this->table}
                                    INNER JOIN tb_tipo_operacao ON tb_tipo_operacao.id = tb_cartao.id_tipo_operacao");
        return $result->result();
    }

    function getById($id) {
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE id = ".$id);
        return $result;
    }

    function getInfoCartao($id) {
        $result = $this->db->query("SELECT 
                                           tb_cartao.id as id,
                                           tb_tipo_operacao.nome as tipo_operacao,
                                           tb_cartao.id_tipo_operacao as id_tipo_operacao,
                                           tb_cartao.bandeira as bandeira_cartao,
                                           tb_cartao.taxa_cartao_credito_prazo as taxa_cartao_credito_prazo,
                                           tb_cartao.taxa_cartao_credito_vista as taxa_cartao_credito_vista,
                                           tb_cartao.taxa_cartao_debito as taxa_cartao_debito,
                                           tb_cartao.numero_maximo_parcelas as numero_maximo_parcelas
                                    FROM {$this->table}
                                    INNER JOIN tb_tipo_operacao ON tb_tipo_operacao.id = tb_cartao.id_tipo_operacao
                                    WHERE tb_cartao.id = {$id}
                                    ");
        return $result;
    }
    

}