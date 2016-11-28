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
            $estados = $this->estado->getEstados();
            foreach($estados as $arr){
                $data['list_estados'][$arr->id] = $arr->nome;
            }
            $this->load->view('cliente/add',$data);
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Venda registrada com sucesso!');
            redirect('/venda/add');
        }
    }

}