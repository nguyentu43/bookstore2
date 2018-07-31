<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');
	class Danhmuc extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Sach_model');
		}

		public function danhsach($madm = 1, $matl = 0){
			$data = $this->data;
			$data['list'] = $this->Sach_model->getAll($madm, $matl);
			$this->load->view("danhmuc/list", $data);
		}
	}
?>