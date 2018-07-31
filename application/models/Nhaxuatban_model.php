<?php
	class Nhaxuatban_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAll(){
			$query = $this->db->query('call getall_nxb()');
			mysqli_next_result($this->db->conn_id);
			return $query->result_array();
		}
	}
?>