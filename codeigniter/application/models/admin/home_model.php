<?php
	class Home_model extends CI_Model{
		public function getMenu(){
			$query = $this->db->get("menu");
			return $query->result();
		}
	}
?>