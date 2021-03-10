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
	<link href="<?=base_url();?>css/plugins/select2/select2.min.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
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
                    <h2>Add Permission</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>User Permission</strong>
                        </li>
                    </ol>
                </div>
				
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Add Permission</h5>
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
								</div>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" role="form" name="myForm" method="POST" action="<?php echo site_url('UserPermission');?>">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label>User Role</label>
														<select class="form-control" name="role" id="role" required>
															<option value="">Select Role</option>
															<?php
															foreach ($userlist as $user)
															{
															?>
															<option value="<?=$user->status;?>"><?=$user->status;?></option>
															<?php
															}
															?>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label>User</label>
														<select class="form-control" name="user" id="user" required>
															<option value="">Select User</option>
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Page</label>
														<select class="form-control" name="pagen" id="paged" required>
															<option value="">Select Page</option>
															
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Category</label>
														<select class="select2_demo_2 form-control" data-placeholder="Choose Category" name="catg[]" id="catgorys" multiple="multiple" required>
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Permission Status</label>
														<select class="form-control" name="ptatus" id="ptatus" required>
															<option value="">Select Status</option>
															<option value="0" selected>Active</option>
															<option value="1">Banned</option>
														</select>
													</div>
												</div>
												<div class="col-lg-12" style="border-top: none; text-align: center;">
													<button type="reset" class="btn btn-warning">Clear Form</button>                                    
													<button type="submit" class="btn btn-primary">Submit</button>
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
	<script>
	$(document).on('change', 'select#role', function (e) {
    e.preventDefault();
    var userID = $(this).val();
    getUserList(userID);
	});
	function getUserList(userID) {
    $.ajax({
        url: '<?php echo site_url('UserPermission/fetch_user'); ?>',
        type: 'post',
        data: {userID: userID},
        dataType: 'json',
        beforeSend: function () {
            $('select#user').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
            // code
        },
        success: function (json) {
            var options = '';
            options +='<option value="">Select User</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].slno + '">' + json[i].name + '</option>';
            }
            $("select#user").html(options);
 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}
	</script>
<script>
	$(document).ready(function(){
		$('select#paged').change(function(){ 
                var pageID=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('UserPermission/fetch_category');?>",
                    method : "POST",
                    data : {pageID: pageID},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
						var i;
                        for(i=0; i < data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].category+'</option>';
                        }
                        $('select#catgorys').html(html);
 
                    }
                });
                return false;
            }); 
             
        });
	</script>
<script>
	$(document).on('change', 'select#user', function (e) {
    e.preventDefault();
    var userID = $(this).val();
    getPageList(userID);
	});
	function getPageList(userID) {
    $.ajax({
        url: '<?php echo site_url('UserPermission/fetch_page'); ?>',
        type: 'post',
        data: {userID: userID},
        dataType: 'json',
        beforeSend: function () {
            $('select#paged').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
            // code
        },
        success: function (json) {
            var options = '';
            options +='<option value="">Select Page</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].pid + '">' + json[i].pname + '</option>';
            }
            $("select#paged").html(options);
 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}
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
	<script src="<?=base_url();?>js/plugins/chosen/chosen.jquery.js"></script>
   <script src="<?=base_url();?>js/plugins/dataTables/datatables.min.js"></script>
   <script src="<?=base_url();?>js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
   <!-- Select2 -->
    <script src="<?=base_url();?>js/plugins/select2/select2.full.min.js"></script>
   <script>
   $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });
    </script>
					<?php
					if($this->session->flashdata('message1') != '')
						{
					?>
						<script>
							swal({
							  title: "Success",
							  text: "Permission Created Successfully",
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
							  text: "Permission Already Exist",
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
