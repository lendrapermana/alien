<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
	class Auth
	{
		var $CI = null;
		function Auth()
		{
			$this->CI =& get_instance();
			$this->CI->load->database();
		}
		
		function do_login($login = NULL)
		{
			$username = $login['username'];
			$password = $login['password'];
			$remember_me = $login['remember_me'];
			$username = $this->CI->db->escape_str($username);
			$password = $this->CI->db->escape_str($password);
			// === 1. Cek tabel alumni ===
			$this->CI->db->where(
				"(username = ".$this->CI->db->escape($username)."
				  OR id_akun = ".$this->CI->db->escape($username)."
				  OR email = ".$this->CI->db->escape($username).")",
				null,
				false
			);
			$this->CI->db->where('password',$password);
			$query = $this->CI->db->get('dv_akun');
			if($user)
			{
				$id_akun   = $user['id_akun'];
				$username  = $user['username'];
				$nama      = $user['nama'];
				$word      = explode(' ',$nama);
				$nama_awal = isset($word[0]) ? $word[0] : '';
				$email     = $user['email'];
				$na        = isset($user['na']) ? $user['na'] : '';
				$newdata = array(
								'is_login_alumni' => 'logged',
								'id_akun' => $id_akun,
								'username' => $username,
								'nama' => $nama,
								'nama_awal' => $nama_awal,
								'email' => $email,
								'foto' => $foto,
								'na' => $na,
								'role' => $role,
								'role2' => $role2
								);
				$this->CI->session->set_userdata($newdata);
				if($remember_me == 'REMEMBER')
				{
					$expire_time = time() + (60*60*24*30); // 30 hari
				}
				else
				{
					$expire_time = time() + (60*60*8); // 8 jam
				}
				$token = bin2hex(openssl_random_pseudo_bytes(32));
				setcookie("remember_token", $token, $expire_time, "/");
				setcookie("is_login_alumni", "logged", $expire_time, "/");
				setcookie("id_akun", $id_akun, $expire_time, "/");
				setcookie("username", $username, $expire_time, "/");
				setcookie("nama", $nama, $expire_time, "/");
				setcookie("nama_awal", $nama_awal, $expire_time, "/");
				setcookie("email", $email, $expire_time, "/");
				setcookie("foto", $foto, $expire_time, "/");
				setcookie("role", $role, $expire_time, "/");
				setcookie("role2", $role2, $expire_time, "/");
				return array(
							'status' => TRUE,
							'token' => $token,
							'id_akun' => $id_akun,
							'nama' => $nama,
							'username' => $username,
							'otp_email_status' => $otp_email_status,
							'remember_me' => $remember_me,
							'expire_time' => $expire_time,
							'role2' => $role2,
							'na' => $na
							);
			}
			else 
			{
				return array(
							'status' => FALSE,
							'token' => null,
							'id_akun' => null,
							'nama' => null,
							'username' => null,
							'otp_email_status' => null,
							'remember_me' => null,
							'expire_time' => null,
							'role2' => null,
							'na' => null
							);
			}
			// $this->CI->db->group_start()
				// ->where('username',$username)
				// ->or_where('id_akun',$username)
				// ->or_where('email',$username)
			// ->group_end()
			// ->where('password',$password);
			// $query = $this->CI->db->get('alu_alumni');
			// if($query->num_rows() > 0)
			// {
				// $user = $query->row_array();
				// $role = 'ALUMNI';
			// }
			// else
			// {
				// $this->CI->db->group_start()
					// ->where('username',$username)
					// ->or_where('id_akun',$username)
					// ->or_where('email',$username)
				// ->group_end()
				// ->where('password',$password);
				// $query = $this->CI->db->get('alu_perusahaan');
				// if($query->num_rows() > 0)
				// {
					// $user = $query->row_array();
					// $role = 'PERUSAHAAN';
				// }
				// else
				// {
					// $this->CI->db->group_start()
						// ->where('username',$username)
						// ->or_where('id_akun',$username)
						// ->or_where('email',$username)
					// ->group_end()
					// ->where('password',$password);
					// $query = $this->CI->db->get('dv_akses');
					// $this->CI->db
						// ->select('dv_akses.*,dv_akun.email')
						// ->from('dv_akses')
						// ->join('dv_akun','dv_akun.id_akun = dv_akses.id_akun','left')
						// ->group_start()
							// ->where('dv_akses.username',$username)
							// ->or_where('dv_akses.id_akun',$username)
							// ->or_where('dv_akun.email',$username)
						// ->group_end()
						// ->where('dv_akses.password',$password);
					// $query = $this->CI->db->get();
					// if($query->num_rows() > 0)
					// {
						// $user = $query->row_array();
						// $role = 'ADMIN';
					// }
					// else
					// {
						// $user = null;
						// $role = '';
					// }
				// }
			// }
			// if($user)
			// {
				// $id_akun = $user['id_akun'];
				// $username = $user['username'];
				// $nama = $user['nama'];
				// $word = explode(' ',$nama);
				// $nama_awal = @$word[0];
				// $na = $user['na'];
			// }
		}
		
		function logout() 
		{
			setcookie("remember_token", "", time()-2592000, "/");
			setcookie("is_login_alumni", "", time()-2592000, "/");
			setcookie("id_akun", "", time()-2592000, "/");
			setcookie("username", "", time()-2592000, "/");
			setcookie("nama", "", time()-2592000, "/");
			setcookie("nama_awal", "", time()-2592000, "/");
			setcookie("email", "", time()-2592000, "/");
			setcookie("foto", "", time()-2592000, "/");
			setcookie("role", "", time()-2592000, "/");
			$this->CI->session->sess_destroy();
			foreach($_COOKIE as $key => $value)
			{
				setcookie($key, '', time() - 2592000, '/', '', isset($_SERVER['HTTPS']), true);
				unset($_COOKIE[$key]);
			}
			return TRUE;
		}
	}
?>