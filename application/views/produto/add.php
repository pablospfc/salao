

<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Produtos</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Cadastro de Produtos</h2>
            </div>
            <div class="box-content">
                <?php echo validation_errors();?>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('produto/add',$attributes); ?>
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Nome:</label>
                            <div class="controls">
                                <input class="form-control" required id="nome" type="text" name="nome" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="id_tipo_produto">Tipo de Produto:</label>
                            <div class="controls">
                                <select required="required" name="id_tipo_produto" id="id_tipo_produto" class="form-control">
                                    <option value="" selected></option>
                                    <?php

                                    foreach($list_tipos_produtos as $tipos_produto_id => $tipo_produto){
                                        echo '<option value="'.$tipos_produto_id.'">'.$tipo_produto.'</option>';
                                    }

                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Custo:</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <span class="add-on">R$</span><input class="form-control" required id="custo" type="text" name="custo" />
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Preço:</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <span class="add-on">R$</span><input class="form-control" required id="preco" type="text" name="preco" />
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Desconto Máximo:</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <input class="form-control" id="desconto_maximo" type="text" name="desconto_maximo" pattern="[0-9]+$">
                                    <span class="add-on">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Desconto Promocional:</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <input class="form-control" id="desconto_promocional" type="text" name="desconto_promocional" pattern="[0-9]+$">
                                    <span class="add-on">%</span>
                                </div>
                            </div>
                        </div>

                        </fieldset>

                    <div class="form-actions">
                        <?php echo form_button(array('class' => 'btn btn-primary', 'type' => 'submit', 'content' => 'Salvar')); ?>
                        <?php echo form_button(array('class' => 'btn dark-blue', 'type' => 'button', 'content' => 'Voltar', 'onclick' => 'window.open(\''.base_url().'produto\', \'_self\')')); ?>
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
    $(document).ready(function(){
        $("#custo").maskMoney({decimal:",", thousands:".", allowZero:true});
        $("#preco").maskMoney({decimal:",", thousands:".", allowZero:true});
    });
</script>

</body>
</html>