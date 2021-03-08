<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class PermissionCategoryAssign extends CI_Controller {
	
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
				$UserPermission = $this->PermissionModel->UserPermission($userid);
				if($UserPermission->u_status == '0')
				{
					$data['pcategory']=$this->PermissionModel->PcategoryU();
					$this->load->view('backend/permission_category_assign',$data);
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
	
	public function InsertPermission()
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
					$role = $this->input->post('role');
					$page = $this->input->post('page')[$i];
					$result = $this->PermissionModel->UserCheckcategory($role,$page);
					if(!$result)
					{
						$data = array(
							'page_id' => $page,
							'role' => $role,
							'status' => 0,
						);
						$this->PermissionModel->InsertPermissionUser($data);
					}
					else
					{
						$this->session->set_flashdata('message2','message2');
						redirect('PermissionCategoryAssign');
					}
					}
					$this->session->set_flashdata('message1','message1');
					redirect("PermissionCategoryAssign");
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
	
	public function RollList()
	{
		$postData = $this->input->post();
		$this->load->model('DataModel');
		$data = $this->DataModel->getRolecategory($postData);
		echo json_encode($data);
	}
	
	public function ActiveRole()
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
						'status' => 0,
					);
					$this->Adminmodel->UpdateRoleDetails($data,$id);
					$this->session->set_flashdata('message1','message1');
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
	
	public function InctiveRole()
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
						'status' => 1,
					);
					$this->Adminmodel->UpdateRoleDetails($data,$id);
					$this->session->set_flashdata('message','message');
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