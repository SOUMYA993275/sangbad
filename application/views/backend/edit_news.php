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
	<!-- Ladda style -->
    <link href="<?=base_url();?>css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	<link href="<?=base_url();?>css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="<?=base_url();?>css/plugins/summernote/summernote-bs4.css" rel="stylesheet">
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
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Edit News</strong>
                        </li>
                    </ol>
                </div>
				<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>News Edit</h5>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" role="form" name="myForm" enctype="multipart/form-data" accept-charset="utf-8" method="POST" onsubmit="return validateForm()" action="<?=site_url('News/Update');?>">
											<div class="row">
												<div class="col-lg-3">                        
													<div class="block">
														<h3 align="center">Category </h3>
														<div class="panel panel-default">
															<div class="panel-body">
																<div class="row">
																	<div class="col-lg-12" style="padding-left: 0px;padding-right: 0px;">
																	<input type="hidden" class="form-control" name="slno" value="<?=$news[0]->slno; ?>" required />
																	<input type="hidden" class="form-control" name="newsid" value="<?=$news[0]->newsid; ?>" required />
																		<div class="row">
																		<?php
																		foreach($category as $cg)
																		{
																		?>
																			<div class="col-lg-8 control-label">
																				<label style="padding-right: 0px;text-align: left;padding-top: 0px;padding-left: 14px;font-size: 20px;font-weight: bold;"><?=$cg->menuname;?></label>
																			</div>
																			<div class="col-lg-3">
																				<label class="switch">
																					<input type="radio" name="switch-radio1" <?php if($cg->menucode == $news[0]->category) { echo "checked"; } ?> value="<?=$cg->menucode;?>" required>
																					<span></span>
																				</label>
																			</div>
																		<?php
																		}
																		?>
																		</div>
																	</div>
																	<div class="col-lg-12" style="padding-left: 0px;padding-right: 0px;">
																		<div class="row">
																		<?php
																		foreach($tabdetails as $td)
																		{
																		?>
																			<div class="col-lg-8 control-label">
																				<label style="padding-right: 0px;text-align: left;padding-top: 0px;padding-left: 14px;font-size: 20px;font-weight: bold;"><?=$td->tabname;?></label>
																			</div>
																			<div class="col-lg-3">
																				<label class="switch">
																					<input type="radio" name="switch-radio1" <?php if($td->tabcode == $news[0]->category) { echo "checked"; } ?> value="<?=$td->tabcode;?>" required/>
																					<span></span>
																				</label>
																			</div>
																		<?php
																		}
																		?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-9">
													<div class="form-group">
														<label>Title<span style="color:red;"> (Bengali)</span></label>
														<input id="btitle" name="btitle" type="text" placeholder="Enter Bengali Title" value="<?=$news[0]->ntitle;?>" class="form-control" required>
													</div>
													<div class="row">
														<div class="col-lg-10 form-group">
															<label>Title<span style="color:red;"> (English)</span></label>
															<input id="etitle" name="etitle" value="<?=$news[0]->eng_title;?>" type="text" placeholder="Enter English Title" class="form-control" required>
														</div>
														<div class="col-lg-2 form-group">
															<label><span style="font-size :17px; font-weight: bold;"> শিরোনাম</span></label>
															<input id="checkbox4" name="sironam" <?php if($news[0]->title == 1) { echo "checked"; } ?> type="checkbox" style="width: 20px;height: 20px;" value="1" class="form-control">
														</div>
													</div>
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group" id="data_1">
															<label class="font-normal">Date</label>
															<div class="input-group date">
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="<?php date_default_timezone_set('Asia/Calcutta');  echo $news[0]->date;?>" required>
															</div>
														</div>
														</div>
														<div class="col-lg-6">
															<label>Time</label>
															<div class="input-group clockpicker" data-autoclose="true">
																<input type="text" class="form-control" name="time" value="<?php date_default_timezone_set('Asia/Calcutta');  echo $news[0]->time;?>" >
																<span class="input-group-addon">
																	<span class="fa fa-clock-o"></span>
																</span>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-5 form-group">
															<label><span style="font-size :17px; font-weight: bold;"> Change Image</span></label>
															<input id="imagechange" name="imagechange" type="checkbox" value="1" class="" style="width: 20px;height: 20px;" onclick="ImageChange();">
														</div>
													</div>
													<div class="row">
														<div class="col-lg-4">
															<div class="form-group">
																<label>Image 1<span style="color:red;"> (Image Size Should be 683*384 px)</span></label>
																<input id="image1" name="image1" type="file" disabled accept="image/gif, image/jpeg, image/JPEG, image/png, image/PNG, image/jpg, image/JPG" placeholder="Select Image" class="form-control">
															</div>
														</div>
														<div class="col-lg-4">
															<div class="form-group">
																<label>Image 2<span style="color:red;"> (Optional)</span></label>
																<input id="image2" name="image2" type="file" disabled accept="image/gif, image/jpeg, image/JPEG, image/png, image/PNG, image/jpg, image/JPG" placeholder="Select Image" class="form-control" >
															</div>
														</div>
														<div class="col-lg-4 form-group">
															<label>Collected From :</label>
															<input id="collected" name="collected" type="text" placeholder="Enter News Source" class="form-control" value="<?=$news[0]->collected_from;?>" required>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-6 form-group">
															<img style="border: 2px solid black;height:140px;width:270px;<?php if($news[0]->image1==''){ echo "display:none;"; } ?>" id="preview1" src="<?=base_url($news[0]->image1);?>" alt="Image1" >
														</div>
														<div class="col-lg-6 form-group">
															<img style="border: 2px solid black;height:140px;width:270px;<?php if($news[0]->image2==''){ echo "display:none;"; } ?>" id="preview2" src="<?=base_url($news[0]->image2);?>" alt="Image2" >
														</div>
													</div>
													<div class="form-group">
														<label>Youtube Link<span style="color:red;"> (Optional)</span></label>
														<input id="ylink" name="ylink" type="url" placeholder="Enter Youtube Link" value="<?=$news[0]->video1;?>" class="form-control">
													</div>
													<div class="form-group">
														<label>Other Link (Instagram/Twitter)<span style="color:red;"> (Optional)</span></label>
														<textarea id="olink" name="olink" type="url" placeholder="Enter other Link" class="form-control"><?=$news[0]->otherlink;?></textarea>
													</div>
													<div class="form-group">
														<label>News Details</label>
														<textarea id="n_details" name="n_details" class="form-control summernote" required><?=$news[0]->news_description;?></textarea>
														<textarea id="details" name="details" class="form-control" style="display:none;"></textarea>
													</div>
													<div class="col-lg-6" style="border-top: none; text-align: center;">
														<button type="reset" class="ladda-button btn btn-warning" data-style="zoom-in">Clear Form</button>                                    
														<button type="submit" class="ladda-button btn btn-primary" data-style="zoom-in">Update</button>
													</div>
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
	<!-- SUMMERNOTE -->
    <script src="<?=base_url();?>js/plugins/summernote/summernote-bs4.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
        $(document).ready(function(){

            $('.summernote').summernote();

       });
    </script>
	<script type="text/javascript">
		$(function () {
			$(\'.summernote\').summernote({
				height: 200
			  });
			 $(\'.summernote\').summernote({
					height:300,
					onImageUpload: function(files, editor, welEditable) {
						sendFile(files[0],editor,welEditable);
					}
				});

		});
		</script>
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
		var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });
			
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
			function readURL(input) {

				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$("#preview1").css("display", "");
						$('#preview1').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
				else
				{
					$('#preview1').attr('src', '');
					$("#preview1").css("display", "none");
				}
			}

			$("#image1").change(function(){
				readURL(this);
			});
			
			function readURL1(input) {
			
			
			if (input.files && input.files[0]) {
					var reader1 = new FileReader();

					reader1.onload = function (e) {
						$("#preview2").css("display", "");
						$('#preview2').attr('src', e.target.result);
					}
					reader1.readAsDataURL(input.files[0]);
				}
				else
				{
					$('#preview2').attr('src', '');
					$("#preview2").css("display", "none");
				}
			}

			$("#image2").change(function(){
				readURL1(this);
			});
			
			$('.clockpicker').clockpicker();
		
		var mem = $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
		
		function copyText()
			{
				var val = $($("#n_details").code()).text();
				//alert(val);
				$("#details").val(val);
			}
			
		function validateForm() {
				//var x = document.forms["myForm"]["check"].checked;
				///if (x == false) {
					//alert("Check Box must be filled out");
					var val = $($("#n_details").code()).text();
					//alert(val);
					$("#details").val(val);
					return true;
				//}
			}
			
</script>
<script>
			function ImageChange()
			{
				var ic = document.getElementById("imagechange");
				
				if(ic.checked)
				{
					document.getElementById("image1").disabled = false;
					document.getElementById("image2").disabled = false;
					$("#image1").attr("required", "true");
				}
				else
				{
					document.getElementById("image1").disabled = true;
					document.getElementById("image2").disabled = true;
					$('#image1').removeAttr('required');
				}
			}
		
		
</script>
<?php
if($this->session->flashdata('message1') != '')
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
if($this->session->flashdata('message2') != '')
{
?>
<script>
swal({
  title: "Oops!",
  text: "Image Size is more than 500kb",
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
  title: "Oops!",
  text: "This type of file not allowed.",
  icon: "error",
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
  title: "Oops!",
  text: "This News already Exist",
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
