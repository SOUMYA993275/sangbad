<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Menumanagement extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->library("pagination");
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
			$adminid = $this->session->userdata('username');
			$uactive = $this->Adminmodel->uactive($adminid);
			if($uactive->nstatus == '0')
			{
				$userid = $this->session->userdata('slno');
				$menulist = $this->PermissionModel->Menulist($userid);
				if($menulist->u_status == '0')
				{
					$this->load->view('backend/menu_management');
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
	
	public function menuList()
	{
		$postData = $this->input->post();
		$data = $this->DataModel->getmenu($postData);
		echo json_encode($data);
	}
	
	public function Editmenu($id)
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
				$Editmenu = $this->PermissionModel->Editmenu($userid);
				if($Editmenu->u_status == '0')
				{
					$data['menudetails'] = $this->Adminmodel->getMenubyId($id);
					$this->load->view('backend/edit_menu_management',$data);
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
  
	public function InsertMenu()
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
				$Insetmenu = $this->PermissionModel->Insetmenu($userid);
				if($Insetmenu->u_status == '0')
				{
					$menucode = ucfirst($this->input->post('menucode'));
					$link = 'home/'.$menucode;
					$result = $this->Adminmodel->CheckMenu($menucode);
					if(!$result)
					{
						$data = array(
							'menuname' => $this->input->post('menuname'),
							'menucode' => $menucode,
							'menulink' => $link,
							'status' => $this->input->post('menustatus'),
							'xdelete' => 0,
							'header' => $this->input->post('header'),
						);
						$this->adminModel->InsertMenu($data);
						$this->session->set_flashdata('message1','message1');
						redirect("Menumanagement");
						
					}
					else
					{
						$this->session->set_flashdata('message2','message2');
						redirect('Menumanagement');
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
	
	public function InactiveMenu($id)
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
				$Inactivemenu = $this->PermissionModel->Inactivemenu($userid);
				if($Inactivemenu->u_status == '0')
				{
					$data = array(
						'status' => 'Inactive',
					);
					$this->adminModel->UpdateMenuDetails($data,$id);
					$this->session->set_flashdata('message3','message3');
					redirect('Menumanagement');
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
	
	public function ActiveMenu($id)
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
				$Activemenu = $this->PermissionModel->Activemenu($userid);
				if($Activemenu->u_status == '0')
				{
					$data = array(
						'status' => 'Active',
					);
					$this->Adminmodel->UpdateMenuDetails($data,$id);
					$this->session->set_flashdata('message4','message4');
					redirect('Menumanagement');
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
	
	public function DeleteMenu($id)
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
				$Deletemenu = $this->PermissionModel->Deletemenu($userid);
				if($Deletemenu->u_status == '0')
				{
					$data = array(
						'xdelete' => 1,
					);
					$this->adminModel->UpdateMenuDetails($data,$id);
					$this->session->set_flashdata('message5','message5');
					redirect('Menumanagement');
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
	
	public function HeaderMenu()
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
				$Editmenu = $this->PermissionModel->Editmenu($userid);
				if($Editmenu->u_status == '0')
				{
					$headers = $this->input->post('header');
					$id = $this->input->post('id');
					$status = $this->input->post('menustatus');
					$data = array(
						'headers' => $headers,
						'status' => $status,
					);
					$this->Adminmodel->UpdateMenuDetails($data,$id);
					$this->session->set_flashdata('message6','message6');
					redirect('Menumanagement');
						
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