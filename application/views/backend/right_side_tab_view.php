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
                <div class="col-lg-10">
                    <h2>Right Side Tab</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>News Tab</strong>
                        </li>
                    </ol>
                </div>
				<div class="col-lg-2">
					<h2></h2>
                    <a style="float:right; border-radius: 20px;" href="<?=site_url('RightsideTab');?>" class="btn btn-primary block full-width m-b"a style="float:right">Add New Tab</a>
                </div>
				<div class="col-lg-12">
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Menu Details</h5>
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover dataTables-example" >
										<thead>
											<tr>
												<th>Sl No</th>
												<th>Tab Name</th>
												<th>Tab Code</th>
												<th>Tab Link</th>
												<th>Image</th>
												<th>Upload By</th>
												<th>Modified By</th>
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
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>index.php/RightsideTab/tabList'
          },
          'columns': [
			 {
				"data": "slno",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			 },
             { data: 'tabname' },
             { data: 'tabcode' },
             { data: 'tablink' },
             {
                "render": function (data, type, full, meta) {
                return '<img src="<?=base_url();?>/' + full.tabimage + '" width="200px" height="110px">';
                }
             },
			 { data: 'createdby' },
			 { data: 'updatedby' },
             { data: 'tabstatus' },
             { data: null, render: function(data, type, full, meta) {
				switch(full.tabstatus) {
					   case 'Active' : return '<button onclick="inactivetab(' + full.slno + ')" title="Inactive Tab" class="btn btn-warning fa fa-check-circle-o"></button>  <button onclick="edittab(' + full.slno + ')" title="Edit Tab" class="btn btn-info fa fa-pencil"></button>  <button onclick="deletetab(' + full.slno + ')" title="Delete Tab" class="btn btn-danger fa fa-trash"></button>'; break;
					   case 'Inactive' : return '<button onclick="activetab(' + full.slno + ')" title="Active Tab" class="btn btn-primary fa fa-check-circle-o"></button>  <button onclick="edittab(' + full.slno + ')" title="Edit Tab" class="btn btn-info fa fa-pencil"></button>  <button onclick="deletetab(' + full.slno + ')" title="Delete Tab" class="btn btn-danger fa fa-trash"></button>'; break;
					   default  : return 'N/A';
					}
				} 
			 }
          ],
		  columnDefs : [
				{ targets : [6],
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
                    {extend: 'csv', title: 'RightTab SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'excel', title: 'RightTab SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'pdf', title: 'RightTab SNRD <?php echo date("Y-m-d h-i a");?>'},

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
			function deletetab(did)	
			{		
				var geturl = "<?php echo site_url('RightsideTab/DeleteTab');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Delete this Tab?",
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
			function activetab(did)	
			{		
				var geturl = "<?php echo site_url('RightsideTab/ActiveTab');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Active this Tab?",
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
			
			function inactivetab(did)	
			{	
				var geturl = "<?php echo site_url('RightsideTab/InactiveTab');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Inactive this Tab?",
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
			function edittab(did)	
			{	
				var geturl = "<?php echo site_url('RightsideTab/EditTab');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Edit this Tab?",
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
  text: "Tab Created Successfully",
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
  text: "Tab Edited Successfully",
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
  text: "Tab Inactive Successfully",
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
  text: "Tab Active Successfully",
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
  text: "Tab Delete Successfully",
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
