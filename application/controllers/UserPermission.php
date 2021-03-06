<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class UserPermission extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('permission_helper');
		$this->load->model('Adminmodel');
		$this->load->model('PermissionModel');
		$this->load->model('DataModel');
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
				$userid = $this->session->userdata('slno');
				$InsertUserPermissionstatus = $this->PermissionModel->InsertUserPermissionstatus($userid);
				if($InsertUserPermissionstatus->u_status == '0')
				{
					$adminid = $this->session->userdata('username');
					$uactive = $this->Adminmodel->uactive($adminid);
					if($uactive->nstatus == '0')
					{
						if($_POST)
						{
							$categ = count($this->input->post('catg'));
							for ($i = 0; $i < $categ; $i++)
							{
								$user = $this->input->post('user');
								$pagen = $this->input->post('pagen');
								$catg = $this->input->post('catg')[$i];
								$result = $this->PermissionModel->Checkpermission($user,$pagen,$catg);
								if(!$result)
								{
									$data = array(
										'user_id' => $this->input->post('user'),
										'role' => $this->input->post('role'),
										'page_id' => $this->input->post('pagen'),
										'action_id' => $catg,
										'u_status' => $this->input->post('ptatus'),
									);
									$this->PermissionModel->InsertUserPermission($data);
								}
								else
								{
									$this->session->set_flashdata('message2','message2');
									redirect('UserPermission');
								}
							}
								$this->session->set_flashdata('message1','message1');
								redirect("UserPermission");
						}
						else
						{
							$data['userlist']=$this->PermissionModel->Userlist();
							$data['pcategory']=$this->PermissionModel->PcategoryU();
							$this->load->view('backend/user_permission',$data);
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
					redirect("ErrorUserbyPermission");
				}
		}
		else
		{
			$this->session->set_flashdata('failed2','failed2');
			redirect("admin");
		}
	}
	
	public function fetch_category()
	{ 
		$id = $this->input->post('pageID');
		$this->load->model('PermissionModel');
		$data = $this->PermissionModel->fetch_category($id);
		echo json_encode($data);
	}
	
	public function fetch_user()
	{ 
		$id = $this->input->post('userID');
		$this->load->model('PermissionModel');
		$data = $this->PermissionModel->fetch_user($id);
		echo json_encode($data);
	}
	
	public function PermissionList()
	{
		$postData = $this->input->post();
		$this->load->model('DataModel');
		$data = $this->DataModel->getPermission($postData);
		echo json_encode($data);
	}
	
	public function PermissionView()
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
					if($_POST)
					{
						$user = $this->input->post('user');
						$pname = $this->input->post('pname');
						$data['pdetails']=$this->PermissionModel->permissionview($user,$pname);
						$data['pgdetails']=$this->PermissionModel->PgroupDetails();
						$data['userlist']=$this->PermissionModel->Userlist();
						$this->load->view('backend/user_permission_view',$data);
					}
					else
					{
						$data['pgdetails']=$this->PermissionModel->PgroupDetails();
						$data['userlist']=$this->PermissionModel->Userlist();
						$this->load->view('backend/user_permission_view',$data);
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
	
	public function ActivePermission()
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
						'u_status' => 0,
					);
					$this->Adminmodel->UpdatePermissionDetails($data,$id);
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
	
	public function InctivePermission()
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
						'u_status' => 1,
					);
					$this->Adminmodel->UpdatePermissionDetails($data,$id);
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