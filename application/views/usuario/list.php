<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Usuários</h3>
        </div>

        <div class="col-lg-5">
            <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-primary btn-sm">
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
                    Usuários
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Perfil</th>
                            <th>Login</th>
                            <th>Ativo</th>
                            <th>Data de Cadastro</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($list_usuarios as $usuario): ?>
                            <tr>
                                <td><?php echo $usuario->nome;?></td>
                                <td class="center"><?php echo $usuario->perfil;?></td>
                                <td class="center"><?php echo $usuario->login;?></td>
                                <td class="center">
                                    <?php echo $usuario->situacao;?>
                                </td>
                                <td class="center">
                                    <?php echo $usuario->data_cadastro;?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="<?php echo base_url('usuario/view/'.$usuario->id)?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm confirma_exclusao" href="#" data-id="<?= $usuario->id ?>" data-nome="<?= $usuario->nome ?>">
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

<div class="modal fade" id="modal_confirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmação de Exclusão</h4>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir o usuário <strong><span id="nome_exclusao"></span></strong>?</p>
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
            document.location.href = base_url + "usuario/del/"+id;
        });
    });

</script>
</body>
</html>