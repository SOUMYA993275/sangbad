
	<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form name="counter"><input type="text" size="5" name="timer" disabled="disabled" /></form> 
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="label label-danger float-left">Last login on: <?php echo date('d-m-Y')." ".date('h:i A', strtotime($this->session->userdata('lastlogintime')));?></span>
                </li>
				
                <li>
					<span class="label label-info float-left"><a data-toggle="modal" data-target="#myModal2"><i class="fa fa-sign-out "></i>Log Out</a></span>
                </li>
							<div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <img style="width: 120px;height: 92px;" src="<?=base_url();?>Uploads/general/signout.png">
                                        </div>
                                        <div class="modal-body">
                                            <p style="text-align: center;"><h2>Are You Sure, Do You Want to <strong>Log Out?</strong></h2></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <a href="<?=site_url('admin/logout');?>"><button type="button" class="btn btn-primary">Log Out</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <li>
                    
                </li>
            </ul>

        </nav>
<script type="text/javascript"> 
<!--   
 // edit startSeconds as you see fit 
 // simple timer example provided by Thomas

 var startSeconds = 7200;
 var milisec = 0;
 var seconds=startSeconds;
 var countdownrunning = true
 var idle = true;
 document.counter.timer.value=startSeconds;

function CountDown()
{ 
    if(idle == true)
    {

        if (milisec<=0)
        { 
            milisec=9 
            seconds-=1 
        } 
        if (seconds<=-1)
        { 
            document.location='<?=site_url('admin/logout');?>';
            milisec=0 
            seconds+=1 
            return;
        } 
        else 
        milisec-=1; 
        document.counter.timer.value=seconds+"."+milisec;
        setTimeout("CountDown()",100);
    }
    else
    {
        return;
    } 
}
function startCountDown()
{
   document.counter.timer.value=startSeconds;
   seconds = startSeconds;
   milisec = 0

   document.counter.timer.style.display = 'block';
   idle = true;
   CountDown();
   document.getElementById("alert").innerHTML = 'You are idle. you will be logged out after ' + startSeconds + ' seconds.';
   countdownrunning = false;   
}

--> 
</script>