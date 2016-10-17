<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Estoque</h3>
        </div>

        <div class="col-lg-5">
            <a href="<?php echo site_url('movimentacao/add'); ?>" class="btn btn-primary btn-sm">
                Nova Movimentação
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

</body>
</html>