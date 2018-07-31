<?php
	class Danhmuc_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAll(){
			$query = $this->db->query('call getall_dm()');
			mysqli_next_result($this->db->conn_id);
			return $query->result_array();
		}

		public function get($id){
			$query = $this->db->query("call get_dm($id)");
			mysqli_next_result($this->db->conn_id);
			return $query->row_array();
		}

		public function insert($dm){
			$this->db->query("call insert_dm(?, ?)", $dm);
			mysqli_next_result($this->db->conn_id);
			return $this->db->error();
		}

		public function update($dm){
			$this->db->query("call update_dm(?, ?, ?)", $dm);
			mysqli_next_result($this->db->conn_id);
			return $this->db->error();
		}

		public function delete($madm){
			$this->db->query("call delete_dm(?)", $madm);
			mysqli_next_result($this->db->conn_id);
			return $this->db->error();
		}
	}
?>