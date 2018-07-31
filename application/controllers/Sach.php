<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');
	class Sach extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model("Sach_model");
		}

		public function chitiet($masach){
			$data = $this->data;
			$data['sach'] = $this->Sach_model->get($masach);
			$this->load->view("sach/chitiet", $data);
		}
	}
?>