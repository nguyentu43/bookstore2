<?php
	if(!defined('BASEPATH')) die('No direct script access allowed');

	class Khachhang_model extends CI_Model{
		function __construct(){
			parent::__construct();

			$this->load->database();
		}

		public function check_login($data){
			$query = $this->db->query("call check_login(?, ?)", $data);
			mysqli_next_result($this->db->conn_id);
			return $query->result_array();
		}

		public function register($data){
			$query = $this->db->query("select register(?, ?, ?, ?, ?, ?) as result", $data);
			return $query->row_array();
		}
	}
?>