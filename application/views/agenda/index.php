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


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Gerenciamento de Agenda</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Agendamento
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 column">

                            <div id="calendar"></div>

                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="error"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="clientes">Cliente:</label>
                            <select name="id_cliente" id="clientes" class="form-control">
                            </select>
                    </div>

                    <div class=form-group">
                        <label for="profissionais">Profissionais:</label>
                            <select name="id_profissional" id="profissionais" class="form-control">
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="time">Hora</label>
                        <div class="input-append bootstrap-timepicker">
                            <input id="time" name="time" type="text" class="form-control input-md" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="color">Cor</label>
                            <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                            <span class="help-block">Click to pick a color</span>
                        </div>
                    </div>
                </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </div>

        </div>
    </div>
    </div>


</body>
</html>




