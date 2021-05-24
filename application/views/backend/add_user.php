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
	<link href="<?=base_url();?>css/plugins/select2/select2.min.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
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
                    <h2>Add User</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            User
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Add User</strong>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="ibox-content">
                            <h2>
                                Add New User
                            </h2>
                            <form id="form" action="" enctype="multipart/form-data" method="POST" class="wizard-big">
                                <h1>Account</h1>
                                <fieldset>
                                    <h2>Account Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Name *</label>
                                                <input id="name" name="name" type="text" pattern="^\S+$" placeholder="Enter Name" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>C/o- *</label>
                                                <input id="co" name="co" type="text" pattern="^\S+$" placeholder="Enter Guardian Name" class="form-control required">
                                            </div>
                                        </div>
										<div class="col-lg-6">
                                            <div class="form-group" id="data_1">
                                                <label>D.O.B *</label>
                                                <div class="input-group date">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="dob" placeholder="Enter D.O.B" class="form-control" required>
												</div>
                                            </div>
											<div class="form-group">
                                                <label>Gender *</label>
                                                <select id="gender" name="gender" type="text" class="form-control required">
												<option value="">Select Gender</option>
												<option value="MALE">Male</option>
												<option value="FEMALE">Female</option>
												<option value="TRANSGENDER">Transgender</option>
												</select>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Contact</h1>
                                <fieldset>
                                    <h2>Contact Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Mobile Number *</label>
                                                <input id="mobile" name="mobile" type="number" class="form-control required" placeholder="Enter Mobile Number" onKeyPress="if(this.value.length==10) return false;" pattern="[7-9]{1}[0-9]{9}/^-?\d+\.?\d*$/">
                                            </div>
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input id="email" name="email" type="email" placeholder="Enter Email" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Additional Contact Number (optional)</label>
                                                <input id="mobile2" name="mobile2" type="number" placeholder="Enter Mobile Number(if needed)" class="form-control">
                                            </div>
											<div class="form-group">
                                                <label>Designation *</label>
                                                <select id="role" name="status" type="text" class="form-control required">
												<option value="">Select Role</option>
												<option value="ADMIN">Admin</option>
												<option value="MANAGER">Manager</option>
												<option value="USER">User</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Address</h1>
                                <fieldset>
                                    <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Address *</label>
                                                <textarea id="address" name="address" rows="5" cols="40" type="text" placeholder="Enter address" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                </fieldset>

								<h1>Identity</h1>
                                <fieldset>
                                    <h2>Identity Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Profile photo *</label>
                                                <input id="image" name="image" type="file" placeholder="Select Profile Picture" accept="image/gif, image/jpeg, image/JPEG, image/png, image/PNG, image/jpg, image/JPG" onchange="readURL(this);" class="form-control required">
                                            </div>
											<div class="form-group">
                                                <img style="border: 1px solid black;height:160px;width:160px;display:none;" id="preview1" src="" alt="image" >
                                            </div>
                                        </div>
										<div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Blood Group *</label>
                                                <select id="blood" name="blood" type="text" class="form-control required">
												</select>
                                            </div> 
										</div>
                                    </div>
                                </fieldset>
								
                                <h1>Finish</h1>
                                <fieldset>
                                    <h2>Terms and Conditions</h2>
									<div class="checkbox checkbox-success">
										<input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
										<label for="acceptTerms">I agree with the Terms and Conditions.</label>
									</div>
							   </fieldset>
                            </form>
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
    <script src="<?=base_url();?>js/plugins/User.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url();?>js/inspinia.js"></script>
    <script src="<?=base_url();?>js/plugins/pace/pace.min.js"></script>
	<!-- Steps -->
    <script src="<?=base_url();?>js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?=base_url();?>js/plugins/validate/jquery.validate.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if($this->session->flashdata('message2') != '')
{
?>
<script>
swal({
  title: "Oops!",
  text: "User Already Exist",
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
  text: "Picture Size greater than 500 kb",
  icon: "error",
  button: false,
  timer: "1500",
});
</script>
<?php
}
?>
<?php
if($this->session->flashdata('message11') != '')
{
?>
<script>
swal({
  title: "Oops!",
  text: "Internal Server Error",
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
