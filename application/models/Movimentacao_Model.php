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
        if ($data['id_tipo_movimentacao']==4 ||
            $data['id_tipo_movimentacao']==5 ||
            $data['id_tipo_movimentacao']==6) {
            $data['custo_unitario_compra'] = $this->getCustoMedio($data['id_produto']);
            $data['quantidade'] = '-'.$data['quantidade'];
            $data['custo_total'] = $data['quantidade'] * $data['custo_unitario_compra'];
        }
        if ($data['id_tipo_movimentacao']==4)
            $data['custo_unitario_compra'] = $this->getCustoMedio($data['id_produto']);
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    private function getCustoMedio($idProduto) {
        return $this->db->query("SELECT 
                                    round(sum(custo_total)/sum(tb_movimentacao_produto.quantidade),2) as custo_medio
                                FROM
                                    tb_movimentacao_produto
                                WHERE id_produto = {$idProduto}")->row()->custo_medio
                                ;
    }

    public function getEstoque($idProduto) {
        return $this->db->query("SELECT 
                                    sum(quantidade) as quantidade
                                FROM
                                    tb_movimentacao_produto
                                WHERE id_produto = {$idProduto}")->row()->quantidade
            ;
    }

    public function getExtratoEstoque($idProduto) {
        return $this->db->query("SELECT
                                    tb_movimentacao_produto.id,
                                    tb_produto.nome AS produto,
                                    tb_tipo_movimentacao_produto.id AS id_tipo_movimentacao_produto,
                                    tb_tipo_movimentacao_produto.nome AS tipo_movimentacao,
                                    DATE_FORMAT(tb_movimentacao_produto.data,'%d/%m/%Y') AS data,
                                    tb_movimentacao_produto.quantidade AS quantidade,
                                    tb_movimentacao_produto.custo_unitario_compra AS custo_unitario_compra,
                                    tb_movimentacao_produto.custo_total AS custo_total,
                                    IF(tb_movimentacao_produto.id_cliente is not null,tb_cliente.nome,tb_fornecedor.nome) as cliente_fornecedor
                                FROM
                                    tb_movimentacao_produto
                                        INNER JOIN
                                    tb_produto ON tb_produto.id = tb_movimentacao_produto.id_produto
                                        INNER JOIN
                                    tb_tipo_movimentacao_produto ON tb_tipo_movimentacao_produto.id = tb_movimentacao_produto.id_tipo_movimentacao
                                    LEFT JOIN
                                    tb_fornecedor ON tb_fornecedor.id = tb_movimentacao_produto.id_fornecedor
                                    LEFT JOIN
                                    tb_cliente ON tb_cliente.id = tb_movimentacao_produto.id_cliente
                                WHERE
                                    id_produto = {$idProduto}
                                ORDER BY tb_movimentacao_produto.data ASC
                                    ")->result();
    }
    
    public function getAll() {
        $query = "SELECT 
                        tb_movimentacao_produto.id,
                        tb_produto.nome AS produto,
                        sum(tb_movimentacao_produto.quantidade) as quantidade,
                        FORMAT(round(sum(custo_total)/sum(tb_movimentacao_produto.quantidade),2),2, 'de_DE') as custo_medio,
                        format(sum(custo_total),2,'de_DE') as total
                FROM
                    {$this->table}
                    INNER JOIN tb_produto ON tb_produto.id = tb_movimentacao_produto.id_produto";
        return $this->db->query($query)->result();
    }

    public function getById($id) {
        $query = "SELECT * FROM tb_movimentacao_produto WHERE id = {$id}";
       return $this->db->query($query);
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