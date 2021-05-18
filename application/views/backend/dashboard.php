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
    <!--script src="<?=base_url();?>js/plugins/webpush.js"></script-->
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
            'Access-Control-Allow-Origin': '*'
        }
        }).done(function(data) {
        $('#subsce').append(JSON.stringify(data))
        });
        });
	</script>
    <script>
	$(document).ready(function(){
        $.ajax({
        url: "<?=site_url('Api/DashboardCount');?>",
        method: 'POST',
        data: {
            secrate_key : 'demokey'
        },
        }).done(function(data) {
            let response = JSON.parse(data);
        $('#news').html(response.details.news)
        $('#user').html(response.details.user)
        $('#image').html(response.details.image)
        $('#video').html(response.details.video)
        });
        });
	</script>
    <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 1000,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>
<script>
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>
<script type="text/javascript">
                        
function getTime( ) {
	var d = new Date( ); 
	d.setHours( d.getHours() ); // offset from local time
	var h = (d.getHours() % 12) || 12; // show midnight & noon as 12
	return (
		( h < 10 ? '0' : '') + h +
		( d.getMinutes() < 10 ? ':0' : ':') + d.getMinutes() +
                // optional seconds display
		 ( d.getSeconds() < 10 ? ':0' : ':') + d.getSeconds() + 
		( d.getHours() < 12 ? ' AM' : ' PM' )
	);
	
}

var clock = document.getElementById('clock');
setInterval( function() { clock.innerHTML = getTime(); }, 1000 );
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
