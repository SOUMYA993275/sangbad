<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class RightsideTab extends CI_Controller {
	
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
		$userid = $this->session->userdata('slno');
		$InsertTab = $this->PermissionModel->InsertTab($userid);
		if($InsertTab->u_status == '0')
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
							$tabcode = ucfirst($this->input->post('tabcode'));
							$link = 'home/'.$tabcode;
							$result = $this->Adminmodel->Checktabcode($tabcode);
							if(!$result)
							{
								$date=date('Ymd');
								$docpath ="Uploads/rightsidetab/$date/";
								if (file_exists($docpath))
								{
								}
								else
								{
									mkdir($docpath, 0777, TRUE);
								}
								if(!empty($_FILES['tabimage']['name']))
								{
									$config['upload_path'] = $docpath;
									$config['allowed_types'] = 'jpg|jpeg|png|gif';
									$config['file_name'] = $_FILES['tabimage']['name'];
									
									//Load upload library and initialize configuration
									$this->load->library('upload',$config);
									$this->upload->initialize($config);
									if ($_FILES["tabimage"]["size"] >= 500000 ) 
										{
											$this->session->set_flashdata('message3','message3');
											redirect('RightsideTab');
											die();
										}
										else 
										{
											
										}	
									if($this->upload->do_upload('tabimage')){
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
											'tabname' => $this->input->post('tabname'),
											'tabcode' => $tabcode,
											'tablink' => $link,
											'tabstatus' => $this->input->post('tabstatus'),
											'tabimage' => $upparh,
											'createdby' => $name,
											'xdelete' => 0,
										);
										$this->Adminmodel->InsertRightTab($data);
										$this->session->set_flashdata('message1','message1');
										redirect("RightsideTab/RightsideTabView");
										
							}
							else
							{
								$this->session->set_flashdata('message2','message2');
								redirect('RightsideTab');
							}
						}
						else
						{
							$this->load->view('backend/right_side_tab_add');
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
	
	public function RightsideTabView()
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
				$Tablist = $this->PermissionModel->Tablist($userid);
				if($Tablist->u_status == '0')
				{
					$this->load->view('backend/right_side_tab_view');
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
	
	public function tabList()
	{
		$postData = $this->input->post();
		$data = $this->DataModel->getTab($postData);
		print json_encode($data);
	}
	
	public function EditTab($id)
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
				$EditSideTab = $this->PermissionModel->EditSideTab($userid);
				if($EditSideTab->u_status == '0')
				{
					$data['tabdetails']=$this->Adminmodel->getsidetabbyId($id);
					$this->load->view('backend/right_side_tab_edit',$data);
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
	
	public function UpdateTab()
	{
		$userid = $this->session->userdata('slno');
		$EditSideTab = $this->PermissionModel->EditSideTab($userid);
		if($EditSideTab->u_status == '0')
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
						$id = $this->input->post('slno');
						$tabcode = ucfirst($this->input->post('tabcode'));
						$link = 'home/'.$tabcode;
						$imgup = $this->input->post('imagechange');
						$data['tabdetails']=$this->Adminmodel->getsidetabbyId($id);
						if($imgup == 1)
						{
								$date=date('Ymd');
								$docpath ="Uploads/rightsidetab/$date/";
								if (file_exists($docpath))
								{
								}
								else
								{
									mkdir($docpath, 0777, TRUE);
								}
								if(!empty($_FILES['tabimage']['name']))
								{
								$config['upload_path'] = $docpath;
								$config['allowed_types'] = 'jpg|jpeg|png|gif';
								$config['file_name'] = $_FILES['tabimage']['name'];
								$this->load->library('upload',$config);
								$this->upload->initialize($config);
								if ($_FILES["tabimage"]["size"] >= 500000 ) 
								{
								$this->session->set_flashdata('message3','message3');
								redirect("RightsideTab/EditTab/$id");
								die();
								}
								else 
								{
													
								}	
								if($this->upload->do_upload('tabimage')){
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
										'tabname' => $this->input->post('tabname'),
										'tabcode' => $tabcode,
										'tablink' => $link,
										'tabstatus' => $this->input->post('tabstatus'),
										'tabimage' => $upparh,
										'updatedby' => $name,
										);
										$this->Adminmodel->UpdateTabDetails($data,$id);
										$this->session->set_flashdata('message6','message6');
										redirect("RightsideTab/RightsideTabView");
							}
							else
							{
								$date=date('Ymd');
								$docpath ="Uploads/rightsidetab/$date/";
								if (file_exists($docpath))
								{
								}
								else
								{
									mkdir($docpath, 0777, TRUE);
								}
								if(!empty($_FILES['tabimage']['name']))
								{
								$config['upload_path'] = $docpath;
								$config['allowed_types'] = 'jpg|jpeg|png|gif';
								$config['file_name'] = $_FILES['tabimage']['name'];
								$this->load->library('upload',$config);
								$this->upload->initialize($config);
								if ($_FILES["tabimage"]["size"] >= 500000 ) 
								{
								$this->session->set_flashdata('message3','message3');
								redirect("RightsideTab/EditTab/$id");
								die();
								}
								else 
								{
													
								}	
								if($this->upload->do_upload('tabimage')){
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
									'tabname' => $this->input->post('tabname'),
									'tabcode' => $tabcode,
									'tablink' => $link,
									'tabstatus' => $this->input->post('tabstatus'),
									'updatedby' => $name,
									);
									$this->Adminmodel->UpdateTabDetails($data,$id);
									$this->session->set_flashdata('message6','message6');
									redirect("RightsideTab/RightsideTabView");
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
	
	public function InactiveTab($id)
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
				$InactiveTab = $this->PermissionModel->InactiveTab($userid);
				if($InactiveTab->u_status == '0')
				{
					$data = array(
						'tabstatus' => 'Inactive',
						'updatedby' => $name,
					);
					$this->adminModel->UpdateTabDetails($data,$id);
					$this->session->set_flashdata('message3','message3');
					redirect('RightsideTab/RightsideTabView');
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
	
	public function ActiveTab($id)
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
				$ActiveTab = $this->PermissionModel->ActiveTab($userid);
				if($ActiveTab->u_status == '0')
				{
					$data = array(
						'tabstatus' => 'Active',
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateTabDetails($data,$id);
					$this->session->set_flashdata('message4','message4');
					redirect('RightsideTab/RightsideTabView');
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
	
	public function DeleteTab($id)
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
				$DeleteTab = $this->PermissionModel->DeleteTab($userid);
				if($DeleteTab->u_status == '0')
				{
					$data = array(
						'xdelete' => 1,
						'updatedby' => $name,
					);
					$this->adminModel->UpdateTabDetails($data,$id);
					$this->session->set_flashdata('message5','message5');
					redirect('RightsideTab/RightsideTabView');
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