<?php
date_default_timezone_set('Asia/Calcutta');
class Adminmodel extends CI_Model
{
	public function adminlogin($user,$pass)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('menu_permission','users.slno = menu_permission.user_id','RIGHT');
		$this->db->join('user_permission','users.slno = user_permission.user_id','LEFT');
		$this->db->where('email', $user);
		$this->db->where('password', $pass);
		$this->db->order_by('users.slno');
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	
	
	public function LastLoginTimeUpdate($id,$datetime)
	{
		$this->db->where('slno',$id);
		$this->db->set('lastlogintime', $datetime);
		$this->db->update('users');
	}
	
	public function uactive($adminid)
	{
		$this->db->select('nstatus');
		$this->db->from('users');
		$this->db->where('username', $adminid);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function getblood()
	{
		$this->db->select('*');
		$this->db->from('blood');
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function getUserId()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('xdelete',0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function TotalUser()
	{
		$this->db->select('COUNT(*) as count');
		$this->db->from('users');
		$this->db->where('xdelete',0);
		$this->db->where('nstatus',0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function InsertUser($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('users',$data);
	}
	
	public function getUserbyId($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('slno',$id);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function UpdateUsers($data,$id)
	{
		$this->db->set('dom','NOW()', FALSE);
		$this->db->where('slno',$id);
		$this->db->update('users',$data);
	}
	
	
	public function getAllmenu()
	{
		$this->db->select('*');
		$this->db->from('menumaster');
		$this->db->where('xdelete', 0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function getAllcategory()
	{
		$this->db->select('*');
		$this->db->from('menumaster');
		$this->db->where('xdelete', 0);
		$this->db->where('status', 'Active');
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function getMenubyId($id)
	{
		$this->db->select('*');
		$this->db->from('menumaster');
		$this->db->where('id',$id);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function UpdateMenuDetails($data,$id)
	{
		$this->db->set('dom','NOW()', FALSE);
		$this->db->where('id',$id);
		$this->db->update('menumaster',$data);
	}
	
	public function CheckMenu($menucode)
	{
		$this->db->select('*');
		$this->db->from('menumaster');
		$this->db->where('menucode',$menucode);
		$this->db->where('xdelete', 0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function InsertMenu($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('menumaster',$data);
	}
	
	public function getNewsId()
	{
		$this->db->select("MAX(slno) as 'maxid'");
		$this->db->from('newsmaster');
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function getnewsByEngTittle($eng_title)
	{
		$this->db->select('*');
		$this->db->from('newsmaster');
		$this->db->where('eng_title', $eng_title);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function InsertNewsDetails($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('newsmaster',$data);
	}
	
	public function getnewsBydate($date)
	{
		$this->db->select('*');
		$this->db->from('newsmaster');
		$this->db->where('date', $date);
		$this->db->where('xdelete', 0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function getNewsbyId($id)
	{
		$this->db->select('*');
		$this->db->from('newsmaster');
		$this->db->where('slno',$id);
		$this->db->where('xdelete',0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function UpdateNewsDetails($data,$id)
	{
		$this->db->set('dom','NOW()', FALSE);
		$this->db->where('slno',$id);
		$this->db->update('newsmaster',$data);
	}
	
	public function UpdatePermissionDetails($data,$id)
	{
		$this->db->set('dom','NOW()', FALSE);
		$this->db->where('id',$id);
		$this->db->update('user_permission',$data);
	}
	
	
	public function Checktabcode($tabcode)
	{
		$this->db->select('*');
		$this->db->from('righttabmaster');
		$this->db->where('tabcode',$tabcode);
		$this->db->where('xdelete', 0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function InsertRightTab($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('righttabmaster',$data);
	}
	
	public function getAllsidetab()
	{
		$this->db->select('*');
		$this->db->from('righttabmaster');
		$this->db->where('xdelete', 0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function getsidetabbyId($id)
	{
		$this->db->select('*');
		$this->db->from('righttabmaster');
		$this->db->where('slno', $id);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function UpdateTabDetails($data,$id)
	{
		$this->db->set('dom','NOW()', FALSE);
		$this->db->where('slno',$id);
		$this->db->update('righttabmaster',$data);
	}
	
	public function InsertAdvertisement($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('advertisementmaster',$data);
	}
	
	public function getAllAdvertise()
	{
		$this->db->select('*');
		$this->db->from('advertisementmaster');
		$this->db->where('xdelete', 0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function getAdvertiseById($id)
	{
		$this->db->select('*');
		$this->db->from('advertisementmaster');
		$this->db->where('slno', $id);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function UpdateAdvertiseDetails($data,$id)
	{
		$this->db->set('dom','NOW()', FALSE);
		$this->db->where('slno',$id);
		$this->db->update('advertisementmaster',$data);
	}
	
	public function InsertGalleryImageMaster($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('imagegallerymaster',$data);
	}
	
	public function InsertGalleryImageDetails($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('galleryimages',$data);
	}
	
	public function getAllImagelist()
	{
		$this->db->select('*');
		$this->db->from('imagegallerymaster');
		$this->db->where('xdelete', 0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function getAllImageDetails($imageid)
	{
		$this->db->select('*');
		$this->db->from('galleryimages');
		$this->db->where('imageid', $imageid);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function UpdateImagelist($data,$id)
	{
		$this->db->set('dom','NOW()', FALSE);
		$this->db->where('slno',$id);
		$this->db->update('imagegallerymaster',$data);
	}
	
	public function UpdateImageDetails($data,$id)
	{
		$this->db->set('dom','NOW()', FALSE);
		$this->db->where('slno',$id);
		$this->db->update('galleryimages',$data);
	}
	
	public function InsertGalleryvideoDetails($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('videogallery',$data);
	}
	
	public function getAllVideoDetails()
	{
		$this->db->select('*');
		$this->db->from('videogallery');
		$this->db->where('xdelete',0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function UpdateVideoDetails($data,$id)
	{
		$this->db->set('dom','NOW()', FALSE);
		$this->db->where('slno',$id);
		$this->db->update('videogallery',$data);
	}
	
	public function getVideoById($id)
	{
		$this->db->select('*');
		$this->db->from('videogallery');
		$this->db->where('slno', $id);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function CheckPassword($name)
	{
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('name',$name);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function UpdatePassword($npass,$name)
	{
		$this->db->set('password',$npass);
		$this->db->where('name',$name);
		$this->db->update('users');
	}
	
	public function ForgotemailCheck($email)
	{
		$this->db->select('email,name');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('xdelete', 0);
		$this->db->where('nstatus', 0);
		$this->db->where('is_email_verified', 1);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Updatetoken($data4,$email)
	{
		$this->db->where('email',$email);
		$this->db->update('users',$data4);
	}
	
	public function InsertExptoken($data1)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('forgot_token',$data1);
	}
	
	public function InsertEmailLog($data3)
	{
		$this->db->insert('delivery_log',$data3);
	}
	
	public function checkurlexp($urlex)
	{
		$this->db->select('exptime,generatetime');
		$this->db->from('forgot_token');
		$this->db->where('token', $urlex);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function UpdatepasswordByemail($data,$url)
	{
		$this->db->set('dom','NOW()', FALSE);
		$this->db->where('password',$url);
		$this->db->update('users',$data);
	}
	
}