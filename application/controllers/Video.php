<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Video extends CI_Controller {
	
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
	
	public function InsertVideo()
	{
		$this->load->library('session');
		$this->load->model('Adminmodel');
		$this->load->model('PermissionModel');
		$name = $this->session->userdata('name');
		$adminid = $this->session->userdata('username');
		if($adminid != '')
		{
			$adminid = $this->session->userdata('username');
			$uactive = $this->Adminmodel->uactive($adminid);
			if($uactive->nstatus == '0')
			{
				$userid = $this->session->userdata('slno');
				$InsertVideo = $this->PermissionModel->InsertVideo($userid);
				if($InsertVideo->u_status == '0')
				{
					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
					$videoid = substr( str_shuffle( $chars ), 0, 8 );
					$ylink = $this->input->post('url');
					$vid =  substr($ylink, 17, 100);
					$data = array(
							'videoid' => $videoid,
							'videotitle' => $this->input->post('title'),
							'videolink' => $this->input->post('url'),	
							'youtubeid' => $vid,	
							'postdate' => $this->input->post('date'),
							'posttime' => $this->input->post('time'),
							'status' => 0,
							'createdby' => $name,
							'xdelete' =>0,
					);
					$this->Adminmodel->InsertGalleryvideoDetails($data);
					$this->session->set_flashdata('message1','message1');
					redirect('Video');
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
				$Videoist = $this->PermissionModel->Videoist($userid);
				if($Videoist->u_status == '0')
				{
					$data['video']=$this->Adminmodel->getAllVideoDetails();
					$this->load->view('backend/gallery_video',$data);
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
	
	public function EditVideo($id)
	{
		$this->load->library('session');
		$this->load->model('adminModel');
		$this->load->model('PermissionModel');
		$name = $this->session->userdata('name');
		$adminid = $this->session->userdata('username');
		if($adminid != '')
		{
			$adminid = $this->session->userdata('username');
			$uactive = $this->Adminmodel->uactive($adminid);
			if($uactive->nstatus == '0')
			{
				$userid = $this->session->userdata('slno');
				$EditVideo = $this->PermissionModel->EditVideo($userid);
				if($EditVideo->u_status == '0')
				{
					$data['video'] = $this->Adminmodel->getVideoById($id);
					$this->load->view('backend/gallery_video_edit',$data);
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
	
	public function UpdateVideo()
	{
		$this->load->library('session');
		$this->load->model('Adminmodel');
		$this->load->model('PermissionModel');
		$name = $this->session->userdata('name');
		$adminid = $this->session->userdata('username');
		if($adminid != '')
		{
			$adminid = $this->session->userdata('username');
			$uactive = $this->Adminmodel->uactive($adminid);
			if($uactive->nstatus == '0')
			{
				$userid = $this->session->userdata('slno');
				$EditVideo = $this->PermissionModel->EditVideo($userid);
				if($EditVideo->u_status == '0')
				{
					$id = $this->input->post('id');
					$ylink = $this->input->post('url');
					$vid =  substr($ylink, 17, 100);
					$data = array(
							'videotitle' => $this->input->post('title'),
							'videolink' => $this->input->post('url'),	
							'youtubeid' => $vid,	
							'postdate' => $this->input->post('date'),
							'posttime' => $this->input->post('time'),
							'status' => 0,
							'updatedby' => $name,
							'xdelete' =>0,
					);
					$this->Adminmodel->UpdateVideoDetails($data,$id);
					$this->session->set_flashdata('message2','message2');
					redirect('Video');
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
	
	public function InactiveVideo($id)
	{
		$this->load->library('session');
		$this->load->model('adminModel');
		$this->load->model('PermissionModel');
		$name = $this->session->userdata('name');
		$adminid = $this->session->userdata('username');
		if($adminid != '')
		{
			$adminid = $this->session->userdata('username');
			$uactive = $this->Adminmodel->uactive($adminid);
			if($uactive->nstatus == '0')
			{
				$userid = $this->session->userdata('slno');
				$InactiveVideo = $this->PermissionModel->InactiveVideo($userid);
				if($InactiveVideo->u_status == '0')
				{
					$data = array(
						'status' => 1,
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateVideoDetails($data,$id);
					$this->session->set_flashdata('message3','message3');
					redirect('Video');
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
	
	public function ActiveVideo($id)
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
				$ActiveVideo = $this->PermissionModel->ActiveVideo($userid);
				if($ActiveVideo->u_status == '0')
				{
					$data = array(
						'status' => 0,
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateVideoDetails($data,$id);
					$this->session->set_flashdata('message4','message4');
					redirect('Video');
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
	
	public function DeleteVideo($id)
	{
		$this->load->library('session');
		$this->load->model('adminModel');
		$this->load->model('PermissionModel');
		$name = $this->session->userdata('name');
		$adminid = $this->session->userdata('username');
		if($adminid != '')
		{
			$adminid = $this->session->userdata('username');
			$uactive = $this->Adminmodel->uactive($adminid);
			if($uactive->nstatus == '0')
			{
				$userid = $this->session->userdata('slno');
				$DeleteVideo = $this->PermissionModel->DeleteVideo($userid);
				if($DeleteVideo->u_status == '0')
				{
					$data = array(
						'xdelete' => 1,
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateVideoDetails($data,$id);
					$this->session->set_flashdata('message5','message5');
					redirect('Video');
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