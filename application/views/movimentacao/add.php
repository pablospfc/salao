
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Movimentação de Produtos</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Movimentação de Produtos</h2>
            </div>
            <div class="box-content">
                <?php echo validation_errors();?>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('movimentacao/add',$attributes); ?>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="id_produto">Produto:</label>
                        <div class="controls">
                            <select name="id_produto" id="id_produto" class="form-control">
                                <option value="" selected></option>
                                <?php

                                foreach($list_produtos as $produto_id => $produto_nome){
                                    echo '<option value="'.$produto_id.'">'.$produto_nome.'</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="control-group id_tipo_movimentacao">
                        <label class="control-label" for="id_estado">Tipo de Movimentação:</label>
                        <div class="controls">
                            <select name="id_tipo_movimentacao" id="id_tipo_movimentacao" class="form-control" onchange="alteraDiv()">
                                <option value="" selected></option>
                                <?php

                                foreach($list_tipos_movimentacao as $tipo_movimentacao_id => $tipo_movimentacao_nome){
                                    echo '<option value="'.$tipo_movimentacao_id.'">'.$tipo_movimentacao_nome.'</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="control-group data_movimentacao">
                        <label class="control-label" for="focusedInput">Data de Movimentação:</label>
                        <div class="controls">
                            <input class="form-control" id="data_movimentacao" type="date" name="data_movimentacao" >
                            <span class="add-on"> <i
                                    data-time-icon="icon-time" data-date-icon="icon-calendar"> </i>
							</span>
                        </div>
                    </div>
                    <div class="control-group quantidade">
                        <label class="control-label" for="focusedInput">Quantidade:</label>
                        <div class="controls">
                            <input class="form-control" id="quantidade" type="number" name="quantidade" min="1" step="1" data-variavel="field1">
                        </div>
                    </div>
                    <div class="control-group custo_unitario_compra">
                        <label class="control-label" for="focusedInput">Custo Unitário Médio:</label>
                        <div class="controls">
                            <input class="form-control" class="money" id="custo_unitario_compra" type="text" name="custo_unitario_compra" data-variavel="field2" >
                        </div>
                    </div>
                    <div class="control-group custo_total">
                        <label class="control-label" for="focusedInput">Custo Total:</label>
                        <div class="controls">
                            <input class="form-control" class="money" id="custo_total" type="text" name="custo_total" data-formula="#field1# * #field2#">
                        </div>
                    </div>
                    <div class="control-group fornecedor">
                        <label class="control-label" for="id_estado">Fornecedor:</label>
                        <div class="controls">
                            <select name="id_fornecedor" id="id_fornecedor" class="form-control">
                                <option value="" selected></option>
                                <?php

                                foreach($list_fornecedores as $fornecedor_id => $fornecedor_nome){
                                    echo '<option value="'.$fornecedor_id.'">'.$fornecedor_nome.'</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="control-group cliente">
                        <label class="control-label" for="id_cliente">Cliente:</label>
                        <div class="controls">
                            <select name="id_cliente" id="id_cliente" class="form-control">
                                <option value="" selected></option>
                                <?php

                                foreach($list_clientes as $cliente_id => $cliente_nome){
                                    echo '<option value="'.$cliente_id.'">'.$cliente_nome.'</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="control-group nota_fiscal">
                        <label class="control-label" for="focusedInput">Nota Fiscal:</label>
                        <div class="controls">
                            <input class="form-control" id="nota_fiscal" type="text" name="nota_fiscal" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Observações:</label>
                        <div class="controls">
                            <textarea name="observacoes" id="observacoes" cols="5" rows="5" ></textarea>
                        </div>
                    </div>

                </fieldset>

                <div class="form-actions">
                    <?php echo form_button(array('class' => 'btn btn-primary', 'type' => 'submit', 'content' => 'Salvar')); ?>
                    <?php echo form_button(array('class' => 'btn dark-blue', 'type' => 'button', 'content' => 'Voltar', 'onclick' => 'window.open(\''.base_url().'movimentacao\', \'_self\')')); ?>
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

<script type='text/javascript'>
    $(window).load(function(){
        alteraDiv = function (){
            if($('#id_tipo_movimentacao').val() == 1){
                $(".fornecedor").show();
                $(".nota_fiscal").show();
                $(".custo_unitario_compra").show();
                $(".custo_total").show();
                $(".cliente").hide();
            }

            if($('#id_tipo_movimentacao').val() == 2){
                $(".fornecedor").show();
                $(".nota_fiscal").show();
                $(".cliente").hide();
            }

            if($('#id_tipo_movimentacao').val() == 4){
                $(".fornecedor").show();
                $(".nota_fiscal").show();
                $(".cliente").hide();
                $(".custo_unitario_compra").show();
                $(".custo_total").show();
            }

            if($('#id_tipo_movimentacao').val() == 5 ){
                $(".custo_unitario_compra").hide();
                $(".nota_fiscal").hide();
                $(".fornecedor").hide();
                $(".custo_total").hide();
                $(".cliente").hide();
            }

            if($('#id_tipo_movimentacao').val() == 6){
                $(".custo_unitario_compra").hide();
                $(".nota_fiscal").hide();
                $(".fornecedor").hide();
                $(".custo_total").hide();
                $(".cliente").hide();
            }

            if($('#id_tipo_movimentacao').val() == 3){
                $(".fornecedor").hide();
                $(".nota_fiscal").hide();
                $(".custo_total").show();
                $(".custo_unitario_compra").show();
                $(".cliente").show();
            }
        }
    });
</script>

</body>
</html>