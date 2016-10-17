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
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Empresa</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php echo validation_errors();
    if( $this->session->flashdata('update-ok')!="" ){
        echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('update-ok').'</strong></div>';
    }
    ?>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Atualização de Empresa
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo validation_errors();?>

                            <form role="form" method="post" action="<?php echo site_url('empresa/changing'); ?>">
                                <input type="hidden" name="id" id="id" value="<?php echo $id?>" />

                                <div class="form-group">
                                    <label>Nome Fantasia:</label>
                                    <input class="form-control" id="nome_fantasia" type="text" name="nome_fantasia" value="<?=( isset($nome_fantasia) ) ? $nome_fantasia : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Razão Social:</label>
                                    <input class="form-control" id="razao_social" type="text" name="razao_social" value="<?=( isset($razao_social) ) ? $razao_social : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>CNPJ</label>
                                    <input class="form-control" id="cnpj" type="text" name="cnpj" value="<?=( isset($cnpj) ) ? $cnpj : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input class="form-control" id="telefone" type="text" name="telefone" value="<?=( isset($telefone) ) ? $telefone : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" id="email" type="text" name="email" value="<?=( isset($email) ) ? $email : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Logradouro</label>
                                    <input class="form-control" id="logradouro" type="text" name="logradouro" value="<?=( isset($logradouro) ) ? $logradouro : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>CEP</label>
                                    <input class="form-control" id="cep" type="text" name="cep" value="<?=( isset($cep) ) ? $cep : "";?>">
                                </div>

                                <div class="form-group">
                                    <label>Bairro</label>
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

                                <div class="form-group">
                                    <label>Site</label>
                                    <input class="form-control" id="site" type="text" name="site" value="<?=( isset($site) ) ? $site : "";?>">
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            Salvar
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
<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';

    function busca_cidades(id_estado){
        $.post(base_url+"empresa/getCidadesByUF", {
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