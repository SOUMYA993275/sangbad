<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class ErrorUserbyPermission extends CI_Controller {
	
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
		$this->session->set_flashdata('failed3','failed3');
		$this->load->view('backend/usererror');
	}
}
?>