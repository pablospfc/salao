<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 12/07/16
 * Time: 09:45
 */
class Inicio extends CI_Controller
{
    public function __construct(){

        parent::__construct();
        $this->load->library('session');
        $this->load->library('auth');

    }

    Public function index()
    {
       //$this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());

        if($this->session->userdata('id')){
            $this->load->view('layout/header');
            $this->load->view('layout/menu');
            $this->load->view('inicio/index');
        } else {
            redirect('login', 'refresh');
        }

    }
}