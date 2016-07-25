

<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Cartões</a></li>
    </ul>

    <?php echo validation_errors();
    if( $this->session->flashdata('update-ok')!="" ){
        echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('update-ok').'</strong></div>';
    }
    ?>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Atualização de Cartões</h2>
            </div>
            <div class="box-content">
                <?php echo validation_errors();?>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('cartao/changing',$attributes); ?>
                <input type="hidden" name="id" id="id" value="<?php echo $id?>" />
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="bandeira">Bandeira:</label>
                        <div class="controls">
                            <input class="form-control" required id="bandeira" type="text" name="bandeira" value="<?=( isset($bandeira) ) ? $bandeira : "";?>" >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="id_tipo_operacao">Tipo de Operação:</label>
                        <div class="controls">
                            <select required="required" name="id_tipo_operacao" id="id_tipo_operacao" class="form-control" onchange="alteraDiv()">
                                <option value="" selected></option>
                                <?php

                                foreach($list_tipos_operacoes as $tipos_operacao_id => $tipo_operacao){
                                    $selected = ($id_tipo_operacao == $tipos_operacao_id) ? 'selected':'';
                                    echo '<option value="'.$tipos_operacao_id.'" '.$selected.'>'.$tipo_operacao.'</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="control-group debito" style="display:none;">
                        <label class="control-label" for="taxa_cartao_debito">Taxa de Cartão de Débito:</label>
                        <div class="controls">
                            <div class="input-prepend input-append">
                                <input class="form-control" id="taxa_cartao_debito" type="text" name="taxa_cartao_debito" value="<?=( isset($taxa_cartao_debito) ) ? $taxa_cartao_debito : "";?>" pattern="[0-9]+$">
                                <span class="add-on">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group credito" style="display:none;">
                        <label class="control-label" for="taxa_cartao_credito_vista">Taxa de Cartão de Cŕedito à Vista:</label>
                        <div class="controls">
                            <div class="input-prepend input-append">
                                <input class="form-control" id="taxa_cartao_credito_vista" type="text" name="taxa_cartao_credito_vista" value="<?=( isset($taxa_cartao_credito_vista) ) ? $taxa_cartao_credito_vista : "";?>"  pattern="[0-9]+$">
                                <span class="add-on">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group credito" style="display:none;">
                        <label class="control-label" for="taxa_cartao_credito_prazo">Taxa de Cartão de Cŕedito à Prazo:</label>
                        <div class="controls">
                            <div class="input-prepend input-append">
                                <input class="form-control" id="taxa_cartao_credito_prazo" type="text" name="taxa_cartao_credito_prazo" value="<?=( isset($taxa_cartao_credito_prazo) ) ? $taxa_cartao_credito_prazo : "";?>" pattern="[0-9]+$">
                                <span class="add-on">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Nº Máximo de Parcelas:</label>
                        <div class="controls">
                            <input class="form-control" required id="numero_maximo_parcelas" type="number" min="1" max="50" name="numero_maximo_parcelas" value="<?=( isset($numero_maximo_parcelas) ) ? $numero_maximo_parcelas : "";?>">
                        </div>
                    </div>

                </fieldset>

                <div class="form-actions">
                    <?php echo form_button(array('class' => 'btn btn-primary', 'type' => 'submit', 'content' => 'Alterar')); ?>
                    <?php echo form_button(array('class' => 'btn dark-blue', 'type' => 'button', 'content' => 'Voltar', 'onclick' => 'window.open(\''.base_url().'cartao\', \'_self\')')); ?>
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

    $(document).ready(function(){
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

    });


</script>

</body>
</html>