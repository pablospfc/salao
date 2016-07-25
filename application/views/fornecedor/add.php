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

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Cadastro de Fornecedores</h2>
            </div>
            <div class="box-content">
                <?php echo validation_errors();?>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('fornecedor/add',$attributes); ?>
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Nome:</label>
                            <div class="controls">
                                <input class="form-control" id="nome" type="text" name="nome" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">CNPJ:</label>
                            <div class="controls">
                                <input class="form-control" id="cnpj" type="text" name="cnpj" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Telefone:</label>
                            <div class="controls">
                                <input class="form-control" id="telefone" type="text" name="telefone" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Email:</label>
                            <div class="controls">
                                <input class="form-control" id="email" type="text" name="email" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Celular:</label>
                            <div class="controls">
                                <input class="form-control" id="celular" type="text" name="celular" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Endereço:</label>
                            <div class="controls">
                                <input class="form-control" id="endereco" type="text" name="endereco" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">CEP:</label>
                            <div class="controls">
                                <input class="form-control" id="cep" type="text" name="cep" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Número:</label>
                            <div class="controls">
                                <input class="form-control" id="numero" type="text" name="numero" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Complemento:</label>
                            <div class="controls">
                                <input class="form-control" id="complemento" type="text" name="complemento" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Bairro:</label>
                            <div class="controls">
                                <input class="form-control" id="bairro" type="text" name="bairro" >
                            </div>
                        </div>

                       <div class="control-group">
                            <label class="control-label" for="id_estado">Estado:</label>
                        <div class="controls">
                                <select name="id_estado" id="id_estado" class="form-control" onchange="busca_cidades($(this).val());">
                                    <option value="" selected></option>
                                    <?php

                                    foreach($list_estados as $estado_id => $estado_nome){
                                        echo '<option value="'.$estado_id.'">'.$estado_nome.'</option>';
                                    }

                                    ?>

                                </select>
                            </div>
                                </div>

                        <div class="control-group">
                            <label class="control-label" for="cidades">Cidade:</label>
                            <div class="controls">
                                <select name="id_cidade" id="cidades" class="form-control" >

                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Site:</label>
                            <div class="controls">
                                <input class="form-control" id="site" type="text" name="site" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Inscrição Estadual:</label>
                            <div class="controls">
                                <input class="form-control" id="inscricao_estadual" type="text" name="inscricao_estadual" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Inscrição Municipal:</label>
                            <div class="controls">
                                <input class="form-control" id="inscricao_municipal" type="text" name="inscricao_municipal" >
                            </div>
                        </div>

                        </fieldset>

                    <div class="form-actions">
                        <?php echo form_button(array('class' => 'btn btn-primary', 'type' => 'submit', 'content' => 'Salvar')); ?>
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

</body>
</html>