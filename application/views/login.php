<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>SisBeleza</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="<?php echo base_url('includes/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('includes/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
    <link id="base-style" href="<?php echo base_url('includes/css/style.css'); ?>" rel="stylesheet">
    <link id="base-style-responsive" href="<?php echo base_url('includes/css/style-responsive.css'); ?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->
    <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css' rel='stylesheet' />
    <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>includes/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>includes/css/bootstrap-timepicker.min.css" rel="stylesheet" />


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('includes/img/favicon.ico'); ?>">

    <!--<script src="<?php //echo base_url('includes/js/jquery-1.9.1.min.js'); ?>"></script>-->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="<?php echo base_url('includes/js/jquery.maskMoney.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery-migrate-1.0.0.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery-ui-1.10.0.custom.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.ui.touch-punch.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/modernizr.js'); ?>"></script>

    <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>

    <script src="<?php echo base_url('includes/js/bootstrap.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.cookie.js'); ?>"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>

    <script src='<?php echo base_url();?>includes/js/bootstrap-colorpicker.min.js'></script>
    <script src='<?php echo base_url();?>includes/js/bootstrap-timepicker.min.js'></script>
    <script src='<?php echo base_url();?>includes/js/main.js'></script>

    <script src='<?php //echo base_url('includes/js/fullcalendar.min.js'); ?>'></script>

    <script src='<?php echo base_url('includes/js/jquery.dataTables.min.js'); ?>'></script>

    <script src="<?php echo base_url('includes/js/excanvas.js'); ?>"></script>
    <script src="<?php echo base_url('includes/js/jquery.flot.js'); ?>"></script>
    <script src="<?php echo base_url('includes/js/jquery.flot.pie.js'); ?>"></script>
    <script src="<?php echo base_url('includes/js/jquery.flot.stack.js'); ?>"></script>
    <script src="<?php echo base_url('includes/js/jquery.flot.resize.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.chosen.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.uniform.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.cleditor.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.noty.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.elfinder.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.raty.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.iphone.toggle.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.uploadify-3.1.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.gritter.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.imagesloaded.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.masonry.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.knob.modified.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/jquery.sparkline.min.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/counter.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/retina.js'); ?>"></script>

    <script src="<?php echo base_url('includes/js/custom.js'); ?>"></script>


    <!-- end: Favicon -->

</head>
<body>
<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="index.html"><i class="halflings-icon home"></i></a>
                    <a href="#"><i class="halflings-icon cog"></i></a>
                </div>
                <h2>Acesso ao sistema</h2>
                <?php echo validation_errors(); ?>
                <?php echo form_open('loginService', array('class' => 'form-horizontal', 'id' => 'loggin')); ?>
                        <div class="input-prepend" title="Username">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="login" id="login" type="text" placeholder="Login"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="senha" id="senha" type="password" placeholder="Senha"/>
                        </div>
                        <div class="clearfix"></div>

                        <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

                        <div class="button-login">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="clearfix"></div>
                <?php echo form_close(); ?>
                <hr>
                <h3>Forgot Password?</h3>
                <p>
                    No problem, <a href="#">click here</a> to get a new password.
                </p>
            </div><!--/span-->
        </div><!--/row-->


    </div><!--/.fluid-container-->

</div><!--/fluid-row-->
