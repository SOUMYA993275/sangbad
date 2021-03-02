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
                    <h2>Advertisement</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Advertisement</strong>
                        </li>
                    </ol>
                </div>
				<div class="col-lg-2">
					<h2></h2>
                    <a style="float:right; border-radius: 20px;" href="<?=site_url('Advertise');?>" class="btn btn-primary block full-width m-b"a style="float:right">Add New</a>
                </div>
				<div class="col-lg-12">
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Advertisement Details</h5>
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover dataTables-example" >
									<thead>
									<tr>
										<th>Sl No</th>
										<th>Image</th>
										<th>Sponsored By</th>
										<th>Position</th>
										<th>Description</th>
										<th>Upload By</th>
										<th>Modified By</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php  
											$i=0;
											foreach($adddetails as $mn)
											{
												$i++;
											?>
											<tr class="gradeC">
												<td><?=$i;?></td>
												<td><img src="<?=base_url($mn->image);?>" width="170px" height="130px"></td>
												<td><?=$mn->givenby;?></td>
												<td><?=$mn->position;?></td>
												<td class="center"><?=$mn->description;?></td>
												<td class="center"><?=$mn->createdby;?></td>
												<td class="center"><?=$mn->updatedby;?></td>
												<td class="center">
												<?php
												if($mn->status=='Inactive')
												{
												?>
												<img src='<?=base_url();?>Uploads/general/inactive.gif' title="Inactive">
												<?php
												}
												else if($mn->status=='Active')
												{
												?>
												<img src='<?=base_url();?>Uploads/general/active.gif' title="Active">
											   <?php
												}
												?>
										</td>
										<td class="center" style="width: 160px;">
										<?php
												if($mn->status=='Inactive') 
												{ 
												?>
													<button onclick="activeadvertisement('<?=$mn->slno;?>')" type="button" title="Active Advertisement" class="btn btn-success fa fa-check-circle-o"></button>
												<?php
													} 
													else if($mn->status=='Active')
													{ 
												?>
													<button onclick="inactiveadvertisement('<?=$mn->slno;?>')" type="button" title="Inactive Advertisement" class="btn btn-warning fa fa-check-circle-o"></button>
												<?php
													} 
												?>
												<button onclick="editadvertisement('<?=$mn->slno;?>')" type="button" title="Edit Advertisement" class="btn btn-info fa fa-pencil"></button>
												<button onclick="deleteadvertisement('<?=$mn->slno;?>')" type="button" title="Delete Advertisement" class="btn btn-danger fa fa-trash"></button>
												<a href="<?=$mn->url;?>" target="blank"><button  type="button" title="View Advertisement" style="background: hotpink; color:white;" class="btn fa fa-eye"></button></a>
										</td>
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
	
   <script src="<?=base_url();?>js/plugins/dataTables/datatables.min.js"></script>
   <script src="<?=base_url();?>js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>  
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
			
		$(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv', title: 'Advertise SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'excel', title: 'Advertise SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'pdf', title: 'Advertise SNRD <?php echo date("Y-m-d h-i a");?>'},

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
<script>
			function deleteadvertisement(did)	
			{		
				var geturl = "<?php echo site_url('Advertise/DeleteAdvetisement');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Delete this Advetisement?",
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
			function activeadvertisement(did)	
			{		
				var geturl = "<?php echo site_url('Advertise/ActiveAdvetisement');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Active this Advetisement?",
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
			
			function inactiveadvertisement(did)	
			{	
				var geturl = "<?php echo site_url('Advertise/InactiveAdvetisement');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Inactive this Advetisement?",
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
			function editadvertisement(did)	
			{	
				var geturl = "<?php echo site_url('Advertise/EditAdvetisement');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Edit this Advetisement?",
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
  text: "Advertisement Created Successfully",
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
  title: "Success",
  text: "Advertisement Edited Successfully",
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
  text: "Advertisement Inactive Successfully",
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
  text: "Advertisement Active Successfully",
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
  text: "Advertisement Delete Successfully",
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
