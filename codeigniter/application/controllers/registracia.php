<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registracia extends CI_Controller {
	public function __construct(){
	    parent::__construct();
		$this->load->model("registracia_model");
		$this->load->model("home_model");
	}
	public function _confirm_password(){
		$password = $this->input->post("password");
		$password_confirm = $this->input->post("r_password");
		$this->form_validation->set_message('password', 'Error Message');
		$this->form_validation->set_message('r_password', 'Error Message');
		return ($password !== $password_confirm) ? FALSE : TRUE;
	}
	public function _check_email(){
		$email = $this->input->post("email");
		$this->db->select("email");
		$this->db->from("users");
		$this->db->where("email",$email);
		$this->db->limit("1");
		$query = $this->db->get();
		$count = $query->num_rows();
		if ($count == 1){
			return FALSE;
			$this->form_validation->set_message('email', 'Error Message');
		}else{
			return TRUE;
		}
		//echo $count;
	}
	public function reg_user(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$name = $this->input->post("name");
		$last_name = $this->input->post("last_name");
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$r_password = $this->input->post("r_password");
		// out($this->check_email($email),true);
		// out($this->confirm_password($password,$r_password),true);
		$this->form_validation->set_rules('name', 'Имя', 'required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('last_name', 'Фамилия', 'required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('email', 'Неправильный Е-майл', 'required|min_length[3]|max_length[25]|callback__check_email');
		$this->form_validation->set_rules('password', 'Пароль', 'required|min_length[3]|max_length[25]|callback__confirm_password');
		$this->form_validation->set_rules('r_password', 'Пароли  не совпадают', 'required|min_length[3]|max_length[15]');
		//out($this->form_validation->run(),true);
		if ($this->form_validation->run()){
			if($password == $r_password){
				$config['upload_path'] = "./assets/img/users_img/";
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				$config['create_thumb']  = TRUE;
				$this->load->library('upload', $config);
				$this->upload->do_upload('avatar');
				$array = $this->upload->data();
				$img_name = $array["file_name"];
				if (empty($img_name)){
					$img_name = "";
				}
				$data = array(
					"name" => $name,
					"last_name" => $last_name,
					"email" => $email,
					"password" => $password,
					"img" => $img_name
				);
				unset($config);
				$resized = "./assets/img/users_img/" .$img_name ;
				$config = array();
				$config['source_image'] = $resized;
				$config['image_library'] = 'gd2';
				$config['maintain_ratio'] = TRUE;
				$config['create_thumb'] = TRUE;   // Tells it to make a copy called *_thumb.*
				$config['width'] = 100;
				$config['height'] = 100;
				$this->load->library('image_lib', $config);
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				$this->image_lib->clear();

				$this->registracia_model->add_users($data);
				$newdata = $this->registracia_model->add_users($data);
				$this->session->set_userdata($newdata);
				redirect("home");
			}else{
				$data["query"] = $this->home_model->getMenu();
				$this->load->view("frontend/error_form",$data);
			}
		}else{				
				$data["query"] = $this->home_model->getMenu();
				$this->load->view("frontend/error_form",$data);
		}
	}
}