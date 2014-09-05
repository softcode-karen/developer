<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function __construct(){
	    parent::__construct();
		$this->load->model("admin/menu_model");
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	function add_edit_menu($id = ""){
		//$this->form_validation->set_rules('title', 'Menu Title', 'required|min_length[3]|max_length[25]');
		//$this->form_validation->set_rules("url","Menu seourl","required|min_length[3]|max_length[25]");
		//if($this->form_validation->run()){
				$title = $this->input->post("title");
				$url = $this->input->post("url");
				$data = array(
					"title" => $title,
					"url" => $url
				);	
			if(empty($id)){
				$this->load->admin_view('add_edit_menu');
				$this->menu_model->insert_menu($data);
			}else{
				$datad["query"] = $this->menu_model->select_menu_data($id);
				$this->load->admin_view('add_edit_menu',$datad);
				if(!empty($this->input->post("title"))){
					$this->menu_model->update_menu($id,$data);
				}
			}
			//redirect("admin/home/menu");
		//}
	}
	public function delete($id){
		$this->menu_model->delete_menu($id);
	}
}