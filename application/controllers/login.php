<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	Class Login extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$h = '-7';
			$hm = $h * 60;
			$ms = $hm * 60;
			$this->waktu = gmdate('Y-m-d H:i:s',time()-($ms));
			$this->load->library('auth');
			$this->load->model('m_akun');
		}
		
		function index()
		{
			@$cis_login_alumni = $_COOKIE['is_login_alumni'];
			if($cis_login_alumni == 'logged')
			{
				redirect('login/lendra_home');
			}
			else
			{
				if($cis_login_alumni == 'logged')
				{
					echo warning('Sorry, it looks like you are already logged ...','../login/lendra_home');
				}
			}
			$this->load->view('v_login');
		}
		
		function lendra_do_login()
		{
			$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
			$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
			{
				echo warning($_SERVER['HTTP_HOST'],'../login');
				$this->index();
			}
			else
			{
				$username = strtolower($this->input->post('username'));
				$password = $this->input->post('password');
				$return = $this->m_akun->LENDRA_select($username,$password);
				if($return)
				{
					echo warning('Welcome!','../login/lendra_home');
				}
				else
				{
					echo warning('Sorry, username or password you entered is incorrect ...','../login');
				}
			}
		}
		
		function lendra_logout()
		{
			$this->auth->logout();
			echo warning('You have successfully logged out ...'.'\n'.
						'Logout Now :  '.$this->waktu,'../login');
		}
		
		function lendra_home()
		{
			redirect('http://aliendc.com');
		}
		
		function lendra_register()
		{
			$this->load->view('v_register');
		}
		
		function lendra_register_insert()
		{
			$password = $this->input->post('password');
			$password_confirm = $this->input->post('password_confirm');
			if($password != $password_confirm)
			{
				$this->session->set_userdata('register_username',$this->input->post('username'));
				echo warning('Password and confirm password not match.','../login/lendra_register');
			}
			else
			{
				$this->session->unset_userdata('register_username');
				$data = array(
							'username' => $this->input->post('username'),
							'password' => $this->input->post('password'),
							'login_buat' => $this->input->post('username'),
							'tanggal_buat' => $this->waktu
							);
				$this->m_akun->LENDRA_insert($data);
				echo warning('Success!','../login');
			}
		}
	}
?>