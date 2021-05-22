<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
    Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
    Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
    //Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
    date_default_timezone_set("Asia/Calcutta");
      
    class Admin extends CI_Controller { 
        
        protected $api_secrate_key = '0655e766e83ddc3e63883ef280a2fb44'; //demokey
        
        function __construct(){
            
    		parent::__construct();
            $this->load->library('session');
            $this->load->helper(array('form', 'url', 'permission_helper'));
            $this->load->model('Adminmodel');
            $this->load->model('PermissionModel');
    	}
    	
        // Testing 
        function Login(){
            $apikey = $this->input->post("secrate_key");
            if($apikey!='')
            {
                if($this->api_secrate_key == md5($apikey))
                {
                    if($_POST)
                    {
                        $user=$this->input->post('email');
                        $pass=md5($this->input->post('password'));
                        if($user !='' && $pass !='')
                        {
                            $result=$this->Adminmodel->adminlogin($user,$pass);
                            $id="";
                            $name="";
                            $co="";
                            $dob="";
                            $address="";
                            $blood="";
                            $adminid="";
                            $ltdate="";
                            $status="";
                            $email="";
                            $mobile="";
                            $nstatus="";
                            $m_status="";
                            $page_id="";
                            $action_id="";
                            $u_status="";
                            $menu_name="";
                            $image="";
                            if(COUNT($result)>0)
                            {
                                if($result[0]->is_email_verified == "1")
                                {
                                    if($result[0]->nstatus == "0")
                                    {
                                        if($result[0]->xdelete == "0")
                                        {
                                            foreach ($result as $r)
                                            {
                                                $id=$r->slno;
                                                $name=$r->name;
                                                $co=$r->co;
                                                $dob=$r->dob;
                                                $blood=$r->blood;
                                                $address=$r->address;
                                                $adminid=$r->username;
                                                $ltdate=$r->lastlogintime;
                                                $status=$r->status;
                                                $email=$r->email;
                                                $mobile=$r->mobile;
                                                $nstatus=$r->nstatus;
                                                $image=$r->image;
                                            }
                                        
                                            $data= array(
                                                'slno'=> $id,
                                                'name'=> $name,
                                                'co'=> $co,
                                                'dob'=> $dob,
                                                'blood'=> $blood,
                                                'address'=> $address,
                                                'username'=> $adminid,
                                                'lastlogintime'=>$ltdate,
                                                'status'=>$status,
                                                'email'=>$email,
                                                'mobile'=>$mobile,
                                                'nstatus'=>$nstatus,
                                                'image'=>$image,
                                            );
                                            $datetime = date('Y-m-d h:i:s');
                                            $this->session->set_userdata($data);
                                            $userid = $this->session->userdata('slno');
                                            $name = $this->session->userdata('name');
                                            $co = $this->session->userdata('co');
                                            $dob = $this->session->userdata('dob');
                                            $address = $this->session->userdata('address');
                                            $blood = $this->session->userdata('blood');
                                            $adminid = $this->session->userdata('username');
                                            $status = $this->session->userdata('status');
                                            $email = $this->session->userdata('email');
                                            $mobile = $this->session->userdata('mobile');
                                            $nstatus = $this->session->userdata('nstatus');
                                            $image = $this->session->userdata('image');
                                            $ltdate= $this->session->userdata('lastlogintime');
                                            $this->Adminmodel->LastLoginTimeUpdate($id);
                                            $data["status"] = 200;
                                            $data["message"] = "Login Successfully";
                                            $data["details"] = [];
                                         }
                                        else
                                        {
                                            $data["status"] = 404;
                                            $data["message"] = "User Id Removed from database, Please Contact Admin";
                                            $data["details"] = [];
                                        }
                                    }
                                    else
                                    {
                                        $data["status"] = 404;
                                        $data["message"] = "User Id Blocked, Please Contact Admin";
                                        $data["details"] = [];
                                    }
                                }
                                else
                                {
                                    $data["status"] = 404;
                                    $data["message"] = "User not registered yet, Please check your email.";
                                    $data["details"] = [];
                                }
                            }
                            else
                            {
                                $data["status"] = 404;
                                $data["message"] = "Userid & Password Incorrect";
                                $data["details"] = [];
                            }
                        }
                        else
                        {
                            $data["status"] = 404;
                            $data["message"] = "Userid & Password Blank";
                            $data["details"] = [];
                        }
                    }
                    else
                    {
                        $data["status"] = 404;
                        $data["message"] = "Data Not Post";
                        $data["details"] = [];
                    }
                }
                else
                {
                    $data["status"] = 400;
                    $data["message"] = "The 'secrate_key' is invalid!";
                    $data["details"] = [];
                }
            }
            else
            {
                $data["status"] = 400;
                $data["message"] = "The 'secrate_key' can not be null or blank";
                $data["details"] = [];
            }
            echo json_encode($data);
            
        }

        function Logout(){
            $apikey = $this->input->post("secrate_key");
            if($apikey!='')
            {
                if($this->api_secrate_key == md5($apikey))
                {
                    $this->session->sess_destroy();
                    $data["status"] = 200;
                    $data["message"] = "Logout Successfully";
                    $data["details"] = [];
                }
                else
                {
                    $data["status"] = 400;
                    $data["message"] = "The 'secrate_key' is invalid!";
                    $data["details"] = [];
                }
            }
            else
            {
                $data["status"] = 400;
                $data["message"] = "The 'secrate_key' can not be null or blank";
                $data["details"] = [];
            }
            echo json_encode($data);
            
        }
        
    }