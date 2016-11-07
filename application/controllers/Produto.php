<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: claud
 * Date: 11/06/2016
 * Time: 11:21
 */
class Produto extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('Produto_Model', 'produto', TRUE);
        $this->load->model('Tipo_Produto_Model', 'tipo_produto', TRUE);
    }

    function index(){
        $data = array();
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $data['list_produtos'] = $this->produto->getAll();
        $this->load->view('produto/list', $data);
    }

    function add() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');

        if( $this->form_validation->run()==FALSE ){
            $tipos_produtos = $this->tipo_produto->getAll();
            foreach($tipos_produtos as $arr){
                $data['list_tipos_produtos'][$arr->id] = $arr->nome;
            }
            $this->load->view('produto/add',$data);
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Cadastrado com sucesso!');
            redirect('/produto');
        }
    }

    function adding() {
        $data['nome'] = $this->input->post('nome');
        $data['id_tipo_produto'] = $this->input->post('id_tipo_produto');
        $data['preco'] =  $this->input->post('preco');
        $data['desconto_maximo'] =  $this->input->post('desconto_maximo');
        $this->produto->adding($data);
    }

    function view($id) {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $result = $this->produto->getById($id);

        if($result == FALSE){
            redirect('/produto', 'refresh');
        }

        $tipos_produtos = $this->tipo_produto->getAll();
        foreach($tipos_produtos as $arr){
            $data['list_tipos_produtos'][$arr->id] = $arr->nome;
        }

        $data['id'] = $result->row(0)->id;
        $data['nome'] = $result->row(0)->nome;
        $data['id_tipo_produto'] =  $result->row(0)->id_tipo_produto;
        $data['preco'] = $result->row(0)->preco;
        $data['desconto_maximo'] = $result->row(0)->desconto_maximo;

        $this->load->view('produto/view', $data);
    }

    function changing() {
        $id = (int) $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');

        if($this->form_validation->run()){

            $data['nome'] = $this->input->post('nome');
            $data['id_tipo_produto'] = $this->input->post('id_tipo_produto');
            $data['preco'] =  $this->input->post('preco');
            $data['desconto_maximo'] =  $this->input->post('desconto_maximo');

            if($this->produto->changing($id, $data)){
                $this->session->set_flashdata('update-ok','Alterado com sucesso!');
                redirect('/produto/view/'.$id);
            }
        }else{
            $this->view($id);
        }
    }

    public function getInfoProduto() {
        $id =  (int) $this->input->post('id_produto');
        $result = $this->produto->getInfoProduto($id);

        $array_produtos = array(
            'id' => $result->row(0)->id,
            'nome' => $result->row(0)->nome,
            'preco' => $result->row(0)->preco,
            'desconto_maximo' => $result->row(0)->desconto_maximo,
            'tipo_produto' => $result->row(0)->tipo_produto,
        );

        echo json_encode($array_produtos);

    }

    function del($id){
        if($this->produto->del($id)){
            $this->session->set_flashdata('delete-ok','Excluido com sucesso!');
            redirect('/produto');
        }


    }

}