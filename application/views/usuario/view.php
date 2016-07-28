<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Usuários</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Atualização de Usuários</h2>
            </div>
            <div class="box-content">
                <?php echo validation_errors();?>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('usuario/add',$attributes); ?>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Nome:</label>
                        <div class="controls">
                            <input class="form-control" id="nome" type="text" name="nome" value="<?=( isset($nome) ) ? $nome : "";?>" required >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="id_perfil">Perfil:</label>
                        <div class="controls">
                            <select name="id_perfil" id="id_perfil" class="form-control" required>
                                <option value="" selected></option>
                                <?php

                                foreach($list_perfis as $perfil_id => $perfil_nome){
                                    $selected = ($id_tipo_servico == $tipo_servico_id) ? 'selected':'';
                                    echo '<option value="'.$perfil_id.'"'.$selected.'>'.$perfil_nome.'</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Email:</label>
                        <div class="controls">
                            <input class="form-control" id="email" type="text" name="email" value="<?=( isset($email) ) ? $email : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Login:</label>
                        <div class="controls">
                            <input class="form-control" id="login" type="text" name="login" required value="<?=( isset($login) ) ? $login : "";?>" readonly>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Senha:</label>
                        <div class="controls">
                            <input class="form-control" id="senha" type="password" name="senha" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Confirma Senha:</label>
                        <div class="controls">
                            <input class="form-control" id="confirma_senha" type="password" name="confirma_senha" required >
                        </div>
                    </div>
                    <?php if ($this->session->userdata('id_perfil')==1) ?>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput"></label>
                        <label class="checkbox">
                            <input type="checkbox" name="ativo" id="ativo" <?php if($ativo == 1){ echo 'checked';}?>>
                            Ativo
                        </label>
                    </div>

                </fieldset>

                <div class="form-actions">
                    <?php echo form_button(array('class' => 'btn btn-primary', 'type' => 'submit', 'content' => 'Alterar')); ?>
                    <?php echo form_button(array('class' => 'btn dark-blue', 'type' => 'button', 'content' => 'Voltar', 'onclick' => 'window.open(\''.base_url().'usuario\', \'_self\')')); ?>
                    <?php echo form_close(); ?>
                </div>

            </div>

        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->


</div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="clearfix"></div>

<footer>

    <p>
        <span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>

    </p>

</footer>
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