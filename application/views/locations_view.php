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

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
    <link type="text/css" href="assets/css/dark-theme.css" rel="stylesheet">

    <style>

        html {
            zoom: 0.8;
            zoom: 80%;
        }

        .page-content > .breadcrumb {
            margin-bottom: 1px!important; 
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
                        <li><a href="locations">Locations</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">

                                    <div id="div_location_list">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Locations Management</b>
                                            </div>
                                            <div class="panel-body table-responsive">

                                                <table id="tbl_locations" cellspacing="0" width="100%">

                                                    <thead>
                                                    <tr>
                                                        <th>Location Name</th>
                                                        <th width="7%"><center>Action</center></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="panel-footer"></div>
                                        </div>
                                    </div>

                                    <div id="div_location_fields" class="col-xs-12 col-md-5 col-md-offset-3" style="display: none;">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h2>location Information</h2>
                                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                                            </div>

                                            <div class="panel-body">
                                                <form id="frm_location" role="form" class="form-horizontal row-border">
                                                    <div class="form-group">
                                                        <div style="padding-left: 10px;">
                                                            <strong>* Location Name :</strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-map-marker  "></i>
                                                                </span>
                                                                <input type="text" name="location_name" class="form-control" placeholder="Location Name" data-error-msg="Location name is required!" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                </form>
                                            </div>

                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-4">
                                                        <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;""><span class=""></span>  Save Changes</button>
                                                        <button id="btn_cancel" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"">Cancel</button>
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

            <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Confirm Deletion</h4>
                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

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

<script src="assets/plugins/spinner/dist/spin.min.js"></script>
<script src="assets/plugins/spinner/dist/ladda.min.js"></script>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script>

$(document).ready(function(){
    var dt; var _txnMode; var _selectedID; var _selectRowObj;

    var initializeControls=function(){
        dt=$('#tbl_locations').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax" : "Locations/transaction/list",
            "language": {
                "searchPlaceholder":"Search Location"
            },
            "columns": [

                { targets:[0],data: "location_name" },
                {
                    targets:[1],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+'&nbsp;'+btn_trash+'</center>';
                    }
                }
            ]
        });

        var createToolBarButton=function(){
            var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New location" >'+
                '<i class="fa fa-plus"></i> New Location</button>';
            $("div.toolbar").html(_btnNew);
        }();
    }();

    var bindEventHandlers=(function(){
        var detailRows = [];

        $('#tbl_locations tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );

                row.child( format( row.data() ) ).show();

                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );

        $('#btn_new').click(function(){
            _txnMode="new";
            clearFields('#frm_location');
            showList(false);
        });

        $('#tbl_locations tbody').on('click','button[name="edit_info"]',function(){
            _txnMode="edit";
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.location_id;

            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name){
                        _elem.val(value);
                    }
                });
            });
            showList(false);
        });

        $('#tbl_locations tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.location_id;

            $('#modal_confirmation').modal('show');
        });

        $('#btn_yes').click(function(){
            removeLocation().done(function(response){
                showNotification(response);
                dt.row(_selectRowObj).remove().draw();
            });
        });

        $('input[name="file_upload[]"]').change(function(event){
            var _files=event.target.files;

            $('#div_img_location').hide();
            $('#div_img_loader').show();

            var data=new FormData();
            $.each(_files,function(key,value){
                data.append(key,value);
            });

            console.log(_files);

            $.ajax({
                url : 'Locations/transaction/upload',
                type : "POST",
                data : data,
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response){
                    $('#div_img_loader').hide();
                    $('#div_img_location').show();
                }
            });
        });

        $('#btn_cancel').click(function(){
            showList(true);
        });

        $('#btn_save').click(function(){
            if(validateRequiredFields()){
                if(_txnMode=="new"){
                    createLocation().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields();
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }else{
                    updateLocation().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields();
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }
            }
        });
    })();

    var validateRequiredFields=function(){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea','#frm_location').each(function(){
            if($(this).val()==""){
                showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                $(this).closest('div.form-group').addClass('has-error');
                stat=false;
                return false;
            }
        });
        return stat;
    };

    var createLocation=function(){
        var _data=$('#frm_location').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Locations/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var updateLocation=function(){
        var _data=$('#frm_location').serializeArray();
        _data.push({name : "location_id" ,value : _selectedID});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Locations/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var removeLocation=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Locations/transaction/delete",
            "data":{location_id : _selectedID}
        });
    };

    var showList=function(b){
        if(b){
            $('#div_location_list').show();
            $('#div_location_fields').hide();
        }else{
            $('#div_location_list').hide();
            $('#div_location_fields').show();
        }
    };

    var showNotification=function(obj){
        PNotify.removeAll();
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };

    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var clearFields=function(){
        $('input[required],textarea','#frm_location').val('');
        $('form').find('input:first').focus();
    };

    function format ( d ) {
        return '<br /><table style="margin-left:10%;width: 80%;">' +
        '<thead>' +
        '</thead>' +
        '<tbody>' +
        '<tr>' +
        '<td>Location Name : </td><td><b>'+ d.location_name+'</b></td>' +
        '</tr>' +
        '</tbody></table><br />';
    };
});

</script>

</body>

</html>