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
				<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Right Side Tab Edit</h5>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" role="form" name="myForm" method="POST" enctype="multipart/form-data" action="<?=site_url('RightsideTab/UpdateTab');?>">
										<input name="slno" type="text" value="<?=$tabdetails[0]->slno;?>" hidden class="form-control" required>
											<div class="row">
												<div class="col-lg-7">
													<div class="form-group">
														<label>Tab Name<span style="color:red;"> (Bengali)</span></label>
														<input id="tabname" name="tabname" type="text" value="<?=$tabdetails[0]->tabname;?>" placeholder="Enter Tab Name" class="form-control" required>
													</div>
													<div class="form-group">
														<label>Tab Code<span style="color:red;"> (English)</span></label>
														<input id="tabcode" name="tabcode" type="text" value="<?=$tabdetails[0]->tabcode;?>" placeholder="Enter Tab Code" oninput="this.value = this.value.toUpperCase()" class="form-control" readonly required>
													</div>
													<div class="form-group">
														<label>Change Image</label>
														<input id="imagechange" name="imagechange" type="checkbox" value="1" style="width:20px; height:20px;" onclick="ImageChange();" class="form-control">
													</div>
													<div class="row">
														<div class="col-lg-6" id="opener" style="display:none;">
															<div class="form-group">
																<label>Tab Image<span style="color:red;"> (Image Size Should be 683*384 px)</span></label>
																<input id="tabimage" name="tabimage" type="file" accept="image/gif, image/jpeg, image/JPEG, image/png, image/PNG, image/jpg, image/JPG" placeholder="Select Tab Image" class="form-control">
															</div>
														</div>
														<div class="col-lg-5">
															<div class="form-group">
																<label>Status:</label>
																<select id="tabstatus" name="tabstatus" type="text" class="form-control" required>
																<option value="">Choose Status</option>
																<option value="Active" <?php if($tabdetails[0]->tabstatus =="Active") echo 'selected="selected"'; ?>>Active</option>
																<option value="Inactive" <?php if($tabdetails[0]->tabstatus =="Inactive") echo 'selected="selected"'; ?>>Inactive</option>>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-5">
													<img style="border: 2px solid black;height:250px;width:360px;" id="preview1"  src="<?=base_url($tabdetails[0]->tabimage);?>" alt="Image1" >
												</div>
												<div class="col-lg-6" style="border-top: none; text-align: center;">
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

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url();?>js/inspinia.js"></script>
    <script src="<?=base_url();?>js/plugins/pace/pace.min.js"></script>
   <!-- Ladda -->
    <script src="<?=base_url();?>js/plugins/ladda/spin.min.js"></script>
    <script src="<?=base_url();?>js/plugins/ladda/ladda.min.js"></script>
    <script src="<?=base_url();?>js/plugins/ladda/ladda.jquery.min.js"></script>
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
	
	$(function() {
        $('#code').on('keypress', function(e) {
            if (e.which == 32){
                console.log('Space Detected');
                return false;
            }
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

			$("#tabimage").change(function(){
				readURL(this);
			});
			
</script>
<script>
			function ImageChange()
			{
				var ic = document.getElementById("imagechange");
				
				if(ic.checked)
				{
					document.getElementById("opener").style.display='block';
					$("#tabimage").attr("required", "true");
				}
				else
				{
					document.getElementById("opener").style.display='none';
					$('#tabimage').removeAttr('required');
				}
			}
		
		
</script>
<?php
if($this->session->flashdata('message2') != '')
{
?>
<script>
swal({
  title: "Oops!",
  text: "This Tab already exist, try different one.",
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
  text: "Image size is greater than 500kb",
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
