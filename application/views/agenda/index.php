
<style>
    .fc th {
        padding: 10px 0px;
        vertical-align: middle;
        background:#F2F2F2;
    }
    .fc-day-grid-event>.fc-content {
        padding: 4px;
    }
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }
    .error {
        color: #ac2925;
        margin-bottom: 15px;
    }
    .event-tooltip {
        width:150px;
        background: rgba(0, 0, 0, 0.85);
        color:#FFF;
        padding:10px;
        position:absolute;
        z-index:10001;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 11px;

    }
    .modal-header
    {
        background-color: #3A87AD;
        color: #fff;
    }
</style>

<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Fornecedores</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Cadastro de Fornecedores</h2>
            </div>
            <div class="box-content">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
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

<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="error"></div>
                <form class="form-horizontal" id="crud-form">
                    <div class="control-group">
                        <label class="control-label" for="clientes">Cliente:</label>
                        <div class="controls">
                            <select name="id_cliente" id="clientes" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profissionais">Profissionais:</label>
                        <div class="controls">
                            <select name="id_profissional" id="profissionais" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="col-md-4 control-label" for="time">Hora</label>
                        <div class="controls">
                        <div class="col-md-4 input-append bootstrap-timepicker">
                            <input id="time" name="time" type="text" class="form-control input-md" />
                        </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="col-md-4 control-label" for="description">Description</label>
                        <div class="controls">
                        <div class="col-md-4">
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="col-md-4 control-label" for="color">Color</label>
                        <div class="col-md-4">
                            <div class="controls">
                            <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                            <span class="help-block">Click to pick a color</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
    </div>

</body>
</html>




