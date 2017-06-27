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

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">
    <style>
        html {
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

        .nav-tabs {
            border-bottom: none;
        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
            color: white;
            font-weight: bolder;
            background: transparent;
            border-top: 2px solid orange;
            border-bottom: none;
        }

        .nav-tabs > li > a {
            border: 1px solid white;
            border-top-width: 2px;
            color: white;
        }

        .nav-tabs > li > a:hover {
            border: 1px solid white;
            border-top: 2px solid #2196f3; 
            background: transparent;
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

        .select2-container--default .select2-selection--single {
            height: 32px;
        }

    </style>
    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/dark-theme.css">

</head>

<body class="animated-content">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">

        <?php echo $_side_bar_navigation;?>

        <div class="static-content-wrapper white-bg">
            <div class="static-content"  >
                <div class="page-content"><!-- #page-content -->
                    <ol class="breadcrumb">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="Bank_reconciliation">Bank Reconciliation</a></li>
                    </ol>
                    <div class="container-fluid">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Bank Reconciliation</b> 
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="container-fluid">
                                        <ul class="nav nav-tabs">
                                          <li class="active text-center"><a data-toggle="tab" href="#outstanding">Outstanding Check</a></li>
                                          <li class="text-center"><a data-toggle="tab" href="#bank_reconciliation_tab">Bank Reconciliation</a></li>
                                        </ul>

                                        <div class="tab-content" style="background: transparent!important;">
                                          <div id="outstanding" class="tab-pane fade in active">
                                            <div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px;">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <div class="col-xs-12 col-sm-4">
                                                            <strong>* Bank:</strong><br>
                                                            <select id="cbo_bank" class="form-control">
                                                                <?php foreach($banks as $bank) { ?>
                                                                    <option value="<?php echo $bank->bank_id; ?>"><?php echo $bank->bank_name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4">
                                                            <strong>* Start Date</strong><br>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input id="startDate" type="text" class="date-picker form-control" name="start_date" data-error-msg="Start Date is required" value="<?php echo date('m/d/Y'); ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4">
                                                            <strong>* End Date</strong><br>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input id="endDate" type="text" class="date-picker  form-control" name="end_date" data-error-msg="End Date is required" value="<?php echo date('m/d/Y'); ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <div class="container-fluid group-box">
                                                            <span><strong><i class="fa fa-list"></i> ISSUED CHECKS</strong></span><hr>
                                                            <table id="tbl_bank_reconciliation" width="100%">
                                                                <thead>
                                                                    <th>Check #</th>
                                                                    <th>Txn Date</th>
                                                                    <th>Check Date</th>
                                                                    <th>Particular</th>
                                                                    <th>Book</th>
                                                                    <th>Department</th>
                                                                    <th>Ref #</th>
                                                                    <th align="right">Amount</th>
                                                                    <th width="7%">Outstanding</th>
                                                                    <th width="7%">Good Check</th>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                            <hr>
                                                            <button class="btn btn-primary" style="min-width: 100px;"><i class="fa fa-check"></i> Process</button> 
                                                        </div>
                                                    </div>
                                                </div>                                                                
                                                </div>
                                          </div>
                                          <div id="bank_reconciliation_tab" class="tab-pane fade">
                                            <div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px;">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="container-fluid group-box" style="padding: 15px 15px 0 15px;">
                                                                <b><span class="fa fa-bars"></span> JOURNAL</b><hr>
                                                                <strong>ACCOUNT TO RECONCILE</strong>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <select id="cbo_accounts" class="form-control" name="account_id">
                                                                            <?php foreach($account_titles as $account_title) { ?>
                                                                                <option value="<?php echo $account_title->account_id; ?>"><?php echo $account_title->account_title; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control text-right" name="account_balance" value="0.00" disabled>
                                                                    </div>
                                                                </div><hr>
                                                                <h5><b>DEDUCT :</b></h5>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <label>BANK SERVICE CHARGE</label>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control text-right" name="account_balance" value="0.00">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <label>NSF CHECKS</label>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control text-right" name="account_balance" value="0.00" >
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <label>CHECK PRINTING CHARGE</label>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control text-right" name="account_balance" value="0.00" >
                                                                    </div>
                                                                </div><hr>
                                                                <h5><b>ADD :</b></h5>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <label>INTEREST EARNED</label>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control text-right" name="account_balance" value="0.00" >
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <label>NOTES RECEIVABLE COLLECTED (BY BANK)</label>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control text-right" name="account_balance" value="0.00" >
                                                                    </div>
                                                                </div><hr>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <label>ADJUSTED COLLECTED BALANCE</label>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control text-right" name="account_balance" value="0.00" disabled>
                                                                    </div>
                                                                </div><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="container-fluid group-box" style="padding: 15px 15px 0 15px;">
                                                                <b><span class="fa fa-bars"></span> BANK STATEMENT</b><hr>
                                                                <strong>CURRENT BANK ACCOUNT</strong>
                                                                <input type="text" class="form-control" name="current_bank_account" disabled>
                                                                <strong>ACTUAL BALANCE</strong>
                                                                <input type="text" class="form-control text-right" name="actual_balance" value="0.00"><hr>
                                                                <h5><b>DEDUCT :</b></h5>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <label>OUTSTANDING CHECKS</label>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input id="txtOutstandingChecks" type="text" class="form-control text-right" name="account_balance" value="0.00" disabled>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h5><b>ADD :</b></h5>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <label>DEPOSIT IN TRANSIT</label>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control text-right" name="account_balance" value="0.00">
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <label>ADJUSTED COLLECTED BALANCE</label>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control text-right" name="account_balance" value="0.00" disabled>
                                                                    </div>
                                                                </div><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                        <li><h6 style="margin: 0;">&copy; 2017 - JDEV IT Business Solutions</h6></li>
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

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>

<script>

$(document).ready(function(){
    var dt; var _cboBank; var _cboAccounts;

    var initializeControls=function(){
        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        _cboBank=$('#cbo_bank').select2({
            allowClear: true,
            placeholder: 'Please Select Bank'
        });

        _cboAccounts=$('#cbo_accounts').select2({
            allowClear: true,
            placeholder: 'Please Select Bank'
        });

        var data = _cboAccounts.select2('data');
        $('input[name="current_bank_account"]').val(data[0].text);

        reinitializeDataTable();
    }();

    function reinitializeDataTable(){
        dt=$('#tbl_bank_reconciliation').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "language":{
                "searchPlaceholder":"Search Checks"
            },
            "ajax":{
                "url":"Bank_reconciliation/transaction/list",
                "type":"GET",
                "bDestroy":true,
                "data": function (d) {
                    return $.extend({}, d, {
                        "sDate":$('#startDate').val(),
                        "eDate":$('#endDate').val(),
                        "bankid":_cboBank.select2('val')
                    });
                }
            },
            "columns":[
                { targets:[0],data: "check_no" },
                { targets:[1],data: "date_txn" },
                { targets:[2],data: "check_date" },
                { targets:[3],data: "particular" },
                { targets:[4],data: "book_type" },
                { targets:[5],data: "department_name" },
                { targets:[6],data: "txn_no" },
                { 
                    class: "text-right",
                    targets:[7],data: "amount",
                    render: function(data,type,full,meta) {
                        return accounting.formatNumber(data,2);
                    }
                },
                { 
                    class: "text-center",
                    targets:[8], 
                    render: function(data,type,full,meta) {
                        return '<button name="outstanding" class="btn btn-danger outstanding_'+ full.check_no +'"><i class="fa fa-times"></i></button>'
                    }
                },
                { 
                    class: "text-center",
                    targets:[9],
                    render: function(data,type,full,meta) {
                        return '<button name="good_check" class="btn btn-danger good_check_'+ full.check_no +'"><i class="fa fa-times"></i></button>'
                    }
                }
            ]
        });
    };

    var bindEventHandlers=function(){
        $('#btn_cancel').click(function(){
            $('#modal_bank').modal('hide');
            clearFields($('#frm_bank'));
        });

        _cboAccounts.on('change', function(){
            var data = _cboAccounts.select2('data');
            $('input[name="current_bank_account"]').val(data[0].text);
        });

        $('#tbl_bank_reconciliation tbody').on('click', 'td button', function(evt){
            var _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            var _checkNo=data.check_no;

            var _outstandingButtonRow = $('.outstanding_'+_checkNo);
            var _goodCheckButtonRow = $('.good_check_'+_checkNo);

            if(_outstandingButtonRow.hasClass('btn-danger')){
                _outstandingButtonRow.removeClass('btn-danger');
                _outstandingButtonRow.addClass('btn-success').html('<i class="fa fa-check"></i>');

                _goodCheckButtonRow.removeClass('btn-success');
                _goodCheckButtonRow.addClass('btn-danger').html('<i class="fa fa-times"></i>');
            } else {
                _outstandingButtonRow.removeClass('btn-success');
                _outstandingButtonRow.addClass('btn-danger').html('<i class="fa fa-times"></i>');

                _goodCheckButtonRow.removeClass('btn-danger');
                _goodCheckButtonRow.addClass('btn-success').html('<i class="fa fa-check"></i>');
            }
        });

        _cboBank.on('select2:select', function(){
            dt.destroy();
            reinitializeDataTable();
        });

        $('#startDate').on('change',function(){
            dt.destroy();
            reinitializeDataTable();
        });

        $('#endDate').on('change',function(){
            dt.destroy();
            reinitializeDataTable();
        });
    }();

    var clearFields=function(f){
        $('input,textarea,select',f).val('');
        $(f).find('input:first').focus();
    };
});

</script>

</body>

</html>
               