
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Cartões</a></li>
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
                <h2><i class="halflings-icon user"></i><span class="break"></span>Cartões</h2>
                <div class="box-icon">

                </div>
            </div><br>
            <div style="padding-left:900px;">
            <a href="<?php echo site_url('cartao/add'); ?>" class="btn btn-primary btn-sm"> <i
                    class="fa-icon-file"></i>Novo
            </a>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Bandeira</th>
                        <th>Tipo de Operação</th>
                        <th>Número de Parcelas</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($list_cartoes as $cartao): ?>
                        <tr>
                            <td><?php echo $cartao->bandeira_cartao;?></td>
                            <td class="center"><?php echo $cartao->tipo_operacao;?></td>
                            <td class="center"><?php echo $cartao->numero_maximo_parcelas;?></td>
                            <td class="center">
                                <a class="btn btn-success" href="javascript:;" onclick="janelaDetalhamentoCartao(<?= $cartao->id ?>, <?= $cartao->id_tipo_operacao ?>)">
                                    <i class="halflings-icon white zoom-in"></i>
                                </a>
                                <a class="btn btn-info" href="<?php echo base_url('cartao/view/'.$cartao->id)?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger confirma_exclusao" href="#" data-id="<?= $cartao->id ?>" data-nome="<?= $cartao->bandeira_cartao ?>">
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

<div class="modal fade" id="modal_detalhamento_debito" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detalhamento do Cartão de Débito</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <tr>
                        <td><strong>Bandeira:</strong></td>
                        <td><label id="bandeira_cartao1"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Tipo de Operação:</strong></td>
                        <td><label id="tipo_operacao1"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Taxa de Cartão de Débito:</strong></td>
                        <td><label id="taxa_cartao_debito1"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Número Máximo de Parcelas:</strong></td>
                        <td><label id="numero_maximo_parcelas1"></label></td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_detalhamento_credito" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detalhamento do Cartão de Cŕedito</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <tr>
                        <td><strong>Bandeira:</strong></td>
                        <td><label id="bandeira_cartao2"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Tipo de Operação:</strong></td>
                        <td><label id="tipo_operacao2"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Taxa de Cartão de Cŕedito à Vista:</strong></td>
                        <td><label id="taxa_cartao_credito_vista2"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Taxa de Cartão de Cŕedito à Prazo:</strong></td>
                        <td><label id="taxa_cartao_credito_prazo2"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Número Máximo de Parcelas:</strong></td>
                        <td><label id="numero_maximo_parcelas2"></label></td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_detalhamento_credito_debito" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detalhamento do Cartão de Cŕedito e Débito</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <tr>
                        <td><strong>Bandeira:</strong></td>
                        <td><label id="bandeira_cartao3"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Tipo de Operação:</strong></td>
                        <td><label id="tipo_operacao3"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Taxa de Cartão de Débito:</strong></td>
                        <td><label id="taxa_cartao_debito3"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Taxa de Cartão de Cŕedito à Vista:</strong></td>
                        <td><label id="taxa_cartao_credito_vista3"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Taxa de Cartão de Cŕedito à Prazo:</strong></td>
                        <td><label id="taxa_cartao_credito_prazo3"></label></td>
                    </tr>

                    <tr>
                        <td><strong>Número Máximo de Parcelas:</strong></td>
                        <td><label id="numero_maximo_parcelas3"></label></td>
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
                <p>Deseja realmente excluir o cartão <strong><span id="nome_exclusao"></span></strong>?</p>
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