
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Serviços</a></li>
    </ul>
    <?php

    if( $this->session->flashdata('insert-ok')!="" ){
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('insert-ok').'</strong></div>';
    }

    if( $this->session->flashdata('delete-ok')!="" ){
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('delete-ok').'</strong></div>';
    }

    ?>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Serviços</h2>
                <div class="box-icon">
                    <a href="<?php echo site_url('servico/add'); ?>" class="btn btn-primary btn-sm"> <i
                            class="fa-icon-file"></i>Novo
                    </a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
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
                        <td class="center">
                            <a class="btn btn-success" href="javascript:;" onclick="janelaDetalhamentoServico(<?= $servico->id ?>)">
                                <i class="halflings-icon white zoom-in"></i>
                            </a>
                            <a class="btn btn-info" href="<?php echo base_url('servico/view/'.$servico->id)?>">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger confirma_exclusao" href="#" data-id="<?= $servico->id ?>" data-nome="<?= $servico->nome ?>">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>

                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
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
                        <td><strong>Desconto Promocional:</strong></td>
                        <td><label id="desconto_promocional"></label></td>
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
            $('#desconto_promocional').text(data.desconto_promocional+'%');
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