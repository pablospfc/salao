<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 19/07/16
 * Time: 13:53
 */
class LoginService extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('security');
        $this->load->model('Login_Model', 'login', TRUE);
    }

    function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
        $this->form_validation->set_rules('login', 'login', 'trim|required', array('required' => 'O campo %s é requerido.'));
        $this->form_validation->set_rules('senha', 'senha', 'required|trim|md5|callback_check_dados', array('required' => 'O campo %s é requerido.'));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            redirect(site_url('inicio'));
        }
    }

    function check_dados($senha)
    {
        $login = addslashes($this->input->post('login'));
        $result = $this->login->verifica($login, $senha);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'nome' => $row->nome,
                    'perfil' => $row->perfil,
                    'id_perfil' => $row->id_perfil,
                    'login' => $row->login,
                    'id_empresa' => $row->id_empresa,
                    'empresa' => $row->empresa,
                );
                if ($row->ativo == 0) {
                    $this->form_validation->set_message('check_dados', 'O seu usuário não está ativo. Entre em contato com o administrador do sistema.');
                    return false;
                }
                $this->session->set_userdata($sess_array);
            }

            return true;
        } else {
            $this->form_validation->set_message('check_dados', 'Dados informados inválidos. Tente novamente!');
            return false;
        }
    }

}