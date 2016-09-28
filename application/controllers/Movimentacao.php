<?php

/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 12/07/16
 * Time: 10:01
 */
class Movimentacao extends MY_Controller
{
    public function __construct(){

        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('Movimentacao_Model', 'movimentacao', TRUE);
        $this->load->model('Fornecedor_Model', 'fornecedor', TRUE);
        $this->load->model('Produto_Model', 'produto', TRUE);
        $this->load->model('Tipo_Movimentacao_Model', 'tipo_movimentacao', TRUE);
    }

    function index(){
        $data = array();
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $data['list_movimentacoes'] = $this->movimentacao->getAll();
        $this->load->view('movimentacao/list', $data);

    }

    function add() {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->form_validation->set_error_delimiters('<div class="alert red fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('id_produto', 'id_produto', 'required');
        $this->form_validation->set_rules('data_movimentacao', 'data_movimentacao', 'required');

        if( $this->form_validation->run()==FALSE ){
            $fornecedores = $this->fornecedor->getAll();
            foreach($fornecedores as $arr){
                $data['list_fornecedores'][$arr->id] = $arr->nome;
            }
            $produtos = $this->produto->getAll();
            foreach($produtos as $arr){
                $data['list_produtos'][$arr->id] = $arr->nome;
            }
            $tipos_movimentacao = $this->tipo_movimentacao->getAll();
            foreach($tipos_movimentacao as $arr){
                $data['list_tipos_movimentacao'][$arr->id] = $arr->nome;
            }
            $this->load->view('movimentacao/add',$data);
        }else{
            $this->adding();
            $this->session->set_flashdata('insert-ok','Cadastrado com sucesso!');
            redirect('/movimentacao');
        }
    }

    function adding() {
        $data['id_produto'] = $this->input->post('id_produto');
        $data['id_tipo_movimentacao'] = $this->input->post('id_tipo_movimentacao');
        $data['id_fornecedor'] = ($this->input->post('id_fornecedor')) ? $this->input->post('id_fornecedor') : null;
        $data['data'] =  $this->input->post('data_movimentacao');
        $data['quantidade'] =  $this->input->post('quantidade');
        $data['custo_total'] = $this->input->post('custo_total');
        $data['custo_unitario_compra'] =  $this->input->post('custo_unitario_compra');
        $data['nota_fiscal'] =  $this->input->post('nota_fiscal');
        $data['observacoes'] =  $this->input->post('observacoes');
        $this->movimentacao->adding($data);
    }

    function view($id) {
        //$this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $data['custo_total'] =  $this->input->post('email');
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $result = $this->cliente->getById($id);
        if($result == FALSE){
            redirect('/cliente', 'refresh');
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

        $this->load->view('cliente/view', $data);
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

            if($this->cliente->changing($id, $data)){
                $this->session->set_flashdata('update-ok','Alterado com sucesso!');
                redirect('/cliente/view/'.$id);
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

    public function getInfoCliente() {
        $id =  (int) $this->input->post('id_cliente');
        $result = $this->cliente->getInfoCliente($id);

        $array_clientes = array(
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

        echo json_encode($array_clientes);

    }

    function del($id){
        if($this->cliente->del($id)){
            $this->session->set_flashdata('delete-ok','Excluido com sucesso!');
            redirect('/cliente');
        }


    }
    
    

}