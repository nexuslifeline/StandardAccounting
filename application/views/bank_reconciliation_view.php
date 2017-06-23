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
                                        <div class="container-fluid group-box">
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
                                                    <input type="text" class="date-picker form-control" name="start_date" data-error-msg="Start Date is required" value="<?php echo date('m/d/Y'); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4">
                                                <strong>* End Date</strong><br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" class="date-picker  form-control" name="end_date" data-error-msg="End Date is required" value="<?php echo date('m/d/Y'); ?>" required>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="container-fluid group-box">
                                            <span><strong><i class="fa fa-list"></i> ISSUED CHECKS</strong></span><hr>
                                            <table id="tbl_bank_reconciliation" width="100%">
                                                <thead>
                                                    <th width="2%"></th>
                                                    <th>Check #</th>
                                                    <th>Date</th>
                                                    <th>Particular</th>
                                                    <th align="right">Amount</th>
                                                    <th width="10%">Good Check</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table><hr>
                                            <button class="btn btn-primary" style="min-width: 100px;"><i class="fa fa-check"></i> Process</button>
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

<script>

$(document).ready(function(){
    var dt, _cboBank;

    var initializeControls=function(){
        dt=$('#tbl_bank_reconciliation').DataTable({
            bLengthChange: false,
            bFilter: false
        });

        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });

        _cboBank = $('#cbo_bank').select2({
            allowClear: true,
            placeholder: 'Please Select Bank'
        });

        _cboBank.select2('val',null);
    }();

    var bindEventHandlers=function(){
        $('#btn_cancel').click(function(){
            $('#modal_bank').modal('hide');
            clearFields($('#frm_bank'));
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