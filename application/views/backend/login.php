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
				<form class="m-t" role="form" method="POST" id="loginform" name="loginform">
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="<?=base_url();?>js/plugins/Login.js"></script>
</body>

</html>
