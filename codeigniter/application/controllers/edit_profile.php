<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("home_model");
		$this->load->model("edit_profile_model");
	}
	public function index(){
		$data["query"] = $this->home_model->getMenu();
		$this->load->template_view("edit_profile.php",$data);
	}
	public function my_address(){
		$data["query"] = $this->home_model->getMenu();
		$data["country"] = $this->edit_profile_model->get_country();

		$this->load->template_view("my_address.php",$data);
	}

}