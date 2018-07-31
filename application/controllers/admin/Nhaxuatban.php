<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');
	class Nhaxuatban extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('nhaxuatban_model');

			$this->data['title'] = "Quản lí nhà xuất bản";
			$this->data['cur'] = 5;
		}

		public function index(){
			$this->data['list'] = $this->nhaxuatban_model->getAll();
			$this->load->view('admin/Nhaxuatban/list', $this->data);
		}
	}
?>