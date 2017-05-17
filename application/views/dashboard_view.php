<html lang="en">

<!-- Mirrored from avenxo.kaijuthemes.com/ui-typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:09:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>JCORE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">


   <?php echo $_def_css_files; ?>

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">


    <style>
    html{
        zoom: 0.8;
        zoom: 80%;
    }

    .chat-box {
        position: fixed;
        width: 25%;
        z-index: 9999999;
        bottom: -30px;
        right: 100px;
    }

    .label {
        max-width: 250px;
        word-wrap:break-word;
        white-space:normal;
        text-align: left;
        border-radius: 10px;
        margin: 5px;
        padding: 10px;
        font-size: 14px;
        text-transform: none;
    }

    .send-link {
        font-size: 20px;
        color: #2196f3;
    }

    .message-wrapper {
        padding-left: 0;
    }

    .ti-close {
        transition: .25s ease-in-out;;
    }

    .chat-title {
        font-weight: 600;
        color: white;
    }

    .chat-box-button {
        -webkit-box-shadow: 0px 0px 18px 0px rgba(158,152,152,1);
        -moz-box-shadow: 0px 0px 18px 0px rgba(158,152,152,1);
        box-shadow: 0px 0px 18px 0px rgba(158,152,152,1);
        padding: 10px 15px 5px 15px;
        font-size: 40px;
        border-radius: 50%;
    }

    #chat_msg {
        border: none!important;
        background-color: transparent!important;
    }

    #chat_msg:focus {
        -webkit-box-shadow: 0px 0px 18px 0px rgba(158,152,152,0)!important;
        -moz-box-shadow: 0px 0px 18px 0px rgba(158,152,152,0)!important;
        box-shadow: 0px 0px 18px 0px rgba(158,152,152,0)!important;
    }

    .chat-box-button-wrapper {
        position: fixed;
        bottom: 30px;
        right: 15px;
        z-index: 9999999;
    }

    .chat-box-body {
        height: 400px!important;
        max-height: 400px;
        overflow-y: scroll;
    }

    .chat-box-footer {
        background-color: white!important;
    }

    .toolbar{
        float: left;
    }

    .btn-white {
        background: white none repeat scroll 0 0;
        border: 1px solid #e7eaec;
        color: inherit;
        text-transform: none;
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

    h4 {
        color:white;
    }

    h3 {
        font-weight: 200;
    }

    h2 {
        color:white;
    }

    #panel1 {
        background: #f4efed;
        height: auto;
        color: white;
        font-size: 20px;
        margin-bottom: 30px;
        padding: 0;
        height: 250px;
        -webkit-box-shadow: 0px 10px 10px 0px #607d8b !important;
        -moz-box-shadow: 0px 10px 10px 0px #607d8b !important;
        box-shadow: 0px 10px 10px 0px #607d8b !important;
    }

    #panel2 {
        background: #fff8ee;
        height: auto;
        color: white;
        font-size: 20px;
        margin-bottom: 30px;
        padding: 0;
        height: 250px;
        -webkit-box-shadow: 0px 10px 10px 0px #607d8b !important;
        -moz-box-shadow: 0px 10px 10px 0px #607d8b !important;
        box-shadow: 0px 10px 10px 0px #607d8b !important;
    }

    #panel3 {
        background: #f4efed;
        height: auto;
        color: white;
        font-size: 20px;
        margin-bottom: 30px;
        padding: 0;
        height: 250px;
        -webkit-box-shadow: 0px 10px 10px 0px #607d8b !important;
        -moz-box-shadow: 0px 10px 10px 0px #607d8b !important;
        box-shadow: 0px 10px 10px 0px #607d8b !important;
    }

    #panel4 {
        background: #f4efed;
        height: auto;
        color: white;
        font-size: 20px;
        margin-bottom: 30px;
        padding: 0;
        height: auto;
        -webkit-box-shadow: 0px 10px 10px 0px #607d8b !important;
        -moz-box-shadow: 0px 10px 10px 0px #607d8b !important;
        box-shadow: 0px 10px 10px 0px #607d8b !important;
    }

    #panel5 {
        background: #f4efed;
        height: auto;
        color: white;
        font-size: 20px;
        margin-bottom: 30px;
        padding: 0;
        height: auto;
        -webkit-box-shadow: 0px 10px 10px 0px #607d8b !important;
        -moz-box-shadow: 0px 10px 10px 0px #607d8b !important;
        box-shadow: 0px 10px 10px 0px #607d8b !important;
    }

    #panel1:hover {
        /*background: #d5c0b8;*/
    }

    #panel1:hover #panelheader1 {
        background: #ff5722;
    }

    #panel1:hover #panelfooter1 {
        background: #00626e;
    }

    #panel2:hover {
        /*background: rgba(198,201,10,1);*/
    }

    #panel2:hover #panelheader2 {
        background: #00a797;
    }

    #panel2:hover #panelfooter2 {
        background: #00626e;
    }

    #panel3:hover {
        /*background: rgba(169,3,41,1);*/
    }

    #panel3:hover #panelheader3 {
        background: #2196f3;
    }

    #panel3:hover #panelfooter3 {
        background: #00626e;
    }

    #panel4:hover {
        /*background: rgba(242,186,186,1);*/
    }

    #panel4:hover #panelheader4 {
        background: #795548;
    }

    #panel5:hover {
        /*background: rgba(242,186,186,1);*/
    }

    #panel5:hover #panelheader5 {
        background: #607d8b;
    }

    #panelheader1 {
        background: #ff7e55;
        height: 50px;
    }

    #paneltitle1 {
        color: #FFF;
        padding-top: 10px;
        font-size: 18px;
        text-transform: uppercase;
        font-family: calibri;
        font-weight: bold;
    }

    #paneltitle1 i {
        font-size: 25px;
    }

    #panelbody1 {
        padding-left: 16px;
        padding-right: 16px;
    }

    #panelbody1 h2 {
        color: #ff7e55;
        font-weight: bold;
    }

    #panelfooter1 {
        background: #008fa1;
        margin: 0;
        padding: 0;
        height: 70px;
    }

    #panelfooter1 small {
        color: #90f2ff;
    }

    #panelfooter1 h4 {
        color: #90f2ff;
        font-weight: bold;
    }

    #panelheader2 {
        background: #00c9b6;
        height: 50px;
    }

    #paneltitle2 {
        color: #FFF;
        padding-top: 10px;
        font-size: 18px;
        text-transform: uppercase;
        font-family: calibri;
        font-weight: bold;
    }

    #paneltitle2 i {
        font-size: 25px;
    }

    #panelbody2 {
        padding-left: 16px;
        padding-right: 16px;
    }

    #panelbody2 h2 {
        color: #00c9b6;
        font-weight: bold;
    }

    #panelfooter2 {
        background: #008fa1;
        margin: 0;
        padding: 0;
        height: 70px;
    }

    #panelfooter2 small {
        color: #90f2ff;
    }

    #panelfooter2 h4 {
        color: #90f2ff;
        font-weight: bold;
    }

    #panelheader3 {
        background: #51adf6;
        height: 50px;
    }

    #paneltitle3 {
        color: #FFF;
        padding-top: 10px;
        font-size: 15px;
        text-transform: uppercase;
        font-family: calibri;
        font-weight: bold;
    }

    #paneltitle3 i {
        font-size: 25px;
    }

    #panelbody3 {
        padding-left: 16px;
        padding-right: 16px;
        height: auto;
    }

    #panelbody3 h2 {
        color: #51adf6;
        font-weight: bold;
        margin-top: 0px;
        padding-bottom: 35px;
    }

    #panelbody3 h3 {
        color: #00bcd4;
    }

    #panelfooter3 {
        background: #008fa1;
        margin: 0;
        padding-top: 5px;
        padding-left: 0px;
        height: 70px;
    }

    #panelfooter3 small {
        color: #90f2ff;
    }

    #panelfooter3 h4 {
        color: #90f2ff;
        font-weight: bold;
        margin: 0;
    }

    #panelheader4 {
        background: #996b5b;
        height: 50px;
    }

    #paneltitle4 {
        color: #FFF;
        padding-top: 10px;
        font-size: 18px;
        text-transform: uppercase;
        font-family: calibri;
        font-weight: bold;
    }

    #paneltitle4 i {
        font-size: 25px;
    }

    #panelheader5 {
        background: #7a96a3;
        height: 50px;
    }

    #paneltitle5 {
        color: #FFF;
        padding-top: 10px;
        font-size: 18px;
        text-transform: uppercase;
        font-family: calibri;
        font-weight: bold;
    }

    #paneltitle5 i {
        font-size: 25px;
    }

    /*.panel-body {
        background: rgba(250,247,215,1);
        background: -moz-linear-gradient(left, rgba(250,247,215,1) 0%, rgba(255,255,255,1) 72%, rgba(255,255,255,1) 100%);
        background: -webkit-gradient(left top, right top, color-stop(0%, rgba(250,247,215,1)), color-stop(72%, rgba(255,255,255,1)), color-stop(100%, rgba(255,255,255,1)));
        background: -webkit-linear-gradient(left, rgba(250,247,215,1) 0%, rgba(255,255,255,1) 72%, rgba(255,255,255,1) 100%);
        background: -o-linear-gradient(left, rgba(250,247,215,1) 0%, rgba(255,255,255,1) 72%, rgba(255,255,255,1) 100%);
        background: -ms-linear-gradient(left, rgba(250,247,215,1) 0%, rgba(255,255,255,1) 72%, rgba(255,255,255,1) 100%);
        background: linear-gradient(to right, rgba(250,247,215,1) 0%, rgba(255,255,255,1) 72%, rgba(255,255,255,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#faf7d7', endColorstr='#ffffff', GradientType=1 );
    }

    .static-content-wrapper {
        background: rgba(250,247,215,1);
        background: -moz-linear-gradient(left, rgba(250,247,215,1) 0%, rgba(255,255,255,1) 72%, rgba(255,255,255,1) 100%);
        background: -webkit-gradient(left top, right top, color-stop(0%, rgba(250,247,215,1)), color-stop(72%, rgba(255,255,255,1)), color-stop(100%, rgba(255,255,255,1)));
        background: -webkit-linear-gradient(left, rgba(250,247,215,1) 0%, rgba(255,255,255,1) 72%, rgba(255,255,255,1) 100%);
        background: -o-linear-gradient(left, rgba(250,247,215,1) 0%, rgba(255,255,255,1) 72%, rgba(255,255,255,1) 100%);
        background: -ms-linear-gradient(left, rgba(250,247,215,1) 0%, rgba(255,255,255,1) 72%, rgba(255,255,255,1) 100%);
        background: linear-gradient(to right, rgba(250,247,215,1) 0%, rgba(255,255,255,1) 72%, rgba(255,255,255,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#faf7d7', endColorstr='#ffffff', GradientType=1 );
    }*/

    .panel-body p {
        font-size: 45px;
        font-family: source sans pro, segoe ui, droid sans, tahoma, arial, sans-serif;
        font-weight: 200;
    }

    #intro h3 {
        font-family: source sans pro, segoe ui, droid sans, tahoma, arial, sans-serif;
        font-weight: 200;
    }

    #intro b {
        font-weight: 500;
    }

    #line {
        height: 5px;
        background: rgba(71,46,2,1);
        background: -moz-linear-gradient(left, rgba(71,46,2,1) 0%, rgba(255,255,255,1) 62%, rgba(255,255,255,1) 100%);
        background: -webkit-gradient(left top, right top, color-stop(0%, rgba(71,46,2,1)), color-stop(62%, rgba(255,255,255,1)), color-stop(100%, rgba(255,255,255,1)));
        background: -webkit-linear-gradient(left, rgba(71,46,2,1) 0%, rgba(255,255,255,1) 62%, rgba(255,255,255,1) 100%);
        background: -o-linear-gradient(left, rgba(71,46,2,1) 0%, rgba(255,255,255,1) 62%, rgba(255,255,255,1) 100%);
        background: -ms-linear-gradient(left, rgba(71,46,2,1) 0%, rgba(255,255,255,1) 62%, rgba(255,255,255,1) 100%);
        background: linear-gradient(to right, rgba(71,46,2,1) 0%, rgba(255,255,255,1) 62%, rgba(255,255,255,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#472e02', endColorstr='#ffffff', GradientType=1 );
    }

    </style>

</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
        <div id="layout-static">
        <?php echo $_side_bar_navigation; ?>


        <div class="static-content-wrapper">
            <div class="static-content">
                    <div class="page-content"><!-- #page-content -->

                        <div class="chat-box-button-wrapper">
                            <button id="btn_open_chat" class="btn btn-warning chat-box-button">
                                <span class="ti ti-comments"></span>
                            </button>
                        </div>
                        <div id="chat_box" class="panel panel-default chat-box hidden">
                            <div class="panel-heading">
                                <span class="chat-title"><strong style="color: #9bcb64;">&bull;</strong> Active <span id="active_count"></span></span>
                            </div>
                            <div id="chat_body" class="panel-body chat-box-body">
                            </div>
                            <div class="panel-footer chat-box-footer">
                                <div class="col-xs-10 message-wrapper">
                                    <input id="chat_msg" class="form-control" type="text" name="chat_message" placeholder="Enter Message Here">
                                </div>
                                <div class="col-xs-2">
                                    <a id="btn_send" class="send-link"><span class="fa fa-paper-plane"></span></a>
                                </div>
                            </div>
                        </div>

                            <div data-widget-group="group1">
                                <div class="row">
                                    <div class="col-md-12">

                                    <div class="panel panel-default">

                                            <div class="panel-body table-responsive">
                                            <p>Overview</p>
                                            <div id="intro">
                                                <h3>Hi
                                                    <b>
                                                        <?php foreach($company_info as $company_info){ ?>
                                                            <?php echo $company_info->company_name; ?>
                                                        <?php } ?>
                                                    </b>
                                                    !, here is a rundown of your business' performance<br>and how your collections are doing individually. 
                                                </h3>
                                                <div id="line"></div>
                                            </div>
                                            <br>
                                            <h3>Company Snapshot</h3>
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="col-md-12" id="panel1">
                                                            <div class="col-md-12" id="panelheader1">
                                                                <div id="paneltitle1">
                                                                    <i class="fa fa-line-chart"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income (Current Month)
                                                                </div>
                                                            </div>
                                                            <div id="panelbody1">
                                                                <h2 class="m-b-xs">
                                                                    <?php echo number_format($income_current_month,2); ?>
                                                                </h2><br>
                                                                <div id="sparkline1" class="m-b-sm"></div>
                                                            </div>
                                                            <div class="col-md-12" id="panelfooter1">
                                                                <div class="col-xs-4">
                                                                    <small class="stats-label">This Day</small>
                                                                    <h4><?php echo number_format($income_this_day,2); ?></h4>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <small class="stats-label">Yesterday</small>
                                                                    <h4><?php echo number_format($income_yesterday,2); ?></h4>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <small class="stats-label">Last week</small>
                                                                    <h4><?php echo number_format($income_last_week,2); ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="col-md-12" id="panel2">
                                                            <div class="col-md-12" id="panelheader2">
                                                                <div id="paneltitle2">
                                                                    <i class="fa fa-line-chart"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income (Last Month)
                                                                </div>
                                                            </div>
                                                            <div id="panelbody2">
                                                                <h2 class="m-b-xs">
                                                                    <?php echo number_format($income_last_month,2); ?>
                                                                </h2><br>
                                                                <div id="sparkline2" class="m-b-sm"></div>
                                                            </div>
                                                            <div class="col-md-12" id="panelfooter2">
                                                                <div class="col-xs-4">
                                                                    <small class="stats-label">This Day</small>
                                                                    <h4><?php echo number_format($this_day_percentage,0); ?>%</h4>
                                                                </div>

                                                                <div class="col-xs-4">
                                                                    <small class="stats-label">Yesterday</small>
                                                                    <h4><?php echo number_format($yesterday_percentage,0); ?>%
                                                                    </h4>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <small class="stats-label">Last week</small>
                                                                    <h4><?php echo number_format($last_week_percentage,0); ?>%</h4>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="col-md-12" id="panel3">
                                                            <div class="col-md-6" id="panelheader3">
                                                                <div id="paneltitle3">
                                                                    <i class="fa fa-bolt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income (Last Year)
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" id="panelheader3">
                                                                <div id="paneltitle3">
                                                                    <i class="fa fa-bolt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income (Current Year)
                                                                </div>
                                                            </div>
                                                            <div id="panelbody3">
                                                                <div class="col-sm-6" style="padding: 0;margin: 0;">
                                                                    <h2><?php echo number_format($income_last_year,2); ?></h2>
                                                                    
                                                                    <h3><?php echo $last_year_income_percentage; ?>% <i class="fa fa-bolt"></i></h3>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <h2><?php echo number_format($income_this_year,2); ?></h2>
                                                                    
                                                                    <h3><?php echo $this_year_income_percentage; ?>% <i class="fa fa-bolt"></i></h3>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12" id="panelfooter3">
                                                                <!-- <table class="table small m-t-sm">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <h4><?php echo number_format($total_last_year_client,0); ?> Clients</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4><?php echo number_format($total_current_year_client,0); ?> Clients</h4>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table> -->
                                                                <div class="col-sm-6">
                                                                    <h4><?php echo number_format($total_last_year_client,0); ?> Clients</h4>
                                                                </div>
                                                                <div class="col-sm-6" style="padding-left: 25px;">
                                                                    <h4><?php echo number_format($total_current_year_client,0); ?> Clients</h4>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                                <br />

                                                <div class="col-md-12" style="margin: 0;padding: 0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="col-md-12" id="panel4">
                                                                <div class="col-md-12" id="panelheader4">
                                                                    <div id="paneltitle4">
                                                                        <i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income (current year) vs Income (previous year)
                                                                    </div>
                                                                </div><br><br><br>
                                                                <div class="col-md-12" id="panelbody4">
                                                                    <div>
                                                                        <canvas id="lineChart" height="140"></canvas>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col-md-12" id="panel5">
                                                                <div class="col-md-12" id="panelheader5">
                                                                    <div id="paneltitle5">
                                                                        <i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income vs Expense (current year)
                                                                    </div>
                                                                </div><br><br><br>
                                                                <div class="col-md-12" id="panelbody5" style="padding-top: 5px;">
                                                                    <div>
                                                                        <canvas id="barChart" height="140"></canvas>
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


                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="panel panel-default <?php echo (in_array('7-1',$this->session->user_rights)?'':'hidden'); ?>">
                                        <!-- <div class="panel-heading">
                                            <h2>Purchase Order for Approval</h2>
                                        </div> -->


                                        <div class="panel-body table-responsive">
                                        <h3>Purchase Order for Approval</h2>
                                            <table id="tbl_po_list" class="custom-design table-striped" cellspacing="0" width="100%" style="background: white;">
                                                <thead class="">
                                                <tr>
                                                    <th></th>
                                                    <th><i class="fa fa-code"></i> PO#</th>
                                                    <th><i class="fa fa-users"></i> Vendor</th>
                                                    <th><i class="fa fa-calendar"></i> Terms </th>
                                                    <th><i class="fa fa-users"></i> Posted by </th>
                                                    <th style="text-align: center;"> <i class="fa fa-paperclip"></i></th>
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

                    </div> <!-- #page-content -->
            </div>


            <footer role="contentinfo">
                <div class="clearfix">
                    <ul class="list-unstyled list-inline pull-left">
                        <li><h6 style="margin: 0;">&copy; 2016 - Paul Christian Rueda</h6></li>
                    </ul>
                    <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                </div>
            </footer>




        </div>
        </div>


</div>


<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>



<!-- Sparkline -->
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- CHART -->
<script src="assets/plugins/chartJs/Chart.min.js"></script>

<!-- DATATABLE -->
<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>



<script>
    (function() {

        var sparklineCharts = function(){
            $("#sparkline1").sparkline([124, 43, 43, 35, 44, 32, 44, 52,134, 43, 43, 35, 44, 32, 44, 52,124, 43, 43, 35, 44, 32, 44, 52,134, 43, 43, 35, 44, 32, 44, 52], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#00bcd4',
                fillColor: '#00bcd4',
                lineWidth: '2',
                spotColor: '#f44336',
                maxSpotColor: '#f44336',
                minSpotColor: '#f44336',
                highlightSpotColor: '#00007f',
                highlightLineColor: '#7f007f',
                normalRangeColor: '#0000bf',
                spotRadius: '4'
            });

            $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#00bcd4',
                fillColor: '#00bcd4',
                lineWidth: '2',
                spotColor: '#f44336',
                maxSpotColor: '#f44336',
                minSpotColor: '#f44336',
                highlightSpotColor: '#00007f',
                highlightLineColor: '#7f007f',
                normalRangeColor: '#0000bf',
                spotRadius: '4'
            });

            $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#FFF',
                fillColor: "#FFF"
            });
        };

        var sparkResize;

        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineCharts, 500);
        });

        sparklineCharts();




        var data1 = [
            [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
        ];
        var data2 = [
            [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
        ];
        $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                data1,  data2
            ],
            {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,

                    borderWidth: 2,
                    color: 'transparent'
                },
                colors: ["#FFF", "#FFF"],
                xaxis:{
                },
                yaxis: {
                },
                tooltip: false
            }
        );



        var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
            datasets: [
                {
                    label: "Example dataset",
                    fillColor: "rgba(255,255,255,1)",
                    strokeColor: "rgba(255,255,255,1)",
                    pointColor: "rgba(255,255,255,1)",
                    pointStrokeColor: "rgba(255,255,255,1)",
                    pointHighlightFill: "rgba(255,255,255,1)",
                    pointHighlightStroke: "rgba(255,255,255,1)",
                    data: <?php echo json_encode($previous_year_income_monthly); ?>
                },
                {
                    label: "Example dataset",
                    fillColor: "rgba(26,179,148,0.5)",
                    strokeColor: "rgba(26,179,148,0.7)",
                    pointColor: "rgba(26,179,148,1)",
                    pointStrokeColor: "rgba(255,255,255,1)",
                    pointHighlightFill: "rgba(255,255,255,1)",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: <?php echo json_encode($current_year_income_monthly); ?>
                }
            ]
        };

        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true,
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        var myNewChart = new Chart(ctx).Line(lineData, lineOptions);



    })();
</script>

<script>
    var barData = {
        labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(255,102,0,1)",
                strokeColor: "rgba(255,102,0,1)",
                highlightFill: "rgba(255,102,0,1)",
                highlightStroke: "rgba(255,102,0,1)",
                data: <?php echo json_encode($expense_monthly); ?>
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.8)",
                highlightFill: "rgba(26,179,148,0.75)",
                highlightStroke: "rgba(26,179,148,1)",
                data: <?php echo json_encode($current_year_income_monthly); ?>
            }
        ]
    };

    var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true
    }


    var ctx = document.getElementById("barChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);
</script>

<script>

    $(document).ready(function(){
        var dt; var _selectedID; var _selectRowObj;

        var initializeControls=(function(){


            dt=$('#tbl_po_list').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Purchases/transaction/po-for-approved",
                "columns": [
                    {
                        "targets": [0],
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    { targets:[1],data: "po_no" },
                    { targets:[2],data: "supplier_name" },
                    { targets:[3],data: "term_description" },
                    { targets:[4],data: "posted_by" },
                    {
                        targets:[5],data: "attachment",
                        render: function (data, type, full, meta){

                            return '<center>'+ data +' <i class="fa fa-paperclip"></i></center>';
                        }

                    },
                    {
                        targets:[6],
                        render: function (data, type, full, meta){
                            //alert(full.purchase_order_id);

                            var btn_approved='<button class="btn btn-success btn-sm" name="approve_po"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Approved this PO"><i class="fa fa-check" style="color: white;"></i> <span class=""></span></button>';
                            var btn_conversation='<a id="link_conversation" href="Po_messages?id='+full.purchase_order_id+'" target="_blank" class="btn btn-info btn-sm"  style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Open Conversation"><i class="fa fa-envelope"></i> </a>';

                            return '<center>'+btn_approved+'&nbsp;'+btn_conversation+'</center>';
                        }
                    }
                ]
            });
        })();


        var bindEventHandlers=(function(){


            var detailRows = [];

            $('#btn_open_chat').on('click',function() {
                $('#active_count').html('<?php echo "(".$online_count.")"; ?>');
                $('#chat_box').toggleClass('hidden');
                $(this).find('span').toggleClass("ti ti-comments ti ti-close", 500, "linear");
            });

            $('#btn_send').click(function() {
                $('#chat_body').append(
                    '<div class="row">'+
                        '<div class="container-fluid">'+
                            '<div class="label label-info pull-left">'
                                +$('#chat_msg').val()+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<br>'
                );

                $('#chat_body').append(
                    '<div class="row">'+
                        '<div class="container-fluid">'+
                            '<div class="label label-success pull-right">'
                                +$('#chat_msg').val()+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<br>'
                );

                $('#chat_msg').val('');
            });

            $('#chat_msg').keydown(function(e){
                if (e.keyCode == 13) {
                    $('#chat_body').append(
                        '<div class="row">'+
                            '<div class="container-fluid">'+
                                '<div class="label label-info pull-left">'
                                    +$('#chat_msg').val()+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<br>'
                    );
                    
                    $('#chat_body').append(
                        '<div class="row">'+
                            '<div class="container-fluid">'+
                                '<div class="label label-success pull-right">'
                                    +$('#chat_msg').val()+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<br>'
                    );
                    $(this).val('');
                }
            });

            $('#tbl_po_list tbody').on( 'click', 'tr td.details-control', function () {
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
                        "url":"Templates/layout/po/"+ d.purchase_order_id+'?type=approval',
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


            //*****************************************************************************************
            $('#tbl_po_list > tbody').on('click','button[name="approve_po"]',function(){
                _selectRowObj=$(this).closest('tr'); //hold dom of tr which is selected

                var data=dt.row(_selectRowObj).data();
                _selectedID=data.purchase_order_id;

                 approvePurchaseOrder().done(function(response){
                    showNotification(response);
                    if(response.stat=="success"){
                        dt.row(_selectRowObj).remove().draw();
                    }

                });
            });


            //****************************************************************************************
            $('#tbl_po_list > tbody').on('click','button[name="mark_as_approved"]',function(){
                _selectRowObj=$(this).parents('tr').prev();
                _selectRowObj.find('button[name="approve_po"]').click();
                showSpinningProgress($(this));
            });


            //****************************************************************************************
            $('#tbl_po_list > tbody').on('click','button[name="external_link_conversation"]',function(){
                _selectRowObj=$(this).parents('tr').prev();
                _selectRowObj.find('#link_conversation').trigger("click");
                //alert(_selectRowObj.find('a[id="link_conversation"]').length);
            });




        })();






        //functions called on bindEventHandlers
        var approvePurchaseOrder=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Purchases/transaction/mark-approved",
                "data":{purchase_order_id : _selectedID}

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

        var showSpinningProgress=function(e){
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
        };



    });


</script>



</body>

</html>