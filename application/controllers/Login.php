<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 12/07/16
 * Time: 15:11
 */
class Login extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Login_Model', 'login', TRUE);
    }

    public function index(){
        $this->load->helper(array('form'));
        if($this->session->userdata('id')){
            redirect(site_url('inicio'));
        }else
        $this->load->view('login');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}