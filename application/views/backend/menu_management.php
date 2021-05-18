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
										<form class="form-horizontal" role="form" name="myForm" method="POST" action="<?php echo site_url('Menumanagement/InsertMenu');?>">
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group">
														<label>Menu Name</label>
														<input id="menuname" name="menuname" type="text" placeholder="Enter Menu Name" class="form-control" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label>Menu Code</label>
														<input id="menucode" name="menucode" type="text" pattern="^\S+$" placeholder="Enter Menu Code" class="form-control" required>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="form-group">
														<label>Menu Status</label>
														<select class="form-control" name="menustatus" id="menustatus" required>
															<option value="">Select Status</option>
															<option value="Active">Active</option>
															<option value="Inactive">Inactive</option>
														<select>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="form-group">
														<label>Header</label>
														<select class="form-control" name="header" id="header" required>
															<option value="">Select Position</option>
															<option value="1">Yes</option>
															<option value="0">No</option>
														<select>
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
								<h5>Menu Details</h5>
									<div class="ibox-tools">
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>
									</div>
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover dataTables-example">
									<thead>
									<tr>
										<th>Sl No</th>
										<th>Menu Name</th>
										<th>Menu Code</th>
										<th>Menu Link</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									
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
	
   <script src="<?=base_url();?>js/plugins/dataTables/datatables.min.js"></script>
   <script src="<?=base_url();?>js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
   
	<script type="text/javascript">
		$(document).ready(function(){
		$('.dataTables-example').DataTable({
          'processing': '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>' ,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>index.php/Menumanagement/menuList'
          },
          'columns': [
			 {
				"data": "id",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			 },
             { data: 'menuname' },
             { data: 'menucode' },
             { data: 'menulink' },
             { data: 'status' },
             { data: null, render: function(data, type, full, meta) {
				switch(full.status) {
					   case 'Active' : return '<button onclick="inactivemenu(' + full.id + ')" title="Inactive Menu" class="btn btn-warning fa fa-check-circle-o"></button>  <button onclick="editmenu(' + full.id + ')" title="Edit Menu" class="btn btn-info fa fa-pencil"></button>  <button onclick="deletemenu(' + full.id + ')" title="Delete Menu" class="btn btn-danger fa fa-trash"></button>'; break;
					   case 'Inactive' : return '<button onclick="activemenu(' + full.id + ')" title="Active Menu" class="btn btn-primary fa fa-check-circle-o"></button>  <button onclick="editmenu(' + full.id + ')" title="Edit Menu" class="btn btn-info fa fa-pencil"></button>  <button onclick="deletemenu(' + full.id + ')" title="Delete Menu" class="btn btn-danger fa fa-trash"></button>'; break;
					   default  : return 'N/A';
					}
				} 
			 }
          ],
		  columnDefs : [
				{ targets : [4],
				  render : function (data, type, row) {
					switch(data) {
					   case 'Active' : return '<img src="<?=base_url();?>/Uploads/general/active.gif" title="Active"/>'; break;
					   case 'Inactive' : return '<img src="<?=base_url();?>/Uploads/general/inactive.gif" title="Inactive">'; break;
					   default  : return 'N/A';
					}
				  }
				}
		   ],
		  dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv', title: 'MenuManagement SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'excel', title: 'MenuManagement SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'pdf', title: 'MenuManagement SNRD <?php echo date("Y-m-d h-i a");?>'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '12px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
        });
     });
     </script>
	<script>
			function headermenu(did)	
			{		
				var geturl = "<?php echo site_url('Menumanagement/HeaderMenu');?>/"+did;	
				swal({
                  title: "Are you sure do you want to change this Permission?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willChange) => {
            		if (willChange) {	
                        window.location.href = geturl;
            		} else {
            			
            		}
            	});	
			}
			function deletemenu(did)	
			{		
				var geturl = "<?php echo site_url('Menumanagement/DeleteMenu');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Delete this Menu?",
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
			function activemenu(did)	
			{		
				var geturl = "<?php echo site_url('Menumanagement/ActiveMenu');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Active this Menu?",
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
			
			function inactivemenu(did)	
			{	
				var geturl = "<?php echo site_url('Menumanagement/InactiveMenu');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Inactive this Menu?",
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
			function editmenu(did)	
			{	
				var geturl = "<?php echo site_url('Menumanagement/EditMenu');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Edit this Menu?",
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
							  text: "Menu Created Successfully",
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
							  text: "Menu Already Exist",
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
							  title: "Success",
							  text: "Menu Inactive Suceessfully",
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
							  text: "Menu Active Suceessfully",
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
							  text: "Menu Deleted Suceessfully",
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
							  text: "Menu Header Details Changed Suceessfully",
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
