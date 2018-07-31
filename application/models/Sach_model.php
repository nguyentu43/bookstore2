<?php
	class Sach_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAll($madm = 0, $matl = 0){
			$query = $this->db->query("call getall_sach($madm, $matl)");
			mysqli_next_result($this->db->conn_id);
			return $query->result_array();
		}

		public function get($masach){
			$query = $this->db->query('call get_sach(?)', array($masach));
			mysqli_next_result($this->db->conn_id);
			return $query->row_array();
		}
	}
?>