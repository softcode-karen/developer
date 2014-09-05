<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
	    parent::__construct();
		$this->load->model("category_model");
	}
	public function index(){
		$num_user = count($this->login_model->auth());
		if($num_user == 1){
			$newdata = $this->login_model->auth();
			//out($newdata);die;
			$this->session->set_userdata($newdata);
			redirect("home");
		}else{
			redirect("home?error=true");
		}
	}
}