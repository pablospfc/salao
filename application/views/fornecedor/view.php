<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';

    function busca_cidades(id_estado){
        $.post(base_url+'fornecedor/getCidadesByUF', {
            id_estado : id_estado
        }, function(data){

            $('#cidades').html(data);
        });
    }
</script>
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Fornecedores</a></li>
    </ul>
    <?php echo validation_errors();
    if( $this->session->flashdata('update-ok')!="" ){
        echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('update-ok').'</strong></div>';
    }
    ?>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Atualização de Fornecedor</h2>
            </div>
            <div class="box-content">
                <?php echo validation_errors();?>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('fornecedor/changing',$attributes); ?>
                <input type="hidden" name="id" id="id" value="<?php echo $id?>" />
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Nome:</label>
                        <div class="controls">
                            <input class="form-control" id="nome" type="text" name="nome" value="<?=( isset($nome) ) ? $nome : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">CNPJ:</label>
                        <div class="controls">
                            <input class="form-control" id="cnpj" type="text" name="cnpj" value="<?=( isset($cnpj) ) ? $cnpj : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Telefone:</label>
                        <div class="controls">
                            <input class="form-control" id="telefone" type="text" name="telefone" value="<?=( isset($telefone) ) ? $telefone : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Email:</label>
                        <div class="controls">
                            <input class="form-control" id="email" type="text" name="email" value="<?=( isset($email) ) ? $email : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Celular:</label>
                        <div class="controls">
                            <input class="form-control" id="celular" type="text" name="celular" value="<?=( isset($celular) ) ? $celular : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Endereço:</label>
                        <div class="controls">
                            <input class="form-control" id="endereco" type="text" name="endereco" value="<?=( isset($endereco) ) ? $endereco : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">CEP:</label>
                        <div class="controls">
                            <input class="form-control" id="cep" type="text" name="cep" value="<?=( isset($cep) ) ? $cep : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Número:</label>
                        <div class="controls">
                            <input class="form-control" id="numero" type="text" name="numero" value="<?=( isset($numero) ) ? $numero : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Complemento:</label>
                        <div class="controls">
                            <input class="form-control" id="complemento" type="text" name="complemento" value="<?=( isset($complemento) ) ? $complemento : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Bairro:</label>
                        <div class="controls">
                            <input class="form-control" id="bairro" type="text" name="bairro" value="<?=( isset($bairro) ) ? $bairro : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="id_estado">Estado:</label>
                        <div class="controls">
                            <select name="id_estado" id="id_estado" class="form-control" onchange="busca_cidades($(this).val());">
                                <option value="" selected></option>
                                <?php

                                foreach($list_estados as $estado_id => $estado_nome){
                                    $selected = ($id_estado == $estado_id) ? 'selected':'';
                                    echo '<option value="'.$estado_id.'" '.$selected.'>'.$estado_nome.'</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="cidades">Cidade:</label>
                        <div class="controls">
                            <select name="id_cidade" id="cidades" class="form-control">
                                <?php

                                foreach($list_cidades as $cidade_id => $cidade_nome){
                                    $selected = ($id_cidade == $cidade_id) ? 'selected':'';
                                    echo '<option value="'.$cidade_id.'" '.$selected.'>'.$cidade_nome.'</option>';
                                }

                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Site:</label>
                        <div class="controls">
                            <input class="form-control" id="site" type="text" name="site" value="<?=( isset($site) ) ? $site : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Inscrição Estadual:</label>
                        <div class="controls">
                            <input class="form-control" id="inscricao_estadual" type="text" name="inscricao_estadual" value="<?=( isset($inscricao_estadual) ) ? $inscricao_estadual : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Inscrição Municipal:</label>
                        <div class="controls">
                            <input class="form-control" id="inscricao_municipal" type="text" name="inscricao_municipal" value="<?=( isset($inscricao_municipal) ) ? $inscricao_municipal : "";?>">
                        </div>
                    </div>

                </fieldset>

                <div class="form-actions">
                    <?php echo form_button(array('class' => 'btn btn-primary', 'type' => 'submit', 'content' => 'Alterar')); ?>
                    <?php echo form_button(array('class' => 'btn dark-blue', 'type' => 'button', 'content' => 'Voltar', 'onclick' => 'window.open(\''.base_url().'fornecedor\', \'_self\')')); ?>
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
<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';

    function busca_cidades(id_estado){
        alert('bicha');
        $.post(base_url+"fornecedor/getCidadesByUF", {
            id_estado : id_estado
        }, function(data){
            $('#cidades').html(data);
        });
        function(error){
            console.log(error);
        });
    }

    $( "#id_estado" ).change(function() {
        busca_cidades($(this).val());
    });
</script>
</body>
</html>