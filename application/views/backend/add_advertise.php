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
                    <h2>Advertisement</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('Dashboard');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Advertisement Tab</strong>
                        </li>
                    </ol>
                </div>
				<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Advertisement Upload</h5>
							</div>
							<div class="ibox-content">
								<div class="col-lg-12">
									<div class="panel panel-default" style="border: none;">
										<form class="form-horizontal" role="form" name="myForm" method="POST" enctype="multipart/form-data" action="">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label>Sponsor By :</label>
														<input id="sponsor" name="sponsor" type="text" placeholder="Enter Sponsor Name" class="form-control" required>
													</div>
													<div class="form-group">
														<label>Description :</label>
														<textarea id="description" name="description" type="text" placeholder="Enter Description" class="form-control" required></textarea>
													</div>
													<div class="form-group">
														<label>Url :</label><span style="color:red;"> (optional)</span>
														<input id="url" name="url" type="url" placeholder="Enter Url" class="form-control">
													</div>
													<div class="form-group">
														<label>Choose Position :</label>
														<select id="position" name="position" type="text" class="form-control" onchange="sizeselect(this.value)" required>
														<option value="">Choose Position</option>
														<option value="Top_Left">Top Left</option>
														<option value="Top_Right">Top Right</option>
														<option value="Top_Right_Banner">Banner</option>
														<option value="Popup_Banner">Popup</option>
														</select>
													</div>
													<div class="row" id="opener" style="display: none;">
														<div class="col-lg-8">
															<div class="form-group">
																<label>Advertisement Image :</label>&nbsp <label id='Top_Left' style="color:red;display:none;">Image size should be  820px * 350px </label>
																<label id='Top_Right_Banner' style="color:red;display:none;">Image size should be  990px * 1350px </label>
																<label id='Popup_Banner' style="color:red;display:none;">Image size should be  826px * 426px </label>
																<input id="image" name="image" type="file" accept="image/gif, image/jpeg, image/JPEG, image/png, image/PNG, image/jpg, image/JPG" placeholder="Select Tab Image" class="form-control" required>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="form-group">
																<label>Status:</label>
																<select id="status" name="status" type="text" class="form-control" required>
																<option value="">Choose Status</option>
																<option value="Active" selected>Active</option>
																<option value="Inactive">Inactive</option>>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-5">
													<img style="border: 2px solid black;height:350px;width:460px;display:none;" id="preview1"  src="" alt="Image1" >
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

			$("#image").change(function(){
				readURL(this);
			});
			
</script>
<script>
function sizeselect(val)
			{
				if(val == 'Top_Left')
				{
					document.getElementById("Top_Left").style.display = "";
					document.getElementById("Top_Right_Banner").style.display = "none";
					document.getElementById("Popup_Banner").style.display = "none";
					document.getElementById("opener").style.display = "";
				}
				else if(val == 'Top_Right')
				{
					document.getElementById("Top_Left").style.display = "";
					document.getElementById("Top_Right_Banner").style.display = "none";
					document.getElementById("Popup_Banner").style.display = "none";
					document.getElementById("opener").style.display = "";
				}
				else if(val == 'Top_Right_Banner')
				{
					document.getElementById("Top_Right_Banner").style.display = "";
					document.getElementById("Top_Left").style.display = "none";
					document.getElementById("Popup_Banner").style.display = "none";
					document.getElementById("opener").style.display = "";
				}
				else if(val == 'Popup_Banner')
				{
					document.getElementById("Top_Right_Banner").style.display = "none";
					document.getElementById("Top_Left").style.display = "none";
					document.getElementById("Popup_Banner").style.display = "";
					document.getElementById("opener").style.display = "";
				}
				else
				{
					document.getElementById("Top_Left").style.display = "none";
					document.getElementById("Top_Right_Banner").style.display = "none";
					document.getElementById("Popup_Banner").style.display = "none";
					document.getElementById("opener").style.display = "none";
				}
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
