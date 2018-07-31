<?php
	class Admin_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function check_admin($admin)
		{
			$query = $this->db->query('call check_admin(?, ?)', $admin);
			mysqli_next_result($this->db->conn_id);
			return $query->num_rows();
		}
	}

?>