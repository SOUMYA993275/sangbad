<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class MenuPermission extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('permission_helper');
		$this->load->model('Adminmodel');
		$this->load->model('PermissionModel');
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
				$UserPermission = $this->PermissionModel->UserPermission($userid);
				if($UserPermission->u_status == '0')
				{
					$data['pdetails']=$this->PermissionModel->PcategoryU();
					$data['user']=$this->Adminmodel->getUserId();
					$this->load->view('backend/Menu_permission',$data);
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
	
	public function Insert()
	{
		$this->load->library('session');
		$this->load->model('adminModel');
		$adminid = $this->session->userdata('username');
		if($adminid != '')
		{
			$adminid = $this->session->userdata('username');
			$uactive = $this->Adminmodel->uactive($adminid);
			if($uactive->nstatus == '0')
			{
				$userid = $this->session->userdata('slno');
				$InsertUserPermissionstatus = $this->PermissionModel->InsertUserPermissionstatus($userid);
				if($InsertUserPermissionstatus->u_status == '0')
				{
					$img = count($this->input->post('page'));
					for ($i = 0; $i < $img; $i++){
					$user = $this->input->post('user');
					$page = $this->input->post('page')[$i];
					$result = $this->PermissionModel->CheckMenu($page,$user);
					if(!$result)
					{
						$data = array(
							'user_id' => $this->input->post('user'),
							'menu_name' => $page,
							'page_type' => 'view',
							'm_status' => 0,
						);
						$this->PermissionModel->InsertMenu($data);
					}
					else
					{
						$this->session->set_flashdata('message2','message2');
						redirect('MenuPermission');
					}
					}
					$this->session->set_flashdata('message1','message1');
					redirect("MenuPermission");
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
	
	public function MenuList()
	{
		$postData = $this->input->post();
		$this->load->model('DataModel');
		$data = $this->DataModel->getMenuP($postData);
		echo json_encode($data);
	}
	
	public function Active()
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
				$ActivePermission = $this->PermissionModel->ActivePermission($userid);
				if($ActivePermission->u_status == '0')
				{
					$id = $_POST['search_data'];
					$data = array(
						'm_status' => 0,
					);
					$this->PermissionModel->UpdateMenuDetails($data,$id);
					$this->session->set_flashdata('message3','message3');
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
	
	public function Inactive()
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
				$InactivePermission = $this->PermissionModel->InactivePermission($userid);
				if($InactivePermission->u_status == '0')
				{
					$id = $_POST['search_data'];
					$data = array(
						'm_status' => 1,
					);
					$this->PermissionModel->UpdateMenuDetails($data,$id);
					$this->session->set_flashdata('message4','message4');
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