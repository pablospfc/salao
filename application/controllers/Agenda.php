<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: claud
 * Date: 11/06/2016
 * Time: 19:33
 */
class Agenda extends MY_Controller
{
    public function __construct(){

        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('Agenda_Model', 'agenda', TRUE);
        $this->load->model('Profissional_Model', 'profissional', TRUE);
        $this->load->model('Cliente_Model', 'cliente', TRUE);
    }

    Public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('agenda/index');
    }

    Public function getEvents()
    {
        $get['start'] = $this->input->get('start');
        $get['end'] = $this->input->get('end');
        $result=$this->agenda->getEvents($get);
        echo json_encode($result);
    }
    /*Add new event */
    Public function addEvent()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $data['id_profissional'] = $this->input->post('id_profissional');
        $data['id_cliente'] = $this->input->post('id_cliente');
        $data['color'] =  $this->input->post('color');
        $data['description'] =  $this->input->post('description');
        $data['date'] =  $this->input->post('date');

        //error_log(var_export($_POST, true), 3,'C:/xampp/htdocs/salao/log.log');
        $result=$this->agenda->addEvent($data);
        echo $result;
    }

    public function getClientes() {
        echo json_encode($this->cliente->getAll());
    }

    public function getProfissionais() {
        echo json_encode($this->profissional->getAll());
    }

    /*Update Event */
    Public function updateEvent()
    {
        $id =  $this->input->post('id');
        $data['id_profissional'] = $this->input->post('id_profissional');
        $data['id_cliente'] = $this->input->post('id_cliente');
        $data['color'] =  $this->input->post('color');
        $data['description'] =  $this->input->post('description');
        $data['date'] =  $this->input->post('date');
        $result=$this->agenda->updateEvent($data,$id);
        echo $result;
    }
    /*Delete Event*/
    Public function deleteEvent()
    {
        $id = (int) $this->input->get('id');
        $result=$this->agenda->deleteEvent($id);
        echo $result;
    }
    Public function dragUpdateEvent()
    {
        $id = $this->input->post('id');
        $date = date('Y-m-d h:i:s',strtotime($this->input->post('date')));
        $result=$this->agenda->dragUpdateEvent($id,$date);
        echo $result;
    }

}