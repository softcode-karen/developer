<?php
	class Cart_model extends CI_Model{
		public function check_product_id($pr_id){
			return $this->db->select("id")->from("products")->where("id",$pr_id)->get()->num_rows();
		}
		public function get_product_cart($pr_id){
			$query = $this->db->select("*")->from("products")->where("id",$pr_id)->get();
			return $query->result();
		}
	}
?>