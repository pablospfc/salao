<?php

class MY_Controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->user_logger(); 
    }

    
    protected function user_logger(){
    	
		if( ! $this->session->userdata('id') )
		{
			redirect('/login', 'refresh');			
		}
    }
}