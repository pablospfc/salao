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
        //var_dump($this->getCustoMedio($data['id_produto']));
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
    
    public function getAll() {
        $query = "SELECT 
                        tb_produto.nome AS produto,
                        sum(tb_movimentacao_produto.quantidade) as quantidade,
                        FORMAT(round(sum(custo_total)/sum(tb_movimentacao_produto.quantidade),2),2, 'de_DE') as custo_medio,
                        format(sum(custo_total),2,'de_DE') as total
                FROM
                    {$this->table}
                    INNER JOIN tb_produto ON tb_produto.id = tb_movimentacao_produto.id_produto";
        return $this->db->query($query)->result();
    }

}