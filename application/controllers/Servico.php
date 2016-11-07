<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 04/06/2016
 * Time: 13:55
 */
class Servico extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('Servico_Model', 'servico', TRUE);
        $this->load->model('Tipo_Servico_Model', 'tipo_servico', TRUE);
    }

    function index(){
        $data = array();
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $data['list_servicos'] = $this->servico->getAll();
        $this->load->view('servico/list', $data);
    }

    function add() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');

        if( $this->form_validation->run()==FALSE ){
            $tipos_servicos = $this->tipo_servico->getAll();
            foreach($tipos_servicos as $arr){
                $data['list_tipos_servicos'][$arr->id] = $arr->nome;
            }
            $this->load->view('servico/add',$data);
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Cadastrado com sucesso!');
            redirect('/servico');
        }
    }

    function adding() {
        $data['nome'] = $this->input->post('nome');
        $data['id_tipo_servico'] = $this->input->post('id_tipo_servico');
        $data['custo'] =  $this->input->post('custo');
        $data['preco'] =  $this->input->post('preco');
        $data['desconto_maximo'] =  $this->input->post('desconto_maximo');
        $data['duracao'] =  $this->input->post('duracao');
        $this->servico->adding($data);
    }

    function view($id) {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $result = $this->servico->getById($id);

        if($result == FALSE){
            redirect('/servico', 'refresh');
        }

        $tipos_servicos = $this->tipo_servico->getAll();
        foreach($tipos_servicos as $arr){
            $data['list_tipos_servicos'][$arr->id] = $arr->nome;
        }

        $data['id'] = $result->row(0)->id;
        $data['nome'] = $result->row(0)->nome;
        $data['id_tipo_servico'] =  $result->row(0)->id_tipo_servico;
        $data['custo'] = $result->row(0)->custo;
        $data['preco'] = $result->row(0)->preco;
        $data['desconto_maximo'] = $result->row(0)->desconto_maximo;
        $data['duracao'] = $result->row(0)->duracao;

        $this->load->view('servico/view', $data);
    }

    function changing() {
        $id = (int) $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');

        if($this->form_validation->run()){

            $data['nome'] = $this->input->post('nome');
            $data['id_tipo_servico'] = $this->input->post('id_tipo_servico');
            $data['custo'] =  $this->input->post('custo');
            $data['preco'] =  $this->input->post('preco');
            $data['desconto_maximo'] =  $this->input->post('desconto_maximo');
            $data['duracao'] =  $this->input->post('duracao');

            if($this->servico->changing($id, $data)){
                $this->session->set_flashdata('update-ok','Alterado com sucesso!');
                redirect('/servico/view/'.$id);
            }
        }else{
            $this->view($id);
        }
    }

    public function getInfoServico() {
        $id =  (int) $this->input->post('id_servico');
        $result = $this->servico->getInfoServico($id);

        $array_servicos = array(
            'id' => $result->row(0)->id,
            'nome' => $result->row(0)->nome,
            'custo' => $result->row(0)->custo,
            'preco' => $result->row(0)->preco,
            'desconto_maximo' => $result->row(0)->desconto_maximo,
            'duracao' => $result->row(0)->duracao,
            'tipo_servico' => $result->row(0)->tipo_servico,
        );

        echo json_encode($array_servicos);

    }

    function del($id){
        if($this->servico->del($id)){
            $this->session->set_flashdata('delete-ok','Excluido com sucesso!');
            redirect('/servico');
        }


    }



}