<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: claud
 * Date: 31/05/2016
 * Time: 21:56
 */
class Profissional extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('Profissional_Model', 'profissional', TRUE);
        $this->load->model('Cidade_Model', 'cidade', TRUE);
        $this->load->model('Estado_Model', 'estado', TRUE);
    }

    function index(){
        $data = array();
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $data['list_profissionais'] = $this->profissional->getAll();
        $this->load->view('profissional/list', $data);
    }

    function add() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->form_validation->set_error_delimiters('<div class="alert red fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[100]');

        if( $this->form_validation->run()==FALSE ){
            $estados = $this->estado->getEstados();
            foreach($estados as $arr){
                $data['list_estados'][$arr->id] = $arr->nome;
            }
            $this->load->view('profissional/add',$data);
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Cadastrado com sucesso!');
            redirect('/profissional');
        }
    }

    function adding() {
        $data['nome'] = $this->input->post('nome');
        $data['id_cidade'] = $this->input->post('id_cidade');
        $data['telefone'] =  $this->input->post('telefone');
        $data['data_nascimento'] =  $this->input->post('data_nascimento');
        $data['celular'] =  $this->input->post('celular');
        $data['email'] =  $this->input->post('email');
        $data['cep'] =  $this->input->post('cep');
        $data['endereco'] =  $this->input->post('endereco');
        $data['numero'] =  $this->input->post('numero');
        $data['complemento'] =  $this->input->post('complemento');
        $data['bairro'] =  $this->input->post('bairro');
        $this->profissional->adding($data);
    }

    function view($id) {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $result = $this->profissional->getById($id);
        if($result == FALSE){
            redirect('/profissional', 'refresh');
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
        $data['nome'] = $result->row(0)->nome;
        $data['data_nascimento'] =  $result->row(0)->data_nascimento;
        $data['id_cidade'] = $result->row(0)->id_cidade;
        $data['id_estado'] = $result->row(0)->id_estado;
        $data['telefone'] = $result->row(0)->telefone;
        $data['celular'] = $result->row(0)->celular;
        $data['email'] = $result->row(0)->email;
        $data['cep'] = $result->row(0)->cep;
        $data['endereco'] = $result->row(0)->endereco;
        $data['numero'] = $result->row(0)->numero;
        $data['complemento'] = $result->row(0)->complemento;
        $data['bairro'] = $result->row(0)->bairro;

        $this->load->view('profissional/view', $data);
    }

    function changing() {
        $id = (int) $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="alert red fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[100]');

        if($this->form_validation->run()){

            $data['nome'] = $this->input->post('nome');
            $data['data_nascimento'] =  $this->input->post('data_nascimento');
            $data['id_cidade'] = $this->input->post('id_cidade');;
            $data['telefone'] =  $this->input->post('telefone');
            $data['celular'] =  $this->input->post('celular');
            $data['email'] =  $this->input->post('email');
            $data['cep'] =  $this->input->post('cep');
            $data['endereco'] =  $this->input->post('endereco');
            $data['numero'] =  $this->input->post('numero');
            $data['complemento'] =  $this->input->post('complemento');
            $data['bairro'] =  $this->input->post('bairro');

            if($this->profissional->changing($id, $data)){
                $this->session->set_flashdata('update-ok','Alterado com sucesso!');
                redirect('/profissional/view/'.$id);
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

    public function getInfoProfissional() {
        $id =  (int) $this->input->post('id_profissional');
        $result = $this->profissional->getInfoProfissional($id);

        $array_profissionais = array(
            'id' => $result->row(0)->id,
            'nome' => $result->row(0)->nome,
            'cidade' => $result->row(0)->cidade,
            'uf' => $result->row(0)->uf,
            'data_nascimento' => $result->row(0)->data_nascimento,
            'telefone' => $result->row(0)->telefone,
            'celular' => $result->row(0)->celular,
            'email' => $result->row(0)->email,
            'cep' => $result->row(0)->cep,
            'endereco' => $result->row(0)->endereco,
            'numero' => $result->row(0)->numero,
            'complemento' => $result->row(0)->complemento,
            'bairro' => $result->row(0)->bairro
        );

        echo json_encode($array_profissionais);

    }

    function del($id){
        if($this->profissional->del($id)){
            $this->session->set_flashdata('delete-ok','Excluido com sucesso!');
            redirect('/profissional');
        }


    }

}