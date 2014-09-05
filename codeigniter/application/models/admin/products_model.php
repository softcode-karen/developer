
<?php
	class Products_model extends CI_Model{
		public function insert_product($data){
			$this->db->insert("products",$data);
		}
		public function update_product($id,$data =""){
			$this->db->where('id', $id);
			$this->db->update('products', $data);
		}
		public function select_product_data($id = ""){
			if(empty($id)){
				$query = $this->db->select("*")->from("products")->get();
				return $query->result();
			}else{
				$query = $this->db->select("*")->from("products")->where("id",$id)->get();
				return $query->result();
			}
		}
		public function delete_product($id){
			$this->db->delete('products', array('id' => $id));
		}
		public function get_category(){
			$query = $this->db->select("*")->from("menu")->get();
			return $query->result();
		}
	}
?>