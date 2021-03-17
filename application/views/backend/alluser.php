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
                    <a style="float:right; border-radius: 20px;" href="<?=site_url('User/add_user');?>" class="btn btn-primary block full-width m-b"a style="float:right">Add New User</a>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
		<?php  
		$i=0;
		foreach($userdetails as $mn)
		{
		$i++;
		?>
            <div class="col-lg-3">
                <div class="contact-box center-version" style="<?php if($mn->nstatus==0){ echo 'border: 6px solid #0cf008; border-radius: 10px'; }else if($mn->nstatus==1){ echo 'border: 6px solid #f60b36; border-radius: 10px';}?>">
				
					<a>
						<img alt="<?=$mn->name;?>" class="rounded-circle" src="<?=base_url($mn->image);?>">
						<h3 class="m-b-xs"><strong><?=$mn->name;?></strong></h3>
						<div class="fa fa-user-secret"> <?=$mn->status;?></div>
                        <div class="font">C/O- <?=$mn->co;?></div>
                        <div class="font">Blood Group-  <?=$mn->blood;?></div>
                        <address class="m-t-md">
                            <h5><?=$mn->address;?></h5>
                            <abbr title="Phone" class="fa fa-phone"></abbr> <?=$mn->mobile;?> 
							<?php
							if($mn->mobile2 == '')
							{
							?>
							&nbsp
							<?php
							}
							else if($mn->mobile2 != '')
							{
							?>
							/ <?=$mn->mobile2;?>
							<?php
							}
							?>
							<br>
                            <abbr title="Email" class="fa fa-envelope"></abbr> <?=$mn->email;?>
                        </address>

                    </a>
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <?php
							if($mn->nstatus==1)
							{
							?>
							<button onclick="activeuser('<?=$mn->slno;?>')" type="button" class="btn btn-primary fa fa-check-circle-o"></button>
							<?php
							}
							else if($mn->nstatus==0)
							{
							?>
							<button onclick="inactiveuser('<?=$mn->slno;?>')" type="button" class="btn btn-warning fa fa-check-circle-o"></button>
							<?php
							}
							?>
							
                            <button onclick="edituser('<?=$mn->slno;?>')" type="button" class="btn btn-info fa fa-pencil"></button>
                            <button onclick="deleteuser('<?=$mn->slno;?>')" type="button" class="btn btn-danger fa fa-trash"></button>
							<button type="button" data-toggle="modal" data-target="#myModal20" class="btn btn-success fa fa-eye"></button>
						</div>
                    </div>

                </div>
            </div>
		<?php
		}
		?>
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
