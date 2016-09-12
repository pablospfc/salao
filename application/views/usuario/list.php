
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Usuários</a></li>
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
                <h2><i class="halflings-icon user"></i><span class="break"></span>Usuários</h2>
                <div class="box-icon">

                </div>
            </div><br>
            <div style="padding-left:900px;">
                <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-primary btn-sm"> <i
                        class="fa-icon-file"></i>Novo
                </a>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
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
                            <td class="center">
                                <a class="btn btn-info" href="<?php echo base_url('usuario/view/'.$usuario->id)?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger confirma_exclusao" href="#" data-id="<?= $usuario->id ?>" data-nome="<?= $usuario->nome ?>">
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
            document.location.href = base_url + "usuario/del/"+id;
        });
    });
    
</script>
</body>
</html>