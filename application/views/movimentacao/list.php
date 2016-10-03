
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Movimentação de Produtos</a></li>
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
                <h2><i class="halflings-icon user"></i><span class="break"></span>Movimentação de Produtos</h2>
                <div class="box-icon">

                </div>
            </div><br>
            <div style="padding-left:900px;">
                <a href="<?php echo site_url('movimentacao/add'); ?>" class="btn btn-primary btn-sm"> <i
                        class="fa-icon-file"></i>Lançar Movimentação
                </a>
            </div>

            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Custo Unitário Médio</th>
                        <th>Custo Total</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($list_movimentacoes as $movimentacao): ?>
                        <tr>
                            <td><?php echo $movimentacao->produto;?></td>
                            <td class="center"><?php echo $movimentacao->quantidade;?></td>
                            <td class="center"><?php echo "R$ ".$movimentacao->custo_medio;?></td>
                            <td class="center">
                                <?php echo "R$ ".$movimentacao->total;?>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="<?php echo base_url('movimentacao/extrato/'.$movimentacao->id)?>">
                                    <i class="halflings-icon white list-alt" ></i>
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
        <span style="text-align:left;float:left">&copy; 2016 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>

    </p>

</footer>

</body>
</html>