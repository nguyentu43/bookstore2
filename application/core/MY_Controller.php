<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');

	class MY_Controller extends CI_Controller{
		function __construct(){
			parent::__construct();

			$this->load->library('session');

			$page = $this->uri->segment(1);

			if($page == "admin")
			{
				$this->login();
			}
			else
			{
				$this->load->library('cart');

				$this->data['total_items'] = $this->cart->total_items();

				$this->load->model('theloai_model');
				$this->load->model('danhmuc_model');

				$list_dm = $this->danhmuc_model->getAll();

				for ($i=0; $i < count($list_dm); $i++) { 
					$list_dm[$i]['list_tl'] = $this->theloai_model->get_dm($list_dm[$i]['madm']);
				}

				$this->data['list_dm'] = $list_dm;
			}

		}

		private function login(){
			if($this->uri->segment(2) == 'login')
			{
				if($this->session->userdata('username'))
					redirect('/admin/dashboard');
			}
			else
			{
				if(!$this->session->userdata('username'))
					redirect('/admin/login');
			}
			
		}
	}
?>