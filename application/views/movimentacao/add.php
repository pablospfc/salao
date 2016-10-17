<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Estoque</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Movimentação de Produtos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo validation_errors();?>

                            <form role="form" method="post" action="<?php echo base_url('movimentacao/add'); ?>">

                                <div class="form-group">
                                    <label>Produto:</label>
                                    <select name="id_produto" id="id_produto" class="form-control">
                                        <option value="" selected></option>
                                        <?php

                                        foreach($list_produtos as $produto_id => $produto_nome){
                                            echo '<option value="'.$produto_id.'">'.$produto_nome.'</option>';
                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="form-group id_tipo_movimentacao">
                                    <label>Tipo de Movimentação:</label>
                                    <select name="id_tipo_movimentacao" id="id_tipo_movimentacao" class="form-control" onchange="alteraDiv()">
                                        <option value="" selected></option>
                                        <?php

                                        foreach($list_tipos_movimentacao as $tipo_movimentacao_id => $tipo_movimentacao_nome){
                                            echo '<option value="'.$tipo_movimentacao_id.'">'.$tipo_movimentacao_nome.'</option>';
                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="form-group data_movimentacao">
                                    <label>Data:</label>
                                    <input class="form-control" id="data_movimentacao" type="date" name="data_movimentacao" >
                                    <span class="add-on"> <i
                                            data-time-icon="icon-time" data-date-icon="icon-calendar"> </i>
                                    </span>
                                </div>

                                <div class="form-group quantidade">
                                    <label>Quantidade:</label>
                                    <input class="form-control" id="quantidade" type="number" name="quantidade" min="1" step="1" data-variavel="field1">
                                </div>

                                <div class="form-group custo_unitario_compra">
                                    <label>Custo Unitário Médio:</label>
                                    <input class="form-control" class="money" id="custo_unitario_compra" type="text" name="custo_unitario_compra" data-variavel="field2" >
                                </div>

                                <div class="form-group custo_total">
                                    <label>Custo Total:</label>
                                    <input class="form-control" class="money" id="custo_total" type="text" name="custo_total" data-formula="#field1# * #field2#">
                                </div>

                                <div class="form-group fornecedor">
                                    <label>Fornecedor:</label>
                                    <select name="id_fornecedor" id="id_fornecedor" class="form-control">
                                        <option value="" selected></option>
                                        <?php

                                        foreach($list_fornecedores as $fornecedor_id => $fornecedor_nome){
                                            echo '<option value="'.$fornecedor_id.'">'.$fornecedor_nome.'</option>';
                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="form-group cliente">
                                    <label>Cliente:</label>
                                    <select name="id_cliente" id="id_cliente" class="form-control">
                                        <option value="" selected></option>
                                        <?php

                                        foreach($list_clientes as $cliente_id => $cliente_nome){
                                            echo '<option value="'.$cliente_id.'">'.$cliente_nome.'</option>';
                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="form-group nota_fiscal">
                                    <label>Nota Fiscal:</label>
                                    <input class="form-control" id="nota_fiscal" type="text" name="nota_fiscal" >
                                </div>

                                <div class="form-group">
                                    <label>Observações:</label>
                                    <textarea class="form-control" name="observacoes" id="observacoes" cols="20" rows="5" ></textarea>
                                </div>

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

<script type='text/javascript'>
    $(window).on('load', function(){
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