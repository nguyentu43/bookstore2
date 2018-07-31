<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');
	class Sach extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('sach_model');

			$this->data['title'] = "Quản lí sách";
			$this->data['cur'] = 6;
		}

		public function index(){
			$this->data['list'] = $this->sach_model->getAll();
			$this->load->view('admin/Sach/list', $this->data);
		}

		public function detail($masach){
			$this->data['item'] = $this->sach_model->get($masach);
			$this->load->view('admin/Sach/detail', $this->data);
		}

		public function insert(){
			if(array_key_exists('insert', $this->input->post()))
			{
				$post = $this->input->post();
			}
			$this->load->view('admin/Sach/insert', $this->data);
		}

		public function delete($madm){
			$this->data['madm'] = $madm;
			if(array_key_exists('delete', $this->input->post()))
			{
				$this->data['result'] = $this->danhmuc_model->delete($madm);
			}
			$this->load->view('admin/Danhmuc/delete', $this->data);
		}

		public function update($id = ''){
			if(array_key_exists('update', $this->input->post()))
			{
				$post = $this->input->post();
				$dm = array($post['madm'], $post['tendm'], $post['ghichu']);
				$this->data['result'] = $this->danhmuc_model->update($dm);
			}
			else
			{
				$this->data['item'] = $this->danhmuc_model->get($id);
			}
			$this->load->view('admin/Danhmuc/update', $this->data);
		}
	}
?>