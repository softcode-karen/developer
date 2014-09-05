<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct(){
	    parent::__construct();
		$this->load->model("category_model");
	}
	public function index(){
		$this->load->template_view("category");
	}
}