<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Usuários</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php
    if( $this->session->flashdata('update-ok')!="" ){
        echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('update-ok').'</strong></div>';
    }
    ?>
    
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Atualização de Usuários
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo validation_errors();?>

                            <form role="form" method="post" action="<?php echo base_url('usuario/changing'); ?>">

                                <input type="hidden" name="id" id="id" value="<?php echo $id?>" />

                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input class="form-control" id="nome" type="text" name="nome" value="<?=( isset($nome) ) ? $nome : "";?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Perfil:</label>
                                    <select name="id_perfil" id="id_perfil" class="form-control">
                                        <option value="" selected></option>
                                        <?php

                                        foreach($list_perfis as $perfil_id => $perfil_nome){
                                            $selected = ($id_perfil == $perfil_id) ? 'selected':'';
                                            echo '<option value="'.$perfil_id.'"'.$selected.'>'.$perfil_nome.'</option>';
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input class="form-control" id="email" type="email" name="email" value="<?=( isset($email) ) ? $email : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Login:</label>
                                    <input class="form-control" id="login" type="text" name="login" value="<?=( isset($login) ) ? $login : "";?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Senha:</label>
                                    <input class="form-control" id="senha" type="password" name="senha">
                                </div>

                                <div class="form-group">
                                    <label>Confirma Senha:</label>
                                    <input class="form-control" id="confirma_senha" type="password" name="confirma_senha">
                                </div>

                                <?php if ($this->session->userdata('id_perfil')==1) { ?>
                                    <div class="form-group">
                                        <label>Ativo</label>
                                            <input type="checkbox" name="ativo" id="ativo" value="1" <?php if($ativo == 1){ echo 'checked';}?>>
                                    </div>
                                <?php }?>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            Salvar
                                        </button>
                                        <button type="reset" class="btn btn-default">
                                            Limpar
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<script>
    var password = document.getElementById("senha")
        , confirm_password = document.getElementById("confirma_senha");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("A senha e confirmação de senha devem ser iguais");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>