<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Advertise extends CI_Controller {
	
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
		$InsertAdd = $this->PermissionModel->InsertAdd($userid);
		if($InsertAdd->u_status == '0')
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
								$date=date('Ymd');
								$docpath ="Uploads/advertisement/$date/";
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
											redirect('Advertise');
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
											'givenby' => $this->input->post('sponsor'),
											'description' => $this->input->post('description'),
											'url' => $this->input->post('url'),
											'position' => $this->input->post('position'),
											'status' => $this->input->post('status'),
											'image' => $upparh,
											'xdelete' => 0,
											'createdby' => $name,
										);
										$this->Adminmodel->InsertAdvertisement($data);
										$this->session->set_flashdata('message1','message1');
										redirect("Advertise/AdvertiseView");
										
						}
						else
						{
							$this->load->view('backend/add_advertise');
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
	
	public function AdvertiseView()
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
				$Addist = $this->PermissionModel->Addist($userid);
				if($Addist->u_status == '0')
				{
					$data['adddetails']=$this->Adminmodel->getAllAdvertise();
					$this->load->view('backend/advertise_view',$data);
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
	
	public function EditAdvetisement($id)
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
				$EditAdd = $this->PermissionModel->EditAdd($userid);
				if($EditAdd->u_status == '0')
				{
					$data['advertise'] = $this->Adminmodel->getAdvertiseById($id);
					$this->load->view('backend/edit_advertise',$data);
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
	
	public function UpdateAdvertisement()
	{
		$userid = $this->session->userdata('slno');
		$EditAdd = $this->PermissionModel->EditAdd($userid);
		if($EditAdd->u_status == '0')
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
								$data['advertise'] = $this->Adminmodel->getAdvertiseById($id);
								if($imgup == 1)
								{
									$date=date('Ymd');
									$docpath ="Uploads/advertisement/$date/";
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
												redirect("Advertise/EditAdvetisement/$id");
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
												'givenby' => $this->input->post('sponsor'),
												'description' => $this->input->post('description'),
												'url' => $this->input->post('url'),
												'position' => $this->input->post('position'),
												'status' => $this->input->post('status'),
												'image' => $upparh,
												'xdelete' => 0,
												'updatedby' => $name,
											);
											$this->Adminmodel->UpdateAdvertiseDetails($data,$id);
											$this->session->set_flashdata('message2','message2');
											redirect("Advertise/AdvertiseView");
								}
								else
								{
									$date=date('Ymd');
									$docpath ="Uploads/advertisement/$date/";
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
												redirect("Advertise/EditAdvetisement/$id");
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
											$upparh = $advertise[0]->image;;
										}
									}else{
										$upparh = '';
									}		
											$data = array(
												'givenby' => $this->input->post('sponsor'),
												'description' => $this->input->post('description'),
												'url' => $this->input->post('url'),
												'position' => $this->input->post('position'),
												'status' => $this->input->post('status'),
												'xdelete' => 0,
												'updatedby' => $name,
											);
											$this->Adminmodel->UpdateAdvertiseDetails($data,$id);
											$this->session->set_flashdata('message2','message2');
											redirect("Advertise/AdvertiseView");
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
	
	public function InactiveAdvetisement($id)
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
				$InactiveAdd = $this->PermissionModel->InactiveAdd($userid);
				if($InactiveAdd->u_status == '0')
				{
					$data = array(
						'status' => 'Inactive',
						'updatedby' => $name,
					);
					$this->adminModel->UpdateAdvertiseDetails($data,$id);
					$this->session->set_flashdata('message3','message3');
					redirect('Advertise/AdvertiseView');
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
	
	public function ActiveAdvetisement($id)
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
				$ActiveAdd = $this->PermissionModel->ActiveAdd($userid);
				if($ActiveAdd->u_status == '0')
				{
					$data = array(
						'status' => 'Active',
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateAdvertiseDetails($data,$id);
					$this->session->set_flashdata('message4','message4');
					redirect('Advertise/AdvertiseView');
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
	
	public function DeleteAdvetisement($id)
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
				$DeleteAdd = $this->PermissionModel->DeleteAdd($userid);
				if($DeleteAdd->u_status == '0')
				{
					$data = array(
						'xdelete' => 1,
						'updatedby' => $name,
					);
					$this->adminModel->UpdateAdvertiseDetails($data,$id);
					$this->session->set_flashdata('message5','message5');
					redirect('Advertise/AdvertiseView');
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