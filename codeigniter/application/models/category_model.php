<?php
	class Category_model extends CI_Model{
		public function get_count(){
			return $this->db->get('products')->num_rows();
		}
		public function get_product_to_category($menu,$perPage,$ids){
			$query = $this->db->select("*")->from("products")->where("category",$menu)->limit($perPage,$ids)->get();
			return $query->result();
		}
	}
?>