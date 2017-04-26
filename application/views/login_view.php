<!DOCTYPE html>
<html lang="en" class="coming-soon">


<head>
    <meta charset="utf-8">
    <title>JCORE - LOGIN</title>


    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/style-blessed3ef7a.css"> -->


    <style>
	    .ui-pnotify-title {
	    	color: white !important;
	    }

	    .input-group-addon {
	    	border: 1px solid #aaa!important;
	    	border-right: none!important;
	    	background: transparent!important;
	    	color: white;
	    }

	    .login-background {
	    	background: rgba(222,149,199,1);
			background: -moz-linear-gradient(left, rgba(222,149,199,1) 0%, rgba(207,116,168,1) 0%, rgba(117,82,109,1) 54%, rgba(40,53,59,1) 100%);
			background: -webkit-gradient(left top, right top, color-stop(0%, rgba(222,149,199,1)), color-stop(0%, rgba(207,116,168,1)), color-stop(54%, rgba(117,82,109,1)), color-stop(100%, rgba(40,53,59,1)));
			background: -webkit-linear-gradient(left, rgba(222,149,199,1) 0%, rgba(207,116,168,1) 0%, rgba(117,82,109,1) 54%, rgba(40,53,59,1) 100%);
			background: -o-linear-gradient(left, rgba(222,149,199,1) 0%, rgba(207,116,168,1) 0%, rgba(117,82,109,1) 54%, rgba(40,53,59,1) 100%);
			background: -ms-linear-gradient(left, rgba(222,149,199,1) 0%, rgba(207,116,168,1) 0%, rgba(117,82,109,1) 54%, rgba(40,53,59,1) 100%);
			background: linear-gradient(to right, rgba(222,149,199,1) 0%, rgba(207,116,168,1) 0%, rgba(117,82,109,1) 54%, rgba(40,53,59,1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#de95c7', endColorstr='#28353b', GradientType=1 );
	    }

	    .form-control {
	    	border-radius: 0;
	    	background: transparent;
	    	color: white;
	    }

	    .form-control:focus {
	    	color: #28353b;
	    	background: #e9eef0;
	    }

	    #login {
	    	border-radius: 20px;
			-webkit-box-shadow: 0px 0px 220px 0px rgba(255,255,255,1);
			-moz-box-shadow: 0px 0px 220px 0px rgba(255,255,255,1);
			box-shadow: 0px 0px 220px 0px rgba(255,255,255,1);
	    }

    </style>

    </head>

<body class="focused-form animated-content login-background">
        
        
<div class="container" id="login-form">
	<a href="Login" class="login-logo"></a>
		<div class="row">
			<div class="hidden-xs hidden-sm col-md-8">
				<span class="text-center" style="position: absolute; top: 10000%; left: 11%; font-size: 40px; font-family: 'Segoe UI', sans-serif; color: white; font-weight: 200;"><img src="<?php echo base_url($company->logo_path); ?>" style="max-width: 150px;max-height: 100px;"><br><b><i>J</i>CORE</b> ACCOUNTING SYSTEM
				<br>
					<span style="padding-right:15px;">
						<?php foreach($company_info as $company_info){ ?>
	                        <?php echo $company_info->company_name; ?>
	                    <?php } ?>
                    </span>
				</span>
			</div>
			<div class="col-md-4">
				<div style="border:none; margin-top: 15%;">
					<div id="login">
						<div class="panel-body">
							<!-- <h2>Login Form</h2> -->
							<div class="col-xs-12 text-center" style="margin-bottom: 20px;">
								<H4 style="color: white;"><strong>SIGN IN</strong> <span style="font-weight: 200;">TO YOUR ACCOUNT</span></H4>
							</div>
							<form action="#" class="form-horizontal" id="validate-form">
								<div class="form-group mb-md" id="userdiv">
			                        <div class="col-xs-12">
			                        	<div class="input-group">
			                        		<div class="input-group-addon">
			                        			<i class="fa fa-user"></i>
			                        		</div>
			                        		<input name="user_name" id="user" type="text" class="form-control " placeholder="Username" data-parsley-minlength="20" placeholder="At least 6 characters" required>
			                        	</div>
										
			                        </div>
								</div>

								<div class="form-group mb-md" id="passdiv">
			                        <div class="col-xs-12">
			                        	<div class="input-group">
			                        		<div class="input-group-addon">
			                        			<i class="fa fa-key"></i>
			                        		</div>
										<input name="user_pword" id="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
										</div>
			                        </div>
								</div>

								<div class="row">
									<div class="col-xs-12 col-sm-6 hidden " style="margin-bottom: 10px;">
										<button id="btn_register" class="btn btn-info btn-block">Register</button>
									</div>
									<div class="col-sm-offset-6"></div>								
									<div class="col-xs-12 col-sm-12">
										<button id="btn_login" class="btn btn-primary btn-block btn-custom-jk" data-style="expand-left" data-spinner-color="white" data-size="s" style="margin-bottom: 50px;">
										<span class=""></span> Login
										</button>
									</div>
								</div>
								<!-- <div class="form-group mb-n">
									<div class="col-xs-12">
										<a href="#" class="pull-left">Forgot password?</a>
										<div class="checkbox-inline icheck pull-right p-n">
											<label for="">
												<input type="checkbox"></input>
												Remember me
											</label>
										</div>
									</div>
								</div> -->
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix">
					
				</div>
				
				<span style="font-size: 12px; color: white; font-weight: 200; position: absolute; top: 130%; left: 60%;">Powered by : <img src="assets/img/jdev-logo-white.png" height="30" width="70"></span>
<!--
				<div class="text-center">
					<a href="#" class="btn btn-label btn-social btn-facebook mb-md"><i class="ti ti-facebook"></i>Connect with Facebook</a>
					<a href="#" class="btn btn-label btn-social btn-twitter mb-md"><i class="ti ti-twitter"></i>Connect with Twitter</a>
				</div>

-->
			</div>
		</div>
</div>

<?php echo $_def_js_files; ?>

<script src="assets/plugins/spinner/dist/spin.min.js"></script>
<script src="assets/plugins/spinner/dist/ladda.min.js"></script>

    <script>
        $(document).ready(function(){


            var bindEventHandlers=(function(){

                $('#btn_login').click(function(){

                    var l = Ladda.create(this);
                    l.start();


                    validateUser().done(function(response){

                        showNotification(response);

                        if(response.stat=="success"){
                            setTimeout(function(){
                                window.location.href = "dashboard";
                            },600);
                        }

                    }).always(function(){
                        l.stop();
                    });


                });

                $('input').keypress(function(evt){
                    if(evt.keyCode==13){
                    	evt.preventDefault();
                    	$('#btn_login').click();
                    }
                });

            })();

            var validateUser=function(){
                var _data={uname : $('input[name="user_name"]').val() , pword : $('input[name="user_pword"]').val()};

                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Login/transaction/validate",
                    "data" : _data,
                    "beforeSend": function(){
                    }
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

	        $('#user').focus(function()
			{ 
				$(this).attr('placeholder','');
				$(this).animate({
				    height: '40px',
				    'font-size': '18px'
				  }, 100, function() {
				    // Animation complete.
				  });
			}).blur(function()
			{
				$(this).attr('placeholder','Username');
				$(this).animate({
				    height: '33px',
				    'font-size': '14px'
				  }, 100, function() {
				    // Animation complete.
				  });	
			});

			$('#pass').focus(function()
			{ 
				$(this).attr('placeholder','');
				$(this).animate({
				    height: '40px',
				    'font-size': '18px'
				  }, 100, function() {
				    // Animation complete.
				  });
			}).blur(function()
			{
				$(this).attr('placeholder','Password');
				$(this).animate({
				    height: '33px',
				    'font-size': '14px',
				  }, 100, function() {
				    // Animation complete.
				  });	
			});

			$('#btn_login').focus(function()
			{ 
				$(this).animate({
				    height: '60px',
				    'font-size': '18px'
				  }, 100, function() {
				    // Animation complete.
				  });
			}).blur(function()
			{
				$(this).animate({
				    height: '33px',
				    'font-size': '14px',
				  }, 100, function() {
				    // Animation complete.
				  });	
			});
        });
    </script>


</body>

<!-- Mirrored from avenxo.kaijuthemes.com/extras-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:14:53 GMT -->
</html>