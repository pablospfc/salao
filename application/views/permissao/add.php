<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Permissões</a></li>
    </ul>
    <?php echo validation_errors();
    if( $this->session->flashdata('insert-ok')!="" ){
        echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$this->session->flashdata('update-ok').'</strong></div>';
    }
    ?>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Atribuir Permissões</h2>
            </div>
            <div class="box-content">
             <?php
                echo validation_errors();
                $attributes = array('id'=>'form_permissao','class' => 'form-horizontal');
                echo form_open('permissao/adding',$attributes);
                echo '<input type="hidden" name="id_perfil" value="'.$idPerfil.'">';

              foreach ($list_permissoes as $modulos) {
                  echo $modulos['modulo']."</br>";
                 foreach ($modulos['metodos'] as $metodo) {
                     echo $metodo['metodo'];
                     $checked = ($metodo['checked'] == 1) ? "checked" : "";
                     //echo '<input type="hidden" name="metodos[]" value="0">';
                     echo '<input type="checkbox" id="metodo" name="metodos[]" value="'.$metodo['id'].'" '.$checked."></br>";
                  }
                  echo "</br>";
              }

             ?>
                <div class="form-actions">
                    <?php echo form_button(array('class' => 'btn btn-primary', 'type' => 'submit', 'content' => 'Salvar')); ?>
                    <?php echo form_button(array('class' => 'btn dark-blue', 'type' => 'button', 'content' => 'Voltar', 'onclick' => 'window.open(\''.base_url().'perfil\', \'_self\')')); ?>
                    <?php echo form_close(); ?>
                </div>

            </div>

        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->


</div><!--/#content.span10-->
</div><!--/fluid-row-->
<script>
    $("body").on("click", "#metodo", function() {
        if ($(this).is(":checked")) {
            alert("Checked");
        }
        else alert("Not Checked");
    });
</script>
<div class="clearfix"></div>

<footer>

    <p>
        <span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>

    </p>

</footer>

</body>
</html>