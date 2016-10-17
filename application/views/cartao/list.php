<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Cartões</h3>
        </div>

        <div class="col-lg-5">
        <a href="<?php echo site_url('cartao/add'); ?>" class="btn btn-primary btn-sm">
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
                     Cartões
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th class="text-center">Bandeira</th>
                            <th class="text-center">Tipo de Operação</th>
                            <th class="text-center">Número de Parcelas</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($list_cartoes as $cartao): ?>
                            <tr>
                                <td class="text-center"><?php echo $cartao->bandeira_cartao;?></td>
                                <td class="text-center"><?php echo $cartao->tipo_operacao;?></td>
                                <td class="text-center"><?php echo $cartao->numero_maximo_parcelas;?></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="javascript:;" onclick="janelaDetalhamentoCartao(<?= $cartao->id ?>, <?= $cartao->id_tipo_operacao ?>)">
                                        <i class="glyphicon glyphicon-zoom-in"></i>
                                    </a>
                                    <a class="btn btn-info btn-sm" href="<?php echo base_url('cartao/view/'.$cartao->id)?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm confirma_exclusao" href="#" data-id="<?= $cartao->id ?>" data-nome="<?= $cartao->bandeira_cartao ?>">
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
            document.location.href = base_url + "cartao/del/"+id;
        });
    });

    function carregaDadosCartaoDebitoJSon(id_cartao){
        $.post(base_url+'cartao/getInfoCartao', {
            id_cartao: id_cartao
        }, function (data){
            $('#bandeira_cartao1').text(data.bandeira_cartao);
            $('#tipo_operacao1').text(data.tipo_operacao);
            $('#taxa_cartao_debito1').text(data.taxa_cartao_debito+'%');
            $('#numero_maximo_parcelas1').text(data.numero_maximo_parcelas);
        }, 'json');
    }

    function carregaDadosCartaoCreditoJSon(id_cartao){
        $.post(base_url+'cartao/getInfoCartao', {
            id_cartao: id_cartao
        }, function (data){
            $('#bandeira_cartao2').text(data.bandeira_cartao);
            $('#tipo_operacao2').text(data.tipo_operacao);
            $('#taxa_cartao_credito_vista2').text(data.taxa_cartao_credito_vista+'%');
            $('#taxa_cartao_credito_prazo2').text(data.taxa_cartao_credito_prazo+'%');
            $('#numero_maximo_parcelas2').text(data.numero_maximo_parcelas);
        }, 'json');
    }

    function carregaDadosCartaoCreditoDebitoJSon(id_cartao){
        $.post(base_url+'cartao/getInfoCartao', {
            id_cartao: id_cartao
        }, function (data){
            $('#bandeira_cartao3').text(data.bandeira_cartao);
            $('#tipo_operacao3').text(data.tipo_operacao);
            $('#taxa_cartao_debito3').text(data.taxa_cartao_debito+'%');
            $('#taxa_cartao_credito_vista3').text(data.taxa_cartao_credito_vista+'%');
            $('#taxa_cartao_credito_prazo3').text(data.taxa_cartao_credito_prazo+'%');
            $('#numero_maximo_parcelas3').text(data.numero_maximo_parcelas);
        }, 'json');
    }

    function janelaDetalhamentoCartao(id_cartao, id_tipo_operacao){

        //antes de abrir a janela, preciso carregar os dados do produto e preencher os campos dentro do modal
        if (id_tipo_operacao==1) {
            carregaDadosCartaoCreditoDebitoJSon(id_cartao);
            $('#modal_detalhamento_credito_debito').modal('show');
        }
        else
        if (id_tipo_operacao==2) {
            carregaDadosCartaoCreditoJSon(id_cartao);
            $('#modal_detalhamento_credito').modal('show');
        }
        else
        if (id_tipo_operacao==3) {
            carregaDadosCartaoDebitoJSon(id_cartao);
            $('#modal_detalhamento_debito').modal('show');
        }
    }
</script>
</body>
</html>