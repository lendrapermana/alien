<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class M_akun extends CI_Model
	{
		function LENDRA_insert($data)
		{
			$this->db->insert('dv_akun',$data);
			return;
		}
		
		function LENDRA_select($username,$password)
		{
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query = $this->db->get('dv_akun');
			return $query->row_array();
		}
	}
?>