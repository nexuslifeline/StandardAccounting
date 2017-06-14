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
    <link href="assets/css/dark-theme.css" rel="stylesheet">
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">

    <style>
        html {
            zoom: 0.8;
            zoom: 85%;
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
                        <li><a href="depreciation_expense">Depreciation Expense</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Depreciation Expense</b>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="container-fluid group-box">
                                            <div class="col-xs-12 col-md-4">
                                                <b>Applicable Month :</b><br>
                                                <select id="cbo_month" class="form-control">
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <b>Year :</b><br>
                                                <select id="cbo_year" class="form-control">
                                                    <?php
                                                        for($starting_year; $starting_year <= $current_year; $starting_year++) {
                                                             echo '<option value="'.$starting_year.'"';
                                                             if( $starting_year ==  $current_year ) {
                                                                    echo ' selected="selected"';
                                                             }
                                                             echo ' >'.$starting_year.'</option>';
                                                         }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="container-fluid group-box">
                                            <button class="btn btn-primary pull-left" id="btn_print"><i class="fa fa-print"></i>&nbsp; Print Report</button>
                                            <table id="tbl_depreciation" width="100%" class="">
                                                <thead>
                                                    <tr>
                                                       <th>Asset Code</th>
                                                       <th>Description</th>
                                                       <th>Date Acquired</th>
                                                       <th>Acquisition Cost</th>
                                                       <th>Life</th> 
                                                       <th>Salvage Value</th>
                                                       <th>Depreciation Expense (Monthly)</th>
                                                       <th>Accumulative Depreciation</th>
                                                       <th>Book Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div></div>
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

<script src="assets/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>

<script>

$(document).ready(function(){
    var _cboMonth, _cboYear;
    var dt;
    
    var initializeControls=function(){
        _cboMonth=$('#cbo_month').select2({
            placeholder: "Please Select Month",
            allowClear: true
        });

        _cboYear=$('#cbo_year').select2({
            placeholder: "Please Select Year",
            allowClear: true
        });

        _cboMonth.select2('val',<?php echo date('m'); ?>);
        _cboYear.select2('val',<?php echo date('Y'); ?>);

        initializeDataTable();
    }();

    function initializeDataTable() {
        dt=$('#tbl_depreciation').DataTable({
            "dom":'<"toolbar">frtip',
            "bLengthChange": false,
            "language": {
                searchPlaceholder: "Search records"
            },
            "ajax": {
                "url":"Depreciation_expense/transaction/gdr-list",
                "bDestroy":true,
                "data": function (d) {
                    return $.extend({}, d, {
                        "m":_cboMonth.val(),
                        "y":_cboYear.val()
                    });
                }
            },
            "columns": [
                { targets:[0],data: "asset_code" },
                { targets:[1],data: "asset_description" },
                { targets:[2],data: "acquired_date" },
                {
                    sClass: "text-right", 
                    targets:[3],data: "acquisition_cost",
                    render: function(data,type,full,meta){
                        return accounting.formatNumber(data,2);
                    }
                },
                { 
                    sClass: "text-center",
                    targets:[4],data: "life_years" 
                },
                { 
                    sClass: "text-right", 
                    targets:[5],data: "salvage_value",
                    render: function(data,type,full,meta){
                        return accounting.formatNumber(data,2);
                    }
                },
                { 
                    sClass: "text-right",
                    targets:[6],data: "depreciation_expense",
                    render: function(data,type,full,meta){
                        return accounting.formatNumber(data,2);
                    }
                },
                { 
                    sClass: "text-right",
                    targets:[7],data: "accu_dep",
                    render: function(data,type,full,meta){
                        return accounting.formatNumber(data,2);
                    }
                },
                { 
                    sClass: "text-right",
                    targets:[8],data: "book_value", 
                    render: function(data,type,full,meta){
                        return accounting.formatNumber(data,2);
                    }
                }
            ]
        });

        dt.order([ 1, 'asc' ]).draw();
    };

    var bindEventHandlers=function(){
        $('#btn_print').on('click', function(){
            window.open('Depreciation_expense/transaction/gdr-print?m='+_cboMonth.val()+'&y='+_cboYear.val());
        });

        _cboMonth.on('select2:select', function(){
            dt.destroy();
            initializeDataTable();
        });

        _cboYear.on('select2:select', function(){
            dt.destroy();
            initializeDataTable();
        });
    }();
});

</script>

</body>

</html>