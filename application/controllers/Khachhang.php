<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');

	class Khachhang extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Khachhang_model');
		}

		public function check_login(){
			$email = $this->input->post('email');
			$matkhau = md5($this->input->post('matkhau'));

			$res = $this->Khachhang_model->check_login(array($email, $matkhau));
			if(count($res)> 0)
			{
				$data['result'] = array("error" => 0);
				unset($res[0]['matkhau']);
				$this->session->set_userdata("khachhang", $res[0]);
			}
			else
			{
				$data['result'] = array("error" => 1, "msg" => "Sai địa chỉ email, mật khẩu");
			}

			$this->load->view('khachhang/check_login', $data);
		}

		public function register(){
				if(count($this->input->post()) > 0)
				{
					$data[] = $this->input->post("hoten");
					$data[] = $this->input->post("ngaysinh");
					$data[] = $this->input->post("gioitinh");
					$data[] = $this->input->post("email_dk");
					$data[] = md5($this->input->post("password"));
					$data[] = date("Y-m-d");

					$d = $this->Khachhang_model->register($data);

					if($d['result'] == 1)
					{
						$khachhang = $this->input->post();
						$khachhang['ngaytao'] = $data[5];
						unset($khachhang['matkhau']);
						$this->session->set_userdata("khachhang", $khachhang);
					}

					$this->load->view('khachhang/register', $d);
				}
		}

		public function logout(){
			if($this->session->userdata('khachhang'))
			{
				$this->session->unset_userdata('khachhang');
				redirect("/");
			}
		}
	}
?>