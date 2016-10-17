<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Cartões</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cadastro de Cartão
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo validation_errors();?>

                            <form role="form" method="post" action="<?php 'cartao/add' ?>">

                                <div class="form-group">
                                    <label>Bandeira</label>
                                    <input class="form-control" required id="bandeira" type="text" name="bandeira" >
                                </div>

                                <div class="form-group">
                                    <label>Tipo de Operação:</label>
                                    <select required="required" name="id_tipo_operacao" id="id_tipo_operacao" class="form-control" onchange="alteraDiv()">
                                        <option value="" selected></option>
                                        <?php
                                        foreach($list_tipos_operacoes as $tipos_operacao_id => $tipo_operacao){
                                            echo '<option value="'.$tipos_operacao_id.'">'.$tipo_operacao.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group debito" style="display:none;" >
                                    <label>Taxa de Cartão de Débito:</label>
                                    <div class="input-group">
                                    <input class="form-control" id="taxa_cartao_debito" type="text" name="taxa_cartao_debito" pattern="[0-9]+$">
                                    <div class="input-group-addon">%</div>
                                        </div>
                                </div>

                                <div class="form-group credito" style="display:none;" >
                                    <label>Taxa de Cartão de Crédito à Vista:</label>
                                    <div class="input-group">
                                    <input class="form-control" id="taxa_cartao_credito_vista" type="text" name="taxa_cartao_credito_vista" pattern="[0-9]+$">
                                    <div class="input-group-addon">%</div>
                                    </div>
                                </div>

                                <div class="form-group credito" style="display:none;" >
                                    <label>Taxa de Cartão de Cŕedito à Prazo:</label>
                                    <div class="input-group">
                                    <input class="form-control" id="taxa_cartao_credito_prazo" type="text" name="taxa_cartao_credito_prazo" pattern="[0-9]+$">
                                    <div class="input-group-addon">%</div>
                                     </div>
                                </div>

                                <div class="form-group">
                                    <label>Nº Máximo de Parcelas:</label>
                                    <input class="form-control" required id="numero_maximo_parcelas" type="number" min="1" max="50" name="numero_maximo_parcelas">
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

    $(window).on('load', function() {
        alteraDiv = function (){
            if($('#id_tipo_operacao').val() == 1){
                $(".credito").show();
                $(".debito").show();
            }

            if($('#id_tipo_operacao').val() == 2){
                $(".credito").show();
                $(".debito").hide();
            }

            if($('#id_tipo_operacao').val() == 3){
                $(".credito").hide();
                $(".debito").show();
            }

        }

    });

</script>
</body>
</html>