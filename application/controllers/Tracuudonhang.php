<?php

	class Tracuudonhang extends MY_Controller{

		function __construct(){
			parent::__construct();
		}

		public function index(){
			$data = $this->data;

			if(count($this->input->post()) > 0)
			{
				$data['madh'] = $this->input->post('madh');
				$data['donhang'] = array();
			}

			$this->load->view('tracuudonhang', $data);
		}
	}
?>