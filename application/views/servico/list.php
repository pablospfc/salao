<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Serviços</h3>
        </div>

        <div class="col-lg-5">
            <a href="<?php echo site_url('servico/add'); ?>" class="btn btn-primary btn-sm">
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
                    Serviços
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tipo de Serviço</th>
                        <th>Preço</th>
                        <th>Custo</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($list_servicos as $servico): ?>
                        <tr>
                            <td><?php echo $servico->nome;?></td>
                            <td class="center"><?php echo $servico->tipo_servico;?></td>
                            <td class="center"><?php echo 'R$ '.$servico->preco;?></td>
                            <td class="center">
                                <?php echo 'R$ '.$servico->custo;?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-success btn-sm" href="javascript:;" onclick="janelaDetalhamentoServico(<?= $servico->id ?>, <?= $servico->id ?>)">
                                    <i class="glyphicon glyphicon-zoom-in"></i>
                                </a>
                                <a class="btn btn-info btn-sm" href="<?php echo base_url('servico/view/'.$servico->id)?>">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm confirma_exclusao" href="#" data-id="<?= $servico->id ?>" data-nome="<?= $servico->nome ?>">
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
                <h4 class="modal-title">Detalhamento do Serviço</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered bootstrap-datatable" id="detalhe">

                    <tr>
                        <td><strong>Nome:</strong></td>
                        <td><label id="nome"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Tipo de Serviço:</strong></td>
                        <td><label id="tipo_servico"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Custo:</strong></td>
                        <td><label id="custo"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Preço:</strong></td>
                        <td><label id="preco"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Desconto Máximo:</strong></td>
                        <td><label id="desconto_maximo"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Duração:</strong></td>
                        <td><label id="duracao"></label></td>
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
                <p>Deseja realmente excluir o serviço <strong><span id="nome_exclusao"></span></strong>?</p>
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
            document.location.href = base_url + "servico/del/"+id;
        });
    });

    function carregaDadosServicoJSon(id_servico){

        $.post(base_url+'servico/getInfoServico', {
            id_servico: id_servico
        }, function (data){
            console.log(data);
            $('#nome').text(data.nome);
            $('#tipo_servico').text(data.tipo_servico);
            $('#custo').text('R$ '+data.custo);
            $('#preco').text('R$ '+data.preco);
            $('#desconto_maximo').text(data.desconto_maximo+'%');
            $('#duracao').text(data.duracao+' minutos');
        }, 'json');
    }

    function janelaDetalhamentoServico(id_servico){

        //antes de abrir a janela, preciso carregar os dados do serviço e preencher os campos dentro do modal
        carregaDadosServicoJSon(id_servico);
        $('#modal_detalhamento').modal('show');
    }
</script>
</body>
</html>