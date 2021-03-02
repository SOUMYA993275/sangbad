<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?=base_url('Uploads/general/news.png')?>" type="image/png" />
	<title>সংবাদ রাতদিন - এক ক্লিকে সব খবর</title>
	<link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?=base_url();?>css/animate.css" rel="stylesheet">
    <link href="<?=base_url();?>css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        <img src="<?=base_url();?>Uploads/general/error.png" style="height: 250px;">
        <h2 class="font-bold">Oops!</h2>

        <div class="error-desc">
            You don't have any permission to access this page. Don't try to use any other proxy link. <br/>
            You can go back to main page: <br/><a class="btn btn-primary m-t" style="color: white;" type="button" onclick="goBack()">Go Back</a>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?=base_url();?>js/jquery-3.1.1.min.js"></script>
    <script src="<?=base_url();?>js/popper.min.js"></script>
    <script src="<?=base_url();?>js/bootstrap.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
	function goBack() {
	  window.history.back();
	}
	</script>
<?php
if($this->session->flashdata('failed3') != '')
{
?>
<script>
swal({
  title: "Oops!",
  text: "You have not permission to access this page",
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
