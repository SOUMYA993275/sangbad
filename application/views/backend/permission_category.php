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
                    <h2>Permission Category</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Permission</strong>
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
										<form class="form-horizontal" role="form" name="myForm" method="POST" action="<?=site_url('PermissionCategory/InsertPermission');?>">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label>Page Name</label>
														<select class="form-control" name="pname" id="pname" required>
															<option value="">Select Page</option>
															<?php
															foreach($pgdetails as $pg)
															{
															?>
															<option value="<?=$pg->id;?>"><?=$pg->page_name;?></option>
															<?php
															}
															?>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label>Category</label>
														<select data-placeholder="Choose Category" name="category[]" class="chosen-select" multiple style="width:350px;" tabindex="4" id="category" required>
															<option value="Add">Add</option>
															<option value="Edit">Edit</option>
															<option value="View">View</option>
															<option value="Delete">Delete</option>
															<option value="Active">Active</option>
															<option value="Inactive">Inactive</option>
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
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Permission Details</h5>
									<div class="ibox-tools">
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>
									</div>
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover dataTables-example" >
									<thead>
									<tr>
										<th>Sl No</th>
										<th>Page Name</th>
										<th>Page Category</th>
									</tr>
									</thead>
									<tbody>
											<?php  
											$i=0;
											foreach($pdetails as $mn)
											{
												$i++;
											?>
											<tr class="gradeX">
												<td><?=$i; ?></td>
												<td><?=$mn->page_name; ?></td>
												<td><?=$mn->category; ?></td>
											</tr>
											<?php
											}
											?>
									</tbody>
									</table>
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
	<script src="<?=base_url();?>js/plugins/chosen/chosen.jquery.js"></script>
   <script src="<?=base_url();?>js/plugins/dataTables/datatables.min.js"></script>
   <script src="<?=base_url();?>js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
   <script>
   $('.chosen-select').chosen({width: "100%"});
   
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv', title: 'Menu Management SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'excel', title: 'Menu Management SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'pdf', title: 'Menu Management SNRD <?php echo date("Y-m-d h-i a");?>'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
    </script>
	<?php
					if($this->session->flashdata('message1') != '')
						{
					?>
						<script>
							swal({
							  title: "Success",
							  text: "Category Created Successfully",
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
							  text: "Category Already Exist",
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
