<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');

	class Logout extends MY_Controller{
		function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->session->unset_userdata('username');
			redirect('admin/login');
		}
	}
?>