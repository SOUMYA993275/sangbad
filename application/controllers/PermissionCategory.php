<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class PermissionCategory extends CI_Controller {
	
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
					$data['pdetails']=$this->PermissionModel->Pcategorydetails();
					$data['pgdetails']=$this->PermissionModel->PgroupDetails();
					$this->load->view('backend/permission_category',$data);
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
					$img = count($this->input->post('category'));
					for ($i = 0; $i < $img; $i++){
					$pname = $this->input->post('pname');
					$category = $this->input->post('category')[$i];
					$result = $this->PermissionModel->Checkcategory($category,$pname);
					if(!$result)
					{
						$data = array(
							'page_id' => $this->input->post('pname'),
							'category' => $category,
						);
						$this->PermissionModel->InsertPermission($data);
					}
					else
					{
						$this->session->set_flashdata('message2','message2');
						redirect('PermissionCategory');
					}
					}
					$this->session->set_flashdata('message1','message1');
					redirect("PermissionCategory");
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