<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
    Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
    Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
    //Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
    date_default_timezone_set("Asia/Calcutta");
      
    class User extends CI_Controller { 
        
        protected $api_secrate_key = '0655e766e83ddc3e63883ef280a2fb44'; //demokey
        
        function __construct(){
            
    		parent::__construct();
            $this->load->library('session');
            $this->load->helper(array('form', 'url', 'permission_helper'));
            $this->load->model('Adminmodel');
            $this->load->model('PermissionModel');
    	}
    	
        // Testing 
        function List(){
            $apikey = $this->input->post("secrate_key");
            if($apikey!='')
            {
                if($this->api_secrate_key == md5($apikey))
                {
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
                                $list = $this->Adminmodel->getUserId();
                                $data["status"] = 200;
                                $data["message"] = "List Fetchd Successfully";
                                $data["data"] = array(
                                    'list' => $list,
                                );
                            }
                            else
                            {
                                $data["status"] = 402;
                                $data["message"] = "Access Denied";
                                $data["details"] = [];
                            }
                        }
                        else
                        {
                            $data["status"] = 404;
                            $data["message"] = "User Authentication Failed";
                            $data["details"] = [];
                        }
                    }
                    else
                    {
                        $data["status"] = 404;
                        $data["message"] = "Session Expired, Relogin Again";
                        $data["details"] = [];
                    }
                }
                else
                {
                    $data["status"] = 400;
                    $data["msg"] = "The 'secrate_key' is invalid!";
                    $data["details"] = [];
                }
            }
            else
            {
                $data["status"] = 400;
                $data["msg"] = "The 'secrate_key' can not be null or blank";
                $data["details"] = [];
            }
            echo json_encode($data);
            
        }
        
        function Add(){
            $apikey = $this->input->post("secrate_key");
            if($apikey!='')
            {
                if($this->api_secrate_key == md5($apikey))
                {
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
								$docpath ="Uploads/profile";
								if (file_exists($docpath))
									{
									}
									else
									{
										mkdir($docpath, 0777, TRUE);
									}
									$file1=$_FILES['image'];
									$ext1 = substr($file1['name'], strrpos($file1['name'], '.') + 1);
									$path=$docpath."/".$officeid."(a).".$ext1;
									
									if(file_exists($_FILES["image"]['tmp_name']))
									{
										$ext_str1 = "png,jpeg,jpg,PNG,JPG,JEPG,GIF,gif";
										$allowed_extensions1 = explode(',',$ext_str1);
										
										$target_file =basename($_FILES["image"]["name"]);
										
										if ($_FILES["image"]["size"] >= 500000 ) 
										{
											$data["status"] = 403;
                                            $data["message"] = "Picture Size is greater than 500kb";
											die();
										}	
										else if(!in_array($ext1, $allowed_extensions1)) 
										{
											$data["status"] = 403;
                                            $data["message"] = "Picture Size is greater than 500kb";
											die();
										}
										else
										{
											move_uploaded_file($_FILES["image"]["tmp_name"], $path);
										}	
									}
										$data6 = array(
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
											'image' => $path,
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
										'content' => json_encode($data6),
										'doc' => date('Y-m-d H:i:s')
										);
										$data5 = array(
										'email' => $email,
										'type' => 'USER VERIFICATION',
										'response' => 'Failed',
										'content' => json_encode($data6),
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
											$this->Adminmodel->InsertUser($data6);
                                            $data["status"] = 200;
                                            $data["message"] = "User Added Successfully";
										} 
										else
										{
                                            $this->Adminmodel->InsertUser($data6);
											$this->Adminmodel->InsertEmailLogerr($data5);
											$data["status"] = 403;
                                            $data["message"] = "Mail Server Error, User not Added";
										}
                                    }
                                    else
                                    {
                                        $data["status"] = 403;
                                        $data["message"] = "User Already Exist";
                                    }
                            }
                            else
                            {
                                $data["status"] = 402;
                                $data["message"] = "Access Denied";
                                $data["details"] = [];
                            }
                        }
                        else
                        {
                            $data["status"] = 404;
                            $data["message"] = "User Authentication Failed";
                            $data["details"] = [];
                        }
                    }
                    else
                    {
                        $data["status"] = 404;
                        $data["message"] = "Session Expired, Relogin Again";
                        $data["details"] = [];
                    }
                }
                else
                {
                    $data["status"] = 400;
                    $data["msg"] = "The 'secrate_key' is invalid!";
                    $data["details"] = [];
                }
            }
            else
            {
                $data["status"] = 400;
                $data["msg"] = "The 'secrate_key' can not be null or blank";
                $data["details"] = [];
            }
            echo json_encode($data);
            
        }
        
    }