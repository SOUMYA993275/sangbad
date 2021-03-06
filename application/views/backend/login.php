<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?=base_url('Uploads/general/news.png')?>" type="image/png" />
	<title>সংবাদ রাতদিন - এক ক্লিকে সব খবর</title>
	<link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?=base_url();?>css/animate.css" rel="stylesheet">
    <link href="<?=base_url();?>css/style.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
	<style>
             .login-box-body, .register-box-body {
            background: #d2c1b8;
            padding: 20px;
            border-top: 0;
            color: #100f0f;
            border-radius: 35px;
        }
        .login-box, .register-box {
            margin: 7% auto;
			width: 300px;
        }
        .p-b-20 {
            padding-bottom: 10px;
        }
    
        .p-t-57 {
            padding-top: 0px;
        }
        .modal-content {
            top: 30%;
            left: 30%;
            width: 40%;
            padding: 3%;
        }
        
        @media only screen and (max-width: 600px) {
            .modal-content {
                top: 10%;
                left: 10%;
                width: 80%;
                padding: 3%;
            }
        }
		.login-bg{
			padding: 15px;
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			position: relative;
			z-index: 1;
		}
		body{
			background: url(<?=base_url();?>/Uploads/general/login_back.jpg) !important;
			background-size: cover !important;
			background-repeat: no-repeat;
			height: 100vh !important;
		}
    </style>
</head>
<body>				
	<div class="login-bg">

		<div class="login-box">
			<div class="login-box-body">
				<img src="<?=base_url("Uploads/general/logo_login.png");?>" style="width: 100%;">
				<h3 style="text-align: center;color: green;font-weight: bold;">Sign In to start Your Session</h3>
				<form class="m-t" role="form" method="POST" action="<?=site_url('admin') ?>">
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Enter Email" style="border-radius: 20px;">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" style="border-radius: 20px;">
					</div>
					<button type="submit" class="btn btn-primary block full-width m-b" style="border-radius: 20px;">Login</button>
					<p class="text-center" style="color :red; font-weight: 626;"><a style="color :red;" href="<?=site_url('Forgotpassword');?>">Forgot Password?</a></p>
					<a class="btn btn-sm btn-white btn-block" id="popup" style="border-radius: 20px;">Trouble Logged in!</a>
						<div id="myModal" class="modal">
							<!-- Modal content -->
							<div class="modal-content">
								<span class="close" style="text-align: right;">&times;</span>
								<p style="font-weight:bold;font-size:18px;padding-left: 50px;color: #3a0852;"> For SOS :</p>
								<p style="font-weight:bold;padding-left: 60px;color: #3a0852;"><span class="fa fa-envelope-o"> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  parimalghosh46@gmail.com</p>
								<p style="font-weight:bold;padding-left: 60px;color: #3a0852;"><span class="fa fa-phone">  </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  +91 9735346654 / +917003034823</p>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
		<!-- Mainly scripts -->
		<script src="<?=base_url();?>js/jquery-3.1.1.min.js"></script>
		<script src="<?=base_url();?>js/popper.min.js"></script>
		<script src="<?=base_url();?>js/bootstrap.js"></script>
		<script>
		var modal = document.getElementById('myModal');
		
		var btn = document.getElementById("popup");

		var span = document.getElementsByClassName("close")[0];

		btn.onclick = function() {
			modal.style.display = "block";
		}
		
		span.onclick = function() {
			modal.style.display = "none";
		}

		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
	<?php
        	if($error == 1)
        	{
        	?>
        	<script>
				  swal({
					  title: "Oops!",
					  text: "User Id and Password Incorrect",
					  icon: "error",
					  button: false,
					  timer: "1500",
					});
			</script>
        	<?php
        	}
        	else if($error == 2)
        	{
        	?>
        	<script>
				  swal({
					  title: "Oops!",
					  text: "User Id and Password Blank",
					  icon: "error",
					  button: false,
					  timer: "1500",
					});
			</script>
        	<?php
        	}
			else if($error == 3)
			{
        	?>
			<script>
				  swal({
					  title: "Oops!",
					  text: "User Id Blocked, Please Contact Admin",
					  icon: "error",
					});
			</script>
        	<?php
        	}
			else if($error == 4)
			{
        	?>
			<script>
				  swal({
					  title: "Oops!",
					  text: "User Id Removed from database, Please Contact Admin",
					  icon: "error",
					});
			</script>
        	<?php
			}
			else if($error == 5)
			{
			?>
			<script>
				  swal({
					  title: "Oops!",
					  text: "User not registered yet, Please check your email.",
					  icon: "error",
					});
			</script>
        	<?php
			}
			else if($error == 6)
			{
			?>
			<script>
				  swal({
					  title: "Success",
					  text: "Reset Password Mail send Successfully",
					  icon: "success",
					});
			</script>
        	<?php
			}
			?>
			<?php
					if($this->session->flashdata('failed') != '')
						{
					?>
						<script>
							swal({
							  title: "Oops!",
							  text: "You are not authorized for this action",
							  icon: "error",
							  button: false,
							  timer: "1500",
							});
							</script>
					<?php
						}
					?>
					<?php
					if($this->session->flashdata('failed2') != '')
						{
					?>
						<script>
							swal({
							  title: "Oops!",
							  text: "Session Expired, Please login again",
							  icon: "error",
							  button: false,
							  timer: "1500",
							});
							</script>
					<?php
						}
					?>
					<?php
					if($this->session->flashdata('msg4') != '')
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
</body>

</html>
