
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Produtos</a></li>
    </ul>
    <?php echo validation_errors();
    if( $this->session->flashdata('update-ok')!="" ){
        echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('update-ok').'</strong></div>';
    }
    ?>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Atualização de Profissional</h2>
            </div>
            <div class="box-content">
                <?php echo validation_errors();?>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('produto/changing',$attributes); ?>
                <input type="hidden" name="id" id="id" value="<?php echo $id?>" />
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Nome:</label>
                        <div class="controls">
                            <input class="form-control" id="nome" type="text" name="nome" value="<?=( isset($nome) ) ? $nome : "";?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="id_tipo_produto">Tipo de Produto:</label>
                        <div class="controls">
                            <select name="id_tipo_produto" id="id_tipo_produto" class="form-control">
                                <option value="" selected></option>
                                <?php

                                foreach($list_tipos_produtos as $tipo_produto_id => $tipo_produto_nome){
                                    $selected = ($id_tipo_produto == $tipo_produto_id) ? 'selected':'';
                                    echo '<option value="'.$tipo_produto_id.'" '.$selected.'>'.$tipo_produto_nome.'</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Custo:</label>
                        <div class="controls">
                            <div class="input-prepend input-append">
                                <span class="add-on">R$</span><input class="form-control" id="custo" type="text" name="custo" value="<?=( isset($custo) ) ? $custo : "";?>" >
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Preço:</label>
                        <div class="controls">
                            <div class="input-prepend input-append">
                            <span class="add-on">R$</span><input class="form-control" id="preco" type="text" name="preco" value="<?=( isset($preco) ) ? $preco : "";?>">
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Desconto Máximo:</label>
                        <div class="controls">
                            <div class="input-prepend input-append">
                            <input class="form-control" id="desconto_maximo" type="text" name="desconto_maximo" value="<?=( isset($desconto_maximo) ) ? $desconto_maximo : "";?>" pattern="[0-9]+$">
                            <span class="add-on">%</span>
                                </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Desconto Promocional:</label>
                        <div class="controls">
                            <div class="input-prepend input-append">
                            <input class="form-control" id="desconto_promocional" type="text" name="desconto_promocional" value="<?=( isset($desconto_promocional) ) ? $desconto_promocional : "";?>" pattern="[0-9]+$">
                                <span class="add-on">%</span>
                            </div>
                        </div>
                    </div>

                </fieldset>

                <div class="form-actions">
                    <?php echo form_button(array('class' => 'btn btn-primary', 'type' => 'submit', 'content' => 'Alterar')); ?>
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
   // $("").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    //$("#preco").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    });
</script>

</body>
</html>