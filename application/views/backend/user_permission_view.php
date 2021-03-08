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
	<link href="<?=base_url();?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
                    <h3>Permission View</h3>
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
								<h5>Search</h5>
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
								</div>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" id="form-filter" name="myForm">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label>User</label>
														<select class="form-control" name="user" id="user">
															<option value="">Select User</option>
															<?php
															foreach($userlist as $use)
															{
															?>
															<option value="<?=$use->slno;?>"><?=$use->name;?></option>
															<?php
															}
															?>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label>Page Name</label>
														<select class="form-control" name="pname" id="pname">
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
												<div class="col-lg-12" style="border-top: none; text-align: center;">
													<button type="button" id="btn-reset" class="btn btn-warning">Reset</button>
													<button type="button" id="btn-filter" class="btn btn-success">Filter</button>
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
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover dataTables-example" >
									<thead>
									<tr>
										<th>Sl No</th>
										<th>User Nane</th>
										<th>Page Name</th>
										<th>Page Action</th>
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
   <script>
   var table;
  $(document).ready(function(){
	table = $('.dataTables-example').DataTable({
          'processing': true,
          'serverSide': true,
		  "searching": false,
          'serverMethod': 'post',
          "ajax": {
            "url": "<?=site_url('UserPermission/PermissionList')?>",
            "type": "POST",
            "data": function ( data ) {
                data.uiid = $('#user').val();
                data.piid = $('#pname').val();
			}
		},
		  'columns': [
             { data: 'uid' },
             { data: 'uname' },
             { data: 'pname' },
             { data: 'category' },
             { data: 'status' },
             { data: null, render: function(data, type, full, meta) {
				switch(full.status) {
					   case '0' : return '<button onclick="inactivepermission(' + full.uid + ')" title="Inactive User Permission" class="btn btn-warning fa fa-check-circle-o"></button>'; break;
					   case '1' : return '<button onclick="activepermission(' + full.uid + ')" title="Active User Permission" class="btn btn-primary fa fa-check-circle-o"></button>'; break;
					   default  : return 'N/A';
					}
				} 
			 }
          ],
		  columnDefs : [
				{ targets : [4],
				  render : function (data, type, row) {
					switch(data) {
					   case '0' : return '<img src="<?=base_url();?>/Uploads/general/active.gif" title="Active"/>'; break;
					   case '1' : return '<img src="<?=base_url();?>/Uploads/general/inactive.gif" title="Inactive">'; break;
					   default  : return 'N/A';
					}
				  }
				}
		   ],
		  dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv', title: 'User Permission SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'excel', title: 'User Permission SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'pdf', title: 'User Permission SNRD <?php echo date("Y-m-d h-i a");?>'},

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
		
	$('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload(null,false);  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload(null,false);  //just reload table
    });
     });
</script>
<script>
			function activepermission(uid)	
			{		
				swal({
                  title: "Are you sure do you want to Active this Permission?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willActive) => {
            		if (willActive) {	
                        $.ajax({
						url: "<?php echo site_url(); ?>/UserPermission/ActivePermission/",
						data: {'search_data' : uid},
						type: "post",
						success: function()
						{
							window.location.reload(true);
						}
					});
            		} else {
            			
            		}
            	});	
			}	
			
			function inactivepermission(uid)	
			{	
				swal({
                  title: "Are you sure do you want to Inactive this Permission?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willInactive) => {
            		if (willInactive) {	
                        $.ajax({
						url: "<?php echo site_url(); ?>/UserPermission/InctivePermission/",
						data: {'search_data' : uid},
						type: "post",
						success: function()
						{
							window.location.reload(true);
						}
					});
            		} else {
            			
            		}
            	});
			}
	</script>
	<?php
					if($this->session->flashdata('message') != '')
						{
					?>
						<script>
							swal({
							  title: "Success",
							  text: "Permission Inactive Successfully",
							  icon: "success",
							  button: false,
							  timer: "1500",
							});
							</script>
					<?php
						}
					?>
					<?php
					if($this->session->flashdata('message1') != '')
						{
					?>
						<script>
							swal({
							  title: "Success",
							  text: "Permission Active Suceessfully",
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
