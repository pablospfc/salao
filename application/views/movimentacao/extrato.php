
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Extrato de Estoque</a></li>
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
                <h2><i class="halflings-icon user"></i><span class="break"></span>Extrato de Estoque do Produto <strong><?php echo $extrato[0]->produto?></strong></h2>
                <div class="box-icon">

                </div>
            </div><br>

            <div class="box-content">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th></th>
                        <th></th>
                        <th colspan="3" class="center">Movimentação</th>
                        <th colspan="3" class="center">Saldo</th>
                    </tr>
                    <tr>
                        <th>Data</th>
                        <th>Tipo de Movimentação</th>
                        <th>Qtd</th>
                        <th>Custo Médio</th>
                        <th>Total</th>
                        <th>Qtd</th>
                        <th>Custo Médio</th>
                        <th>Total</th>
                        <th>Opções</th>
                    </tr>
                    <?php
                        $qtd = 0;
                        $total = 1;
                        foreach($extrato as $value):
                            $qtd = $value->quantidade + $qtd;
                            $total = $qtd * $value->custo_unitario_compra;
                     ?>
                        <tr>
                            <td class="center"><?php echo $value->data;?></td>
                            <td class="center"><?php echo $value->tipo_movimentacao;?></td>
                            <td class="center"><?php echo $value->quantidade;?></td>
                            <td class="center"><?php echo $value->custo_unitario_compra;?></td>
                            <td class="center"><?php echo $value->custo_total;?></td>
                            <td><?php echo $qtd; ?></td>
                            <td class="center"><?php echo $value->custo_unitario_compra; ?></td>
                            <td><?php echo $total; ?></td>
                            <td>
                                <button type="button" class="btn btn-lg btn-primary" disabled="disabled">Primary button</button>
                                <a class="btn btn-info disabled" role="button" href="<?php echo base_url('movimentacao/view/'.$value->id)?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger confirma_exclusao" href="#" data-id="<?= $value->id ?>" data-nome="<?= $value->id ?>">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
                <a href="<?php echo site_url('movimentacao'); ?>" class="btn btn-primary btn-sm"> <i
                        class="fa-icon-file"></i>Voltar
                </a>
                <a id="print" href="<?php echo site_url('movimentacao/add'); ?>" class="btn btn-default btn-sm"> <i
                        class="fa-icon-file"></i>Imprimir
                </a>
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

<div class="modal fade" id="modal_confirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmação de Exclusão</h4>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir esta movimentação?</p>
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

</script>
</body>
</html>