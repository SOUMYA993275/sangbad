<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
    Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
    Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
    //Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
    date_default_timezone_set("Asia/Calcutta");
      
    class Api extends CI_Controller { 
        
        protected $api_secrate_key = '0655e766e83ddc3e63883ef280a2fb44'; //demokey
        
        function __construct(){
            
    		parent::__construct();
            $this->load->library('session');
            $this->load->helper(array('form', 'url', 'permission_helper'));
            $this->load->model('Adminmodel');
            $this->load->model('PermissionModel');
    	}
    	
        // Testing 
        function DashboardCount(){
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
                            $date = date('m/d/Y');
                            $totaluser = $this->Adminmodel->TotalUser();
                            $totalimage = $this->Adminmodel->TotalImageCount();
                            $totalvideo = $this->Adminmodel->TotalvideoCount();
                            $totalnews = $this->Adminmodel->TotalNewsbyDate($date);
                            $totaluser1 = $totaluser->count;
                            $totalimage1 = $totalimage->count;
                            $totalvideo1 = $totalvideo->count;
                            $totalnews1 = $totalnews->count;
                                $data["status"] = 200;
                                $data["message"] = "Data Successfully Fetched ";
                                $data["details"] = array(
                                    'user' => $totaluser1,
                                    'image' => $totalimage1,
                                    'video' => $totalvideo1,
                                    'news' => $totalnews1,
                                );
                        }
                        else
                        {
                            $data["status"] = 403;
                            $data["message"] = "User Authentication Failed";
                            $data["details"] = [];
                        }
                    }
                    else
                    {
                        $data["status"] = 400;
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
                $data["status"] = 402;
                $data["msg"] = "The 'secrate_key' can not be null or blank";
                $data["details"] = [];
            }
            echo json_encode($data);
            
        }
        
        function BloodGroup(){
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
                            $blood = $this->Adminmodel->getblood();
                                $data["status"] = 200;
                                $data["message"] = "Data Successfully Fetched ";
                                $data["data"] = array(
                                    'blood' => $blood
                                );
                                
                        }
                        else
                        {
                            $data["status"] = 403;
                            $data["message"] = "User Authentication Failed";
                            $data["data"] = [];
                        }
                    }
                    else
                    {
                        $data["status"] = 400;
                        $data["message"] = "Session Expired, Relogin Again";
                        $data["data"] = [];
                    }
                }
                else
                {
                    $data["status"] = 400;
                    $data["msg"] = "The 'secrate_key' is invalid!";
                    $data["data"] = [];
                }
            }
            else
            {
                $data["status"] = 402;
                $data["msg"] = "The 'secrate_key' can not be null or blank";
                $data["data"] = [];
            }
            echo json_encode($data);
            
        }
        
    }