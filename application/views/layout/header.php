<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SisBeleza</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('includes/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('includes/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url('includes/vendor/datatables-plugins/dataTables.bootstrap.css');?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('includes/vendor/datatables-responsive/dataTables.responsive.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('includes/dist/css/sb-admin-2.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('includes/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

<!--    <link href="--><?php //echo base_url('includes/vendor/fullcalendar/css/fullcalendar.css'); ?><!--" rel="stylesheet">-->
<!---->
<!--    <link href="--><?php //echo base_url('includes/vendor/fullcalendar/css/fullcalendar.print.css'); ?><!--" rel="stylesheet">-->

    <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css' rel='stylesheet' />
    <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css' rel='stylesheet' media='print' />

    <link href="<?php echo base_url('includes/vendor/fullcalendar/css/bootstrap-colorpicker.min.css');?>" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url('includes/vendor/fullcalendar/css/bootstrap-timepicker.min.css');?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?php echo base_url('includes/vendor/jquery/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('includes/vendor/bootstrap/js/bootstrap.min.js');?>"></script>

<!--    <script src="--><?php //echo base_url('includes/vendor/fullcalendar/js/moment.min.js');?><!--"></script>-->
<!---->
<!--    <script src="--><?php //echo base_url('includes/vendor/fullcalendar/js/fullcalendar.min.js');?><!--"></script>-->

    <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('includes/vendor/metisMenu/metisMenu.min.js');?>"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('includes/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('includes/vendor/datatables-plugins/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('includes/vendor/datatables-responsive/dataTables.responsive.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('includes/dist/js/sb-admin-2.js');?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.formula.js');?>"></script>

    <script src="<?php echo base_url('includes/vendor/fullcalendar/js/bootstrap-colorpicker.min.js');?>"></script>

    <script src="<?php echo base_url('includes/vendor/fullcalendar/js/bootstrap-timepicker.min.js');?>"></script>

   <script src="<?php echo base_url('includes/js/main.js');?>"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SisBeleza</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo site_url('usuario/view/'.$this->session->userdata('id')); ?>"><i class="fa fa-user fa-fw"></i> Conta</a>
                    </li>
<!--                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>-->
<!--                    </li>-->
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
