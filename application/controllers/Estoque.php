<?php

/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 12/07/16
 * Time: 10:01
 */
class Estoque extends MY_Controller
{
    public function __construct(){

        parent::__construct();
    }

    Public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('estoque/list');
    }

}