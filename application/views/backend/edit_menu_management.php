<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="<?=base_url('Uploads/general/news.png')?>" type="image/png" />
    <title>সংবাদ রাতদিন - এক ক্লিকে সব খবর</title>
    <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?=base_url();?>css/animate.css" rel="stylesheet">
    <link href="<?=base_url();?>css/style.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/iCheck/custom.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    <h2>Menu Management</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Menu Management</strong>
                        </li>
                    </ol>
                </div>
				
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Add New Menu</h5>
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
								</div>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" role="form" name="myForm" method="POST" action="<?php echo site_url('Menumanagement/HeaderMenu');?>">
											<div class="row">
											<input name="id" type="text" value="<?=$menudetails[0]->id;?>" hidden class="form-control" required>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Menu Name</label>
														<input id="menuname" name="menuname" type="text" value="<?=$menudetails[0]->menuname;?>" placeholder="Enter Menu Name" readonly class="form-control" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Menu Code</label>
														<input id="menucode" name="menucode" type="text" value="<?=$menudetails[0]->menucode;?>" pattern="^\S+$" placeholder="Enter Menu Code" readonly class="form-control" required>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="form-group">
														<label>Menu Status</label>
														<select class="form-control" name="menustatus" id="menustatus" required>
															<option value="">Select Status</option>
															<option value="Active" <?php if($menudetails[0]->status =="Active") echo 'selected="selected"'; ?>>Active</option>
															<option value="Inactive" <?php if($menudetails[0]->status =="Inctive") echo 'selected="selected"'; ?>>Inactive</option>
														<select>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="form-group">
														<label>Header</label>
														<select class="form-control" name="header" id="header" required>
															<option value="">Select Position</option>
															<option <?php if($menudetails[0]->headers == "1") echo 'selected="selected"';?> value="1">Yes</option>
															<option <?php if($menudetails[0]->headers == '0') echo 'selected="selected"';?> value="0">No</option>
														<select>
													</div>
												</div>
												<div class="col-lg-12" style="border-top: none; text-align: center;">
													<button type="reset" class="btn btn-warning">Clear Form</button>                                    
													<button type="submit" class="btn btn-primary">Update</button>
												</div>
											</div>
										</form>
									</div>
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
	
   <script src="<?=base_url();?>js/plugins/dataTables/datatables.min.js"></script>
   <script src="<?=base_url();?>js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
   
					
</body>

</html>
