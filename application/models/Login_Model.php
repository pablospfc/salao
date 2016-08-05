<?php

/**
 * Created by PhpStorm.
 * User: baldez
 * Date: 12/07/16
 * Time: 15:13
 */
class Login_Model extends CI_Model
{
    private $table = "tb_usuario";

    function __construct(){
        parent::__construct();
    }

    public function verifica($login, $senha){

        $result = $this->db->query("SELECT 
                                           tb_usuario.id,
                                           tb_usuario.nome as nome,
                                           tb_usuario.login as login,
                                           tb_usuario.id_perfil as id_perfil,
                                           tb_perfil.nome as perfil,
                                           tb_empresa.nome_fantasia as empresa,
                                           tb_usuario.id_empresa as id_empresa,
                                           tb_usuario.ativo as ativo
                                     FROM {$this->table}
                                     INNER JOIN tb_perfil ON tb_perfil.id = tb_usuario.id_perfil
                                     INNER JOIN tb_empresa ON tb_empresa.id  = tb_usuario.id_empresa
                                     WHERE tb_usuario.login = '{$login}' AND tb_usuario.senha = '{$senha}'
                                     ");
        return $result->result();

    }

}