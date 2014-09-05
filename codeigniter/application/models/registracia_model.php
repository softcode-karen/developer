<?php
	class Registracia_model extends CI_Model{
		public function add_users($data){
			$this->db->insert("users",$data);
			$last_id = $this->db->insert_id();
			$this->db->select("*");
			$this->db->from("users");
			$this->db->where("id",$last_id);
			$query = $this->db->get();
			return $query->result();
		}
	}
?>