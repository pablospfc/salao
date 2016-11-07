<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 20/07/16
 * Time: 09:45
 */
class Empresa extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Empresa_Model', 'empresa', TRUE);
        $this->load->model('Cidade_Model', 'cidade', TRUE);
        $this->load->model('Estado_Model', 'estado', TRUE);
    }

    public function index() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('empresa/index');
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
            $this->load->view('empresa/add',$data);
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Cadastrado com sucesso!');
            redirect('/empresa');
        }
    }

    public function adding() {
        $data['nome_fantasia'] = $this->input->post('nome_fantasia');
        $data['razao_social'] = $this->input->post('razao_social');
        $data['id_cidade'] = $this->input->post('id_cidade');
        $data['telefone'] =  $this->input->post('telefone');
        $data['email'] =  $this->input->post('email');
        $data['cep'] =  $this->input->post('cep');
        $data['logradouro'] =  $this->input->post('logradouro');
        $data['bairro'] =  $this->input->post('bairro');
        $data['site'] =  $this->input->post('site');
        $data['cnpj'] =  $this->input->post('cnpj');
        $this->empresa->adding($data);
    }

    public function view($id) {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $result = $this->empresa->getById($id);
        if($result == FALSE){
            redirect('/empresa', 'refresh');
        }
        $estados = $this->estado->getEstados();
        foreach($estados as $arr){
            $data['list_estados'][$arr->id] = $arr->nome;
        }
        $cidades = $this->cidade->getCidadesByUF($result->row(0)->id_estado);
        foreach($cidades as $arr){
            $data['list_cidades'][$arr->id] = $arr->nome;
        }

        $data['id'] = $result->row(0)->id;
        $data['nome_fantasia'] = $result->row(0)->nome_fantasia;
        $data['razao_social'] = $result->row(0)->razao_social;
        $data['id_cidade'] = $result->row(0)->id_cidade;
        $data['id_estado'] = $result->row(0)->id_estado;
        $data['telefone'] = $result->row(0)->telefone;
        $data['email'] = $result->row(0)->email;
        $data['cep'] = $result->row(0)->cep;
        $data['logradouro'] = $result->row(0)->logradouro;
        $data['bairro'] = $result->row(0)->bairro;
        $data['cnpj'] = $result->row(0)->cnpj;
        $data['site'] = $result->row(0)->site;

        $this->load->view('empresa/view', $data);
    }

    public function changing() {
        //error_log(var_export("chegou aqui", true), 3,'C:/xampp/htdocs/salao/log.log');
        $id = (int) $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome_fantasia', 'nome_fantasia', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[100]');

        if($this->form_validation->run()){
            $data['nome_fantasia'] = $this->input->post('nome_fantasia');
            $data['razao_social'] = $this->input->post('razao_social');
            $data['id_cidade'] = $this->input->post('id_cidade');
            $data['telefone'] =  $this->input->post('telefone');
            $data['email'] =  $this->input->post('email');
            $data['cep'] =  $this->input->post('cep');
            $data['logradouro'] =  $this->input->post('logradouro');
            $data['bairro'] =  $this->input->post('bairro');
            $data['site'] =  $this->input->post('site');
            $data['cnpj'] =  $this->input->post('cnpj');

            if($this->empresa->changing($id, $data)){
                $this->session->set_flashdata('update-ok','Alterado com sucesso!');
                redirect('/empresa/view/'.$id);
            }
        }else{
            $this->view($id);
        }
    }

    public function getCidadesByUF() {
        $cidades = $this->cidade->getCidadesByUF($this->input->post("id_estado"));


        $option = "<option value=''></option>";
        foreach($cidades as $linha) {
            $option .= "<option value='$linha->id'>$linha->nome</option>";
        }
        //error_log(var_export($option, true), 3,'C:/xampp/htdocs/salao/log.log');
        echo $option;

    }

}