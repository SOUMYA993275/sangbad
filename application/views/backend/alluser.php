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
	.modal-header{

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
                <div class="col-lg-10">
                    <h2>All User</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            User
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>All User</strong>
                        </li>
                    </ol>
                </div>
				<div class="col-lg-2">
					<h2></h2>
                    <a style="float:right; border-radius: 20px;color:white;"data-toggle="modal" data-target="#myModal21" class="btn btn-primary block full-width m-b">Add User</a>
                </div>
            </div>
							<div class="modal inmodal" id="myModal21" tabindex="-1" role="dialog1" aria-hidden="true">
                                <div class="modal-dialog1">
                                    <div class="modal-content animated flipInY" style="width: 100%;height: 720PX;">
                                        <div class="modal-header"style="padding: 8px 12px; background-color: #1ab394;text-align: left;font-size: 22px;color: white;font-weight: 1000;">
                                            <button type="button" title="Close" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <a>Add User</a>
										</div>
                                        <div class="modal-body">
											<form id="addform" action="" enctype="multipart/form-data" method="POST" class="wizard-big">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group">
															<label>Name *</label>
															<input id="name" name="name" type="text" pattern="^\S+$" placeholder="Enter Name" class="form-control" required>
														</div>
														<div class="form-group">
															<label>Gender *</label>
															<select id="gender" name="gender" type="text" required class="form-control">
															<option value="">Select Gender</option>
															<option value="MALE">Male</option>
															<option value="FEMALE">Female</option>
															<option value="TRANSGENDER">Transgender</option>
															</select>
														</div>
														<div class="form-group">
														<label>Additional Contact Number (optional)</label>
														<input id="mobile2" name="mobile2" type="number" placeholder="Enter Mobile Number(if needed)" class="form-control">
													</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group">
															<label>C/o- *</label>
															<input id="co" name="co" type="text" pattern="^\S+$" placeholder="Enter Guardian Name" required class="form-control">
														</div>
														<div class="form-group">
															<label>Mobile Number *</label>
															<input id="mobile" name="mobile" type="number" class="form-control" required placeholder="Enter Mobile Number" onKeyPress="if(this.value.length==10) return false;" pattern="[7-9]{1}[0-9]{9}/^-?\d+\.?\d*$/">
														</div>
														<div class="form-group">
														<label>Designation *</label>
														<select id="role" name="status" type="text" required class="form-control">
														<option value="">Select Role</option>
														<option value="ADMIN">Admin</option>
														<option value="MANAGER">Manager</option>
														<option value="USER">User</option>
														</select>
													</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group" id="data_1">
															<label>D.O.B *</label>
															<div class="input-group date">
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="dob" placeholder="Enter D.O.B" class="form-control" required>
															</div>
														</div>
														<div class="form-group">
															<label>Email *</label>
															<input id="email" name="email" type="email" placeholder="Enter Email" required class="form-control">
														</div>
														<div class="form-group">
															<label>Blood Group *</label>
															<select id="blood" name="blood" type="text" required class="form-control">
															</select>
														</div>
													</div>
													<div class="col-lg-12">
														<div class="form-group">
															<label>Address *</label>
															<textarea id="address" name="address" rows="5" cols="40" type="text" placeholder="Enter address" class="form-control" required></textarea>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group">
															<label>Profile photo *</label>
															<input id="image" name="image" type="file" placeholder="Select Profile Picture" accept="image/gif, image/jpeg, image/JPEG, image/png, image/PNG, image/jpg, image/JPG" onchange="readURL(this);" required class="form-control">
														</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group">
															<img style="border: 1px solid black;height:160px;width:160px;" id="preview1" src="<?=base_url();?>Uploads/general/no_img.png" alt="image" >
														</div>
													</div>
													<div class="checkbox checkbox-success">
														<input id="acceptTerms" name="acceptTerms" type="checkbox" required class="required">
														<label for="acceptTerms">I agree with the Terms and Conditions.</label>
													</div>
													<div class="col-lg-12" style="border-top: none; text-align: center;">
														<button type="reset" class="ladda-button btn btn-warning" data-style="zoom-in">Clear Form</button>                                    
														<button type="submit" class="ladda-button btn btn-primary" data-style="zoom-in">Submit</button>
													</div>
												</div>
											</form>
                                        </div>
                                        <div class="modal-footer">
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
			<div class="row" id="user">
				<div class="col-lg-4"></div>
			</div>
        </div>
        <?php include_once ('footer.php');?>
		</div>
        </div>
		<div class="modal inmodal" id="myModal20" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <div class="swal-icon swal-icon--warning">
											<span class="swal-icon--warning__body"></span>
											<span class="swal-icon--warning__dot" style="bottom: 10px;"></span>
											</div>
                                        </div>
                                        <div class="modal-body">
                                            <p style="text-align: center;"><h2>Please allow the permission of this user, otherwise they can't use the system<strong></strong></h2></p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?=site_url('MenuPermission');?>"><button type="button" class="btn btn-primary">Menu Permission</button></a>
                                            <a href="<?=site_url('UserPermission');?>"><button type="button" class="btn btn-warning">User Permission</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="modal inmodal" id="myModal22" tabindex="-1" role="dialog1" aria-hidden="true">
                                <div class="modal-dialog1">
                                    <div class="modal-content animated flipInY" style="width: 100%;height: 720PX;">
                                        <div class="modal-header"style="padding: 8px 12px; background-color: #1ab394;text-align: left;font-size: 22px;color: white;font-weight: 1000;">
                                            <button type="button" title="Close" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <a>Edit User</a>
										</div>
                                        <div class="modal-body">
											<form id="form" action="" enctype="multipart/form-data" method="POST" class="wizard-big">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group">
															<label>Name *</label>
															<input id="name" name="name" type="text" pattern="^\S+$" placeholder="Enter Name" class="form-control" required>
														</div>
														<div class="form-group">
															<label>Gender *</label>
															<select id="gender" name="gender" type="text" class="form-control" required>
															<option value="">Select Gender</option>
															<option value="MALE">Male</option>
															<option value="FEMALE">Female</option>
															<option value="TRANSGENDER">Transgender</option>
															</select>
														</div>
														<div class="form-group">
														<label>Additional Contact Number (optional)</label>
														<input id="mobile2" name="mobile2" type="number" placeholder="Enter Mobile Number(if needed)" class="form-control">
													</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group">
															<label>C/o- *</label>
															<input id="co" name="co" type="text" pattern="^\S+$" placeholder="Enter Guardian Name" class="form-control" required>
														</div>
														<div class="form-group">
															<label>Mobile Number *</label>
															<input id="mobile" name="mobile" type="number" class="form-control" required placeholder="Enter Mobile Number" onKeyPress="if(this.value.length==10) return false;" pattern="[7-9]{1}[0-9]{9}/^-?\d+\.?\d*$/">
														</div>
														<div class="form-group">
														<label>Designation *</label>
														<select id="role" name="status" type="text" class="form-control" required>
														<option value="">Select Role</option>
														<option value="ADMIN">Admin</option>
														<option value="MANAGER">Manager</option>
														<option value="USER">User</option>
														</select>
													</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group" id="data_1">
															<label>D.O.B *</label>
															<div class="input-group date">
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="dob" placeholder="Enter D.O.B" class="form-control" required>
															</div>
														</div>
														<div class="form-group">
															<label>Email *</label>
															<input id="email" name="email" type="email" placeholder="Enter Email" class="form-control" required>
														</div>
														<div class="form-group">
															<label>Blood Group *</label>
															<select id="blood" name="blood" type="text" class="form-control" required>
															</select>
														</div>
													</div>
													<div class="col-lg-12">
														<div class="form-group">
															<label>Address *</label>
															<textarea id="address" name="address" rows="5" cols="40" type="text" placeholder="Enter address" class="form-control" required></textarea>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group">
															<label>Profile photo *</label>
															<input id="image" name="image" type="file" placeholder="Select Profile Picture" accept="image/gif, image/jpeg, image/JPEG, image/png, image/PNG, image/jpg, image/JPG" onchange="readURL(this);" class="form-control" required>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group">
															<img style="border: 1px solid black;height:160px;width:160px;" id="preview1" src="<?=base_url();?>Uploads/general/no_img.png" alt="image" >
														</div>
													</div>
													<div class="checkbox checkbox-success">
														<input id="acceptTerms" name="acceptTerms" type="checkbox" required class="required">
														<label for="acceptTerms">I agree with the Terms and Conditions.</label>
													</div>
													<div class="col-lg-12" style="border-top: none; text-align: center;">
														<button type="reset" class="ladda-button btn btn-warning" data-style="zoom-in">Clear Form</button>                                    
														<button type="submit" class="ladda-button btn btn-primary" data-style="zoom-in">Submit</button>
													</div>
												</div>
											</form>
                                        </div>
                                        <div class="modal-footer">
                                        
                                        </div>
                                    </div>
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
    $("#addform").on("submit", function(event) {
    event.preventDefault();

    var formData = {
        'name': $('input[name=name]').val(),//Name
		'co': $('input[name=co]').val(),// C/O
		'dob': $('input[name=dob]').val(),// D.O.B
		'mobile': $('input[name=mobile]').val(),//Mobile
		'mobile2': $('input[name=mobile2]').val(),//Mobile2
		'email': $('input[name=email]').val(), //Email
		'address': $('input[name=address]').val(), // Address
		'image': $('input[name=image]').val(), // Image
		'blood': $('input[name=blood]').val(), // Blood
		'role': $('input[name=status]').val(), // Role
		'gender': $('input[name=gender]').val(),//Gender
        'secrate_key' : 'demokey'
    };
$.ajax({
url: "<?=site_url('Api/User/Add');?>",
method: 'POST',
data: formData,
})
.done(function(data) {
let response = JSON.parse(data);
if (response.statuss == 200){
   	swal({
        title: "Success",
        text: response.message,
        icon: "success",
        button: false,
        timer: "1500",
        });
	Userlist();
	$('#myModal21').modal('hide');
}
else if(response.statuss == 403)
{
	swal({
        title: "Oops!",
        text: response.message,
        icon: "error",
        button: false,
        timer: "1500",
        });
}
else if(response.statuss == 402)
{
	top.location.href = "ErrorUserbyPermission";
}
else if(response.status == 404)
{
	top.location.href = "admin";  
} 
});
});
</script>
<script>
			function deleteuser(did)	
			{		
				var geturl = "<?php echo site_url('User/DeleteUser');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Delete this User?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willDelete) => {
            		if (willDelete) {	
                        window.location.href = geturl;
            		} else {
            			
            		}
            	});	
			}
			function activeuser(did)	
			{		
				var geturl = "<?php echo site_url('User/ActiveUser');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Active this User?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willActive) => {
            		if (willActive) {	
                        window.location.href = geturl;
            		} else {
            			
            		}
            	});	
			}	
			
			function inactiveuser(did)	
			{	
				var geturl = "<?php echo site_url('User/InactiveUser');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Inactive this User?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willInactive) => {
            		if (willInactive) {	
                        window.location.href = geturl;
            		} else {
            			
            		}
            	});
			}
			function edituser(did)	
			{	
				var geturl = "<?php echo site_url('User/edituser');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Edit this User?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willEdit) => {
            		if (willEdit) {	
                        window.location.href = geturl;
            		} else {
            			
            		}
            	});
			}
	</script>
<?php
if($this->session->flashdata('message1') != '')
{
?>
<script>
swal({
  title: "Success",
  text: "User Created Successfully",
  icon: "success",
  button: false,
  timer: "1500",
});
</script>
<?php
}
?>
<?php
if($this->session->flashdata('message6') != '')
{
?>
<script>
swal({
  title: "Success",
  text: "User Edited Successfully",
  icon: "success",
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
  title: "Success",
  text: "User Inactive Successfully",
  icon: "success",
  button: false,
  timer: "1500",
});
</script>
<?php
}
?>
<?php
if($this->session->flashdata('message4') != '')
{
?>
<script>
swal({
  title: "Success",
  text: "User Active Successfully",
  icon: "success",
  button: false,
  timer: "1500",
});
</script>
<?php
}
?>
<?php
if($this->session->flashdata('message5') != '')
{
?>
<script>
swal({
  title: "Success",
  text: "User Delete Successfully",
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
