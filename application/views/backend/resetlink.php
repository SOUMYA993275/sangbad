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
    </style>
</head>
<body>
	<div class="login-bg" style="background: -webkit-linear-gradient(right, #8021fd, #ff8721, #90c314, #8121ff);">

		<div class="login-box">
			<div class="login-box-body">
				<img src="<?=base_url("Uploads/general/logo_login.png");?>" style="width: 100%;">
				<h3 style="text-align: center;color: green;font-weight: bold;">Create New Password</h3>
				<form class="m-t" role="form" method="POST" action="<?=site_url('Forgotpassword/linkupdatepassword');?>">
					<div class="form-group">
						<input type="password" class="form-control" onblur="ValidatePass()" id="npass" name="npass" placeholder="Enter New Password" required style="border-radius: 20px;">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" onblur="ValidatePass()" id="cpass" name="cpass" placeholder="Confirm Password" required style="border-radius: 20px;">
					</div>
					<div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
					<div class="form-group">
						<label></label>
						<input type="checkbox" onclick="ShowPassword()"> &nbsp;&nbsp;  Show Password
					</div>
					<button type="submit" class="btn btn-primary block full-width m-b" style="border-radius: 20px;">Submit</button>
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
					return false;
				}
					
			}
			
			function ShowPassword() {
				var x = document.getElementById("npass");
				var y = document.getElementById("cpass");
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
				
			}
	</script>
	</div>
</body>

</html>
