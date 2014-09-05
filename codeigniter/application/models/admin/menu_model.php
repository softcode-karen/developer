
<?php
	class Menu_model extends CI_Model{
		public function insert_menu($data){
			$this->db->insert("menu",$data);
		}
		public function delete_menu($id){
			$this->db->delete('menu', array('id' => $id));
		}
		public function update_menu($id,$data =""){
			$this->db->where('id', $id);
			$this->db->update('menu', $data);
		}
		public function select_menu_data($id){
			$query = $this->db->select("*")->from("menu")->where("id",$id)->get();
			return $query->result();
		}
	}
?>