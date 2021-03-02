<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class News extends CI_Controller {
	
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
		$name = $this->session->userdata('name');
		if($adminid != '')
		{
			$userid = $this->session->userdata('slno');
			$InsertNews = $this->PermissionModel->InsertNews($userid);
			if($InsertNews->u_status == '0')
			{
				$adminid = $this->session->userdata('username');
				$uactive = $this->Adminmodel->uactive($adminid);
				if($uactive->nstatus == '0')
				{
					if($_POST)
					{
						$entitle = $this->input->post('etitle');
						$eng_title = str_replace(' ', '-', $entitle);
						$check = $this->Adminmodel->getnewsByEngTittle($eng_title);
						if(count($check)>0)
						{
							$this->session->set_flashdata('message4','message4');
							redirect('News');
						}
						else
						{
							$tme = $this->input->post('time');
							$dte = $this->input->post('date');
							$datetime = $dte.' '.$tme;
							$ylink1 = $this->input->post('ylink');
							$youtubeid1 =  substr($ylink1, 17, 100);
							$entitle = $this->input->post('etitle');
							$eng_title = str_replace(' ', '-', $entitle);
							$sen = $this->input->post('details');
							$details = substr(strstr($sen,":"), 1);
							$result = $this->Adminmodel->getNewsId();
							$nid1='';
							foreach($result as $r)
							{
								$nid1 = $r->maxid;
							}
							$nid = $nid1+1;
							$rqno="SNRD";
							$newsid=$rqno.$nid;
							$date=date('Ymd');
							$docpath ="Uploads/news/".$date."/".$newsid;
							if (empty($_FILES['image2']['name']))
							{
								if (empty($_FILES['image1']['name']))
								{
									$data = array(
										'newsid' => $newsid,
										'category' => $this->input->post('switch-radio1'),
										'ntitle' => $this->input->post('btitle'),
										'eng_title' => $eng_title,
										'title' => $this->input->post('sironam'),
										'date' => $this->input->post('date'),
										'time' => $this->input->post('time'),
										'datetime' => $datetime,
										'video1' => $this->input->post('ylink'),
										'youtubeid1' => $youtubeid1,
										'otherlink' => $this->input->post('olink'),
										'collected_from' => $this->input->post('collected'),
										'news_description' => $this->input->post('n_details'),
										'text_description' => $details,
										'createdby' => $name,
										'xdelete' =>0,
										'nstatus' =>0,
									);
									//echo "Image 2 Empty ->Image 1 Empty";
									
										$this->Adminmodel->InsertNewsDetails($data);
										$this->session->set_flashdata('message1','message1');
										redirect('News');
								}
								else
								{
									if (file_exists($docpath))
									{
									}
									else
									{
										mkdir($docpath, 0777, TRUE);
									}
									$file1=$_FILES['image1'];
									$ext1 = substr($file1['name'], strrpos($file1['name'], '.') + 1);
									$path=$docpath."/".$newsid."(a).".$ext1;
									
									if(file_exists($_FILES["image1"]['tmp_name']))
									{
										$ext_str1 = "png,jpeg,jpg,PNG,JPG,JEPG,GIF,gif";
										$allowed_extensions1 = explode(',',$ext_str1);
										
										$target_file =basename($_FILES["image1"]["name"]);
										
										if ($_FILES["image1"]["size"] >= 500000 ) 
										{
											$this->session->set_flashdata('message2','message2');
											redirect('News');
											die();
										}	
										else if(!in_array($ext1, $allowed_extensions1)) 
										{
											$this->session->set_flashdata('message3','message3');
											redirect('News');
											die();
										}
										else
										{
											move_uploaded_file($_FILES["image1"]["tmp_name"], $path);
										}	
									}
									$data = array(
										'newsid' => $newsid,
										'category' => $this->input->post('switch-radio1'),
										'ntitle' => $this->input->post('btitle'),
										'eng_title' => $eng_title,
										'title' => $this->input->post('sironam'),
										'date' => $this->input->post('date'),
										'time' => $this->input->post('time'),
										'datetime' => $datetime,
										'video1' => $this->input->post('ylink'),
										'youtubeid1' => $youtubeid1,
										'otherlink' => $this->input->post('olink'),
										'collected_from' => $this->input->post('collected'),
										'news_description' => $this->input->post('n_details'),
										'text_description' => $details,
										'createdby' => $name,
										'xdelete' =>0,
										'nstatus' =>0,
										'image1' => $path,
									);
									//echo "Image 2 Empty ->Image 1 Inserted";
									
										$this->Adminmodel->InsertNewsDetails($data);
										$this->session->set_flashdata('message1','message1');
										redirect('News');					
								}
							}	
							else if (empty($_FILES['image2']['name']))
							{	
								if (empty($_FILES['image2']['name']))
								{
									$data = array(
										'newsid' => $newsid,
										'category' => $this->input->post('switch-radio1'),
										'ntitle' => $this->input->post('btitle'),
										'eng_title' => $eng_title,
										'title' => $this->input->post('sironam'),
										'date' => $this->input->post('date'),
										'time' => $this->input->post('time'),
										'datetime' => $datetime,
										'video1' => $this->input->post('ylink'),
										'youtubeid1' => $youtubeid1,
										'otherlink' => $this->input->post('olink'),
										'collected_from' => $this->input->post('collected'),
										'news_description' => $this->input->post('n_details'),
										'text_description' => $details,
										'createdby' => $name,
										'xdelete' =>0,
										'nstatus' =>0,
									);
									//echo "Image 1 Empty ->Image 2 Empty";
									
										$this->Adminmodel->InsertNewsDetails($data);
										$this->session->set_flashdata('message1','message1');
										redirect('News');
								}
								else
								{
									if (file_exists($docpath))
									{
									}
									else
									{
										mkdir($docpath, 0777, TRUE);
									}
									$file2=$_FILES['image2'];
									$ext2 = substr($file2['name'], strrpos($file2['name'], '.') + 1);
									$path=$docpath."/".$newsid."(b).".$ext2;
									
									if(file_exists($_FILES["image2"]['tmp_name']))
									{
										$ext_str2 = "png,jpeg,jpg,PNG,JPG,JEPG,GIF,gif";
										$allowed_extensions2 = explode(',',$ext_str2);
									
										$target_file =basename($_FILES["image2"]["name"]);
										
										if ($_FILES["image2"]["size"] >= 500000 ) 
										{
											$this->session->set_flashdata('message2','message2');
											redirect('News');
											die();
										}	
										else if(!in_array($ext2, $allowed_extensions2))
										{
											$this->session->set_flashdata('message3','message3');
											redirect('News');
											die();
										}
										else
										{
											move_uploaded_file($_FILES["image2"]["tmp_name"], $path);
										}	
									}
									$data = array(
										'newsid' => $newsid,
										'category' => $this->input->post('switch-radio1'),
										'ntitle' => $this->input->post('btitle'),
										'eng_title' => $eng_title,
										'title' => $this->input->post('sironam'),
										'date' => $this->input->post('date'),
										'time' => $this->input->post('time'),
										'datetime' => $datetime,
										'video1' => $this->input->post('ylink'),
										'youtubeid1' => $youtubeid1,
										'otherlink' => $this->input->post('olink'),
										'collected_from' => $this->input->post('collected'),
										'news_description' => $this->input->post('n_details'),
										'text_description' => $details,
										'createdby' => $name,
										'xdelete' =>0,
										'nstatus' =>0,	
										'image2' => $path,
									);
									//echo "Image 1 Empty ->Image 2 Inserted";
									
										$this->Adminmodel->InsertNewsDetails($data);
										$this->session->set_flashdata('message1','message1');
										redirect('News');
								}
							}
							else
							{
								if (file_exists($docpath))
								{
								}
								else
								{
									mkdir($docpath, 0777, TRUE);
								}
								$file1=$_FILES['image1'];
								$ext1 = substr($file1['name'], strrpos($file1['name'], '.') + 1);
								$path1=$docpath."/".$newsid."(a).".$ext1;
								
								if(file_exists($_FILES["image1"]['tmp_name']))
								{
									$ext_str1 = "png,jpeg,jpg,PNG,JPG,JEPG,GIF,gif";
									$allowed_extensions1 = explode(',',$ext_str1);
									
									$target_file1 =basename($_FILES["image1"]["name"]);
									
									if ($_FILES["image1"]["size"] >= 500000 ) 
									{
										$this->session->set_flashdata('message2','message2');
										redirect('News');
										die();
									}	
									else if(!in_array($ext1, $allowed_extensions1)) 
									{
										$this->session->set_flashdata('message3','message3');
										redirect('News');
										die();
									}
									else
									{
										move_uploaded_file($_FILES["image1"]["tmp_name"], $path1);
									}	
								}
								
								$file2=$_FILES['image2'];
								$ext2 = substr($file2['name'], strrpos($file2['name'], '.') + 1);
								$path2=$docpath."/".$newsid."(b).".$ext2;
									
								if(file_exists($_FILES["image2"]['tmp_name']))
								{
									$ext_str2 = "png,jpeg,jpg,PNG,JPG,JEPG,GIF,gif";
									$allowed_extensions2 = explode(',',$ext_str2);
									
									$target_file2 =basename($_FILES["image2"]["name"]);
									
									if ($_FILES["image2"]["size"] >= 500000 ) 
									{
										$this->session->set_flashdata('message2','message2');
										redirect('News');
										die();
									}	
									else if(!in_array($ext2, $allowed_extensions2))
									{
										$this->session->set_flashdata('message3','message3');
										redirect('News');
										die();
									}
									else
									{
										move_uploaded_file($_FILES["image2"]["tmp_name"], $path2);
									}	
								}
								$data = array(
									'newsid' => $newsid,
									'category' => $this->input->post('switch-radio1'),
									'ntitle' => $this->input->post('btitle'),
									'eng_title' => $eng_title,
									'title' => $this->input->post('sironam'),
									'date' => $this->input->post('date'),
									'time' => $this->input->post('time'),
									'datetime' => $datetime,
									'video1' => $this->input->post('ylink'),
									'youtubeid1' => $youtubeid1,
									'otherlink' => $this->input->post('olink'),
									'collected_from' => $this->input->post('collected'),
									'news_description' => $this->input->post('n_details'),
									'text_description' => $details,
									'createdby' => $name,
									'xdelete' =>0,
									'nstatus' =>0,
									'image1' => $path1,
									'image2' => $path2,
								);
								//echo "All Ok";
								$this->Adminmodel->InsertNewsDetails($data);
								$this->session->set_flashdata('message1','message1');
								redirect('News');
							}
						}
					}
					else
					{
					$data['category']=$this->Adminmodel->getAllcategory();
					$data['tabdetails']=$this->Adminmodel->getAllsidetab();
					$this->load->view('backend/news_entry_form',$data);
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
	
	public function Edit($id)
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
				$EditNews = $this->PermissionModel->EditNews($userid);
				if($EditNews->u_status == '0')
				{
					$data['news'] = $this->Adminmodel->getNewsbyId($id);
					$data['category']=$this->Adminmodel->getAllcategory();
					$data['tabdetails']=$this->Adminmodel->getAllsidetab();
					$this->load->view('backend/edit_news',$data);
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
	
	public function update()
	{
		$this->load->library('session');
		$this->load->model('Adminmodel');
		$this->load->model('PermissionModel');
		$adminid = $this->session->userdata('username');
		$name = $this->session->userdata('name');
		if($adminid != '')
		{
			$userid = $this->session->userdata('slno');
			$EditNews = $this->PermissionModel->EditNews($userid);
			if($EditNews->u_status == '0')
			{
				$adminid = $this->session->userdata('username');
				$uactive = $this->Adminmodel->uactive($adminid);
				if($uactive->nstatus == '0')
				{
					$newsid = $this->input->post('newsid');
					$id = $this->input->post('slno');
					$tme = $this->input->post('time');
					$dte = $this->input->post('date');
					$datetime = $dte.' '.$tme;
					$ylink1 = $this->input->post('ylink');
					$youtubeid1 =  substr($ylink1, 17, 100);
					$entitle = $this->input->post('etitle');
					$eng_title = str_replace(' ', '-', $entitle);
					$sen = $this->input->post('details');
					$details = substr(strstr($sen,":"), 1);
					$date=date('Ymd');
					$imgup = $this->input->post('imagechange');
					if($imgup == 1)
					{
						$docpath ="Uploads/news/".$date."/".$newsid;
							if (empty($_FILES['image2']['name']))
							{
								if (empty($_FILES['image1']['name']))
								{
									$data = array(
										'category' => $this->input->post('switch-radio1'),
										'ntitle' => $this->input->post('btitle'),
										'eng_title' => $eng_title,
										'title' => $this->input->post('sironam'),
										'date' => $this->input->post('date'),
										'time' => $this->input->post('time'),
										'datetime' => $datetime,
										'video1' => $this->input->post('ylink'),
										'youtubeid1' => $youtubeid1,
										'otherlink' => $this->input->post('olink'),
										'collected_from' => $this->input->post('collected'),
										'news_description' => $this->input->post('n_details'),
										'text_description' => $details,
										'updatedby' => $name,
									);
									//echo "Image 2 Empty ->Image 1 Empty";
									
										$this->Adminmodel->UpdateNewsDetails($data,$id);
										$this->session->set_flashdata('message8','message8');
										redirect('NewsAuthentication');
								}
								else
								{
									if (file_exists($docpath))
									{
									}
									else
									{
										mkdir($docpath, 0777, TRUE);
									}
									$file1=$_FILES['image1'];
									$ext1 = substr($file1['name'], strrpos($file1['name'], '.') + 1);
									$path=$docpath."/".$newsid."(a).".$ext1;
									
									if(file_exists($_FILES["image1"]['tmp_name']))
									{
										$ext_str1 = "png,jpeg,jpg,PNG,JPG,JEPG,GIF,gif";
										$allowed_extensions1 = explode(',',$ext_str1);
										
										$target_file =basename($_FILES["image1"]["name"]);
										
										if ($_FILES["image1"]["size"] >= 500000 ) 
										{
											$this->session->set_flashdata('message2','message2');
											redirect("News/Edit/$id");
											die();
										}	
										else if(!in_array($ext1, $allowed_extensions1)) 
										{
											$this->session->set_flashdata('message3','message3');
											redirect("News/Edit/$id");
											die();
										}
										else
										{
											move_uploaded_file($_FILES["image1"]["tmp_name"], $path);
										}	
									}
									$data = array(
										'newsid' => $newsid,
										'category' => $this->input->post('switch-radio1'),
										'ntitle' => $this->input->post('btitle'),
										'eng_title' => $eng_title,
										'title' => $this->input->post('sironam'),
										'date' => $this->input->post('date'),
										'time' => $this->input->post('time'),
										'datetime' => $datetime,
										'video1' => $this->input->post('ylink'),
										'youtubeid1' => $youtubeid1,
										'otherlink' => $this->input->post('olink'),
										'collected_from' => $this->input->post('collected'),
										'news_description' => $this->input->post('n_details'),
										'text_description' => $details,
										'updatedby' => $name,
										'image1' => $path,
									);
									//echo "Image 2 Empty ->Image 1 Inserted";
									
										$this->Adminmodel->UpdateNewsDetails($data,$id);
										$this->session->set_flashdata('message8','message8');
										redirect('NewsAuthentication');					
								}
							}	
							else if (empty($_FILES['image2']['name']))
							{	
								if (empty($_FILES['image2']['name']))
								{
									$data = array(
										'category' => $this->input->post('switch-radio1'),
										'ntitle' => $this->input->post('btitle'),
										'eng_title' => $eng_title,
										'title' => $this->input->post('sironam'),
										'date' => $this->input->post('date'),
										'time' => $this->input->post('time'),
										'datetime' => $datetime,
										'video1' => $this->input->post('ylink'),
										'youtubeid1' => $youtubeid1,
										'otherlink' => $this->input->post('olink'),
										'collected_from' => $this->input->post('collected'),
										'news_description' => $this->input->post('n_details'),
										'text_description' => $details,
										'updatedby' => $name,
									);
									//echo "Image 1 Empty ->Image 2 Empty";
									
										$this->Adminmodel->UpdateNewsDetails($data,$id);
										$this->session->set_flashdata('message8','message8');
										redirect('NewsAuthentication');
								}
								else
								{
									if (file_exists($docpath))
									{
									}
									else
									{
										mkdir($docpath, 0777, TRUE);
									}
									$file2=$_FILES['image2'];
									$ext2 = substr($file2['name'], strrpos($file2['name'], '.') + 1);
									$path=$docpath."/".$newsid."(b).".$ext2;
									
									if(file_exists($_FILES["image2"]['tmp_name']))
									{
										$ext_str2 = "png,jpeg,jpg,PNG,JPG,JEPG,GIF,gif";
										$allowed_extensions2 = explode(',',$ext_str2);
									
										$target_file =basename($_FILES["image2"]["name"]);
										
										if ($_FILES["image2"]["size"] >= 500000 ) 
										{
											$this->session->set_flashdata('message2','message2');
											redirect("News/Edit/$id");
											die();
										}	
										else if(!in_array($ext2, $allowed_extensions2))
										{
											$this->session->set_flashdata('message3','message3');
											redirect("News/Edit/$id");
											die();
										}
										else
										{
											move_uploaded_file($_FILES["image2"]["tmp_name"], $path);
										}	
									}
									$data = array(
										'category' => $this->input->post('switch-radio1'),
										'ntitle' => $this->input->post('btitle'),
										'eng_title' => $eng_title,
										'title' => $this->input->post('sironam'),
										'date' => $this->input->post('date'),
										'time' => $this->input->post('time'),
										'datetime' => $datetime,
										'video1' => $this->input->post('ylink'),
										'youtubeid1' => $youtubeid1,
										'otherlink' => $this->input->post('olink'),
										'collected_from' => $this->input->post('collected'),
										'news_description' => $this->input->post('n_details'),
										'text_description' => $details,
										'updatedby' => $name,
										'image2' => $path,
									);
									//echo "Image 1 Empty ->Image 2 Inserted";
									
										$this->Adminmodel->UpdateNewsDetails($data,$id);
										$this->session->set_flashdata('message8','message8');
										redirect('NewsAuthentication');
								}
							}
							else
							{
								if (file_exists($docpath))
								{
								}
								else
								{
									mkdir($docpath, 0777, TRUE);
								}
								$file1=$_FILES['image1'];
								$ext1 = substr($file1['name'], strrpos($file1['name'], '.') + 1);
								$path1=$docpath."/".$newsid."(a).".$ext1;
								
								if(file_exists($_FILES["image1"]['tmp_name']))
								{
									$ext_str1 = "png,jpeg,jpg,PNG,JPG,JEPG,GIF,gif";
									$allowed_extensions1 = explode(',',$ext_str1);
									
									$target_file1 =basename($_FILES["image1"]["name"]);
									
									if ($_FILES["image1"]["size"] >= 500000 ) 
									{
										$this->session->set_flashdata('message2','message2');
										redirect("News/Edit/$id");
										die();
									}	
									else if(!in_array($ext1, $allowed_extensions1)) 
									{
										$this->session->set_flashdata('message3','message3');
										redirect("News/Edit/$id");
										die();
									}
									else
									{
										move_uploaded_file($_FILES["image1"]["tmp_name"], $path1);
									}	
								}
								
								$file2=$_FILES['image2'];
								$ext2 = substr($file2['name'], strrpos($file2['name'], '.') + 1);
								$path2=$docpath."/".$newsid."(b).".$ext2;
									
								if(file_exists($_FILES["image2"]['tmp_name']))
								{
									$ext_str2 = "png,jpeg,jpg,PNG,JPG,JEPG,GIF,gif";
									$allowed_extensions2 = explode(',',$ext_str2);
									
									$target_file2 =basename($_FILES["image2"]["name"]);
									
									if ($_FILES["image2"]["size"] >= 500000 ) 
									{
										$this->session->set_flashdata('message2','message2');
										redirect("News/Edit/$id");
										die();
									}	
									else if(!in_array($ext2, $allowed_extensions2))
									{
										$this->session->set_flashdata('message3','message3');
										redirect("News/Edit/$id");
										die();
									}
									else
									{
										move_uploaded_file($_FILES["image2"]["tmp_name"], $path2);
									}	
								}
								$data = array(
									'category' => $this->input->post('switch-radio1'),
									'ntitle' => $this->input->post('btitle'),
									'eng_title' => $eng_title,
									'title' => $this->input->post('sironam'),
									'date' => $this->input->post('date'),
									'time' => $this->input->post('time'),
									'datetime' => $datetime,
									'video1' => $this->input->post('ylink'),
									'youtubeid1' => $youtubeid1,
									'otherlink' => $this->input->post('olink'),
									'collected_from' => $this->input->post('collected'),
									'news_description' => $this->input->post('n_details'),
									'text_description' => $details,
									'updatedby' => $name,
									'image1' => $path1,
									'image2' => $path2,
								);
								//echo "All Ok";
								$this->Adminmodel->UpdateNewsDetails($data,$id);
								$this->session->set_flashdata('message8','message8');
								redirect('NewsAuthentication');
							}
					}
					else
					{
							$data = array(
							'category' => $this->input->post('switch-radio1'),
							'ntitle' => $this->input->post('btitle'),
							'eng_title' => $eng_title,
							'title' => $this->input->post('sironam'),
							'date' => $this->input->post('date'),
							'time' => $this->input->post('time'),
							'datetime' => $datetime,
							'video1' => $this->input->post('ylink'),
							'youtubeid1' => $youtubeid1,
							'otherlink' => $this->input->post('olink'),
							'collected_from' => $this->input->post('collected'),
							'news_description' => $this->input->post('n_details'),
							'text_description' => $details,
							'updatedby' => $name,
						);
						//echo "Image 2 Empty ->Image 1 Empty";
						$this->Adminmodel->UpdateNewsDetails($data,$id);
						$this->session->set_flashdata('message8','message8');
						redirect("NewsAuthentication");
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
	
	public function Active()
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
				$ActiveNews = $this->PermissionModel->ActiveNews($userid);
				if($ActiveNews->u_status == '0')
				{
					$id = $_POST['search_data'];
					$data = array(
						'nstatus' => 0,
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateNewsDetails($data,$id);
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
	
	public function Inactive()
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
				$InactiveNews = $this->PermissionModel->InactiveNews($userid);
				if($InactiveNews->u_status == '0')
				{
					$id = $_POST['search_data'];
					$data = array(
						'nstatus' => 1,
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateNewsDetails($data,$id);
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
	
	public function Deleted()
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
				$DeleteNews = $this->PermissionModel->DeleteNews($userid);
				if($DeleteNews->u_status == '0')
				{
					$id = $_POST['search_data'];
					$data = array(
						'xdelete' => 1,
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateNewsDetails($data,$id);
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
	
	public function ActiveTitle()
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
				$ActiveNews = $this->PermissionModel->ActiveNews($userid);
				if($ActiveNews->u_status == '0')
				{
					$id = $_POST['search_data'];
					$data = array(
						'title' => 1,
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateNewsDetails($data,$id);
					$this->session->set_flashdata('message10','message10');
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
	
	public function InactiveTitle()
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
				$InactiveNews = $this->PermissionModel->InactiveNews($userid);
				if($InactiveNews->u_status == '0')
				{
					$id = $_POST['search_data'];
					$data = array(
						'title' => 0,
						'updatedby' => $name,
					);
					$this->Adminmodel->UpdateNewsDetails($data,$id);
					$this->session->set_flashdata('message9','message9');
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