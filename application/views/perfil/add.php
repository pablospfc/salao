<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Perfis</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Cadastro de Perfis</h2>
            </div>
            <div class="box-content">
                <?php echo validation_errors();?>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('perfil/add',$attributes); ?>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Nome:</label>
                        <div class="controls">
                            <input class="form-control" id="nome" type="text" name="nome" required >
                        </div>
                    </div>

                </fieldset>

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