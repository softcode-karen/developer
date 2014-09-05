<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct(){
	    parent::__construct();
		$this->load->model("admin/products_model");
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	public function index(){
		$data["products"] = $this->products_model->select_product_data();
		$this->load->admin_view('products',$data);
	}
	public function add_edit_products($id = ""){
		if(!empty($this->input->post("title"))){
			$title = $this->input->post("title");
			$description = $this->input->post("description");
			$price = $this->input->post("price");
			$date = date("Y-m-d H:i:s");

			$this->form_validation->set_rules("title","Title","required|min_length[3]|max_length[50]");
			$this->form_validation->set_rules("description","Descripton","required|min_length[20]");
			$this->form_validation->set_rules("price","Price","required|min_length[3]|max_length[25]");
		}
		if(empty($id)){
			$this->load->admin_view('add_edit_products');
			if(!empty($this->input->post("title"))){
				if($this->form_validation->run()){
					$config['upload_path'] = "./assets/img/product_img/";
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000000';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
					$config['create_thumb']  = TRUE;
					$this->load->library('upload', $config);
					$this->upload->do_upload('product_img');
					$array = $this->upload->data();
					$img_name = $array["file_name"];
					if (empty($img_name)){
						$img_name = "";
					}
					$data = array(
						"title" => $title,
						"description" => $description,
						"price" => $price,
						"img" => $img_name,
						"date" => $date
					);
					$this->products_model->insert_product($data);
					redirect("admin/products/");
				}
			}
		}else{
			$data["query"] = $this->products_model->select_product_data($id);
			$this->load->admin_view('add_edit_products',$data);
			if(!empty($this->input->post("title"))){
				if($this->form_validation->run()){
					if(!empty($_FILES["product_img"])){
						$config['upload_path'] = "./assets/img/product_img/";
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '1000000';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
						$config['create_thumb']  = TRUE;
						$this->load->library('upload', $config);
						$this->upload->do_upload('product_img');
						$array = $this->upload->data();
						$img_name = $array["file_name"];
					}
					if(isset($img_name) && !empty($img_name)){
						$data = array(
							"title" => $title,
							"description" => $description,
							"price" => $price,
							"img" => $img_name,
							"date" => $date
						);
					}else{
						$data = array(
							"title" => $title,
							"description" => $description,
							"price" => $price,
							"date" => $date
						);
					}
					$this->products_model->update_product($id,$data);
					redirect("admin/products/");
				}
			}
		}
	}
	public function delete_product($id){
		$this->products_model->delete_product($id);
	}
}