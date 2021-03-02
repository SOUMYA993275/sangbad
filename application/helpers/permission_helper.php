<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class permission_helper
{

			function random()
			{
				$number = rand(1111,9999);
				return $number;
			}
		
   
		function permissioncheck($userid,$page)
		{
			$ci = &get_instance();
			$menu_permission = $ci->PermissionModel->MenuPermission($userid,$page);
			if($menu_permission > 0)
			{
				return $menu_permission;
			}
			else
			{
				return 0;
			}
		}
		
		
}
?>