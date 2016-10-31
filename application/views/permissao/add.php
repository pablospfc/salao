<style type="text/css">
    .material-switch > input[type="checkbox"] {
        display: none;
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative;
        width: 40px;
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position:absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }
    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Permissões</h3>
        </div>
    </div>

    <?php echo validation_errors();
    if( $this->session->flashdata('insert-ok')!="" ){
        echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('insert-ok').'</strong></div>';
    }
    ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cadastro de Permissões
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <?php
//                    echo validation_errors();
//                    $attributes = array('id'=>'form_permissao','class' => 'form-horizontal');
//                    echo form_open('permissao/adding',$attributes);
//                    echo '<input type="hidden" name="id_perfil" value="'.$idPerfil.'">';
//                    echo '<input type="hidden" id="metodosExcluidos" name="metodosExcluidos[]">';
//                    echo '<div class="panel panel-default">';
//                    foreach ($list_permissoes as $modulos) {
//                        echo '<div class="panel-heading">';
//                        echo $modulos['modulo'];
//                        echo '</div>';
//                        echo ' <ul class="list-group">';
//                        foreach ($modulos['metodos'] as $metodo) {
//                            echo '<li class="list-group-item">';
//                            echo $metodo['metodo'];
//                            echo '<div class="material-switch pull-right">';
//                            $checked = ($metodo['checked'] == 1) ? "checked" : "";
//
//                            echo '<input id="someSwitchOptionDefault" name="metodos[]" type="checkbox" value="'.$metodo['id'].'" '.$checked.">";
//                            echo '<label for="someSwitchOptionDefault" class="label-default"></label>';
//
//                            echo '</div>';
//                            echo '</li>';
//                        }
//
//                        echo '</ul>';
//
//                    }
//
//                    echo '</div>';

                    ?>

                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Material Design Switch Demos</div>

                        <!-- List group -->
                        <ul class="list-group">
                            <li class="list-group-item">
                               Teste1
                                <div class="material-switch pull-right">
                                    <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                    <label for="someSwitchOptionDefault" class="label-default"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Teste2
                                <div class="material-switch pull-right">
                                    <input id="someSwitchOptionDefault" name="someSwitchOption002" type="checkbox"/>
                                    <label for="someSwitchOptionDefault" class="label-default"></label>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

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
                <?php echo form_close(); ?>



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

<script>

    $("body").on("click", "#someSwitchOptionDefault", function() {
        if ($(this).is(":checked")) {
            //$("#metodosExcluidos")val($(this).val());
            //alert($(this).val());
        }
        else {
            var metodo = $(this).val();
            $("#metodosExcluidos").after(
                "<input type='hidden' id='metodosExcluidos' name='metodosExcluidos[]' value="+metodo+" />"
            );

        }
    });



</script>

</body>
</html>