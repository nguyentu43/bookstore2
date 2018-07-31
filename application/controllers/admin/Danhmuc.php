<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');
	class Danhmuc extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('danhmuc_model');

			$this->data['title'] = "Quản lí danh mục sách";
			$this->data['cur'] = 2;
		}

		public function index(){
			$this->data['list_dm'] = $this->danhmuc_model->getAll();
			$this->load->view('admin/Danhmuc/list', $this->data);
		}

		public function insert(){
			if(array_key_exists('insert', $this->input->post()))
			{
				$post = $this->input->post();
				$dm = array($post['tendm'], $post['ghichu']);
				$this->data['result'] = $this->danhmuc_model->insert($dm);
			}
			$this->load->view('admin/Danhmuc/insert', $this->data);
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