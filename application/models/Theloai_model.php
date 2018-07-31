<?php
	class Theloai_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAll(){
			$query = $this->db->query('call getall_tl()');
			mysqli_next_result($this->db->conn_id);
			return $query->result_array();
		}

		public function get_dm($madm){
			$query = $this->db->query("call get_tl_dm($madm)");
			mysqli_next_result($this->db->conn_id);
			return $query->result_array();
		}
	}
?>