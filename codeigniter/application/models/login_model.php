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
		public function select_fb_user($fb_id,$fb_data = ""){
			if($fb_data == ""){
				$query = $this->db->select("id")->from("users")->where("fb_id",$fb_id)->get();
				return $query->num_rows();
			}else{
				$query = $this->db->select("*")->from("users")->where("fb_id",$fb_id)->get();
				return $query->result();
			}
		}
		public function auth_facebook($fb_id){
			$query = $this->db->select("*")->from("users")->where("fb_id",$fb_id)->get();
			return $query->result();
		}
		public function reg_fb_user($data){
			$this->db->insert("users",$data);
			return $query->result();
		}
	}
?>