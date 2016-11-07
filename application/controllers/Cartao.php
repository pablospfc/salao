<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: claud
 * Date: 26/06/2016
 * Time: 19:53
 */
class Cartao extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('Cartao_Model', 'cartao', TRUE);
        $this->load->model('Tipo_Operacao_Model', 'tipo_operacao', TRUE);
    }

    function index(){
        $data = array();
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $data['list_cartoes'] = $this->cartao->getAll();
        $this->load->view('cartao/list', $data);
    }

    function add() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('bandeira', 'bandeira', 'required|max_length[50]');

        if( $this->form_validation->run()==FALSE ){
            $tipos_operacoes = $this->tipo_operacao->getAll();
            foreach($tipos_operacoes as $arr){
                $data['list_tipos_operacoes'][$arr->id] = $arr->nome;
            }
            $this->load->view('cartao/add',$data);
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Cadastrado com sucesso!');
            redirect('/cartao');
        }
    }

    function adding() {
        $data['bandeira'] = $this->input->post('bandeira');
        $data['id_tipo_operacao'] = $this->input->post('id_tipo_operacao');
        $data['taxa_cartao_debito'] =  $this->input->post('taxa_cartao_debito');
        $data['taxa_cartao_credito_vista'] =  $this->input->post('taxa_cartao_credito_vista');
        $data['taxa_cartao_credito_prazo'] =  $this->input->post('taxa_cartao_credito_prazo');
        $data['numero_maximo_parcelas'] =  $this->input->post('numero_maximo_parcelas');
        $this->cartao->adding($data);
    }

    function view($id) {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $result = $this->cartao->getById($id);

        if($result == FALSE){
            redirect('/cartao', 'refresh');
        }

        $tipos_operacoes = $this->tipo_operacao->getAll();
        foreach($tipos_operacoes as $arr){
            $data['list_tipos_operacoes'][$arr->id] = $arr->nome;
        }

        $data['id'] = $result->row(0)->id;
        $data['bandeira'] = $result->row(0)->bandeira;
        $data['id_tipo_operacao'] =  $result->row(0)->id_tipo_operacao;
        $data['taxa_cartao_debito'] = $result->row(0)->taxa_cartao_debito;
        $data['taxa_cartao_credito_vista'] = $result->row(0)->taxa_cartao_credito_vista;
        $data['taxa_cartao_credito_prazo'] = $result->row(0)->taxa_cartao_credito_prazo;
        $data['numero_maximo_parcelas'] = $result->row(0)->numero_maximo_parcelas;

        $this->load->view('cartao/view', $data);
    }

    function changing() {
        $id = (int) $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('bandeira', 'bandeira', 'required|max_length[50]');

        if($this->form_validation->run()){

            $data['bandeira'] = $this->input->post('bandeira');
            $data['id_tipo_operacao'] = $this->input->post('id_tipo_operacao');
            $data['taxa_cartao_debito'] =  $this->input->post('taxa_cartao_debito');
            $data['taxa_cartao_credito_vista'] =  $this->input->post('taxa_cartao_credito_vista');
            $data['taxa_cartao_credito_prazo'] =  $this->input->post('taxa_cartao_credito_prazo');
            $data['numero_maximo_parcelas'] =  $this->input->post('numero_maximo_parcelas');

            if($this->cartao->changing($id, $data)){
                $this->session->set_flashdata('update-ok','Alterado com sucesso!');
                redirect('/cartao/view/'.$id);
            }
        }else{
             
            $this->view($id);
        }
    }

     public function getInfoCartao() {
        $id =  (int) $this->input->post('id_cartao');
        $result = $this->cartao->getInfoCartao($id);

        $array_cartoes = array(
            'bandeira_cartao' => $result->row(0)->bandeira_cartao,
            'tipo_operacao'    => $result->row(0)->tipo_operacao,
            'taxa_cartao_debito' => $result->row(0)->taxa_cartao_debito,
            'taxa_cartao_credito_vista' => $result->row(0)->taxa_cartao_credito_vista,
            'taxa_cartao_credito_prazo' => $result->row(0)->taxa_cartao_credito_prazo,
            'numero_maximo_parcelas' => $result->row(0)->numero_maximo_parcelas
        );

        //error_log(var_export($id, true), 3,'/var/www/html/salao/log.log');

        echo json_encode($array_cartoes);

    }

    function del($id){
        if($this->cartao->del($id)){
            $this->session->set_flashdata('delete-ok','Excluido com sucesso!');
            redirect('/cartao');
        }


    }

}