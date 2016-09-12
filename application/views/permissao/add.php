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

             //error_log(var_export($list_permissoes[0]['metodos'][0]['metodo'], true), 3,'C:/xampp/htdocs/salao/log.log');

              foreach ($list_permissoes as $key => $modulos) {
                  echo $modulos['modulo']."</br>";
//                  foreach ($modulos as $modulo) {
//
//                  }
              }



             ?>


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