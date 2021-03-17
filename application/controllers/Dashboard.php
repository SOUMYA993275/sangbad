<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Dashboard extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
        $this->load->helper(array('form', 'url', 'permission_helper'));
        $this->load->model('Adminmodel');
		$this->load->model('PermissionModel');
		//permissioncheck($userid,$page,$page_type);
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
				$Dashboard = $this->PermissionModel->Dashboard($userid);
				if($Dashboard->u_status == '0')
				{
					$date = date('m/d/Y');
					$this->load->library('user_agent');
					$data['browser'] = $this->agent->browser();
					$data['browserVersion'] = $this->agent->version();
					$data['platform'] = $this->agent->platform();
					$data['full_user_agent_string'] = $this->input->ip_address();
					if ($this->agent->is_browser())
					{
						$data['agent'] = $this->agent->browser().' '.$this->agent->version();
					}
					$data['totaluser'] = $this->Adminmodel->TotalUser();
					$data['totalimage'] = $this->Adminmodel->TotalImageCount();
					$data['totalvideo'] = $this->Adminmodel->TotalvideoCount();
					$data['totalnews'] = $this->Adminmodel->TotalNewsbyDate($date);
					$this->load->view('backend/dashboard',$data);
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