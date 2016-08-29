<?php

class MY_Controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('auth');
        $this->user_logger();
        $this->verificaPermissao();
    }

    protected function user_logger(){
    	
		if( ! $this->session->userdata('id') )
		{
			redirect('/login', 'refresh');			
		}
    }

    protected function verificaPermissao() {
        if (!$this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method()))
       return show_error("Você não tem permissão para acessar este módulo. Entre em contato com o administrador do sistema.",403,"Acesso Restrito");

    }


}