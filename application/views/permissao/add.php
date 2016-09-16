<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Permissões</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Atribuir Permissões</h2>
            </div>
            <div class="box-content">
             <?php
                echo validation_errors();
                $attributes = array('class' => 'form-horizontal');
                echo form_open('permissao/add',$attributes);

              foreach ($list_permissoes as $modulos) {
                  echo $modulos['modulo']."</br>";
                 foreach ($modulos['metodos'] as $metodo) {
                     echo $metodo['metodo'];
                     $checked = ($metodo['checked'] ==1) ? "checked" : "";
                     echo '<input type="checkbox" name="ativo" value="1" '.$checked."></br>";
                     echo '<input type="hidden" name="id_metodo" value="'.$metodo['id'].'"';
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

<div class="clearfix"></div>

<footer>

    <p>
        <span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>

    </p>

</footer>

</body>
</html>