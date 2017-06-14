<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>JCORE - <?php echo $title; ?></title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="description" content="Avenxo Admin Theme">
        <meta name="author" content="">

        <?php echo $_def_css_files; ?>

        <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">
        <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">
        <link href="assets/css/dark-theme.css" rel="stylesheet">
        <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">
        <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
        <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">

        <style>

            html{
                zoom: 0.8;
                zoom: 80%;
            }

            .thead-bg {
                background: rgba(226,226,226,1);
                background: -moz-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(219,219,219,1) 100%);
                background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(226,226,226,1)), color-stop(50%, rgba(219,219,219,1)), color-stop(51%, rgba(209,209,209,1)), color-stop(100%, rgba(219,219,219,1)));
                background: -webkit-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(219,219,219,1) 100%);
                background: -o-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(219,219,219,1) 100%);
                background: -ms-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(219,219,219,1) 100%);
                background: linear-gradient(to bottom, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(219,219,219,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#dbdbdb', GradientType=0 );
            }

            .toolbar{
                float: left;
            }

            td.details-control {
                background: url('assets/img/Folder_Closed.png') no-repeat center center;
                cursor: pointer;
            }
            tr.details td.details-control {
                background: url('assets/img/Folder_Opened.png') no-repeat center center;
            }

            .child_table{
                padding: 5px;
                border: 1px #ff0000 solid;
            }

            .glyphicon.spinning {
                animation: spin 1s infinite linear;
                -webkit-animation: spin2 1s infinite linear;
            }

            @keyframes spin {
                from { transform: scale(1) rotate(0deg); }
                to { transform: scale(1) rotate(360deg); }
            }

            @-webkit-keyframes spin2 {
                from { -webkit-transform: rotate(0deg); }
                to { -webkit-transform: rotate(360deg); }
            }

            .select2-container {
                height: 34px;
            }

            .select2-close-mask{
                z-index: 999999;
            }
            .select2-dropdown{
                z-index: 999999;
            }

        </style>

    </head>

    <body class="animated-content">

    <?php echo $_top_navigation; ?>

        <div id="wrapper">
            <div id="layout-static">

            <?php echo $_side_bar_navigation;?>

                <div class="static-content-wrapper white-bg">
                    <div class="static-content"  >
                        <div class="page-content"><!-- #page-content -->

                            <ol class="breadcrumb" style="margin:0;">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="Petty_cash_journal">Petty Cash Journal</a></li>
                            </ol>

                            <div class="container-fluid">
                                <div data-widget-group="group1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="div_pcf_list">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Petty Cash Journal</b>
                                                    </div>
                                                    <div class="panel-body table-responsive">
                                                        <div style="margin-bottom: 15px;">
                                                            <div class="col-xs-12 col-md-3" style="margin-bottom: 10px;">
                                                                <strong>As of Date :</strong>
                                                                <div class="input-group">
                                                                    <input id="txt_date" type="text" class="date-picker form-control" value="<?php echo date('m/d/Y'); ?>">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-md-3" style="margin-bottom: 10px;">
                                                                <strong>Department :</strong>
                                                                <select id="cbo_department_filter" class="form-control" style="width: 100%;" data-error-msg="Department is required" required>
                                                                    <?php foreach($departments as $department) { ?>
                                                                        <option value="<?php echo $department->department_id; ?>"><?php echo $department->department_name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <table id="tbl_pcf" class="" cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th>Txn Date</th>
                                                                <th>Txn #</th>
                                                                <th>Reference #</th>
                                                                <th>Particular</th>
                                                                <th>Department</th>
                                                                <th>Status</th>
                                                                <th>Remarks</th>
                                                                <th>Amount</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="8" align="right"><strong>Unreplenished Expense :</strong></td>
                                                                    <td id="txt_unreplenish" align="right"><strong>0.00</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="8" align="right"><strong>Remaining Amount :</strong></td>
                                                                    <td id="txt_remaining" align="right"><strong>0.00</strong></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div class="panel-footer">
                                                        <div class="col-xs-12 col-md-4">
                                                            <button id="btn_new" class="btn btn-primary" style="height: 33px;width: 200px; margin-bottom: 10px;">
                                                                <i class="fa fa-clipboard"></i> Post New Expense
                                                            </button>
                                                            <button id="btn_replenish" class="btn btn-primary" style=" margin-bottom: 10px;">
                                                                <i class="fa fa-refresh"></i> Replenish Petty Cash
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Petty Cash (Replenished)</b>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table id="tbl_replenished" class="" cellspacing="0" width="100%">
                                                            <thead class="thead-bg">
                                                                <th>Petty Cash Code</th>
                                                                <th>Period Covered</th>
                                                                <th>Txn #</th>
                                                                <th>Date Replenished</th>
                                                                <th>Status</th>
                                                                <th>Amount</th>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                    <div class="panel-footer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- .container-fluid -->

                    </div> <!-- #page-content -->
                </div>

                <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content"><!---content-->
                            <div class="modal-header">
                                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                                <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Confirm Cancellation</h4>
                            </div>

                            <div class="modal-body">
                                <p id="modal-body-message">Are you sure ?</p>
                            </div>

                            <div class="modal-footer">
                                <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                                <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div><!---content-->
                    </div>
                </div><!---modal-->

                <div id="modal_confirmation_replenishment" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content"><!---content-->
                            <div class="modal-header">
                                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                                <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Confirm Replenishment</h4>
                            </div>

                            <div class="modal-body">
                                <p id="modal-body-message">Are you sure ?</p>
                            </div>

                            <div class="modal-footer">
                                <button id="btn_yes_replenishment" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                                <button id="btn_close_replenishment" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div><!---content-->
                    </div>
                </div><!---modal-->

                <div id="modal_new_pcf" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#2ecc71;">
                                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                                <h4 id="pcf_title" class="modal-title" style="color: #ecf0f1;"><span id="modal_mode"></span></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="container-fluid">
                                        <form id="frm_petty_cash" role="form">
                                            <div class="col-xs-12 col-sm-6">
                                                <strong>* Ref # :</strong><br>
                                                <input type="text" name="ref_no" class="form-control" data-error-msg="Ref # is required" placeholder="Ref #" required>
                                                <strong>* Supplier :</strong><br>
                                                <select id="cbo_supplier" class="form-control" name="supplier_id" style="width: 100%;" data-error-msg="Supplier is required" required>
                                                    <?php foreach($suppliers as $supplier) { ?>
                                                        <option value="<?php echo $supplier->supplier_id; ?>"><?php echo $supplier->supplier_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <strong>* Department :</strong><br>
                                                <select id="cbo_department" class="form-control" name="department_id" style="width: 100%;" data-error-msg="Department is required" required>
                                                    <?php foreach($departments as $department) { ?>
                                                        <option value="<?php echo $department->department_id; ?>"><?php echo $department->department_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <strong>* Date :</strong><br>
                                                <input id="txt_date_txn" type="text" name="date_txn" class="date-picker form-control" value="<?php echo date('m/d/Y'); ?>" data-error-msg="Date is required" required>
                                                <strong>* Account :</strong><br>
                                                <select id="cbo_account" class="form-control" name="account_id" style="width: 100%;" data-error-msg="Account is required" required>
                                                    <?php foreach($accounts as $account) { ?>
                                                        <option value="<?php echo $account->account_id; ?>"><?php echo $account->account_no.' - '.$account->account_title; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <strong>* Amount :</strong><br>
                                                <input id="txtAmount" type="text" name="amount" class="form-control text-right numeric" data-error-msg="Amount is required" required>
                                            </div>
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <div class="col-xs-12">
                                                        <strong> Remarks :</strong><br>
                                                        <textarea name="remarks" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="btn_save" class="btn btn-primary">Save</button>
                                <button id="btn_cancel" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <footer role="contentinfo">
                    <div class="clearfix">
                        <ul class="list-unstyled list-inline pull-left">
                            <li><h6 style="margin: 0;">&copy; 2017 - JDEV IT BUSINESS SOLUTION</h6></li>
                        </ul>
                        <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                    </div>
                </footer>

                </div>
        </div>
    </div>


    <?php echo $_switcher_settings; ?>
    <?php echo $_def_js_files; ?>

    <script src="assets/plugins/spinner/dist/spin.min.js"></script>
    <script src="assets/plugins/spinner/dist/ladda.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="assets/plugins/fullcalendar/moment.min.js"></script>
    <!-- Data picker -->
    <script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- numeric formatter -->
    <script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
    <script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

    <script>

    (function() {
        var dt;
        var dtReplenished;
        var _txnMode;
        var _as_of_date=$('#txt_date');
        var _cboDepartment;

        var initializeControls=function() {
            InitializeDataTable();

            $('.date-picker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#cbo_supplier').select2({
                placeholder: "Please select Supplier"
            });

            $('#cbo_department').select2({
                placeholder: "Please select Department"
            });

            $('#cbo_department_filter').select2({
                placeholder: "Please select Department"
            });

            $('#cbo_account').select2({
                placeholder: "Please select Account"
            });

            $('#cbo_supplier').select2('val',null);
            $('#cbo_department_filter').select2('val', $("#cbo_department_filter option:first").val());
            $('#cbo_department').select2('val', null);
            $('#cbo_account').select2('val',null);

            $('.numeric').autoNumeric('init',{mDec:2});

            recomputeTotals();
        }();

        function InitializeDataTable() {
            dtReplenished=$('#tbl_replenished').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "language": {
                    searchPlaceholder: "Search Petty Cash"
                },
                "ajax" : {
                  "url":"Petty_cash_journal/transaction/list-replenish",
                  "type":"GET",
                  "bDestroy":true,
                  "data":function (d) {
                    return $.extend( {}, d, {
						"aod": _as_of_date.val(),
						"depid":$('#cbo_department_filter').val()
                    });
                  }
                },
        		"columns": [
                    { visible:false, targets:[0],data: "batch_no" },
                    { targets:[1],data: "date_covered" },
                    { targets:[2],data: "txn_no" },
                    { targets:[3],data: "date_replenished" },
                    {
                        targets:[4],data: "is_active",
                        render: function(data) {
                            var status;

                            if (data == 1)
                                status = 'Active';
                            else
                                status = 'Cancelled';

                            return status;
                        }
                    },
                    {
                        className: "text-right",
                        targets:[5],data: "amount",
                        render: function(data){
                            return accounting.formatNumber(data,2);
                        }
                    }
        		],
                "order": [[ 0, 'asc' ]],
                "displayLength": 25,
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;
         
                    api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                                '<tr class="group"><td colspan="5" style="background-color:orange;"><strong>'+'BATCH #: <i>'+group+'</i></strong></td></tr>'
                            );
         
                            last = group;
                        }
                    } );
                }
            });

            dt=$('#tbl_pcf').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "language": {
                   searchPlaceholder: "Search Petty Cash"
                },
                "ajax" : {
                    "url": "Petty_cash_journal/transaction/list",
                    "type": "GET",
                    "bDestroy":true,
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                            "aod": _as_of_date.val(),
                            "depid": $('#cbo_department_filter').val()
                        });
                    }
                },
                "columns": [
                    { targets:[0],data: "date_txn" },
                    { targets:[1],data: "txn_no" },
                    { targets:[2],data: "ref_no" },
                    { targets:[3],data: "supplier_name" },
                    { targets:[4],data: "department_name" },
                    {
                        targets:[5],data: "is_active",
                        render: function(data) {
                            var status;

                            if (data == 1)
                                status = 'Active';
                            else
                                status = 'Cancelled';

                            return status;
                        }
                    },
                    { targets:[6],data: "remarks" },
                    {
                        className: "text-right",
                        targets:[7],data: "amount",
                        render: function(data){
                            return accounting.formatNumber(data,2);
                        }
                    },
                    {
                        targets:[8],
                        render: function (data, type, full, meta){
                            var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                            var btn_trash='<button class="btn btn-red btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Cancel Transaction"><i class="fa fa-ban"></i> </button>';

                            return '<center>'+btn_edit+"&nbsp;"+btn_trash+'</center>';
                        }
                    }
                ]
            });
        };

        var bindEventHandlers=function() {
            $('#btn_new').on('click', function() {
                validateUnreplenishedExpense().done(function(response){
                    var message = JSON.parse(response);

                    if (message.stat == "success") {
                        _txnMode="new"
                        clearFields($('#frm_petty_cash'));
                        $('#pcf_title').text('Post New Expense');
                        $('#txt_date_txn').val('<?php echo date('m/d/Y'); ?>');
                        $('#modal_new_pcf').modal('show');
                    } else
                        showNotification(message);
                });
            });

            _as_of_date.on('change', function(){
                dt.destroy();
                dtReplenished.destroy();
                InitializeDataTable();
                recomputeTotals();
            });

            $('#cbo_department_filter').change(function(){
                dt.destroy();
                dtReplenished.destroy();
                InitializeDataTable();
                recomputeTotals();
            });

            $('#btn_cancel').on('click', function() {
                $('#modal_new_pcf').modal('hide');
            });

            $('#btn_replenish').click(function(){
                $('#modal_confirmation_replenishment').modal('show');
            });

            $('#btn_yes_replenishment').click(function(){
                replenishPettyCash().done(function(response){
                    var message = JSON.parse(response);
                    showNotification(message);
                    dt.destroy();
                    dtReplenished.destroy();
                    InitializeDataTable();
                    $('#modal_confirmation_replenishment').modal('hide');
                    recomputeTotals();
                });
            });

            $('#btn_close_replenishment').click(function(){
                $('#modal_confirmation_replenishment').modal('hide');
            });

            $('#btn_save').on('click', function() {
                if(validateRequiredFields($('#frm_petty_cash'))) {
                    if(_txnMode=="new") {
                        createPettyCash().done(function(response){
                            showNotification(response);
                            dt.row.add(response.row_added[0]).draw();
                            $('#cbo_department_filter').select2('val',response.row_added[0].department_id);
                            recomputeTotals();
                            clearFields($('#frm_petty_cash'));
                            $('#modal_new_pcf').modal('hide');
                            $('#btn_save').toggleClass('disabled');
                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    } else {
                        updatePettyCash().done(function(response){
                            showNotification(response);
                            console.log(response.row_updated[0]);
                            dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                            recomputeTotals();
                            clearFields($('#frm_petty_cash'));
                            $('#modal_new_pcf').modal('hide');
                            $('#btn_save').toggleClass('disabled');
                        }).always(function(){
                            showSpinningProgress($('#btn_save'));
                        });
                    }
                }
            });

            $('#btn_yes').click(function(){
                cancelPettyCash().done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){
                        dt.row(_selectRowObj).remove().draw();
                        recomputeTotals();
                    }
                })
            });

            $('#tbl_pcf > tbody').on('click','button[name="remove_info"]', function(){
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.journal_id;

                $('#modal_confirmation').modal('show');
            });

            $('#tbl_pcf > tbody').on('click','button[name="edit_info"]', function(){
                _txnMode="edit";
                $('#pcf_title').html('Edit Expense');
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();

                if(data.is_replenished == 1)
                    showNotification({title:"Error!",stat:"error",msg:"Cannot edit this item, item already replenished."});
                else {
                    _selectedID=data.journal_id;
                    $('input,textarea').each(function(){
                        var _elem=$(this);
                        $.each(data,function(name,value){
                            if(_elem.attr('name')==name){
                                _elem.val(value);
                            }
                        });
                    });

                    $('#cbo_account').select2('val',data.account_id);
                    $('#cbo_department').select2('val',data.department_id);
                    $('#cbo_supplier').select2('val',data.supplier_id);

                    $('#modal_new_pcf').modal('show');
                }
            });

            $('#txtAmount').keypress(validateNumber);
        }();

        var createPettyCash=function(){
            var _data=$('#frm_petty_cash').serializeArray();
            console.log(_data);
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Petty_cash_journal/transaction/save",
                "data":_data
            });
        };

        var updatePettyCash=function(){
            var _data=$('#frm_petty_cash').serializeArray();
             _data.push({name : "journal_id" ,value : _selectedID});
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Petty_cash_journal/transaction/update",
                "data":_data
            });
        };

        var cancelPettyCash=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Petty_cash_journal/transaction/cancel",
                "data":{journal_id : _selectedID}
            });
        };

        var replenishPettyCash=function(){
            var _data=[];
            _data.push({name: "aod", value: _as_of_date.val() });
            _data.push({name: "depid", value: $('#cbo_department_filter').val() });

            return $.ajax({
                "dateType":"json",
                "type":"POST",
                "url":"Petty_cash_journal/transaction/replenish",
                "data": _data
            });
        };

        var validateUnreplenishedExpense=function(){
            var _data=[];
            _data.push({name: "aod", value: _as_of_date.val() });
            _data.push({name: "depid", value: $('#cbo_department_filter').val() });

            return $.ajax({
                "dateType":"json",
                "type":"POST",
                "url":"Petty_cash_journal/transaction/validate",
                "data": _data
            });
        };

        var showNotification=function(obj){
            PNotify.removeAll(); //remove all notifications
            new PNotify({
                title:  obj.title,
                text:  obj.msg,
                type:  obj.stat
            });
        };

        function validateNumber(event) {
            var key = window.event ? event.keyCode : event.which;

            if (event.keyCode === 8 || event.keyCode === 46
                || event.keyCode === 37 || event.keyCode === 39 || key === 188) {
                return true;
            }
            else if ( key < 48 || key > 57 ) {
                return false;
            }
            else return true;
        };

        var validateRequiredFields=function(f){
            var stat=true;
            $('div.form-group').removeClass('has-error');
            $('input[required],textarea[required],select[required]',f).each(function(){
                    if($(this).is('select')){
                        if($(this).val()==0){
                        showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                        $(this).closest('div.form-group').addClass('has-error');
                        $(this).focus();
                        stat=false;
                        return false;
                    }

                    }else{
                    if($(this).val()==""){
                        showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                        $(this).closest('div.form-group').addClass('has-error');
                        $(this).focus();
                        stat=false;
                        return false;
                    }
                }
            });
            return stat;
        };

        function recomputeTotals() {
            $.ajax({
                "dataType":"json",
                "type":"GET",
                "url":"Petty_cash_journal/transaction/get-totals?aod="+_as_of_date.val()+"&depid="+$('#cbo_department_filter').val()
            }).done(function(response){
                $('#txt_unreplenish').html('<strong>'+response.unreplenished_expense+'</strong>');
                $('#txt_remaining').html('<strong>'+response.remaining_amount+'</strong>');
            });
        };

        var showSpinningProgress=function(e){
            $(e).toggleClass('disabled');
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
        };

        var clearFields=function(frm){
            $('input,textarea,select', frm).val('');
            $('#txtAmount').val('0.00');
            $('form').find('input:first').focus();
            $('#cbo_account').select2('val',null);
            $('#cbo_department').select2('val', null);
            $('#cbo_supplier').select2('val',null);
        };
    })();

    </script>

    </body>

</html>
