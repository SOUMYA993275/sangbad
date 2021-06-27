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
        
           
    }