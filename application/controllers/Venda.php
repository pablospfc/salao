<?php

/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 12/07/16
 * Time: 10:04
 */
class Venda extends MY_Controller
{
    public function __construct(){

        parent::__construct();

        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('Cliente_Model', 'cliente', TRUE);
        $this->load->model('Profissional_Model', 'profissional', TRUE);
        $this->load->model('Produto_Model', 'produto', TRUE);
        $this->load->model('Servico_Model', 'servico', TRUE);
        $this->load->model('Venda_Model', 'venda', TRUE);
        $this->load->model('Itens_Venda_Model', 'venda', TRUE);

    }

    Public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('venda/add');
    }

    public function add() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[100]');

        if( $this->form_validation->run()==FALSE ){
            
            $clientes = $this->cliente->getAll();
            foreach($clientes as $arr){
                $data['list_clientes'][$arr->id] = $arr->nome;
            }

            $produtos = $this->produto->getAll();
            foreach($produtos as $arr){
                $data['list_produtos'][$arr->id] = $arr->nome;
            }

            $profissionais = $this->profissional->getAll();
            foreach($profissionais as $arr){
                $data['list_profissionais'][$arr->id] = $arr->nome;
            }

            $servicos = $this->servico->getAll();
            foreach($servicos as $arr){
                $data['list_servicos'][$arr->id] = $arr->nome;
            }

            $this->load->view('venda/add', $data);          
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Venda registrada com sucesso!');
            redirect('/venda/add');
        }
    }

    public function adding() {
        $data['id_profissional'] =  $this->input->post('id_profissional');
        $data['id_cliente'] =  $this->input->post('id_cliente');
        $data['data'] =  date('Y-m-d H:i:s');
        $data['total'] =  $this->input->post('total');
        $data['itens'] = $this->input->post('itens');
        $this->venda->adding($data);
    }

}