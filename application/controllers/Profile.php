<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Profile extends CI_Controller {
	
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
				$Userlists = $this->PermissionModel->Userlists($userid);
				if($Userlists->u_status == '0')
				{
					$this->load->view('backend/profile');
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
	
	public function editprofile($id)
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
				$EditUser = $this->PermissionModel->EditUser($userid);
				if($EditUser->u_status == '0')
				{
					$data['userdetails']=$this->Adminmodel->getUserbyId($id);
					$data['blood']=$this->Adminmodel->getblood();
					$this->load->view('backend/edit_profile',$data);
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
	
	public function UpdateProfile()
	{
		$userid = $this->session->userdata('slno');
		$EditUser = $this->PermissionModel->EditUser($userid);
		if($EditUser->u_status == '0')
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
								$id = $this->input->post('id');
								$imgup = $this->input->post('imagechange');
								$data['userdetails'] = $this->Adminmodel->getUserbyId($id);
								if($imgup == 1)
								{
										$docpath ="Uploads/profile/";
										if (file_exists($docpath))
										{
										}
										else
										{
											mkdir($docpath, 0777, TRUE);
										}
										if(!empty($_FILES['image']['name']))
										{
											$config['upload_path'] = $docpath;
											$config['allowed_types'] = 'jpg|jpeg|png|gif';
											$config['file_name'] = $_FILES['image']['name'];
											
											//Load upload library and initialize configuration
											$this->load->library('upload',$config);
											$this->upload->initialize($config);
											if ($_FILES["image"]["size"] >= 500000 ) 
												{
													$this->session->set_flashdata('message3','message3');
													redirect("Profile/editprofile/$id");
													die();
												}
												else 
												{
													
												}	
											if($this->upload->do_upload('image')){
												$uploadData = $this->upload->data();
												$picture = $uploadData['file_name'];
												$upparh = $docpath.$picture;
											}else{
												$upparh = '';
											}
										}else{
											$upparh = '';
										}		
												$data = array(
													'name' => $this->input->post('name'),
													'co' => $this->input->post('co'),
													'dob' => $this->input->post('dob'),
													'email' => $this->input->post('email'),
													'mobile2' => $this->input->post('mobile2'),
													'address' => $this->input->post('address'),
													'blood' => $this->input->post('blood'),
													'image' => $upparh,
												);
												$this->Adminmodel->UpdateUsers($data,$id);
												$this->session->set_userdata($data);
												$name = $this->session->userdata('name');
												$co = $this->session->userdata('co');
												$dob = $this->session->userdata('dob');
												$address = $this->session->userdata('address');
												$blood = $this->session->userdata('blood');
												$email = $this->session->userdata('email');
												$image = $this->session->userdata('image');
												$this->session->set_flashdata('message6','message6');
												redirect("Profile");
								}
								else
								{
									$docpath ="Uploads/profile/";
										if (file_exists($docpath))
										{
										}
										else
										{
											mkdir($docpath, 0777, TRUE);
										}
										if(!empty($_FILES['image']['name']))
										{
											$config['upload_path'] = $docpath;
											$config['allowed_types'] = 'jpg|jpeg|png|gif';
											$config['file_name'] = $_FILES['image']['name'];
											
											//Load upload library and initialize configuration
											$this->load->library('upload',$config);
											$this->upload->initialize($config);
											if ($_FILES["image"]["size"] >= 500000 ) 
												{
													$this->session->set_flashdata('message3','message3');
													redirect("Profile/editprofile/$id");
													die();
												}
												else 
												{
													
												}	
											if($this->upload->do_upload('image')){
												$uploadData = $this->upload->data();
												$picture = $uploadData['file_name'];
												$upparh = $docpath.$picture;
											}else{
												$upparh = '';
											}
										}else{
											$upparh = '';
										}		
												$data = array(
													'name' => $this->input->post('name'),
													'co' => $this->input->post('co'),
													'dob' => $this->input->post('dob'),
													'gender' => $this->input->post('gender'),
													'email' => $this->input->post('email'),
													'mobile2' => $this->input->post('mobile2'),
													'address' => $this->input->post('address'),
													'blood' => $this->input->post('blood'),
												);
												$this->Adminmodel->UpdateUsers($data,$id);
												$this->session->set_userdata($data);
												$name = $this->session->userdata('name');
												$co = $this->session->userdata('co');
												$dob = $this->session->userdata('dob');
												$address = $this->session->userdata('address');
												$blood = $this->session->userdata('blood');
												$email = $this->session->userdata('email');
												$nstatus = $this->session->userdata('nstatus');
												$image = $this->session->userdata('image');
												$this->session->set_flashdata('message6','message6');
												redirect("Profile");
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
	
}
?>