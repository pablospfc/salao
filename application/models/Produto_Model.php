<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 11/06/2016
 * Time: 11:19
 */
class Produto_Model extends CI_Model
{
    private $table = "tb_produto";

    function __construct(){
        parent::__construct();
    }

    function adding($data){
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    function getAll() {
        $result = $this->db->query("SELECT 
                                           tb_produto.id as id,
                                           tb_produto.nome as nome,
                                           format(tb_produto.custo,2,'de_DE') as custo,
                                           format(tb_produto.preco,2,'de_DE') as preco,
                                           tb_tipo_produto.nome as tipo_produto
                                     FROM {$this->table}
                                     INNER JOIN tb_tipo_produto ON tb_tipo_produto.id = tb_produto.id_tipo_produto");
        return $result->result();
    }

    function getById($id) {
        $result = $this->db->query("SELECT id, nome, id_tipo_produto, format(tb_produto.custo,2,'de_DE') as custo, format(tb_produto.preco,2,'de_DE') as preco, desconto_maximo, desconto_promocional FROM {$this->table} WHERE id=".$id);
        return $result;
    }

    function getInfoProduto($id) {
        $result  = $this->db->query("SELECT 
                                           tb_produto.id as id,
                                           tb_produto.nome as nome,
                                           format(tb_produto.custo,2,'de_DE') as custo,
                                           format(tb_produto.preco,2,'de_DE') as preco,
                                           tb_produto.desconto_maximo as desconto_maximo,
                                           tb_produto.desconto_promocional as desconto_promocional,
                                           tb_tipo_produto.nome as tipo_produto
                                     FROM {$this->table}
                                     INNER JOIN tb_tipo_produto ON tb_tipo_produto.id = tb_produto.id_tipo_produto
                                     WHERE tb_produto.id=".$id);
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