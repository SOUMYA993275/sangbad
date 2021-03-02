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
								<h5>Video Edit</h5>
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
								</div>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" role="form" name="myForm" method="POST" action="<?=site_url('Video/UpdateVideo');?>">
											<div class="row">
												<div class="col-lg-1"></div>
												<div class="form-group">
														<input id="id" name="id" type="text" value="<?=$video[0]->slno;?>" hidden class="form-control" required>
													</div>
												<div class="col-lg-10">
													<div class="form-group">
														<label>Video Title</label>
														<input id="title" name="title" type="text" value="<?=$video[0]->videotitle;?>" placeholder="Enter Video Title" class="form-control" required>
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
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="<?=$video[0]->postdate;?>" required>
															</div>
														</div>
													</div>
													<div class="col-lg-5">
													<label>Time</label>
														<div class="input-group clockpicker" data-autoclose="true">
															
															<input type="text" class="form-control" name="time" value="<?=$video[0]->posttime;?>" >
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
																<input id="url" name="url" type="url" placeholder="Enter Youtube Url" value="<?=$video[0]->videolink;?>" class="form-control" required>
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
</script>
</body>

</html>
