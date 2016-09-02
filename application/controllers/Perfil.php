<?php

/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 30/08/16
 * Time: 09:20
 */
class Perfil extends MY_Controller
{
    public function __construct(){

        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Perfil_Model', 'perfil', TRUE);
    }

    function index(){
        $data = array();
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $data['list_perfis'] = $this->perfil->getAll();
        $this->load->view('perfil/list', $data);
    }

    function add() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->form_validation->set_error_delimiters('<div class="alert red fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');

        if( $this->form_validation->run()==FALSE ){

            $this->load->view('perfil/add');
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Cadastrado com sucesso!');
            redirect('/perfil');
        }
    }

    function adding() {
        $data['nome'] = $this->input->post('nome');
        $this->perfil->adding($data);
    }

    function view($id) {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $result = $this->perfil->getById($id);

        if($result == FALSE){
            redirect('/perfil', 'refresh');
        }

        $data['id'] = $result->row(0)->id;
        $data['nome'] = $result->row(0)->nome;

        $this->load->view('perfil/view', $data);
    }

    function changing() {
        $id = (int) $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="alert red fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');

        if($this->form_validation->run()){

            $data['nome'] = $this->input->post('nome');

            if($this->perfil->changing($id, $data)){
                $this->session->set_flashdata('update-ok','Alterado com sucesso!');
                redirect('/perfil/view/'.$id);
            }
        }else{
            $this->view($id);
        }
    }

    function del($id){
        if($this->perfil->del($id)){
            $this->session->set_flashdata('delete-ok','Excluido com sucesso!');
            redirect('/perfil');
        }


    }

}