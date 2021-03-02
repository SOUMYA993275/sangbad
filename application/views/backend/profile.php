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
                    <h2>Profile</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Profile</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content">                
            <div class="row animated fadeInRight">
			<div class="col-md-4"></div>
				<div class="col-lg-4">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Profile Detail</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right" style="text-align :center;">
                                <img alt="image" class="img-fluid" style="width:75px; height:75px;" src="<?=base_url();?><?=$this->session->userdata('image');?>">
                            </div>
                            <div class="ibox-content profile-content" style="text-align :center;">
                                <h2><strong><?=$this->session->userdata('name');?></strong></h2>
                                <h4><?=$this->session->userdata('status');?></h4>
                                <p><i class="fa fa-user"></i> <?=$this->session->userdata('co');?></p>
                                <p><i class="fa fa-calendar"></i> <?=$this->session->userdata('dob');?></p>
                                <p><i class="fa fa-tint"></i> <?=$this->session->userdata('blood');?></p>
                                <p><i class="fa fa-map-marker"></i> <?=$this->session->userdata('address');?></p>
                                <p><i class="fa fa-phone"></i> <?=$this->session->userdata('mobile');?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-envelope"></i> <?=$this->session->userdata('email');?></p>
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" onclick="edituser('<?=$this->session->userdata('slno');?>')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-pencil"></i> Update Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
                </div>
        </div>
        <?php include_once ('footer.php');?>
		</div>
        </div>



    <!-- Mainly scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>
    $(window).load(function(){
     $('.loader').fadeOut();
	});
	</script>
    <script src="<?=base_url();?>js/jquery-3.1.1.min.js"></script>
    <script src="<?=base_url();?>js/popper.min.js"></script>
    <script src="<?=base_url();?>js/bootstrap.js"></script>
    <script src="<?=base_url();?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url();?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url();?>js/inspinia.js"></script>
    <script src="<?=base_url();?>js/plugins/pace/pace.min.js"></script>

    <!-- Peity -->
    <script src="<?=base_url();?>js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Peity -->
    <script src="<?=base_url();?>js/demo/peity-demo.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
	function edituser(did)	
			{	
				var geturl = "<?php echo site_url('Profile/editprofile');?>/"+did;	
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
if($this->session->flashdata('message6') != '')
{
?>
<script>
swal({
  title: "Success",
  text: "Profile Edited Successfully",
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
