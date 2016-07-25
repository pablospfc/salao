<?php

/**
 * Created by PhpStorm.
 * User: claud
 * Date: 11/06/2016
 * Time: 19:34
 */
class Agenda_Model extends CI_Model
{
    private $table = "tb_agenda";

    function __construct(){
        parent::__construct();
    }

    Public function getEvents($get)
    {

        $sql = "SELECT 
                      tb_agenda.id as id,
                      tb_cliente.nome as title,
                      tb_profissional.nome as profissional,
                      tb_agenda.id_profissional as id_profissional,
                      tb_agenda.id_cliente as id_cliente,
                      tb_agenda.color as color,
                      tb_agenda.date as date,
                      tb_agenda.description as description
                FROM tb_agenda 
                INNER JOIN tb_cliente on tb_cliente.id = tb_agenda.id_cliente
                INNER JOIN tb_profissional on tb_profissional.id = tb_agenda.id_profissional
                WHERE date BETWEEN ? AND ? 
                ORDER BY date ASC";
        return $this->db->query($sql, array($get['start'], $get['end']))->result();

    }

    /*Create new events */

    Public function addEvent($data)
    {
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    /*Update  event */

    Public function updateEvent($data,$id)
    {
        $this->db->where('md5(id)', md5($id));

        $this->db->update($this->table, $data);

        return (bool) $this->db->affected_rows();
    }


    /*Delete event */

    Public function deleteEvent($id)
    {
        $this->db->where('md5(id)', md5($id));
        $this->db->delete($this->table);
        return (bool) $this->db->affected_rows();
    }

    /*Update  event */

    Public function dragUpdateEvent($id,$date)
    {
        $sql = "UPDATE tb_agenda SET date = ? WHERE id = ?";
        $this->db->query($sql, array($date, $id));
        return ($this->db->affected_rows()!=1)?false:true;


    }

}