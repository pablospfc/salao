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

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');
        $this->form_validation->set_rules('login', 'login', 'trim|required|max_length[15]|is_unique[tb_usuario.login]',array('is_unique' => 'Já existe um usuário cadastrado com esse login.'));
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[100]|is_unique[tb_usuario.email]',array('is_unique' => 'Já existe um usuário cadastrado com esse email.'));
        $this->form_validation->set_rules('senha', 'senha',  'required|trim|min_length[6]|md5',array('min_length' => 'O campo %s deve ter pelo menos 6 caracteres.'));


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
        $data['login'] = $result->row(0)->login;
        $data['ativo'] = $result->row(0)->ativo;

        $this->load->view('usuario/view', $data);
    }

    public function changing() {
        $id = (int) $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[100]');
        $this->form_validation->set_rules('senha', 'senha',  'trim|min_length[6]|md5',array('min_length' => 'O campo %s deve ter pelo menos 6 caracteres.'));

        

        if($this->form_validation->run()){
            $data['nome'] = $this->input->post('nome');
            $data['id_perfil'] =  $this->input->post('id_perfil');
            $data['email'] =  $this->input->post('email');
            

            if ($this->input->post('senha') != null)
                $data['senha'] = md5($this->input->post('senha'));
            
            if ($this->session->userdata('id_perfil')==1)
            $data['ativo'] = ($this->input->post('ativo') == 1) ? 1 : 0;

            $sucesso = $this->usuario->changing($id, $data);
             error_log(var_export($sucesso,true),0);
            if($sucesso){
                $this->session->set_flashdata('update-ok','Alterado com sucesso!');
                redirect('/usuario/view/'.$id);
            }
            else
                redirect('/usuario/view/'.$id);
        }else{
            $this->view($id);
        }
    }

    function del($id){
        if($this->usuario->del($id)){
            $this->session->set_flashdata('delete-ok','Excluido com sucesso!');
            redirect('/usuario');
        }


    }


}