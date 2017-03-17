<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>JCORE - <?php echo $title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-gjep-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">


    <!--<link href="assets/dropdown-enhance/dist/css/bootstrar-select.min.css" rel="stylesheet" type="text/css">-->

    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">


    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->

    <style>
        html{
            zoom: 0.8;
            zoom: 80%;
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

        .child_table {
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;    
        }
        .select2-container {
            min-width: 100%;
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

        .custom_frame{
            border: 1px solid lightgray;
            margin: 1% 1% 1% 1%;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .numeric{
            text-align: right;
        }



    </style>

</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
<div id="layout-static">

<?php echo $_side_bar_navigation;?>

<div class="static-content-wrapper white-bg">
<div class="static-content"  >

<div class="page-content"><!-- #page-content -->

<ol class="breadcrumb" style="margin-bottom: 0px;">
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="Cash_receipt">General Journal</a></li>
</ol>

<div class="container-fluid">
<div data-widget-group="group1">
<div class="row">
<div class="col-md-12">

<div id="div_payable_list">

    <div class="panel-group panel-default" id="accordionA">


        <div class="panel panel-default" style="border: 3px solid #00a546;min-height: 650px;border-radius:6px;">
            <!-- <a data-toggle="collapse" data-parent="#accordionA" href="#collapseOne"><div class="panel-heading"><h2 style="font-family:tahoma;">General Journal</h2></div></a>
            <div id="collapseOne" class="collapse in"> -->
                <div class="panel-body" style="min-height: 400px;">
                <h2>General Journal</h2>
                    <table id="tbl_accounts_receivable" class="custom-design table-striped" cellspacing="0" width="100%">
                        <thead class="">
                        <tr>
                            <th></th>
                            <th>Txn #</th>
                            <th>Particular</th>
                            <th>Remarks</th>
                            <th>Txn Date</th>
                            <th>Posted</th>
                            <th>Status</th>
                            <th><center>Action</center></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>


</div>




<div id="div_payable_fields" style="display: none;">


    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default" style=" margin: 20px; border-top: 3px solid #2196f3;">
                <!-- <div class="panel-heading">
                    <h2>General Journal</h2>
                    <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                </div> -->


                <div class="panel-body">
                    <h2>General Journal</h2>
                    <div class="tab-container tab-top tab-primary">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#general_journal" data-toggle="tab"><i class="fa fa-bars"></i> Transaction</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="general_journal" style="min-height: 300px;">


                                <form id="frm_journal" role="form" class="form-horizontal">

                                    <span><strong><i class="fa fa-bars"></i> Info</strong></span>
                                    <hr />

                                    <label class="col-lg-2"> * Txn # :</label>
                                    <div class="col-lg-4">

                                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-code"></i>
                                    </span>
                                            <input type="text" name="txn_no" class="form-control" placeholder="TXN-YYYYMMDD-XXX" readonly>

                                        </div>


                                    </div>

                                    <label class="col-lg-2"> * Date :</label>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                            <input type="text" name="date_txn" class="date-picker form-control" data-error-msg="Date is required." required>
                                        </div>

                                    </div>

                                    <br /><br />

                                    <label class="col-lg-2"> * Particular :</label>
                                    <div class="col-lg-10">
                                        <select id="cbo_particulars" name="particular_id" class="selectpicker show-tick form-control" data-live-search="true" data-error-msg="Customer is required." required>

                                            <optgroup label="Customers">
                                                <?php foreach($customers as $customer){ ?>
                                                    <option value='C-<?php echo $customer->customer_id; ?>'><?php echo $customer->customer_name; ?></option>
                                                <?php } ?>
                                            </optgroup>

                                            <optgroup label="Suppliers">
                                                <?php foreach($suppliers as $supplier){ ?>
                                                    <option value='S-<?php echo $supplier->supplier_id; ?>'><?php echo $supplier->supplier_name; ?></option>
                                                <?php } ?>
                                            </optgroup>

                                        </select>
                                    </div>

                                    <br /><br />

                                    <label class="col-lg-2"> * Branch :</label>
                                    <div class="col-lg-10">
                                        <select id="cbo_departments" name="department_id" class="selectpicker show-tick form-control" data-live-search="true" data-error-msg="Department is required." required>



                                            <option value="0">[ Create New Department ]</option>
                                                <?php foreach($departments as $department){ ?>
                                                    <option value='<?php echo $department->department_id; ?>'><?php echo $department->department_name; ?></option>
                                                <?php } ?>


                                        </select>
                                    </div>


                                    <br /><br />
                                    <span><strong><i class="fa fa-bars"></i> Journal Entries</strong></span>
                                    <hr />

                                    <div style="width: 100%;">
                                        <table id="tbl_entries" class="custom-design table-striped">
                                            <thead class="">
                                            <tr>
                                                <th style="width: 30%;">Account</th>
                                                <th style="width: 30%;">Memo</th>
                                                <th style="width: 15%;text-align: right;">Dr</th>
                                                <th style="width: 15%;text-align: right;">Cr</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>
                                                    <select name="accounts[]" class="selectpicker show-tick form-control selectpicker_accounts" data-live-search="true" title="Please select Student">
                                                        <?php foreach($accounts as $account){ ?>
                                                            <option value='<?php echo $account->account_id; ?>'><?php echo $account->account_title; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="memo[]" class="form-control"></td>
                                                <td><input type="text" name="dr_amount[]" class="form-control numeric"></td>
                                                <td><input type="text" name="cr_amount[]" class="form-control numeric"></td>
                                                <td>
                                                    <button type="button" class="btn btn-default add_account"><i class="fa fa-plus-circle" style="color: green;"></i></button>
                                                    <button type="button" class="btn btn-default remove_account"><i class="fa fa-times-circle" style="color: red;"></i></button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <select name="accounts[]" class="selectpicker show-tick form-control selectpicker_accounts" data-live-search="true" title="Please select Student">
                                                        <?php foreach($accounts as $account){ ?>
                                                            <option value='<?php echo $account->account_id; ?>'><?php echo $account->account_title; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="memo[]" class="form-control"></td>
                                                <td><input type="text" name="dr_amount[]" class="form-control numeric"></td>
                                                <td><input type="text" name="cr_amount[]" class="form-control numeric"></td>
                                                <td>
                                                    <button type="button" class="btn btn-default add_account"><i class="fa fa-plus-circle" style="color: green;"></i></button>
                                                    <button type="button" class="btn btn-default remove_account"><i class="fa fa-times-circle" style="color: red;"></i></button>
                                                </td>
                                            </tr>

                                            </tbody>

                                            <tfoot>
                                            <tr>
                                                <td colspan="2" align="right"><strong>Total</strong></td>
                                                <td align="right"><strong>0.00</strong></td>
                                                <td align="right"><strong>0.00</strong></td>
                                                <td></td>
                                            </tr>
                                            </tfoot>


                                        </table>

                                    </div>


                                    <hr />
                                    <label>Remarks :</label><br />
                                    <textarea name="remarks" class="col-lg-12"></textarea>

                                </form>

                                <br /><br /><hr />

                                <div class="row">
                                    <div class="col-sm-12">
                                        <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span>  Save Changes</button>
                                        <button id="btn_cancel" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                </div>


                <table id="table_hidden" class="hidden">
                    <tr>
                        <td>
                            <select name="accounts[]" class="selectpicker show-tick form-control selectpicker_accounts" data-live-search="true" title="Please select Student">
                                <?php foreach($accounts as $account){ ?>
                                    <option value='<?php echo $account->account_id; ?>'><?php echo $account->account_title; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="text" name="memo[]" class="form-control"></td>
                        <td><input type="text" name="dr_amount[]" class="form-control numeric"></td>
                        <td><input type="text" name="cr_amount[]" class="form-control numeric"></td>
                        <td>
                            <button type="button" class="btn btn-default add_account"><i class="fa fa-plus-circle" style="color: green;"></i></button>
                            <button type="button" class="btn btn-default remove_account"><i class="fa fa-times-circle" style="color: red;"></i></button>
                        </td>
                    </tr>
                </table>



            </div>
        </div>
    </div>





</div>




</div>
</div>
</div>
</div> <!-- .container-fluid -->
</div> <!-- #page-content -->
</div>

<footer role="contentinfo">
    <div class="clearfix">
        <ul class="list-unstyled list-inline pull-left">
            <li><h6 style="margin: 0;">&copy; 2016 - Paul Christian Rueda</h6></li>
        </ul>
        <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-gjerow-up"></i></button>
    </div>
</footer>

</div>
</div>
</div>



<div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog modal-sm">
        <div class="modal-content"><!---content--->
            <div class="modal-header ">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title" style="color: white;"><span id="modal_mode"> </span>Confirm Deletion</h4>

            </div>

            <div class="modal-body">
                <p id="modal-body-message">Are you sure you want to cancel this journal?</p>
            </div>

            <div class="modal-footer">
                <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Yes</button>
                <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">No</button>
            </div>
        </div><!---content---->
    </div>
</div><!---modal-->




<div id="modal_new_department" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog modal-md">
        <div class="modal-content"><!---content--->
            <div class="modal-header ">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title" style="color: white;"><span id="modal_mode"> </span>New Branch</h4>

            </div>

            <div class="modal-body" style="padding: 2%;">
                <form id="frm_department_new">

                    <div class="form-group">
                        <label>* Branch :</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-users"></i>
                            </span>
                            <input type="text" name="department_name" class="form-control" placeholder="Department" data-error-msg="Department name is required." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Branch Description :</label>
                        <textarea name="department_desc" class="form-control"></textarea>
                    </div>

                </form>


            </div>

            <div class="modal-footer">
                <button id="btn_create_department" type="button" class="btn btn-primary"  style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Create</button>
                <button id="btn_close_close_department" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
            </div>
        </div><!---content---->
    </div>
</div><!---modal-->










<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<!-- Select2-->
<script src="assets/plugins/select2/select2.full.min.js"></script>
<!---<script src="assets/plugins/dropdown-enhance/dist/js/bootstrar-select.min.js"></script>-->



<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>




<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>



<script>
$(document).ready(function(){
    var _txnMode; var _cboParticulars; var _cboMethods; var _selectRowObj; var _selectedID; var _txnMode;
    var dtReview; var _cboDepartments;


    var oTBJournal={
        "dr" : "td:eq(2)",
        "cr" : "td:eq(3)"
    };

    var oTFSummary={
        "dr" : "td:eq(1)",
        "cr" : "td:eq(2)"
    };






    var initializeControls=function(){


        dt=$('#tbl_accounts_receivable').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax" : "General_journal/transaction/list",
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "txn_no" },
                { targets:[2],data: "particular" },
                { targets:[3],data: "remarks" },
                { targets:[4],data: "date_txn" },
                { targets:[5],data: "posted_by" },
                {
                    targets:[6],data: null,
                    render: function (data, type, full, meta){
                        var _attribute='';
                        //console.log(data.is_email_sent);
                        if(data.is_active=="1"){
                            _attribute=' class="fa fa-check-circle" style="color:green;" ';
                        }else{
                            _attribute=' class="fa fa-times-circle" style="color:red;" ';
                        }

                        return '<center><i '+_attribute+'></i></center>';
                    }


                },
                {
                    targets:[7],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_cancel='<button class="btn btn-red btn-sm" name="cancel_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Cancel Journal"><i class="fa fa-times"></i> </button>';

                        return '<center>'+btn_edit+"&nbsp;"+btn_cancel+'</center>';
                    }
                }
            ]
        });





        $('#cbo_particular').select2();

        _cboDepartments=$('#cbo_departments').select2({
            placeholder: "Please select department.",
            allowClear: true
        });
        _cboDepartments.select2('val',null);

        reInitializeNumeric();
        reInitializeDropDownAccounts($('#tbl_entries'));


        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });


        var createToolBarButton=function() {
            var _btnNew='<button class="btn btn-green"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New General Journal" >'+
                '<i class="fa fa-plus-o"></i> New General Journal</button>';
            $("div.toolbar").html(_btnNew);
        }();



        _cboParticulars=$('#cbo_particulars').select2({
            placeholder: "Please select particular.",
            allowClear: true
        });
        _cboParticulars.select2('val',null);



        // _cboMethods=$('#cbo_methods').select2({
        //placeholder: "Please select method of payment.",
        //allowClear: true
        //});

        //_cboMethods.select2('val',null);






    }();



    var bindEventHandlers=function(){
        var detailRows = [];

        $('#tbl_accounts_receivable tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                //console.log(row.data());
                var d=row.data();

                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"Templates/layout/journal-gje?id="+ d.journal_id,
                    "beforeSend" : function(){
                        row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                    }
                }).done(function(response){
                    row.child( response ).show();
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                });




            }
        } );



        $('#tbl_sales_review tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dtReview.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                //console.log(row.data());
                var d=row.data();

                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"Templates/layout/ar-journal-for-review?id="+ d.sales_invoice_id,
                    "beforeSend" : function(){
                        row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                    }
                }).done(function(response){
                    row.child( response ).show();

                    reInitializeSpecificDropDown($('.cbo_customer_list'));
                    reInitializeNumeric();

                    var tbl=$('#tbl_entries_for_review_'+ d.sales_invoice_id);
                    var parent_tab_pane=$('#journal_review_'+ d.sales_invoice_id);

                    reInitializeDropDownAccounts(tbl);
                    reInitializeChildEntriesTable(tbl);
                    reInitializeChildElements(parent_tab_pane);

                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }


                });




            }
        } );



        $('#btn_new').click(function(){
            _txnMode="new";
            clearFields($('#frm_journal'))
            showList(false);
            //$('#modal_journal_entry').modal('show');
        });


        //loads modal to create new department
        _cboDepartments.on("select2:select", function (e) {

            var i=$(this).select2('val');
            if(i==0){ //new department
                clearFields($('#modal_new_department').find('form'));
                _cboDepartments.select2('val',null);
                $('#modal_new_department').modal('show');
            }
        });


        //create new department
        $('#btn_create_department').click(function(){
            var btn=$(this);

            if(validateRequiredFields($('#frm_department_new'))){
                var data=$('#frm_department_new').serializeArray();

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Departments/transaction/create",
                    "data":data,
                    "beforeSend" : function(){
                        showSpinningProgress(btn);
                    }
                }).done(function(response){
                    showNotification(response);
                    $('#modal_new_department').modal('hide');

                    var _department=response.row_added[0];
                    $('#cbo_departments').append('<option value="'+_department.department_id+'" selected>'+_department.department_name+'</option>');
                    $('#cbo_departments').select2('val',_department.department_id);

                }).always(function(){
                    showSpinningProgress(btn);
                });
            }


        });



        //add account button on table
        $('#tbl_entries').on('click','button.add_account',function(){

            var row=$('#table_hidden').find('tr');
            row.clone().insertAfter('#tbl_entries > tbody > tr:last');

            reInitializeNumeric();
            reInitializeDropDownAccounts($('#tbl_entries'));

        });

        var _oTblEntries=$('#tbl_entries > tbody');
        _oTblEntries.on('keyup','input.numeric',function(){
            var _oRow=$(this).closest('tr');

            if(_oTblEntries.find(oTBJournal.dr).index()===$(this).closest('td').index()){ //if true, this is Debit amount
                if(getFloat(_oRow.find(oTBJournal.dr).find('input.numeric').val())>0){
                    _oRow.find(oTBJournal.cr).find('input.numeric').val('0.00');
                }
            }else{

                if(getFloat(_oRow.find(oTBJournal.cr).find('input.numeric').val())>0) {
                    _oRow.find(oTBJournal.dr).find('input.numeric').val('0.00');
                }
            }


            reComputeTotals($('#tbl_entries'));
        });


        $('#tbl_accounts_receivable').on('click','button[name="cancel_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.journal_id;
            $('#modal_confirmation').modal('show');
        });


        $('#btn_yes').click(function(){
            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"General_journal/transaction/cancel",
                "data":{journal_id : _selectedID},
                "success": function(response){
                    showNotification(response);
                    if(response.stat=="success"){
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                    }

                }
            });
        });


        $('#tbl_accounts_receivable').on('click','button[name="edit_info"]',function(){
            _txnMode="edit";

            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.journal_id;


            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name){
                        _elem.val(value);
                    }
                });
            });


           _cboParticulars.select2('val',data.particular_id);

            $.ajax({
                url: 'General_journal/transaction/get-entries?id=' + data.journal_id,
                type: "GET",
                cache: false,
                dataType: 'html',
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('#tbl_entries > tbody').html('<tr><td align="center" colspan="4"><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></td></tr>');
                }
            }).done(function(response){
                $('#tbl_entries > tbody').html(response);
                reInitializeNumeric();
                reInitializeDropDownAccounts($('#tbl_entries'));
                reComputeTotals($('#tbl_entries'));
            });




            showList(false);

        });





        $('#tbl_entries').on('click','button.remove_account',function(){
            var oRow=$('#tbl_entries > tbody tr');

            if(oRow.length>1){
                $(this).closest('tr').remove();
            }else{
                showNotification({"title":"Error!","stat":"error","msg":"Sorry, you cannot remove all rows."});
            }

            reComputeTotals($('#tbl_entries'));

        });


        $('#btn_save').click(function(){
            var btn=$(this);
            var f=$('#frm_journal');

            if(validateRequiredFields(f)){
                if(_txnMode=="new"){
                    createJournal().done(function(response){
                        showNotification(response);
                        if(response.stat=="success"){
                            dt.row.add(response.row_added[0]).draw();
                            clearFields(f);
                            showList(true);
                        }

                    }).always(function(){
                        showSpinningProgress(btn);
                    });
                }else{
                    updateJournal().done(function(response){
                        showNotification(response);
                        if(response.stat=="success"){
                            dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                            clearFields(f);
                            showList(true);
                        }

                    }).always(function(){
                        showSpinningProgress(btn);
                    });
                }

            }

        });


        $('#btn_cancel').click(function(){
            showList(true);
        });




    }();











    //*********************************************************************8
    //              user defines



    var createJournal=function(){
        var _data=$('#frm_journal').serializeArray();
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"General_journal/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))

        });
    };


    var updateJournal=function(){
        var _data=$('#frm_journal').serializeArray();
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"General_journal/transaction/update?id="+_selectedID,
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };


    var showList=function(b){
        if(b){
            $('#div_payable_list').show();
            $('#div_payable_fields').hide();
        }else{
            $('#div_payable_list').hide();
            $('#div_payable_fields').show();
        }
    };

    var clearFields=function(f){
        $('input,textarea',f).val('');
        //$(f).find('select').select2('val',null);
        $(f).find('input:first').focus();
        $('#tbl_entries > tbody tr').slice(2).remove();

        $('#tbl_entries > tfoot tr').find(oTFSummary.dr).html('<b>0.00</b>');
        $('#tbl_entries > tfoot tr').find(oTFSummary.cr).html('<b>0.00</b>');
    };

    //initialize numeric text
    function reInitializeNumeric(){
        $('.numeric').autoNumeric('init');
    };

    function reInitializeDropDownAccounts(tbl){
        tbl.find('select.selectpicker').select2({
            placeholder: "Please select account.",
            allowClear: false
        });
    };


    function reInitializeSpecificDropDown(elem){
        elem.select2({
            placeholder: "Please select item.",
            allowClear: false
        });
    };

    var showSpinningProgress=function(e){
        $(e).toggleClass('disabled');
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };


    var reComputeTotals=function(tbl){
        var oRows=tbl.find('tbody tr');
        var _DR_amount=0.00; var _CR_amount=0.00;

        $.each(oRows,function(i,value){
            _DR_amount+=getFloat($(this).find(oTBJournal.dr).find('input.numeric').val());
            _CR_amount+=getFloat($(this).find(oTBJournal.cr).find('input.numeric').val());


        });



        tbl.find('tfoot tr').find(oTFSummary.dr).html('<b>'+accounting.formatNumber(_DR_amount,2)+'</b>');
        tbl.find('tfoot tr').find(oTFSummary.cr).html('<b>'+accounting.formatNumber(_CR_amount,2)+'</b>');

    };

    var getFloat=function(f){
        return parseFloat(accounting.unformat(f));
    };


    var showNotification=function(obj){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };


    var validateRequiredFields=function(f){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required],select[required]',f).each(function(){

            if($(this).is('select')){
                if($(this).select2('val')==0||$(this).select2('val')==null){
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


        if(!isBalance()){
            showNotification({title:"Error!",stat:"error",msg:'Please make sure Debit and Credit amount are equal.'});
            stat=false;
        }

        return stat;
    };


    var isBalance=function(){
        var oRow=$('#tbl_entries > tfoot tr');
        var dr=getFloat(oRow.find(oTFSummary.dr).text());
        var cr=getFloat(oRow.find(oTFSummary.cr).text());

        return (dr==cr);
    };




});


</script>

</body>

</html>