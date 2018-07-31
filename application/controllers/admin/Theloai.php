<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');
	class Theloai extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('theloai_model');

			$this->data['title'] = "Quản lí thể loại sách";
			$this->data['cur'] = 3;
		}

		public function index(){
			$this->data['list'] = $this->theloai_model->getAll();
			$this->load->view('admin/Theloai/list', $this->data);
		}
	}
?>