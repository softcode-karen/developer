<?php
	class Login_model extends CI_Model{
		public function auth(){
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$this->db->select("*");
			$this->db->from("users");
			$this->db->where("email",$email);
			$this->db->where("password",$password);
			$query = $this->db->get();
			return $query->result();
		}
	}
?>