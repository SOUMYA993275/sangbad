<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Breaking extends CI_Controller {
	
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
		$userid = $this->session->userdata('slno');
		$InsertBreaking = $this->PermissionModel->InsertBreaking($userid);
		if($InsertBreaking->u_status == '0')
		{
			$this->load->library('session');
				$this->load->model('Adminmodel');
				$this->load->model('PermissionModel');
				$adminid = $this->session->userdata('username');
				$name = $this->session->userdata('name');
				if($adminid != '')
				{
					$adminid = $this->session->userdata('username');
					$uactive = $this->Adminmodel->uactive($adminid);
					if($uactive->nstatus == '0')
					{
						if($_POST)
						{
							$tme = $this->input->post('time');
							$dte = $this->input->post('date');
							$datetime = $dte.' '.$tme;
							$result = $this->Adminmodel->getNewsId();
							$nid1='';
							foreach($result as $r)
							{
								$nid1 = $r->maxid;
							}
							$nid = $nid1+1;
							$rqno="SNRD";
							$newsid=$rqno.$nid;
							$data = array(
									'newsid' => $newsid,
									'category' => 'Breaking',
									'ntitle' => $this->input->post('breaking'),
									'date' => $this->input->post('date'),
									'time' => $this->input->post('time'),
									'datetime' => $datetime,
									'createdby' => $name,
									'xdelete' =>0,
									'nstatus' =>0,
							);
							$this->Adminmodel->InsertNewsDetails($data);
							$this->session->set_flashdata('message1','message1');
							redirect("Breaking");
						}
						else
						{
							$this->load->view('backend/breaking_upload');
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
		else
		{
			redirect("ErrorUserbyPermission");
		}
	}
	public function EditBreakingNews($id)
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
				$EditBreaking = $this->PermissionModel->EditBreaking($userid);
				if($EditBreaking->u_status == '0')
				{
					$data['breaking'] = $this->Adminmodel->getNewsbyId($id);
					$this->load->view('backend/edit_breaking',$data);
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
	
	public function UpdateBreakingNews()
	{
		$this->load->library('session');
		$this->load->model('Adminmodel');
		$this->load->model('PermissionModel');
		$adminid = $this->session->userdata('username');
		$name = $this->session->userdata('name');
		if($adminid != '')
		{
			$adminid = $this->session->userdata('username');
			$uactive = $this->Adminmodel->uactive($adminid);
			if($uactive->nstatus == '0')
			{
				$userid = $this->session->userdata('slno');
				$EditBreaking = $this->PermissionModel->EditBreaking($userid);
				if($EditBreaking->u_status == '0')
				{
							$id = $this->input->post('slno');
							$tme = $this->input->post('time');
							$dte = $this->input->post('date');
							$datetime = $dte.' '.$tme;
							$data = array(
									'ntitle' => $this->input->post('breaking'),
									'date' => $this->input->post('date'),
									'time' => $this->input->post('time'),
									'datetime' => $datetime,
									'updatedby' => $name,
									'xdelete' =>0,
									'nstatus' =>0,
							);
							$this->Adminmodel->UpdateNewsDetails($data,$id);
							$this->session->set_flashdata('message6','message6');
							redirect("NewsAuthentication");
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