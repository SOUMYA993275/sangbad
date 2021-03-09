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
                    <h3>News Authentication</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>News Authentication</strong>
                        </li>
                    </ol>
                </div>
				<div class="col-lg-2">
					<h2></h2>
                    <a style="float:right; border-radius: 20px; color: white;" data-toggle="modal" data-target="#myModal3" class="btn btn-primary block full-width m-b">Add New</a>
				</div>
				<div class="modal inmodal" id="myModal3" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated flipInY">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            </div>
                            <div class="modal-body">
                                <p style="text-align: center;"><h2>Are You Sure, Do You Want to go<strong>External Page?</strong></h2></p>
                            </div>
                            <div class="modal-footer" style="text-align: center;">
                                <a href="<?=site_url('News');?>"><button type="button" class="btn btn-primary">News</button></a>
                                <a href="<?=site_url('Breaking');?>"><button type="button" class="btn btn-primary">Breaking</button></a>
                            </div>
                        </div>
					</div>
                </div>
				<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Search By Date</h5>
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
								</div>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" role="form" name="myForm" method="POST" action="<?=site_url('NewsAuthentication');?>">
											<div class="row">
												<div class="col-lg-4"></div>
												<div class="col-lg-4">
													<div class="form-group" id="data_1">
														<label class="font-normal">Date</label>
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="<?php date_default_timezone_set('Asia/Calcutta');  echo date('m/d/Y');?>" required>
														</div>
													</div>
												</div>
												<div class="col-lg-4"></div>
											</div>
												<div class="col-lg-12" style="border-top: none; text-align: center;">
													<button type="reset" class="ladda-button btn btn-warning" data-style="zoom-in">Clear</button>                                    
													<button type="submit" class="ladda-button btn btn-primary" data-style="zoom-in">Submit</button>
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
								<h5>News Details</h5>
									<div class="ibox-tools">
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>
									</div>
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover dataTables-example" >
								<?php
								if($check==0)
								{
								?>
								<thead>
									<tr>
										<th>Sl No</th>
                                        <th>News Id</th>
                                        <th>Category</th>
                                        <th>News Title</th>
                                        <th>Date Time</th>
                                        <th>Upload By</th>
                                        <th>Modified By</th>
										<th>Status</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
								</thead>
									<?php
									if($date!='')
									{
									$this->load->model('Adminmodel');
									$allnews = $this->Adminmodel->getnewsBydate($date);
									}
									else
									{
										
									}
									$i = 0;
									foreach($allnews as $an)
									{
									$i++;
									?>
									<tbody>
									<tr class="gradeX">
										<td><?=$i;?></td>
										<td><?=$an->newsid;?></td>
										<td><?=$an->category;?></td>
										<?php
										if($an->title == 1 && $an->category != 'Breaking')
										{
										?>
										<td title="শিরোনাম"><a onclick="inactivetitle('<?=$an->slno;?>')" style="color :red;"><?=$an->ntitle;?></a></td>
										<?php	
										}
										else if($an->title == 0 && $an->category != 'Breaking')
										{
										?>
										<td><a onclick="activetitle('<?=$an->slno;?>')" style="color :blue;"><?=$an->ntitle;?></a></td>
										<?php
										}
										else if($an->category == 'Breaking')
										{
										?>
										<td title="Breaking" style="color :black;"><?=$an->ntitle;?></td>
										<?php
										}
										?>
										<td><?=$an->date;?> <?=$an->time;?></td>
										<td><?=$an->createdby;?></td>
										<td><?=$an->updatedby;?></td>
										<td>
										<?php
												if($an->nstatus==1)
												{
												?>
												<img src='<?=base_url();?>Uploads/general/inactive.gif' title="Inactive">
												<?php
												}
												else if($an->nstatus==0)
												{
												?>
												<img src='<?=base_url();?>Uploads/general/active.gif' title="Active">
											   <?php
												}
												?>
										</td>
										<td class="center">
										<?php
												if($an->nstatus==1) 
												{ 
												?>
													<button onclick="activenews('<?=$an->slno;?>')" type="button" title="Active News" class="btn btn-success fa fa-check-circle-o"></button>
												<?php
													} 
													else if($an->nstatus==0)
													{ 
												?>
													<button onclick="inactivenews('<?=$an->slno;?>')" type="button" title="Inactive News" class="btn btn-warning fa fa-check-circle-o"></button>
												<?php
													} 
												?>
												<?php
												if($an->category == 'Breaking')
												{
												?>
												<button onclick="editbreaking('<?=$an->slno;?>')" type="button" title="Edit Breakig News" class="btn btn-info fa fa-pencil"></button>
												<?php
												}
												else
												{
												?>
												<button onclick="editnews('<?=$an->slno;?>')" type="button" title="Edit News" class="btn btn-info fa fa-pencil"></button>
												<?php
												}
												?>
												<button onclick="deletenews('<?=$an->slno;?>')" type="button" title="Delete News" class="btn btn-danger fa fa-trash"></button>
												<a href="" target="blank"><button  type="button" title="View Advertisement" style="background: hotpink; color:white;" class="btn fa fa-eye"></button></a>
												<button type="button" title="News Reading Count" class="btn btn-danger" disabled='true' style='border: 2px solid blue;background: #562808;border-radius: 14px;'>12</button>
										</td>
									</tr>
									</tbody>
								<?php
								}
								?>
								
									</table>
								</div>
							<?php
							}
							?>
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv', title: 'All News SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'excel', title: 'All News SNRD <?php echo date("Y-m-d h-i a");?>'},
                    {extend: 'pdf', title: 'All News SNRD <?php echo date("Y-m-d h-i a");?>'},

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
			function deletenews(uid)	
			{		
				swal({
                  title: "Are you sure do you want to Delete this News?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willDelete) => {
					if (willDelete) {	
                        $.ajax({
						url: "<?php echo site_url(); ?>/News/Deleted/",
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
			function activenews(uid)	
			{		
				swal({
                  title: "Are you sure do you want to Active this News?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willActive) => {
            		if (willActive) {	
                        $.ajax({
						url: "<?php echo site_url(); ?>/News/Active/",
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
			
			function inactivenews(uid)	
			{	
				swal({
                  title: "Are you sure do you want to Inactive this News?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willInactive) => {
            		if (willInactive) {	
                        $.ajax({
						url: "<?php echo site_url(); ?>/News/Inactive/",
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
			function editnews(did)	
			{	
				var geturl = "<?php echo site_url('News/Edit');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Edit this News?",
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
			function editbreaking(did)	
			{	
				var geturl = "<?php echo site_url('Breaking/EditBreakingNews');?>/"+did;	
				swal({
                  title: "Are you sure do you want to Edit this Breaking News?",
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
			function activetitle(uid)	
			{		
				swal({
                  title: "Are you sure do you want to Active the Title?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willActiveTitle) => {
            		if (willActiveTitle) {	
                        $.ajax({
						url: "<?php echo site_url(); ?>/News/ActiveTitle/",
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
			
			function inactivetitle(uid)	
			{	
				swal({
                  title: "Are you sure do you want to Inactive the Title?",
            		text: "",
            		icon: "info",
            		buttons: true,
            		dangerMode: true,
            	})
            	.then((willInactiveTitle) => {
            		if (willInactiveTitle) {	
                        $.ajax({
						url: "<?php echo site_url(); ?>/News/InactiveTitle/",
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
if($this->session->flashdata('message1') != '')
{
?>
<script>
swal({
  title: "Success",
  text: "News Posted Successfully",
  icon: "success",
  button: false,
  timer: "1500",
});
</script>
<?php
}
?>
<?php
if($this->session->flashdata('message8') != '')
{
?>
<script>
swal({
  title: "Success",
  text: "News Edited Successfully",
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
  text: "News Inactive Successfully",
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
  text: "News Active Successfully",
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
  text: "News Deleted Successfully",
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
  text: "Breaking News Edited Successfully",
  icon: "success",
  button: false,
  timer: "1500",
});
</script>
<?php
}
?>
<?php
if($this->session->flashdata('message9') != '')
{
?>
<script>
swal({
  title: "Success",
  text: "Title Inactive Successfully",
  icon: "success",
  button: false,
  timer: "1500",
});
</script>
<?php
}
?>
<?php
if($this->session->flashdata('message10') != '')
{
?>
<script>
swal({
  title: "Success",
  text: "Title Active Successfully",
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
