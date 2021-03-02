<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class ChangePassword extends CI_Controller {
	
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
		$this->load->library('session');
		$this->load->model('Adminmodel');
		$this->load->model('PermissionModel');
		$adminid = $this->session->userdata('username');
		if($adminid != '')
		{
			$adminid = $this->session->userdata('username');
			$uactive = $this->Adminmodel->uactive($adminid);
			if($uactive->nstatus == '0')
			{
				$userid = $this->session->userdata('slno');
				$ChangePassword = $this->PermissionModel->ChangePassword($userid);
				if($ChangePassword->u_status == '0')
				{
					$this->load->view('backend/Changepassword');
				}
				else
				{
					redirect("ErrorUserbyPermission");
				}
			}
			else
			{
				$this->session->set_flashdata('failed','failed');
				redirect("admin");
			}
		}
		else
		{
			$this->session->set_flashdata('failed2','failed2');
			redirect("admin");
		}
	}
	
	public function UpdatePassword()
	{
		$this->load->library('session');
		$this->load->model('adminModel');
		$this->load->model('PermissionModel');
		$adminid = $this->session->userdata('username');
		if($adminid != '')
		{
			$adminid = $this->session->userdata('username');
			$uactive = $this->Adminmodel->uactive($adminid);
			if($uactive->nstatus == '0')
			{
				$userid = $this->session->userdata('slno');
				$UpdatePassword = $this->PermissionModel->UpdatePassword($userid);
				if($UpdatePassword->u_status == '0')
				{
					$opass = md5($this->input->post('opass'));
					$npass = md5($this->input->post('npass'));
					$cpass = md5($this->input->post('cpass'));
					$name = $this->session->userdata('name');
					$result = $this->Adminmodel->CheckPassword($name);
					if($result[0]->password == $opass)
					{
						if($npass == $cpass)
						{
							$this->Adminmodel->UpdatePassword($npass,$name);
							$this->session->set_flashdata('message1','message1');
							redirect("Changepassword");
						}
						else
						{
							$this->session->set_flashdata('message2','message2');
							redirect('Changepassword');
						}
					}
					else
					{
						$this->session->set_flashdata('message3','message3');
						redirect('Changepassword');
					}
				}
				else
				{
					redirect("ErrorUserbyPermission");
				}
			}
			else
			{
				$this->session->set_flashdata('failed','failed');
				redirect("admin");
			}
		}
		else
		{
			$this->session->set_flashdata('failed2','failed2');
			redirect("admin");
		}
	}
	
}
?>