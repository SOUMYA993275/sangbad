<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Calcutta');
class Forgotpassword extends CI_Controller {
	
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
		if($_POST)
		{
			$email = $this->input->post('email');
			$result = $this->Adminmodel->ForgotemailCheck($email);
			if($result)
			{
				$data = array(
			       'tokan' => md5(rand(100000,999999)),
			       'generatetime' => date('Y-m-d H:i:s'),
			    );
				$url = base64_encode(json_encode($data));
				$name = $result->name;
				$data2 = array(
					'url' => $url,
					'name' => $name,
				);
				$data4 = array(
					'password' => $url,
				);
				$data1 = array(
				'token' => $url,
				'email' => $email,
				'generatetime' => date('Y-m-d H:i:s'),
				'exptime' => date("Y-m-d H:i:s",strtotime("+10 minutes")),
				);
				$data3 = array(
				'email' => $email,
				'type' => 'FORGOTPASSWORD',
				'content' => json_encode($data2),
				'doc' => date('Y-m-d H:i:s')
				);
				$this->Adminmodel->InsertExptoken($data1);
				$this->Adminmodel->Updatetoken($data4,$email);
				$email = $this->input->post('email');
				$message = $this->load->view('template/forgotpassword.php',$data2,TRUE);
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->from('sangbadraatdin@gmail.com','SANGBAD RAATDIN'); // change it to yours
				$this->email->to($email);// change it to yours
				$this->email->reply_to('sangbadraatdin@gmail.com');
				$this->email->subject('Reset Your Password');
				$this->email->message($message);
				if($this->email->send())
				{
					$this->Adminmodel->InsertEmailLog($data3);
					$data['error'] = 6; // Email Send
					$this->load->view('backend/login',$data);
				} 
				else
				{
					$this->Adminmodel->InsertEmailLog($data3);
					$this->session->set_flashdata('message1','message1'); // Email not Send
					redirect('Forgotpassword');
				}
			}
			else
			{
				$this->session->set_flashdata('message2','message2'); // User not Found
				redirect('Forgotpassword');
			}
		}
		else
		{
			$this->load->view('backend/Forgotpassword');
		}
		
	}
	
	public function resetlink()
	{
	    $this->load->library('session');
		$this->load->model('Adminmodel');
		$urlex = $this->input->get('url');
		$result = $this->Adminmodel->checkurlexp($urlex);
		$date = date('Y-m-d h:i:s');
		if($date > $result->exptime)
		{
		    $this->load->view("backend/linkerror");
	   	}
		else
		{
			$data['url'] = $this->input->get('url');
            $_SESSION['url'] = $data['url'];
            $this->load->view("backend/resetlink");
		}
	}
	
	public function linkupdatepassword()
    {
		$this->load->library('session');
		$this->load->model('Adminmodel');
        $url = $_SESSION['url'];
        $npass=md5($this->input->post('npass'));
        $cpass=md5($this->input->post('cpass'));
        if ($npass==$cpass)
        {
			$data = array(
				'password' => $cpass,
			);
			$this->Adminmodel->UpdatepasswordByemail($data,$url);
            $this->session->set_flashdata('msg4',' msg');
			redirect('admin');
        }
        else
        {
			$this->session->set_flashdata('msg5',' msg5');
			$this->load->view("Forgotpassword");
        }
    }
}
?>