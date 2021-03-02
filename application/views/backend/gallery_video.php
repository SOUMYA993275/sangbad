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
	<link href="<?=base_url();?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	<!-- Ladda style -->
    <link href="<?=base_url();?>css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
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
                    <h3>Gallery Video</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Gallery Video</strong>
                        </li>
                    </ol>
                </div>
				<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Video Upload</h5>
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
								</div>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" role="form" name="myForm" method="POST" action="<?=site_url('Video/InsertVideo');?>">
											<div class="row">
												<div class="col-lg-1"></div>
												<div class="col-lg-10">
													<div class="form-group">
														<label>Video Title</label>
														<input id="title" name="title" type="text" placeholder="Enter Video Title" class="form-control" required>
													</div>
												</div>
												<div class="col-lg-1"></div>
											</div>
											<div class="row">
												<div class="col-lg-1"></div>
													<div class="col-lg-5">
														<div class="form-group" id="data_1">
															<label class="font-normal">Date</label>
															<div class="input-group date">
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="<?php date_default_timezone_set('Asia/Calcutta');  echo date('d-m-Y');?>" required>
															</div>
														</div>
													</div>
													<div class="col-lg-5">
													<label>Time</label>
														<div class="input-group clockpicker" data-autoclose="true">
															
															<input type="text" class="form-control" name="time" value="<?php date_default_timezone_set('Asia/Calcutta');  echo date('h:i');?>" >
															<span class="input-group-addon">
																<span class="fa fa-clock-o"></span>
															</span>
														</div>
													</div>
											</div>
											<div class="row">
														<div class="col-lg-1"></div>
														<div class="col-lg-10">
															<div class="form-group">
																<label>Video Url</label>
																<input id="url" name="url" type="url" placeholder="Enter Youtube Url" class="form-control" required>
															</div>
														</div>
												<div class="col-lg-12" style="border-top: none; text-align: center;">
													<button type="reset" class="ladda-button btn btn-warning" data-style="zoom-in">Clear</button>                                    
													<button type="submit" class="ladda-button btn btn-primary" data-style="zoom-in">Submit</button>
												</div>
											</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Video Details</h5>
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
										<th style="width: 130px;">Video Title</th>
										<th>Video</th>
										<th>Video Link</th>
										<th>Created By</th>
										<th>Updated By</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php  
									$i=0;
									foreach($video as $mn)
									{
									$i++;
									?>
									<tr class="gradeX">
										<td><?=$i;?></td>
										<td><?=$mn->videotitle;?></td>
										<td><iframe width="200px" height="130px" src="https://www.youtube.com/embed/<?=$mn->youtubeid;?>"frameborder="0" allowfullscreen></iframe></td>
										<td><a class="fa fa-eye" href="<?=$mn->videolink;?>" target="blank"></a></td>
										<td><?=$mn->createdby;?></td>
										<td><?=$mn->updatedby;?></td>
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
										<?php
												if($mn->status==1) 
												{ 
												?>
													<button onclick="activevideo('<?=$mn->slno;?>')" type="button" title="Active Video" class="btn btn-success fa fa-check-circle-o"></button>
												<?php
													} 
													else if($mn->status==0)
													{ 
												?>
													<button onclick="inactivevideo('<?=$mn->slno;?>')" type="button" title="Inactive Video" class="btn btn-warning fa fa-check-circle-o"></button>
												<?php
													} 
												?>
												<button onclick="editvideo('<?=$mn->slno;?>')" type="button" title="Delete Video" class="btn btn-info fa fa-pencil"></button>
												<button onclick="deletevideo('<?=$mn->slno;?>')" type="button" title="Delete Video" class="btn btn-danger fa fa-trash"></button>
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?=base_url();?>js/inspinia.js"></script>
    <script src="<?=base_url();?>js/plugins/pace/pace.min.js"></script>
   <!-- Ladda -->
    <script src="<?=base_url();?>js/plugins/ladda/spin.min.js"></script>
    <script src="<?=base_url();?>js/plugins/ladda/ladda.min.js"></script>
    <script src="<?=base_url();?>js/plugins/ladda/ladda.jquery.min.js"></script>
	<!-- Clock picker -->
    <script src="<?=base_url();?>js/plugins/clockpicker/clockpicker.js"></script>
	<!-- Data picker -->
   <script src="<?=base_url();?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
   <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?=base_url();?>js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?=base_url();?>js/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?=base_url();?>js/plugins/dataTables/datatables.min.js"></script>
	<script src="<?=base_url();?>js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
   <script>
   $(document).ready(function (){

        // Bind normal buttons
        Ladda.bind( '.ladda-button',{ timeout: 2000 });

        // Bind progress buttons and simulate loading progress
        Ladda.bind( '.progress-demo .ladda-button',{
            callback: function( instance ){
                var progress = 0;
                var interval = setInterval( function(){
                    progress = Math.min( progress + Math.random() * 0.1, 1 );
                    instance.setProgress( progress );

                    if( progress === 1 ){
                        instance.stop();
                        clearInterval( interval );
                    }
                }, 200 );
            }
        });
		$('.clockpicker').clockpicker();
		
		var mem = $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
		var l = $( '.ladda-button-demo' ).ladda();

        l.click(function(){
            // Start loading
            l.ladda( 'start' );

            // Timeout example
            // Do something in backend and then stop ladda
            setTimeout(function(){
                l.ladda('stop');
            },12000)


        });

    });
	
	$(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
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
			function deletevideo(did)	
			{		
				var geturl = "<?php echo site_url('Video/DeleteVideo');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Delete this Video?",
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
			function activevideo(did)	
			{		
				var geturl = "<?php echo site_url('Video/ActiveVideo');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Active this Video?",
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
			
			function inactivevideo(did)	
			{	
				var geturl = "<?php echo site_url('Video/InactiveVideo');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Inactive this Video?",
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
			function editvideo(did)	
			{	
				var geturl = "<?php echo site_url('Video/EditVideo');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Edit this Video?",
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
  text: "Gallery Video Created Successfully",
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
  text: "Gallery Video Edited Successfully",
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
  text: "Gallery Video Inactive Successfully",
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
  text: "Gallery Video Active Successfully",
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
  text: "Gallery Video Delete Successfully",
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
