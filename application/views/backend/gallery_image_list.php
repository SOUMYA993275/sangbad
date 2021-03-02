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
                <div class="col-lg-10">
                    <h2>Gallery Image List</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Gallery Image List</strong>
                        </li>
                    </ol>
                </div>
				<div class="col-lg-2">
					<h2></h2>
                    <a style="float:right; border-radius: 20px;" href="<?=site_url('GalleryImage');?>" class="btn btn-primary block full-width m-b"a style="float:right">Add New</a>
                </div>
						<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Image Details</h5>
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover dataTables-example" >
									<thead>
									<tr>
										<th>Sl no</th>
										<th>Tittle</th>
										<th>Image Id</th>
										<th>Post Date & Time</th>
										<th>Image Count</th>
										<th>Created By</th>
										<th>Updated By</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php  
											$i=0;
											foreach($imagelist as $mn)
											{
												$i++;
											?>
									<tr class="gradeX">
										<td><?=$i;?></td>
										<td><?=$mn->imagetitle;?></td>
										<td><?=$mn->imageid;?></td>
										<td><?=$mn->postdate;?> <?=$mn->posttime;?></td>
										<td><?=$mn->imagecount;?></td>
										<td><?=$mn->createdby;?></td>
										<td class="center"><?=$mn->updatedby;?></td>
										<td class="center">
										<?php
										if($mn->status==1)
										{
										?>
										<img src='<?=base_url();?>Uploads/general/inactive.gif' title="Inactive">
										<?php
										}
										else if($mn->status==0)
										{
										?>
										<img src='<?=base_url();?>Uploads/general/active.gif' title="Active">
									   <?php
										}
										?>
										</td>
										<td class="center">
										<button onclick="viewimage('<?=$mn->imageid;?>')" type="button" title="View Image" class="btn btn-secondary fa fa-eye"></button>
										<?php
										if($mn->status==1) 
										{ 
										?>
											<button onclick="activeimagecategory('<?=$mn->slno;?>')" type="button" title="Active Image Category" class="btn btn-success fa fa-check-circle-o"></button>
										<?php
										} 
										else if($mn->status==0)
										{ 
										?>
											<button onclick="inactiveimagecategory('<?=$mn->slno;?>')" type="button" title="Inactive Image Category" class="btn btn-warning fa fa-check-circle-o"></button>
										<?php
										} 
										?>
										<button onclick="deleteimagecategory('<?=$mn->slno;?>')" type="button" title="Delete Image Category" class="btn btn-danger fa fa-trash"></button>
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
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv', title: 'Gallery Video SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'excel', title: 'Gallery Video SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'pdf', title: 'Gallery Video SNRD <?php echo date("Y-m-d h-i a");?>'},

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
			function deleteimagecategory(did)	
			{		
				var geturl = "<?php echo site_url('GalleryImage/DeleteImageCategory');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Delete this Image Category?",
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
			function activeimagecategory(did)	
			{		
				var geturl = "<?php echo site_url('GalleryImage/ActiveImageCategory');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Active this Image Category?",
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
			
			function inactiveimagecategory(did)	
			{	
				var geturl = "<?php echo site_url('GalleryImage/InactiveImagecategory');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Inactive this Image Category?",
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
			function viewimage(did)	
			{	
				var geturl = "<?php echo site_url('GalleryImage/GalleryImageDetails');?>/"+did;	
				swal({
                  title: "Are you sure do you want to View All Image?",
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
  text: "Gallery Image Created Successfully",
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
  text: "Gallery Image Inactive Successfully",
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
  text: "Gallery Image Active Successfully",
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
  text: "Gallery Image Delete Successfully",
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
