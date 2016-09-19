<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 28/08/2016
 * Time: 22:01
 */
class Permissao extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Permissao_Model', 'permissao', TRUE);
    }

    function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
    }

    function add($id) {

        $this->load->view('layout/header');
        $this->load->view('layout/menu');

            $permissoes = $this->permissao->getAll($id);
            $data['idPerfil'] = $id;
            $data['list_permissoes'] = $permissoes ;
        //error_log(var_export($data, true), 3,'C:/xampp/htdocs/salao/log.log');
            
            $this->load->view('permissao/add',$data);

    }

    function adding() {

        $idPerfil = $this->input->post('id_perfil');

        $this->form_validation->set_error_delimiters('<div class="alert red fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>','</strong></div>');
        $this->form_validation->set_rules('id_perfil', 'id_perfil', 'required');

        if($this->form_validation->run()){

            $data['id_perfil'] = $idPerfil;
            $data['metodos'] = $this->input->post('metodos');
            
           // $checboxName = isset($_POST['metodos'])?true:false;
            error_log(var_export($data['metodos'], true), 3,'C:/xampp/htdocs/salao/log.log');

            ;

            if($this->permissao->adding($data)){
                $this->session->set_flashdata('insert-ok','Cadastrado com sucesso!');
                redirect('/permissao/add/'.$idPerfil);
            }
        }else{
            $this->add($idPerfil);
        }


    }

    function del($id){
        if($this->profissional->del($id)){
            $this->session->set_flashdata('delete-ok','Excluido com sucesso!');
            redirect('/profissional');
        }


    }

}