<?php
date_default_timezone_set('Asia/Calcutta');
class PermissionModel extends CI_Model
{
	
	public function Userlist()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('status', 0);
		$this->db->where('xdelete', 0);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	function fetch_user($id)
	{
      $this->db->select('slno,name');
	  $this->db->where('status', $id);
	  $query = $this->db->get('users');
	  return $result = $query->result();
	}
	
	function fetch_page($id)
	{
      $this->db->select('role_wise_permission.id as rid,permission_group.page_name as pname,permission_group.id as pid');
      $this->db->join('permission_group','role_wise_permission.page_id = permission_group.id','LEFT');
      $this->db->join('users','users.status = role_wise_permission.role','RIGHT');
	  $this->db->where('users.slno', $id);
	  $this->db->where('role_wise_permission.status', 0);
	  $query = $this->db->get('role_wise_permission');
	  return $result = $query->result();
	}
	
	public function Pcategory()
	{
		$this->db->select('*');
		$this->db->from('permission_category');
		$this->db->group_by('page','ASC');
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function PcategoryU()
	{
		$this->db->select('*');
		$this->db->from('permission_group');
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function PgroupDetails()
	{
		$this->db->select('*');
		$this->db->from('permission_group');
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	function fetch_category($id)
	{
      $this->db->select('*');
	  $this->db->where('page_id', $id);
	  $query = $this->db->get('permission_category');
	  return $result = $query->result();
	}
	
	public function Checkpermission($user,$pagen,$catg)
	{
		$this->db->select('*');
		$this->db->from('user_permission');
		$this->db->where('user_id',$user);
		$this->db->where('page_id',$pagen);
		$this->db->where('action_id',$catg);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function Checkcategory($category,$pname)
	{
		$this->db->select('*');
		$this->db->from('permission_category');
		$this->db->where('category',$category);
		$this->db->where('page_id',$pname);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function UserCheckcategory($role,$page)
	{
		$this->db->select('*');
		$this->db->from('role_wise_permission');
		$this->db->where('role',$role);
		$this->db->where('page_id',$page);
		$query = $this->db->get(); 
		return $result = $query->result();
	}
	
	public function InsertPermissionUser($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('role_wise_permission',$data);
	}
	
	public function InsertPermission($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('permission_category',$data);
	}
	
	public function InsertUserPermission($data)
	{
		$this->db->set('doc','NOW()', FALSE);
		$this->db->insert('user_permission',$data);
	}
	
	public function Dashboard($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 1);
		$this->db->where('action_id', 1);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Menulist($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 2);
		$this->db->where('action_id', 4);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Insetmenu($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 2);
		$this->db->where('action_id', 2);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Editmenu($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 2);
		$this->db->where('action_id', 3);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Deletemenu($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 2);
		$this->db->where('action_id', 5);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Activemenu($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 2);
		$this->db->where('action_id', 6);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Inactivemenu($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 2);
		$this->db->where('action_id', 7);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function UserPermission($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 11);
		$this->db->where('action_id', 16);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InsertUserPermissionstatus($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 11);
		$this->db->where('action_id', 14);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function ActivePermission($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 11);
		$this->db->where('action_id', 18);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InactivePermission($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 11);
		$this->db->where('action_id', 19);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function ChangePassword($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 12);
		$this->db->where('action_id', 21);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function UpdatePassword($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 12);
		$this->db->where('action_id', 20);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InsertTab($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 9);
		$this->db->where('action_id', 22);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Tablist($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 9);
		$this->db->where('action_id', 24);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function EditSideTab($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 9);
		$this->db->where('action_id', 23);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function DeleteTab($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 9);
		$this->db->where('action_id', 25);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function ActiveTab($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 9);
		$this->db->where('action_id', 26);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InactiveTab($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 9);
		$this->db->where('action_id', 27);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InsertAdd($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 6);
		$this->db->where('action_id', 28);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Addist($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 6);
		$this->db->where('action_id', 30);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function EditAdd($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 6);
		$this->db->where('action_id', 29);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function DeleteAdd($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 6);
		$this->db->where('action_id', 31);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function ActiveAdd($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 6);
		$this->db->where('action_id', 32);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InactiveAdd($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 6);
		$this->db->where('action_id', 33);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InsertImage($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 7);
		$this->db->where('action_id', 34);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Imageist($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 7);
		$this->db->where('action_id', 36);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function DeleteImage($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 7);
		$this->db->where('action_id', 37);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function ActiveImage($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 7);
		$this->db->where('action_id', 38);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InactiveImage($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 7);
		$this->db->where('action_id', 39);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InsertVideo($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 8);
		$this->db->where('action_id', 40);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Videoist($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 8);
		$this->db->where('action_id', 42);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function EditVideo($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 8);
		$this->db->where('action_id', 41);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function DeleteVideo($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 8);
		$this->db->where('action_id', 43);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function ActiveVideo($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 8);
		$this->db->where('action_id', 44);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InactiveVideo($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 8);
		$this->db->where('action_id', 45);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InsertUser($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 3);
		$this->db->where('action_id', 8);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Userlists($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 3);
		$this->db->where('action_id', 10);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function EditUser($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 3);
		$this->db->where('action_id', 9);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function DeleteUser($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 3);
		$this->db->where('action_id', 11);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function ActiveUser($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 3);
		$this->db->where('action_id', 12);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InactiveUser($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 3);
		$this->db->where('action_id', 13);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InsertBreaking($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 4);
		$this->db->where('action_id', 46);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function EditBreaking($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 4);
		$this->db->where('action_id', 47);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InsertNews($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 5);
		$this->db->where('action_id', 49);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function Newslist($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 5);
		$this->db->where('action_id', 51);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function EditNews($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 5);
		$this->db->where('action_id', 50);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function DeleteNews($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 5);
		$this->db->where('action_id', 52);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function ActiveNews($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 5);
		$this->db->where('action_id', 53);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function InactiveNews($userid)
	{
		$this->db->select('u_status');
		$this->db->from('user_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('page_id', 5);
		$this->db->where('action_id', 54);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
	
	public function MenuPermission($userid,$page)
	{
		$this->db->select('m_status');
		$this->db->from('menu_permission');
		$this->db->where('user_id', $userid);
		$this->db->where('menu_name', $page);
		$query = $this->db->get(); 
		return $result = $query->row();
	}
}