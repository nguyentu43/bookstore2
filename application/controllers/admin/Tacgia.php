<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');
	class Tacgia extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('tacgia_model');

			$this->data['title'] = "Quản lí tác giả";
			$this->data['cur'] = 4;
		}

		public function index(){
			$this->data['list'] = $this->tacgia_model->getAll();
			$this->load->view('admin/Tacgia/list', $this->data);
		}
	}
?>