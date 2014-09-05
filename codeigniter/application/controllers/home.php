<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
	    parent::__construct();
		$this->load->model("home_model");
	}

	public function index(){
		$data["query"] = $this->home_model->getMenu();
		$data["products"] = $this->home_model->getProduct();
		$this->load->template_view("home",$data);
	}
}