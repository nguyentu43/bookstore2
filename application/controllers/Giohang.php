<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');
	class Giohang extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model("Sach_model");
		}

		public function index(){
			$data = $this->data;
			$data['list'] = $this->cart->contents();
			$data['total'] = $this->cart->total();
			$data['total_items'] = $this->cart->total_items();
			$this->load->view("/giohang/contents", $data);
		}

		public function insert()
		{
			if(count($this->input->post()) > 0)
			{

				$masach = $this->input->post('masach');

				$sach = $this->Sach_model->get($masach);

				$gia = $sach['giabia'];
				if($sach['giamgia'] > 0)
					$gia = $sach['giabia'] * (1 - $sach['giamgia']);

				$item = array("id" => $sach['masach'], "qty" => 1, "name" => $sach['tensach'], "price" => $gia, "options" => array("biasach" => $sach['biasach']));

				if($this->cart->insert($item))
				{
					$error = array("code" => 0);
					$data['data'] = array("error" => $error, "cart" => array("total" => $this->cart->total(), "total_items" => $this->cart->total_items()));

				}
				else
				{
					$data['data'] = array("error" => array("code" => 1));
				}

				$this->load->view('giohang/insert', $data);
			}
		}

		public function update()
		{
			if(count($this->input->post()) > 0)
			{
				$masach = $this->input->post("masach");
				$qty = $this->input->post("qty");
				$list = $this->cart->contents();

				foreach ($list as $item) {
					if($item['id'] == $masach)
					{
						$update = array("rowid" => $item["rowid"], "qty" => $qty);
						break;
					}
				}

				if($this->cart->update($update))
				{
					$error = array("code" => 0);
					$data['data'] = array("error" => $error, "cart" => array("total" => $this->cart->total(), "total_items" => $this->cart->total_items()));
				}
				else
				{
					$data['data'] = array("error" => array("code" => 1));
				}

				$this->load->view("giohang/update", $data);
			}
		}

		public function total_items(){
			$data['total_items'] = $this->cart->total_items();
			$this->load->view("giohang/total_items", $data);
		}

		public function delAll()
		{
			$this->cart->destroy();
			redirect(base_url("/giohang"));
		}

		public function dathang(){
			$data = $this->data;
			$data['list_order'] = $this->cart->contents();
			$data['total'] = $this->cart->total();
			$this->load->view("giohang/dathang", $data);
		}
	}
?>