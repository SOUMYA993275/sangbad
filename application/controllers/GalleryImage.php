<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class GalleryImage extends CI_Controller {
	
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
		$InsertImage = $this->PermissionModel->InsertImage($userid);
		if($InsertImage->u_status == '0')
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
							$img = count($_FILES['filename']['name']);
							$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
							$imageid = substr( str_shuffle( $chars ), 0, 9 );
							$data = array(
								'imageid' => $imageid,	
								'imagetitle' => $this->input->post('title'),
								'postdate' => $this->input->post('date'),
								'posttime' => $this->input->post('time'),
								'imagecount' => $img,
								'status' => 0,
								'createdby' => $name,
								'xdelete' => 0,
							);
							$this->Adminmodel->InsertGalleryImageMaster($data);
							$docpath ="Uploads/galleryimage/".$date.'/'.$imageid;
							if (file_exists($docpath))
							{
							}
							else
							{
								mkdir($docpath, 0777, TRUE);
							}
							
							$collected_from = $this->input->post('collected_from');
							$description = $this->input->post('description');
							$pstatus = $this->input->post('p_status');
							$img = count($_FILES['filename']['name']);
							for ($i = 0; $i < $img; $i++){
								$file = $_FILES['filename'];
								$ext = substr($file['name'][$i], strrpos($file['name'][$i], '.') + 1);
								$path=$docpath."/".$imageid."(".$i.").".$ext;
										
								if(file_exists($_FILES["filename"]['tmp_name'][$i]))
								{
									$ext_str = "png,jpeg,jpg,PNG,JPG,JEPG,GIF,gif";
									$allowed_extensions = explode(',',$ext_str);
									
									$target_file =basename($_FILES["filename"]["name"][$i]);
									
									if ($_FILES["filename"]["size"][$i] >= 500000 ) 
									{
										$this->session->set_flashdata('message3','message3');
										redirect("GalleryImage");
										die();
									}
									else if(!in_array($ext, $allowed_extensions))
									{
										$this->session->set_flashdata('message2','message2');
										redirect("GalleryImage");
										die();
									}
									else
									{
										move_uploaded_file($_FILES["filename"]["tmp_name"][$i], $path);
									}	
								}
								$data1 = array(
										'imageid' => $imageid,	
										'imageurl' => $path,
										'description' => $description[$i],
										'collectedfrom' => $collected_from[$i],
										'createdby' => $name,
										'pstatus' => $pstatus[$i],
										'xdelete' => 0,
								);
								$this->Adminmodel->InsertGalleryImageDetails($data1);
							}
								$this->session->set_flashdata('message1','message1');
								redirect("GalleryImage/GalleryImageView");
						}
						else
						{
							$this->load->view('backend/gallery_image_upload');
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
	
	public function GalleryImageView()
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
				$Imageist = $this->PermissionModel->Imageist($userid);
				if($Imageist->u_status == '0')
				{
					$data['imagelist']=$this->Adminmodel->getAllImagelist();
					$this->load->view('backend/gallery_image_list',$data);
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
	
	public function InactiveImagecategory($id)
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
				$InactiveImage = $this->PermissionModel->InactiveImage($userid);
				if($InactiveImage->u_status == '0')
				{
					$data = array(
						'status' => 1,
						'updatedby' => $name,
					);
					$this->adminModel->UpdateImagelist($data,$id);
					$this->session->set_flashdata('message3','message3');
					redirect('GalleryImage/GalleryImageView');
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
	
	public function ActiveImageCategory($id)
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
				$ActiveImage = $this->PermissionModel->ActiveImage($userid);
				if($ActiveImage->u_status == '0')
				{
					$data = array(
						'status' => 0,
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateImagelist($data,$id);
					$this->session->set_flashdata('message4','message4');
					redirect('GalleryImage/GalleryImageView');
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
	
	public function DeleteImageCategory($id)
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
				$DeleteImage = $this->PermissionModel->DeleteImage($userid);
				if($DeleteImage->u_status == '0')
				{
					$data = array(
						'xdelete' => 1,
						'updatedby' => $name,
					);
					$this->adminModel->UpdateImagelist($data,$id);
					$this->session->set_flashdata('message5','message5');
					redirect('GalleryImage/GalleryImageView');
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
	
	public function GalleryImageDetails($imageid)
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
				$Imageist = $this->PermissionModel->Imageist($userid);
				if($Imageist->u_status == '0')
				{
					$data['imagedetails']=$this->Adminmodel->getAllImageDetails($imageid);
					$this->load->view('backend/gallery_image_details',$data,$imageid);
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
	
	public function ActiveSingleImage()
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
				$ActiveImage = $this->PermissionModel->ActiveImage($userid);
				if($ActiveImage->u_status == '0')
				{
					$id = $_POST['search_data'];
					$data = array(
						'xdelete' => 0,
						'updatedby' => $name,
					);
					$this->adminModel->UpdateImageDetails($data,$id);
					$this->session->set_flashdata('message5','message5');
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
	
	public function InactiveSingleImage()
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
				$InactiveImage = $this->PermissionModel->InactiveImage($userid);
				if($InactiveImage->u_status == '0')
				{
					$id = $_POST['search_data'];
					$data = array(
						'xdelete' => 1,
						'updatedby' => $name,
					);
					$this->adminModel->UpdateImageDetails($data,$id);
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