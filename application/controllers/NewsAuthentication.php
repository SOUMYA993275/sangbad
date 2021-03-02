<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class NewsAuthentication extends CI_Controller {
	
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
				$Newslist = $this->PermissionModel->Newslist($userid);
				if($Newslist->u_status == '0')
				{
					$data['check'] = 0;
					$data['date'] = date('m/d/Y');
					$date = date('m/d/Y');
					$data['allnews'] = $this->Adminmodel->getnewsBydate($date);
					//$data['readers']=$this->Adminmodel->getNewsReaders();
					if(isset($_POST['date']))
					{
						$data['check'] = 0;
						$data['date'] = $_POST['date'];
					}
					else
					{
						$data['date'] = '';
					}
					$this->load->view('backend/news_authentication',$data);
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