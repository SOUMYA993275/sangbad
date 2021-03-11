<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class User extends CI_Controller {
	
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
					$data['userdetails']=$this->Adminmodel->getUserId();
					$this->load->view('backend/alluser',$data);
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
	
	public function add_user()
	{
		$userid = $this->session->userdata('slno');
		$InsertUser = $this->PermissionModel->InsertUser($userid);
		if($InsertUser->u_status == '0')
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
							$email = $this->input->post('email');
							$result = $this->Adminmodel->getUserId();
							$aid='';
							foreach($result as $r)
							{
								$aid = $r->username;
							}
							$newstring = substr($aid, -3);
							$newstring1=$newstring+1;
							$newstring2=str_pad($newstring1, 4, "0", STR_PAD_LEFT);
							$rqno1="SNRD";
							$officeid=$rqno1.$newstring2;
							if($result[0]->email != $email )
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
											redirect('User/add_user');
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
											'username' => $officeid,
											'password' => md5(123456),
											'name' => $this->input->post('name'),
											'co' => $this->input->post('co'),
											'dob' => $this->input->post('dob'),
											'gender' => $this->input->post('gender'),
											'mobile' => $this->input->post('mobile'),
											'email' => $this->input->post('email'),
											'mobile2' => $this->input->post('mobile2'),
											'status' => $this->input->post('status'),
											'address' => $this->input->post('address'),
											'blood' => $this->input->post('blood'),
											'image' => $upparh,
											'nstatus' => 0,
											'xdelete' => 0,
											'is_email_verified' => 0,
										);
										$data2 = array(
										'email' => $email,
										'name' => $this->input->post('name'),
										);
										$data3 = array(
										'email' => $email,
										'type' => 'USER VERIFICATION',
										'response' => 'Send',
										'content' => json_encode($data),
										'doc' => date('Y-m-d H:i:s')
										);
										$data5 = array(
										'email' => $email,
										'type' => 'USER VERIFICATION',
										'response' => 'Failed',
										'content' => json_encode($data),
										'doc' => date('Y-m-d H:i:s')
										);
										$email = $this->input->post('email');
										$message = $this->load->view('template/userverification.php',$data2,TRUE);
										$this->load->library('email');
										$this->email->set_newline("\r\n");
										$this->email->set_mailtype("html");
										$this->email->from('sangbadraatdin@gmail.com','SANGBAD RAATDIN'); // change it to yours
										$this->email->to($email);// change it to yours
										$this->email->reply_to('sangbadraatdin@gmail.com');
										$this->email->subject('Confirm Your Account');
										$this->email->message($message);
										if($this->email->send())
										{
											$this->Adminmodel->InsertEmailLogsuc($data3);
											$this->Adminmodel->InsertUser($data);
											$this->session->set_flashdata('message1','message1');
											redirect("User");
										} 
										else
										{
											$this->Adminmodel->InsertEmailLogerr($data5);
											$this->session->set_flashdata('message11','message11'); // Email not Send
											redirect('User/add_user');
										}
							}
							else
							{
								$this->session->set_flashdata('message2','message2');
								redirect('User/add_user');
							}
						}
						else
						{
							$data['blood']=$this->Adminmodel->getblood();
							$this->load->view('backend/add_user',$data);
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
	
	public function edituser($id)
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
					$this->load->view('backend/edit_user',$data);
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
	
	public function UpdateUser()
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
						$email = $this->input->post('email');
						$result = $this->Adminmodel->getUserIdnotequal($id,$email);
						if($result->email != $email)
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
											redirect("User/edituser/$id");
											die();
										}
										else 
										{
						
										}	
										if($this->upload->do_upload('image'))
										{
											$uploadData = $this->upload->data();
											$picture = $uploadData['file_name'];
											$upparh = $docpath.$picture;
										}
										else
										{
											$upparh = '';
										}
									}
									else
									{
										$upparh = '';
									}		
										$data = array(
											'name' => $this->input->post('name'),
											'co' => $this->input->post('co'),
											'dob' => $this->input->post('dob'),
											'gender' => $this->input->post('gender'),
											'mobile' => $this->input->post('mobile'),
											'email' => $this->input->post('email'),
											'mobile2' => $this->input->post('mobile2'),
											'status' => $this->input->post('status'),
											'address' => $this->input->post('address'),
											'blood' => $this->input->post('blood'),
											'image' => $upparh,
										);
										$this->Adminmodel->UpdateUsers($data,$id);
										$this->session->set_flashdata('message6','message6');
										redirect("User");
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
											redirect("User/edituser/$id");
											die();
										}
										else 
										{
										
										}	
										if($this->upload->do_upload('image'))
										{
											$uploadData = $this->upload->data();
											$picture = $uploadData['file_name'];
											$upparh = $docpath.$picture;
										}
										else
										{
											$upparh = '';
										}
									}
									else
									{
										$upparh = '';
									}		
										$data = array(
											'name' => $this->input->post('name'),
											'co' => $this->input->post('co'),
											'dob' => $this->input->post('dob'),
											'gender' => $this->input->post('gender'),
											'mobile' => $this->input->post('mobile'),
											'email' => $this->input->post('email'),
											'mobile2' => $this->input->post('mobile2'),
											'status' => $this->input->post('status'),
											'address' => $this->input->post('address'),
											'blood' => $this->input->post('blood'),
										);
											$this->Adminmodel->UpdateUsers($data,$id);
											$this->session->set_flashdata('message6','message6');
											redirect("User");
								}
						}
						else
						{
							$this->session->set_flashdata('message2','message2');
							redirect("User/edituser/$id");
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
	
	public function InactiveUser($id)
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
				$InactiveUser = $this->PermissionModel->InactiveUser($userid);
				if($InactiveUser->u_status == '0')
				{
					$data = array(
						'nstatus' => 1,
					);
					$this->Adminmodel->UpdateUsers($data,$id);
					$this->session->set_flashdata('message3','message3');
					redirect('User');
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
	
	public function ActiveUser($id)
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
				$ActiveUser = $this->PermissionModel->ActiveUser($userid);
				if($ActiveUser->u_status == '0')
				{
					$data = array(
						'nstatus' => 0,
					);
					$this->Adminmodel->UpdateUsers($data,$id);
					$this->session->set_flashdata('message4','message4');
					redirect('User');
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
	
	public function DeleteUser($id)
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
				$DeleteUser = $this->PermissionModel->DeleteUser($userid);
				if($DeleteUser->u_status == '0')
				{
					$data = array(
						'xdelete' => 1,
						'nstatus' => 1,
					);
					$this->Adminmodel->UpdateUsers($data,$id);
					$this->session->set_flashdata('message5','message5');
					redirect('User');
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
	
	public function active()
	{
	    $this->load->library('session');
		$this->load->model('Adminmodel');
		$email = $this->input->get('url');
		$result = $this->Adminmodel->getUserActive($email);
		if(!$result)
		{
		    $data = array(
				'is_email_verified' => 1,
			);
			$this->Adminmodel->UpdateUsersActive($email,$data);
            $this->session->set_flashdata('user',' msg');
			redirect("admin");
	   	}
		else
		{
			
		}
	}
	
}
?>