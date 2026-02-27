<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	if(!function_exists('email_hint'))
	{
		function email_hint($email)
		{
			list($user,$domain) = explode('@',$email);
			$first = substr($user,0,1);
			$last = substr($user,-1);
			$stars = str_repeat('*',max(1,strlen($user) - 2));
			return $first.$stars.$last.'@'.$domain;
		}
	}
?>