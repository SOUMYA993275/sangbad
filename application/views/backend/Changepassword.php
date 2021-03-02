<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <link rel="icon" href="<?=base_url('Uploads/general/news.png')?>" type="image/png" />
    <title>সংবাদ রাতদিন - এক ক্লিকে সব খবর</title>
    <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?=base_url();?>css/animate.css" rel="stylesheet">
    <link href="<?=base_url();?>css/style.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?=base_url();?>css/plugins/steps/jquery.steps.css" rel="stylesheet">
	<!-- Ladda style -->
    <link href="<?=base_url();?>css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />

</head>
<style>

		@import url(https://fonts.googleapis.com/css?family=Droid+Sans);
	.loader {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url('<?=base_url ();?>Uploads/general/load.gif') 50% 50% no-repeat rgb(249,249,249);
	}
</style>
<div class="loader"></div>
<body>

    <div id="wrapper">

    <?php include_once ('sidemenu.php');?>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
    <?php include_once ('header.php');?>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Change Password</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('admin/dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Change Password</strong>
                        </li>
                    </ol>
                </div>
				<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Change Password</h5>
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
									<a class="close-link">
										<i class="fa fa-times"></i>
									</a>
								</div>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" role="form" name="myForm" method="POST" action="<?php echo site_url('admin/UpdatePassword');?>">
											<div class="row">
											<div class="col-lg-4"></div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Old Password</label>  <span class="file-link-tooltip"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="file-link-tooltiptext">Password must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</span></span>
														<input id="opass" name="opass" type="password" onblur="ValidatePass()"placeholder="Enter Old Password" class="form-control" required>
													</div>
													<div class="form-group">
														<label>New Password</label>  <span class="file-link-tooltip"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="file-link-tooltiptext">Password must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</span></span>
														<input id="npass" name="npass" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onblur="ValidatePass()" placeholder="Enter New Password" class="form-control" required>
													</div>
													<div class="form-group">
														<label>Confirm Password</label>  <span class="file-link-tooltip"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="file-link-tooltiptext">Password must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</span></span>
														<input id="cpass" name="cpass" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onblur="ValidatePass()" placeholder="Enter Confirm Password" class="form-control" required>
													</div>
													<div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
													<div class="form-group">
														<label></label>
														<input type="checkbox" onclick="ShowPassword()"> &nbsp;&nbsp;  Show Password
													</div>
												</div>
												<div class="col-lg-4"></div>
												<div class="col-lg-12" style="border-top: none; text-align: center;">
													<button type="reset" class="ladda-button btn btn-warning" data-style="zoom-in">Clear</button>                                    
													<button type="submit" class="ladda-button btn btn-primary" data-style="zoom-in">Submit</button>
												</div>
											</div>
											</div>
										</form>
									</div>
								</div>
							</div>
				</div>
			</div>
        <?php include_once ('footer.php');?>
		</div>
    </div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>
    $(window).load(function(){
     $('.loader').fadeOut();
	});
	</script>
    <!-- Mainly scripts -->
    <script src="<?=base_url();?>js/jquery-3.1.1.min.js"></script>
    <script src="<?=base_url();?>js/popper.min.js"></script>
    <script src="<?=base_url();?>js/bootstrap.js"></script>
    <script src="<?=base_url();?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url();?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url();?>js/inspinia.js"></script>
    <script src="<?=base_url();?>js/plugins/pace/pace.min.js"></script>
   <!-- Ladda -->
    <script src="<?=base_url();?>js/plugins/ladda/spin.min.js"></script>
    <script src="<?=base_url();?>js/plugins/ladda/ladda.min.js"></script>
    <script src="<?=base_url();?>js/plugins/ladda/ladda.jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script>
   $(document).ready(function (){

        // Bind normal buttons
        Ladda.bind( '.ladda-button',{ timeout: 2000 });

        // Bind progress buttons and simulate loading progress
        Ladda.bind( '.progress-demo .ladda-button',{
            callback: function( instance ){
                var progress = 0;
                var interval = setInterval( function(){
                    progress = Math.min( progress + Math.random() * 0.1, 1 );
                    instance.setProgress( progress );

                    if( progress === 1 ){
                        instance.stop();
                        clearInterval( interval );
                    }
                }, 200 );
            }
        });
		
		var l = $( '.ladda-button-demo' ).ladda();

        l.click(function(){
            // Start loading
            l.ladda( 'start' );

            // Timeout example
            // Do something in backend and then stop ladda
            setTimeout(function(){
                l.ladda('stop');
            },12000)


        });

    });

		
			function ValidatePass() {
			  var password = document.getElementById("npass").value;
			  var confirmPassword = document.getElementById("cpass").value;
				if(password == '')
				{
					document.getElementById("npass").placeholder="New Password Is Blank";
					$("#npass").css("border-color", "red");
				}
				else if(confirmPassword == '')
				{
					document.getElementById("cpass").placeholder="Confirm Password Is Blank";
					$("#cpass").css("border-color", "red");
				
				}
				else if(password != confirmPassword) {
					$("#npass").css("border-color", "red");
					$("#cpass").css("border-color", "red");
					$("#divCheckPasswordMatch").html("Passwords Don't Matched");
					return false;
				}
				else
				{
					$("#npass").css("border-color", "green");
					$("#cpass").css("border-color", "green");
					$("#divCheckPasswordMatch").html("Passwords Matched");
					return false;
				}
					
			}
			
			function ShowPassword() {
				var x = document.getElementById("npass");
				var y = document.getElementById("cpass");
				var z = document.getElementById("opass");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
				if (y.type === "password") {
					y.type = "text";
				} else {
					y.type = "password";
				}
				if (z.type === "password") {
					z.type = "text";
				} else {
					z.type = "password";
				}
			}
	</script>
	<?php
					if($this->session->flashdata('message1') != '')
						{
					?>
						<script>
							swal({
							  title: "Success",
							  text: "Password Changed Successfully",
							  icon: "success",
							  button: false,
							  timer: "1500",
							});
							</script>
					<?php
						}
					?>
					<?php
					if($this->session->flashdata('message2') != '')
						{
					?>
						<script>
							swal({
							  title: "Oops!",
							  text: "New Password & Confirm Password not Matched",
							  icon: "error",
							  button: false,
							  timer: "1500",
							});
							</script>
					<?php
						}
					?>
					<?php
					if($this->session->flashdata('message3') != '')
						{
					?>
						<script>
							swal({
							  title: "Oops!",
							  text: "Sorry! Old Password doesn't Matched",
							  icon: "error",
							  button: false,
							  timer: "1500",
							});
							</script>
					<?php
						}
					?>
</body>

</html>
