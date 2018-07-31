<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');

	class Dashboard extends MY_Controller{
		function __construct(){
			parent::__construct();

			$this->data['title'] = 'Trang chủ';
		}

		public function index(){
			$this->data['cur'] = 1;
			$this->load->view('admin/dashboard', $this->data);
		}
	}
?>