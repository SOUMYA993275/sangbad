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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
	.ibox-content{
		color :black;
	}
	.ibox-title{
		background-color: #e8ecd0;
	}
	</style>
	<div class="loader"></div>
<body>
    <div id ="wrapper">
		<?php include_once ('sidemenu.php');?>

		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
				<?php include_once ('header.php');?>
			</div>
            <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox ">
							<div class="ibox-title">
                                <h1 class="label label-success float-left"><?=$this->session->userdata('name');?></h1>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" id="clock"></h1>
                                <div class="stat-percent font-bold text-danger"></div>
                                <?php echo bn_date(date('l, d M, Y'));?>
                            </div>
                        </div>
                    </div>
                    <?php
                    if($menu='News')
                    {
                    $this->load->model('Adminmodel');
                    $userid = $this->session->userdata('slno');
                    $usercheck = $this->Adminmodel->menupermissioncheck($userid,$menu);
                    }
                    else
                    {
                        
                    }
                    foreach($usercheck as $uc)
                    if($uc->m_status == 0)
                    {
                    ?>
					<div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                               <h1 class="label label-warning float-left">Todays News</h1>
                            </div>
                            <a href="<?=site_url('NewsAuthentication');?>"><div class="ibox-content">
                                <h1 class="no-margins" id="news"></h1>
                                <small>Published News</small>
							</div></a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
					<?php
                    if($menu='User')
                    {
                    $this->load->model('Adminmodel');
                    $userid = $this->session->userdata('slno');
                    $usercheck = $this->Adminmodel->menupermissioncheck($userid,$menu);
                    }
                    else
                    {
                        
                    }
                    foreach($usercheck as $uc)
                    if($uc->m_status == 0)
                    {
                    ?>
                    <div class="col-lg-3">
                        <div class="ibox ">
						    <div class="ibox-title">
                                <h1 class="label label-primary float-left">Total Users</h1>
                            </div>
                            <a href="<?=site_url('User');?>"><div class="ibox-content">
                                <h1 class="no-margins" id="user"></h1>
                                <small>Registered User</small>
                            </div></a>
                        </div>
                    </div>
					<?php
					}
					?>
                    <?php
                    if($menu='Image')
                    {
                    $this->load->model('Adminmodel');
                    $userid = $this->session->userdata('slno');
                    $usercheck = $this->Adminmodel->menupermissioncheck($userid,$menu);
                    }
                    else
                    {
                        
                    }
                    foreach($usercheck as $uc)
                    if($uc->m_status == 0)
                    {
                    ?>
                    <div class="col-lg-3">
                        <div class="ibox ">
						    <div class="ibox-title">
                                <h1 class="label label-danger float-left">Total Images</h1>
                            </div>
                            <a href="<?=site_url('GalleryImage/GalleryImageView');?>"><div class="ibox-content">
                                <h1 class="no-margins" id="image"></h1>
                                <small>Registered Image</small>
                            </div></a>
                        </div>
					</div>
                    <?php
                    }
                    ?>
                    <?php
                    if($menu='Video')
                    {
                    $this->load->model('Adminmodel');
                    $userid = $this->session->userdata('slno');
                    $usercheck = $this->Adminmodel->menupermissioncheck($userid,$menu);
                    }
                    else
                    {
                        
                    }
                    foreach($usercheck as $uc)
                    if($uc->m_status == 0)
                    {
                    ?>
					<div class="col-lg-3">
                        <div class="ibox ">
							<div class="ibox-title">
                                <h1 class="label label-danger float-left">Total Video</h1>
                            </div>
                            <a href="<?=site_url('Video');?>"><div class="ibox-content">
                                <h1 class="no-margins" id="video"></h1>
                                <small>Active Video</small>
                            </div></a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="col-lg-3">
						<div class="ibox ">
                            <div class="ibox-title">
                               <h1 class="label label-primary float-left">Total Subscriber</h1>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" id="subsc">12</h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>Active User</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h1 class="label label-warning float-left">Todays News</h1>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">106,120</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>New visits</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h1 class="label label-success float-left">Todays News</h1>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">80,600</h1>
                                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                <small>In first month</small>
                            </div>
                        </div>
            </div>
		</div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Orders</h5>
                                <div class="float-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-white active">Today</button>
                                        <button type="button" class="btn btn-xs btn-white">Monthly</button>
                                        <button type="button" class="btn btn-xs btn-white">Annual</button>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-9">
                                    <div class="flot-chart">
                                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <ul class="stat-list">
                                        <li>
                                            <h2 class="no-margins">2,346</h2>
                                            <small>Total orders in period</small>
                                            <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">4,422</h2>
                                            <small>Orders in last month</small>
                                            <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">9,180</h2>
                                            <small>Monthly income from orders</small>
                                            <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 22%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
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

    <!-- Flot -->
    <script src="<?=base_url();?>js/plugins/flot/jquery.flot.js"></script>
    <script src="<?=base_url();?>js/plugins/App.js"></script>
    <script src="<?=base_url();?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?=base_url();?>js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?=base_url();?>js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url();?>js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url();?>js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?=base_url();?>js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="<?=base_url();?>js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?=base_url();?>js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url();?>js/inspinia.js"></script>
    <script src="<?=base_url();?>js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?=base_url();?>js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?=base_url();?>js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?=base_url();?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="<?=base_url();?>js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="<?=base_url();?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?=base_url();?>js/demo/sparkline-demo.js"></script>
    <script>
	$(document).ready(function(){
		$.ajax({
        url: "https://api.webpushr.com/v1/site/subscriber_count",
        method: 'GET',
        crossDomain: true,
        headers: {
            "webpushrKey" : "c5f85f0c1f3d0de7a3a997c5e74b8fb3",
            "webpushrAuthToken" : "28164",
            "Content-Type" : "Application/Json",
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Methods': 'GET',
            //'Access-Control-Allow-Headers': "append,delete,entries,foreach,get,has,keys,set,values,Authorization"
        }
        }).done(function(data)
        //console.log(data)
        {
        $('#subsc').append(JSON.stringify(data))
        });
        });
	</script>
<?php
if($this->session->flashdata('message3') != '')
{
?>
<script>
swal({
title: "Success",
text: "<?=$this->session->flashdata('message3');?>",
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
