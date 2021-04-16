<?php
header('Content-Type: text/html; charset=utf-8');
/*Date show end code*/
date_default_timezone_set('Asia/Calcutta');
function bn_date($str)
	{
	$en = array(1,2,3,4,5,6,7,8,9,0);
	$bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
	$str = str_replace($en, $bn, $str);
	$en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
	$en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
	$bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
	$str = str_replace( $en, $bn, $str );
	$str = str_replace( $en_short, $bn, $str );
	$en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
	$en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
	$bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
	$bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
	$str = str_replace( $en, $bn, $str );
	$str = str_replace( $en_short, $bn_short, $str );
	$en = array( 'am', 'pm' );
	$bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
	$str = str_replace( $en, $bn, $str );
	return $str;
	}
?>
<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" style="widhth: 48px; height:48px" src="<?=base_url();?><?=$this->session->userdata('image');?>"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?=$this->session->userdata('name');?> </span>
                            <span class="text-muted text-xs block"><?=$this->session->userdata('status');?> <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="<?=site_url("Profile");?>">Profile</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#myModal2">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        SNRD
                    </div>
                </li>
				<?php
				if($menu='Dashboard')
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
				<li>
                    <a href="<?=site_url('Dashboard');?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
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
				<li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
					    <li><a href="<?=site_url('User/add_user');?>"><i class="fa fa-user-plus"></i>Add new User</a></li>
					    <li><a href="<?=site_url('User');?>"><i class="fa fa-users"></i>All Users</a></li>
					</ul>
                </li>
				<?php
				}
				?>
				<?php
				if($menu='Menumanagement')
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
				<li>
                    <a href="<?=site_url('Menumanagement');?>"><i class="fa fa-bars"></i> <span class="nav-label">Menu Management</span>  </a>
                </li>
				<?php
				}
				?>
				<?php
				if($menu='Breaking')
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
				<li>
                    <a href="<?=site_url('Breaking');?>"><i class="fa fa-rocket"></i> <span class="nav-label">Breaking Upload</span>  </a>
                </li>
				<?php
				}
				?>
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
				<li>
                    <a href="<?=site_url('News');?>"><i class="fa fa-file-text-o"></i> <span class="nav-label">Add New News</span>  </a>
                </li>
				<?php
				}
				?>
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
				<li>
                    <a href="<?=site_url('NewsAuthentication');?>"><i class="fa fa-newspaper-o"></i> <span class="nav-label">News Dashboard</span>  </a>
                </li>
				<?php
				}
				?>
				<?php
				if($menu='Right Side Tab')
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
				<li>
                    <a href="#"><i class="fa fa-object-group"></i> <span class="nav-label">Special News Tab</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?=site_url('RightsideTab');?>"><i class="fa fa-plus"></i> <span class="nav-label">News Tab Create</span></a></li>
                        <li><a href="<?=site_url('RightsideTab/RightsideTabView');?>"><i class="fa fa-list-ul"></i>Tab List</a></li>
                    </ul>
                </li>
				<?php
				}
				?>
				<?php
				if($menu='Advertisement')
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
				<li>
                    <a href="#"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Advertisement</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?=site_url('Advertise');?>"><i class="fa fa-plus"></i> <span class="nav-label">Advertisement Create</span></a></li>
                        <li><a href="<?=site_url('Advertise/AdvertiseView');?>"><i class="fa fa-list-ul"></i>Advertisement List</a></li>
                    </ul>
                </li>
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
				<li>
                    <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Media Gallery</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
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
                        <li><a href="#"><i class="fa fa-file-image-o"></i> <span class="nav-label">Gallery Image</span><span class="fa arrow"></span></a>
							<ul class="nav nav-third-level collapse">
								<li><a href="<?=site_url('GalleryImage');?>"><i class="fa fa-plus"></i> <span class="nav-label">Gallery Image Add</span></a></li>
								<li><a href="<?=site_url('GalleryImage/GalleryImageView');?>"><i class="fa fa-list-ul"></i>Gallery Image View</a></li>
							</ul>
						</li>
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
                        <li><a href="<?=site_url('Video');?>"><i class="fa fa-video-camera"></i>Gallery Video</a></li>
						<?php
						}
						?>
                    </ul>
                </li>
				<?php
				}
				?>
				<?php
				if($menu='User Permission')
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
				<li>
                    <a href="#"><i class="fa fa-check-square"></i> <span class="nav-label">Permission</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
					<?php
					if($menu='Permission Category')
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
                        <li><a href="#"><i class="fa fa-check"></i><span class="nav-label">Permission Category</span><span class="fa arrow"></span></a>
						<ul class="nav nav-third-level collapse">
								<li><a href="<?=site_url('PermissionCategory');?>"><i class="fa fa-plus"></i> <span class="nav-label">Add Permission Category</span></a></li>
								<li><a href="<?=site_url('PermissionCategoryAssign');?>"><i class="fa fa-list"></i>Assign Permission Category</a></li>
							</ul>
						</li>
						<?php
						}
						?>
						<?php
						if($menu='User Permission')
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
                        <li><a href="#"><i class="fa fa-check"></i><span class="nav-label">User Permission</span><span class="fa arrow"></span></a>
							<ul class="nav nav-third-level collapse">
								<li><a href="<?=site_url('UserPermission');?>"><i class="fa fa-plus"></i> <span class="nav-label">Add Permission</span></a></li>
								<li><a href="<?=site_url('UserPermission/PermissionView');?>"><i class="fa fa-list-ul"></i>PermissionView</a></li>
							</ul>
						</li>
						<?php
						}
						?>
						<li><a href="<?=site_url('MenuPermission');?>"><i class="fa fa-check"></i><span class="nav-label">Menu Permission</span></a></li>
                    </ul>
                </li>
				<?php
				}
				?>
				<?php
				if($menu='Change Password')
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
				<li>
                    <a href="<?=site_url('Changepassword');?>"><i class="fa fa-unlock"></i> <span class="nav-label">Change Password</span>  </a>
                </li>
				<?php
				}
				?>                
            </ul>

        </div>
    </nav>