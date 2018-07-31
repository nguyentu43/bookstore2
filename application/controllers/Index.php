<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');
	class Index extends MY_Controller{
		function __construct(){
			parent::__construct();

			$this->load->model('sach_model');
		}

		public function index(){

			$data = $this->data;

			if($this->session->userdata('khachhang'))
			{
				$data['khachhang'] = $this->session->userdata('khachhang');
			}

			for ($i=0; $i < count($data['list_dm']) ; $i++) { 
				$data['list_dm'][$i]['list_sach'] = $this->sach_model->getAll($data['list_dm'][$i]['madm']);
			}

			$this->load->view('index', $data);
		}
	}
?>