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
	<link href="<?=base_url();?>css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?=base_url();?>css/plugins/steps/jquery.steps.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	<!-- Ladda style -->
    <link href="<?=base_url();?>css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/clockpicker/clockpicker.css" rel="stylesheet">


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
	
	.add_form_field
			{
				background-color: #1c97f3;
				color: white;
				padding: 2px 17px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 4px 2px;
				cursor: pointer;
				border:1px solid #186dad;
				border-radius: 20px;
			}
			.delete{
				background-color: #fd1200;
				color: white;
				padding: 2px 10px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 14px;
				margin: 4px 2px;
				cursor: pointer;
				border: 1px solid #584e4e;
				border-radius: 20px;
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
                    <h3>Gallery Image</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Gallery Image Add</strong>
                        </li>
                    </ol>
                </div>
				<div class="col-lg-12">
					<div class="ibox ">
							<div class="ibox-title">
								<h5>Image Upload</h5>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" role="form" name="myForm" enctype="multipart/form-data" method="POST" action="">
											<div class="row">
												<div class="col-lg-1"></div>
												<div class="col-lg-10">
													<div class="form-group">
														<label>Image Title</label>
														<input id="title" name="title" type="text" placeholder="Enter Image Title" class="form-control" required>
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
												<div class="col-lg-4">
													<div class="form-group">
														<label>Image</label><span style="color:red;"> ::Max Image size 450kb</span>
														<input id="image" name="filename[]" type="file" accept="image/gif, image/jpeg, image/JPEG, image/png, image/PNG, image/jpg, image/JPG" title="Choose Image" class="form-control" required>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-group">
														<label>Collected From</label>
														<input id="collected_from" name="collected_from[]" type="text" placeholder="Enter Author" value="সংগৃহীত" class="form-control" required>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-group">
														<label>Banner</label>
														<select id="p_status" name="p_status[]" type="text" class="form-control" required>
															<option value="">Choose Banner</option>
															<option value="1" selected>Yes</option>
															<option value="0">No</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-1"></div>
												<div class="col-lg-8">
													<div class="form-group">
														<label>Description</label>
														<textarea id="description" name="description[]" type="text" title="Enter Description" class="form-control" required></textarea>
													</div>
												</div>
												<div class="col-lg-2" style="padding-top: 40px" align="center">
													<input type="hidden" name="val" id="val" value="0">
													<input onclick="addRow(this.form);" type="button" value="Add" class="add_form_field">
												</div>
											</div>
											<div id="newsection"></div>
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
	<script src="<?=base_url();?>js/plugins/sweetalert/sweetalert.min.js"></script>

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
<script>
			var valu = 0;
			function addRow(frm) {
				//alert(frm);
				var max_fields = 10;
				if($("input[id=image]").val() == "")
				{
					swal({
					title: "Oops!",
					text: "Please select image first",
					type: "error"
            });
					return false; 
				}
				else
				{
					var valu = $('#val').val();
					if(valu < max_fields){
						valu ++;
						$("button[type='submit']").removeAttr('disabled');
						//alert(valu);
						var row1 ='<div id="myDiv'+valu+'"><div class="row"><div class="col-lg-1"></div><div class="col-lg-4"><div class="form-group"><label>Image</label><span style="color:red;"> ::Max Image size 450kb</span><input id="image'+valu+'" name="filename[]" type="file" title="Choose Image" class="form-control" required></div></div><div class="col-lg-3"><div class="form-group"><label>Collected From</label><input id="collected_from'+valu+'" name="collected_from[]" type="text" placeholder="Enter Author" value="সংগৃহীত" class="form-control" required></div></div><div class="col-lg-3"><div class="form-group"><label>Banner</label><select id="p_status'+valu+'" name="p_status[]" type="text" class="form-control" required><option value="">Choose Banner</option><option value="1">Yes</option><option value="0" selected>No</option></select></div></div></div><div class="row"><div class="col-lg-1"></div><div class="col-lg-8"><div class="form-group"><label>Description</label><textarea id="description" name="description[]" type="text" title="Enter Description" class="form-control" required></textarea></div></div><div class="col-lg-2" style="padding-top: 40px" align="center"><input onclick="removeRow('+valu+');" type="button" value="Delete" class="delete" readonly/></div></div></div>';
						
						$('#newsection').append(row1);
						
					}
					else
					{
						swal({
						title: "Oops!",
						text: "You Reached the limits",
						type: "error"
				});
					}
				}
			}
			
			function removeRow(rnum)
			{		
				var valu = $('#val').val();
				jQuery('#myDiv'+rnum).remove();
				valu--;
				document.getElementById('val').value = valu;
			}			
		</script>
<?php
if($this->session->flashdata('message3') != '')
{
?>
<script>
swal({
  title: "Oops!",
  text: "Image size is greater than 500kb",
  type: "error",
  button: false,
  timer: "1500",
});
</script>
<?php
}
?>
</body>

</html>
