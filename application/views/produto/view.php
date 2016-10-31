<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Produtos</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <?php echo validation_errors();
    if( $this->session->flashdata('update-ok')!="" ){
        echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('update-ok').'</strong></div>';
    }
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Atualização de Produtos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo validation_errors();?>

                            <form role="form" method="post" action="<?php echo base_url('produto/changing'); ?>">
                                <input type="hidden" name="id" id="id" value="<?php echo $id?>" />

                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input class="form-control" id="nome" type="text" name="nome" required value="<?=( isset($nome) ) ? $nome : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Tipo de Produto:</label>
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

                                <div class="form-group">
                                    <label>Custo:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">R$</div>
                                        <input class="form-control" id="preco" type="text" name="preco" required value="<?=( isset($preco) ) ? $preco : "";?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Desconto Máximo:</label>
                                    <div class="input-group">
                                        <input class="form-control" id="desconto_maximo" type="text" name="desconto_maximo" required value="<?=( isset($desconto_maximo) ) ? $desconto_maximo : "";?>" pattern="[0-9]+$">
                                        <div class="input-group-addon">%</div>
                                    </div>
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
