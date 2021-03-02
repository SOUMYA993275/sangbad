<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Admin extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('permission_helper');
		$this->load->model('Adminmodel');
		$this->load->model('PermissionModel');
		//helper function
		//permissioncheck($page,$userid);
    }

	public function index()
	{
		if($_POST)
		{
			$user=$this->input->post('email');
			$pass=md5($this->input->post('password'));
			if($user !='' && $pass !='')
			{
				$result=$this->Adminmodel->adminlogin($user,$pass);
				$id="";
				$name="";
				$co="";
				$dob="";
				$address="";
				$blood="";
				$adminid="";
				$ltdate="";
				$status="";
				$email="";
				$mobile="";
				$nstatus="";
				$m_status="";
				$page_id="";
				$action_id="";
				$u_status="";
				$menu_name="";
				$image="";
				if(COUNT($result)>0)
				{
					if($result[0]->is_email_verified == "1")
					{
						if($result[0]->nstatus == "0")
						{
							if($result[0]->xdelete == "0")
							{
								foreach ($result as $r)
								{
									$id=$r->slno;
									$name=$r->name;
									$co=$r->co;
									$dob=$r->dob;
									$blood=$r->blood;
									$address=$r->address;
									$adminid=$r->username;
									$ltdate=$r->lastlogintime;
									$status=$r->status;
									$email=$r->email;
									$mobile=$r->mobile;
									$nstatus=$r->nstatus;
									$m_status=$r->m_status;
									$page_id=$r->page_id;
									$action_id=$r->action_id;
									$u_status=$r->u_status;
									$menu_name=$r->menu_name;
									$image=$r->image;
								}
							
								$data= array(
									'slno'=> $id,
									'name'=> $name,
									'co'=> $co,
									'dob'=> $dob,
									'blood'=> $blood,
									'address'=> $address,
									'username'=> $adminid,
									'lastlogintime'=>$ltdate,
									'status'=>$status,
									'email'=>$email,
									'mobile'=>$mobile,
									'nstatus'=>$nstatus,
									'm_status'=>$m_status,
									'menu_name'=>$menu_name,
									'image'=>$image,
								);
								$datetime = date('Y-m-d h:i:s a', time());
								$this->session->set_userdata($data);
								$userid = $this->session->userdata('slno');
								$name = $this->session->userdata('name');
								$co = $this->session->userdata('co');
								$dob = $this->session->userdata('dob');
								$address = $this->session->userdata('address');
								$blood = $this->session->userdata('blood');
								$adminid = $this->session->userdata('username');
								$status = $this->session->userdata('status');
								$email = $this->session->userdata('email');
								$mobile = $this->session->userdata('mobile');
								$nstatus = $this->session->userdata('nstatus');
								$u_status = $this->session->userdata('u_status');
								$image = $this->session->userdata('image');
								$ltdate= $this->session->userdata('lastlogintime');
								$this->Adminmodel->LastLoginTimeUpdate($id,$datetime);
								$this->session->set_flashdata('message3','message3');
								redirect("Dashboard");
							}
							else
							{
								$data['error'] = 4; // Userid Delete
								$this->load->view('backend/login',$data);
							}
						}
						else
						{
							$data['error'] = 3; // Userid Inactive
							$this->load->view('backend/login',$data);
						}
					}
					else
					{
						$data['error'] = 5; // User not registered yet
						$this->load->view('backend/login',$data);
					}
				}
				else
				{
					$data['error'] = 1; // Userid & Password Incorrect
					$this->load->view('backend/login',$data);
				}
			}
			else
			{
				$data['error'] = 2; // Userid & Password Blank
				$this->load->view('backend/login',$data);
			}
		}
		else
		{
			$data['error'] = 0; //Error None
			$this->load->view('backend/login',$data);
		}
	}
	
	public function Forgotpassword()
	{
		$this->load->view('backend/Forgotpassword');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin','refresh');
	}
	
	public function viu()
	{
		$this->load->view('xtra/form_advanced');
	}
}
