<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';

    function busca_cidades(id_estado){
        $.post(base_url+'profissional/getCidadesByUF', {
            id_estado : id_estado
        }, function(data){

            $('#cidades').html(data);
        });
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Profissionais</h3>
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
                    Atualização de Profissional
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo validation_errors();?>

                            <form role="form" method="post" action="<?php echo base_url('profissional/changing'); ?>">

                                <input type="hidden" name="id" id="id" value="<?php echo $id?>" />

                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input class="form-control" id="nome" type="text" name="nome" required value="<?=( isset($nome) ) ? $nome : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Data de Nascimento:</label>
                                    <input class="form-control" id="data_nascimento" type="date" name="data_nascimento" required value="<?=( isset($data_nascimento) ) ? $data_nascimento : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Telefone:</label>
                                    <input class="form-control" id="telefone" type="text" name="telefone" value="<?=( isset($telefone) ) ? $telefone : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input class="form-control" id="email" type="text" name="email" value="<?=( isset($email) ) ? $email : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Celular:</label>
                                    <input class="form-control" id="celular" type="text" name="celular" value="<?=( isset($celular) ) ? $celular : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Endereço:</label>
                                    <input class="form-control" id="endereco" type="text" name="endereco" value="<?=( isset($endereco) ) ? $endereco : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>CEP:</label>
                                    <input class="form-control" id="cep" type="text" name="cep" value="<?=( isset($cep) ) ? $cep : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Número:</label>
                                    <input class="form-control" id="numero" type="text" name="numero" value="<?=( isset($numero) ) ? $numero : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Complemento:</label>
                                    <input class="form-control" id="complemento" type="text" name="complemento" value="<?=( isset($complemento) ) ? $complemento : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Bairro:</label>
                                    <input class="form-control" id="bairro" type="text" name="bairro" value="<?=( isset($bairro) ) ? $bairro : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Estado:</label>
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

                                <div class="form-group">
                                    <label>Cidade:</label>
                                    <select name="id_cidade" id="cidades" class="form-control">

                                        <?php

                                        foreach($list_cidades as $cidade_id => $cidade_nome){
                                            $selected = ($id_cidade == $cidade_id) ? 'selected':'';
                                            echo '<option value="'.$cidade_id.'" '.$selected.'>'.$cidade_nome.'</option>';
                                        }

                                        ?>

                                    </select>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            Salvar
                                        </button>
                                        <button type="reset" class="btn btn-default" onclick="window.open('<?php echo base_url('cliente');?>','_self');">
                                            Voltar
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

</body>
</html>