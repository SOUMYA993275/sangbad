<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
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
                                            <div class="swal-icon swal-icon--error">
											<span class="swal-icon--error__x-mark">
											<span class="swal-icon--error__line swal-icon--error__line--left"></span>
											<span class="swal-icon--error__line swal-icon--error__line--right"></span>
											</span>
											</div>
                                        </div>
                                        <div class="modal-body">
                                            <p style="text-align: center;"><h2>Are You Sure, Do You Want to <strong>Log Out?</strong></h2></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <a href="<?=site_url('admin/logout');?>"><button type="button" class="btn btn-info">Log Out</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <li>
                    
                </li>
            </ul>

        </nav>