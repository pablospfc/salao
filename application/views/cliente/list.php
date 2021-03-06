<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Clientes</h3>
        </div>

        <div class="col-lg-5">
            <a href="<?php echo site_url('cliente/add'); ?>" class="btn btn-primary btn-sm">
                Novo
            </a>
            <br><br>
        </div>
    </div>

    <?php

    if( $this->session->flashdata('insert-ok')!="" ){
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('insert-ok').'</strong></div>';
    }

    if( $this->session->flashdata('delete-ok')!="" ){
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('delete-ok').'</strong></div>';
    }

    ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Clientes
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($list_clientes as $cliente): ?>
                            <tr>
                                <td><?php echo $cliente->nome;?></td>
                                <td class="center"><?php echo $cliente->telefone;?></td>
                                <td class="center"><?php echo $cliente->celular;?></td>
                                <td class="center">
                                    <?php echo $cliente->email;?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="javascript:;" onclick="janelaDetalhamentoCliente(<?= $cliente->id ?>, <?= $cliente->id ?>)">
                                        <i class="glyphicon glyphicon-zoom-in"></i>
                                    </a>
                                    <a class="btn btn-info btn-sm" href="<?php echo base_url('cliente/view/'.$cliente->id)?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm confirma_exclusao" href="#" data-id="<?= $cliente->id ?>" data-nome="<?= $cliente->nome ?>">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<div class="modal fade" id="modal_detalhamento" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detalhamento do Cliente</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered bootstrap-datatable" id="detalhe">
                    <tr>
                        <td><strong>Nome:</strong></td>
                        <td><label id="nome"></label></td>
                    </tr>
                    <tr>
                        <td><strong>Data de Nascimento:</strong></td>
                        <td><label id="data_nascimento"></label></td>
                    </tr>
                    <tr>
                        <td><strong>Telefone:</strong></td>
                        <td><label id="telefone"></label></td>
                    </tr>
                    <tr>
                        <td><strong>Celular:</strong></td>
                        <td><label id="celular"></label></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><label id="email"></label></td>
                    </tr>
                    <tr>
                        <td><strong>CEP:</strong></td>
                        <td><label id="cep"></label></td>
                    </tr>
                    <tr>
                        <td><strong>Endereco:</strong></td>
                        <td><label id="endereco"></label></td>
                    </tr>
                    <tr>
                        <td><strong>Número:</strong></td>
                        <td><label id="numero"></label></td>
                    </tr>
                    <tr>
                        <td><strong>Complemento:</strong></td>
                        <td><label id="complemento"></label></td>
                    </tr>
                    <tr>
                        <td><strong>Bairro:</strong></td>
                        <td><label id="bairro"></label></td>
                    </tr>
                    <tr>
                        <td><strong>Cidade:</strong></td>
                        <td><label id="cidade"></label></td>
                    </tr>
                    <tr>
                        <td><strong>UF:</strong></td>
                        <td><label id="uf"></label></td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_confirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmação de Exclusão</h4>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir o cliente <strong><span id="nome_exclusao"></span></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                <button type="button" class="btn btn-danger" id="btn_excluir">Sim</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

    var base_url = "<?= base_url(); ?>";

    $(function(){
        $('.confirma_exclusao').on('click', function(e) {
            e.preventDefault();

            var nome = $(this).data('nome');
            var id = $(this).data('id');

            $('#modal_confirmation').data('nome', nome);
            $('#modal_confirmation').data('id', id);
            $('#modal_confirmation').modal('show');
        });

        $('#modal_confirmation').on('show.bs.modal', function () {
            var nome = $(this).data('nome');
            $('#nome_exclusao').text(nome);
        });

        $('#btn_excluir').click(function(){
            var id = $('#modal_confirmation').data('id');
            document.location.href = base_url + "cliente/del/"+id;
        });
    });

    function carregaDadosClienteJSon(id_cliente){

        $.post(base_url+'cliente/getInfoCliente', {
            id_cliente: id_cliente
        }, function (data){
            console.log(data);
            $('#nome').text(data.nome);
            $('#data_nascimento').text(data.data_nascimento);
            $('#telefone').text(data.telefone);
            $('#celular').text(data.celular);
            $('#email').text(data.email);
            $('#cep').text(data.cep);
            $('#endereco').text(data.endereco);
            $('#numero').text(data.numero);
            $('#complemento').text(data.complemento);
            $('#bairro').text(data.bairro);
            $('#cidade').text(data.cidade);
            $('#uf').text(data.uf);

        }, 'json');
    }

    function janelaDetalhamentoCliente(id_cliente){

        //antes de abrir a janela, preciso carregar os dados do cliente e preencher os campos dentro do modal
        carregaDadosClienteJSon(id_cliente);
        $('#modal_detalhamento').modal('show');
    }
</script>
</body>
</html>