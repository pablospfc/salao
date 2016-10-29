<?php

/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 12/07/16
 * Time: 10:01
 */
class Movimentacao extends MY_Controller
{
    public function __construct(){

        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('Movimentacao_Model', 'movimentacao', TRUE);
        $this->load->model('Fornecedor_Model', 'fornecedor', TRUE);
        $this->load->model('Produto_Model', 'produto', TRUE);
        $this->load->model('Tipo_Movimentacao_Model', 'tipo_movimentacao', TRUE);
        $this->load->model('Cliente_Model', 'cliente', TRUE);
    }

    function index(){
        $data = array();
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $data['list_movimentacoes'] = $this->movimentacao->getAll();
        $this->load->view('movimentacao/list', $data);

    }

    function extrato($idProduto) {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $data['extrato'] = $this->movimentacao->getExtratoEstoque($idProduto);
        $this->load->view('movimentacao/extrato', $data);
    }

    function add() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->form_validation->set_error_delimiters('<div class="alert red fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('id_produto', 'id_produto', 'required');
        $this->form_validation->set_rules('data_movimentacao', 'data_movimentacao', 'required');

        if( $this->form_validation->run()==FALSE ){
            $fornecedores = $this->fornecedor->getAll();
            foreach($fornecedores as $arr){
                $data['list_fornecedores'][$arr->id] = $arr->nome;
            }
            $produtos = $this->produto->getAll();
            foreach($produtos as $arr){
                $data['list_produtos'][$arr->id] = $arr->nome;
            }
            $tipos_movimentacao = $this->tipo_movimentacao->getAll();
            foreach($tipos_movimentacao as $arr){
                $data['list_tipos_movimentacao'][$arr->id] = $arr->nome;
            }
            $clientes = $this->cliente->getAll();
            foreach($clientes as $arr){
                $data['list_clientes'][$arr->id] = $arr->nome;
            }
            $this->load->view('movimentacao/add',$data);
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Cadastrado com sucesso!');
            redirect('/movimentacao');
        }
    }

    function adding() {
        $data['id_produto'] = $this->input->post('id_produto');
        $data['id_tipo_movimentacao'] = $this->input->post('id_tipo_movimentacao');
        $data['id_fornecedor'] = ($this->input->post('id_fornecedor')) ? $this->input->post('id_fornecedor') : null;
        $data['id_cliente'] = ($this->input->post('id_cliente')) ? $this->input->post('id_cliente') : null;
        $data['data'] =  $this->input->post('data_movimentacao');
        $data['quantidade'] =  $this->input->post('quantidade');
        $data['custo_total'] = $this->input->post('custo_total');
        $data['custo_unitario_compra'] =  $this->input->post('custo_unitario_compra');
        $data['nota_fiscal'] =  $this->input->post('nota_fiscal');
        $data['observacoes'] =  $this->input->post('observacoes');
        $this->movimentacao->adding($data);
    }

    function view($id) {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $result = $this->movimentacao->getById($id);
        if($result == FALSE){
            redirect('/movimentacao', 'refresh');
        }
        $fornecedores = $this->fornecedor->getAll();
        foreach($fornecedores as $arr){
            $data['list_fornecedores'][$arr->id] = $arr->nome;
        }
        $produtos = $this->produto->getAll();
        foreach($produtos as $arr){
            $data['list_produtos'][$arr->id] = $arr->nome;
        }
        $tipos_movimentacao = $this->tipo_movimentacao->getAll();
        foreach($tipos_movimentacao as $arr){
            $data['list_tipos_movimentacao'][$arr->id] = $arr->nome;
        }
        $clientes = $this->cliente->getAll();
        foreach($clientes as $arr){
            $data['list_clientes'][$arr->id] = $arr->nome;
        }

        $data['id'] = $result->row(0)->id;
        $data['id_produto'] = $result->row(0)->id_produto;
        $data['id_tipo_movimentacao'] =  $result->row(0)->id_tipo_movimentacao;
        $data['id_fornecedor'] =  $result->row(0)->id_fornecedor;
        $data['id_cliente'] =  $result->row(0)->id_cliente;
        $data['data'] = $result->row(0)->data;
        $data['quantidade'] = $result->row(0)->quantidade;
        $data['custo_total'] = $result->row(0)->custo_total;
        $data['custo_unitario_compra'] = $result->row(0)->custo_unitario_compra;
        $data['nota_fiscal'] = $result->row(0)->nota_fiscal;
        $data['observacoes'] = $result->row(0)->observacoes;

        $this->load->view('movimentacao/view', $data);
    }

    function changing() {
        $id = (int) $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="alert red fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('id_produto', 'id_produto', 'required');
        $this->form_validation->set_rules('data_movimentacao', 'data_movimentacao', 'required');

        if($this->form_validation->run()){

            $data['id_produto'] = $this->input->post('id_produto');
            $data['id_tipo_movimentacao'] = $this->input->post('id_tipo_movimentacao');
            $data['id_fornecedor'] = ($this->input->post('id_fornecedor')) ? $this->input->post('id_fornecedor') : null;
            $data['id_cliente'] = ($this->input->post('id_cliente')) ? $this->input->post('id_cliente') : null;
            $data['data'] =  $this->input->post('data_movimentacao');
            $data['quantidade'] =  $this->input->post('quantidade');
            $data['custo_total'] = $this->input->post('custo_total');
            $data['custo_unitario_compra'] =  $this->input->post('custo_unitario_compra');
            $data['nota_fiscal'] =  $this->input->post('nota_fiscal');
            $data['observacoes'] =  $this->input->post('observacoes');

            if($this->movimentacao->changing($id, $data)){
                $this->session->set_flashdata('update-ok','Alterado com sucesso!');
                redirect('/movimentacao/view/'.$id);
            }
        }else{
            $this->view($id);
        }
    }

    function del($id){
        if($this->movimentacao->del($id)){
            $this->session->set_flashdata('delete-ok','Excluido com sucesso!');
            redirect('/movimentacao');
        }


    }
    
    

}