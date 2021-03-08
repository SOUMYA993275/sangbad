<?php
date_default_timezone_set('Asia/Calcutta');
class DataModel extends CI_Model
{
	
	function getmenu($postData=null)
	{

		 $response = array();

		 ## Read value
		 $draw = $postData['draw'];
		 $start = $postData['start'];
		 $rowperpage = $postData['length']; // Rows display per page
		 $columnIndex = $postData['order'][0]['column']; // Column index
		 $columnName = $postData['columns'][$columnIndex]['data']; // Column name
		 $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		 $searchValue = $postData['search']['value']; // Search value

		 ## Search 
		 $searchQuery = "";
		 if($searchValue != ''){
			$searchQuery = " (menuname like '%".$searchValue."%' or menucode like '%".$searchValue."%' or menulink like'%".$searchValue."%' ) ";
		 }

		 ## Total number of records without filtering
		 $this->db->select('count(*) as allcount');
		 $records = $this->db->get('menumaster')->result();
		 $totalRecords = $records[0]->allcount;

		 ## Total number of record with filtering
		 $this->db->select('count(*) as allcount');
		 if($searchQuery != '')
		 $this->db->where($searchQuery);
		 $this->db->where('xdelete',0);
		 $records = $this->db->get('menumaster')->result();
		 $totalRecordwithFilter = $records[0]->allcount;

		 ## Fetch records
		 $this->db->select('*');
		 if($searchQuery != '')
		 $this->db->where($searchQuery);
		 $this->db->where('xdelete',0);
		 $this->db->order_by($columnName, $columnSortOrder);
		 $this->db->limit($rowperpage, $start);
		 $records = $this->db->get('menumaster')->result();
		
		 $data = array();

		 foreach($records as $record ){

			$data[] = array( 
			   "menuname"=>$record->menuname,
			   "menucode"=>$record->menucode,
			   "menulink"=>$record->menulink,
			   "id"=>$record->id,
			   "status"=>$record->status,
			   "headers"=>$record->headers
			); 
		 }

		 ## Response
		 $response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		 );

		 return $response; 
	}
	
	function getTab($postData=null)
	{

		 $response = array();

		 ## Read value
		 $draw = $postData['draw'];
		 $start = $postData['start'];
		 $rowperpage = $postData['length']; // Rows display per page
		 $columnIndex = $postData['order'][0]['column']; // Column index
		 $columnName = $postData['columns'][$columnIndex]['data']; // Column name
		 $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		 $searchValue = $postData['search']['value']; // Search value

		 ## Search 
		 $searchQuery = "";
		 if($searchValue != ''){
			$searchQuery = " (tabname like '%".$searchValue."%' or tabcode like '%".$searchValue."%' or tablink like'%".$searchValue."%' ) ";
		 }

		 ## Total number of records without filtering
		 $this->db->select('count(*) as allcount');
		 $records = $this->db->get('righttabmaster')->result();
		 $totalRecords = $records[0]->allcount;

		 ## Total number of record with filtering
		 $this->db->select('count(*) as allcount');
		 if($searchQuery != '')
		 $this->db->where($searchQuery);
		 $this->db->where('xdelete',0);
		 $records = $this->db->get('righttabmaster')->result();
		 $totalRecordwithFilter = $records[0]->allcount;

		 ## Fetch records
		 $this->db->select('*');
		 if($searchQuery != '')
		 $this->db->where($searchQuery);
		 $this->db->where('xdelete',0);
		 $this->db->order_by($columnName, $columnSortOrder);
		 $this->db->limit($rowperpage, $start);
		 $records = $this->db->get('righttabmaster')->result();
		 $data = array();

		 foreach($records as $record ){

			$data[] = array( 
			   "tabname"=>$record->tabname,
			   "tabcode"=>$record->tabcode,
			   "tablink"=>$record->tablink,
			   "slno"=>$record->slno,
			   "tabstatus"=>$record->tabstatus,
			   "tabimage"=>$record->tabimage,
			   "createdby"=>$record->createdby,
			   "updatedby"=>$record->updatedby
			); 
		 }

		 ## Response
		 $response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		 );

		 return $response; 
	}
	
	function getPermission($postData=null)
	{

		 $response = array();

		 ## Read value
		 $draw = $postData['draw'];
		 $start = $postData['start'];
		 $rowperpage = $postData['length']; // Rows display per page
		 $columnIndex = $postData['order'][0]['column']; // Column index
		 $columnName = $postData['columns'][$columnIndex]['data']; // Column name
		 $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		 $searchValue = $postData['search']['value']; // Search value
		 $user = $postData['uiid']; // Search value
		 $pname = $postData['piid']; // Search value
		 
		 ## Total number of records without filtering
		 $this->db->select('count(*) as allcount');
		 $records = $this->db->get('user_permission')->result();
		 $totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		 $this->db->select('count(*) as allcount');
		 if($user!= '')
        {
            $this->db->where('user_permission.user_id', $user);
        }
		if($pname!='')
        {
            $this->db->where('user_permission.page_id', $pname);
        }
		 $records = $this->db->get('user_permission')->result();
		 $totalRecordwithFilter = $records[0]->allcount;
		 
		 ## Fetch records
		 $this->db->select('user_permission.id as uid,user_permission.page_id as piid,permission_group.page_name as pname,permission_group.id as pid,permission_category.category as category,permission_category.id as cid,user_permission.u_status as status,users.name as uname,users.slno as uiid');
		 $this->db->join('user_permission','permission_group.id = user_permission.page_id','RIGHT');
		 $this->db->join('permission_category','permission_category.id = user_permission.action_id','LEFT');
		 $this->db->join('users','users.slno = user_permission.user_id','LEFT');
		 if($user!= '')
        {
            $this->db->where('user_permission.user_id', $user);
        }
		if($pname!='')
        {
            $this->db->where('user_permission.page_id', $pname);
        }
		 $this->db->order_by($columnName, $columnSortOrder);
		 $this->db->limit($rowperpage, $start);
		 $records = $this->db->get('permission_group')->result();
		 
		 		 
		 $data = array();

		 foreach($records as $record ){

			$data[] = array( 
			   "uid"=>$record->uid,
			   "piid"=>$record->piid,
			   "pname"=>$record->pname,
			   "pid"=>$record->pid,
			   "category"=>$record->category,
			   "cid"=>$record->cid,
			   "status"=>$record->status,
			   "uname"=>$record->uname,
			   "uiid"=>$record->uiid,
			); 
		 }

		 ## Response
		 $response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		 );

		 return $response; 
	}
	
	function getPcategory($postData=null)
	{

		 $response = array();

		 ## Read value
		 $draw = $postData['draw'];
		 $start = $postData['start'];
		 $rowperpage = $postData['length']; // Rows display per page
		 $columnIndex = $postData['order'][0]['column']; // Column index
		 $columnName = $postData['columns'][$columnIndex]['data']; // Column name
		 $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		 $searchValue = $postData['search']['value']; // Search value

		 ## Search 
		 $searchQuery = "";
		 if($searchValue != ''){
			$searchQuery = " (permission_category.category like '%".$searchValue."%') ";
		 }

		 ## Total number of records without filtering
		 $this->db->select('count(*) as allcount');
		 $records = $this->db->get('permission_category')->result();
		 $totalRecords = $records[0]->allcount;

		 ## Total number of record with filtering
		 $this->db->select('count(*) as allcount');
		 if($searchQuery != '')
		 $this->db->where($searchQuery);
		 $records = $this->db->get('permission_category')->result();
		 $totalRecordwithFilter = $records[0]->allcount;

		 ## Fetch records
		 $this->db->select('permission_group.page_name as pname,permission_category.category as pcat,permission_category.id as pid');
		 $this->db->join('permission_group','permission_group.id = permission_category.page_id','LEFT');
		 if($searchQuery != '')
		 $this->db->where($searchQuery);
		 $this->db->order_by($columnName, $columnSortOrder);
		 $this->db->limit($rowperpage, $start);
		 $records = $this->db->get('permission_category')->result();
		 $data = array();

		 foreach($records as $record ){

			$data[] = array( 
			   "pname"=>$record->pname,
			   "pcat"=>$record->pcat,
			   "pid"=>$record->pid,
			); 
		 }

		 ## Response
		 $response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		 );

		 return $response; 
	}
	
	function getRolecategory($postData=null)
	{

		 $response = array();

		 ## Read value
		 $draw = $postData['draw'];
		 $start = $postData['start'];
		 $rowperpage = $postData['length']; // Rows display per page
		 $columnIndex = $postData['order'][0]['column']; // Column index
		 $columnName = $postData['columns'][$columnIndex]['data']; // Column name
		 $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		 $searchValue = $postData['search']['value']; // Search value

		 ## Search 
		 $searchQuery = "";
		 if($searchValue != ''){
			$searchQuery = " (role_wise_permission.role like '%".$searchValue."%') ";
		 }

		 ## Total number of records without filtering
		 $this->db->select('count(*) as allcount');
		 $records = $this->db->get('role_wise_permission')->result();
		 $totalRecords = $records[0]->allcount;

		 ## Total number of record with filtering
		 $this->db->select('count(*) as allcount');
		 if($searchQuery != '')
		 $this->db->where($searchQuery);
		 $records = $this->db->get('role_wise_permission')->result();
		 $totalRecordwithFilter = $records[0]->allcount;

		 ## Fetch records
		 $this->db->select('role_wise_permission.role as role,role_wise_permission.status as rstatus,permission_group.page_name as pname,role_wise_permission.id as rid');
		 $this->db->join('permission_group','permission_group.id = role_wise_permission.page_id','LEFT');
		 if($searchQuery != '')
		 $this->db->where($searchQuery);
		 $this->db->order_by($columnName, $columnSortOrder);
		 $this->db->limit($rowperpage, $start);
		 $records = $this->db->get('role_wise_permission')->result();
		 $data = array();

		 foreach($records as $record ){

			$data[] = array( 
			   "role"=>$record->role,
			   "pname"=>$record->pname,
			   "rid"=>$record->rid,
			   "rstatus"=>$record->rstatus,
			); 
		 }

		 ## Response
		 $response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		 );

		 return $response; 
	}
	
}