<?php

/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 12/07/16
 * Time: 15:10
 */
class Usuario extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Usuario_Model', 'usuario', TRUE);
        $this->load->model('Perfil_Model', 'perfil', TRUE);
    }

    public function index() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $data['list_usuarios'] = $this->usuario->getList();
        $this->load->view('usuario/list',$data);
    }

    public function add() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->form_validation->set_error_delimiters('<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[100]');
        $this->form_validation->set_rules('senha', 'senha',  'required|trim|md5');


        if( $this->form_validation->run()==FALSE ){
            $perfis = $this->perfil->getAll();
            foreach($perfis as $arr){
                $data['list_perfis'][$arr->id] = $arr->nome;
            }
            $this->load->view('usuario/add',$data);
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Cadastrado com sucesso!');
            redirect('/usuario');
        }
    }

    public function adding() {
        $data['nome'] = $this->input->post('nome');
        $data['id_empresa'] = $this->session->userdata('id_empresa');
        $data['id_perfil'] =  $this->input->post('id_perfil');
        $data['email'] =  $this->input->post('email');
        $data['login'] =  $this->input->post('login');
        $data['senha'] =  $this->input->post('senha');
        $data['deve_mudar'] = ($this->input->post('deve_mudar') == 1) ? 1 : 0;
        $this->usuario->adding($data);
    }

    public function view($id) {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $result = $this->usuario->getById($id);
        if($result == FALSE){
            redirect('/usuario', 'refresh');
        }
        $perfis = $this->perfil->getAll();
        foreach($perfis as $arr){
            $data['list_perfis'][$arr->id] = $arr->nome;
        }

        $data['id'] = $result->row(0)->id;
        $data['nome'] = $result->row(0)->nome;
        $data['id_perfil'] = $result->row(0)->id_perfil;
        $data['email'] = $result->row(0)->email;

        $this->load->view('usuario/view', $data);
    }

    public function changing() {
        $id = (int) $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome_fantasia', 'nome_fantasia', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[100]');

        if($this->form_validation->run()){
            $data['nome'] = $this->input->post('nome');
            $data['id_perfil'] =  $this->input->post('id_perfil');
            $data['email'] =  $this->input->post('email');

            if($this->usuario->changing($id, $data)){
                $this->session->set_flashdata('update-ok','Alterado com sucesso!');
                redirect('/usuario/view/'.$id);
            }
        }else{
            $this->view($id);
        }
    }

    function del($id){
        if($this->usuario->del($id)){
            $this->session->set_flashdata('delete-ok','Excluido com sucesso!');
            redirect('/cliente');
        }


    }


}