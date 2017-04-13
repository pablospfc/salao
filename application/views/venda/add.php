<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Vendas</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cadastro de Vendas
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo validation_errors();?>

                            <form role="form" method="post" action="<?php echo base_url('venda/add'); ?>">

                                <div class="form-group">
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

                                <div class="form-group">
                                    <label>Profissional:</label>
                                    <select name="id_profissional" id="id_profissional" class="form-control">
                                        <option value="" selected></option>
                                        <?php

                                        foreach($list_profissionais as $profissional_id => $profissional_nome){
                                            echo '<option value="'.$profissional_id.'">'.$profissional_nome.'</option>';
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="radio-inline"><input type="radio" name="optradio">Produto</label>
                                    <label class="radio-inline"><input type="radio" name="optradio">Serviço</label>
                                </div>
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

                                <div class="form-group">
                                    <label>Serviços:</label>
                                    <select name="id_profissional" id="id_profissional" class="form-control">
                                        <option value="" selected></option>
                                        <?php

                                        foreach($list_profissionais as $profissional_id => $profissional_nome){
                                            echo '<option value="'.$profissional_id.'">'.$profissional_nome.'</option>';
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Data de Nascimento:</label>
                                    <input class="form-control" id="data_nascimento" type="date" name="data_nascimento" required >
                                </div>

                                <div class="form-group">
                                    <label>Telefone:</label>
                                    <input class="form-control" id="telefone" type="text" name="telefone" >
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input class="form-control" id="email" type="text" name="email" >
                                </div>

                                <div class="form-group">
                                    <label>Celular:</label>
                                    <input class="form-control" id="celular" type="text" name="celular" >
                                </div>

                                <div class="form-group">
                                    <label>Endereço:</label>
                                    <input class="form-control" id="endereco" type="text" name="endereco" >
                                </div>

                                <div class="form-group">
                                    <label>CEP:</label>
                                    <input class="form-control" id="cep" type="text" name="cep" >
                                </div>

                                <div class="form-group">
                                    <label>Número:</label>
                                    <input class="form-control" id="numero" type="text" name="numero" >
                                </div>

                                <div class="form-group">
                                    <label>Complemento:</label>
                                    <input class="form-control" id="complemento" type="text" name="complemento" >
                                </div>

                                <div class="form-group">
                                    <label>Bairro:</label>
                                    <input class="form-control" id="bairro" type="text" name="bairro" >
                                </div>

                                <div class="form-group">
                                    <label>Estado:</label>
                                    <select name="id_estado" id="id_estado" class="form-control" onchange="busca_cidades($(this).val());">
                                        <option value="" selected></option>
                                        <?php

                                        foreach($list_estados as $estado_id => $estado_nome){
                                            echo '<option value="'.$estado_id.'">'.$estado_nome.'</option>';
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Cidade:</label>
                                    <select name="id_cidade" id="cidades" class="form-control">

                                    </select>
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