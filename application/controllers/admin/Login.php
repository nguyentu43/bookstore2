<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');

	class Login extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->data['title'] = 'Đăng nhập hệ thống quản lý bán sách';
		}

		public function index(){

			if(array_key_exists('login', $this->input->post()))
			{
				$this->load->model('admin_model');

				$admin = array($this->input->post('username'), md5($this->input->post('password')));

				$num_rows = $this->admin_model->check_admin($admin);

				if($num_rows > 0)
				{
					$this->session->set_userdata('username', $admin[0]);
					redirect('/admin/dashboard');
				}
				else
				{
					$this->data['error'] = true;
					$this->data['message'] = 'Sai tên đăng nhập, mật khẩu';
					$this->load->view('admin/login', $this->data);
				}
			}
			else
			{
				$this->load->view('admin/login', $this->data);
			}
		}
	}
?>