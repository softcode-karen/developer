<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
	    parent::__construct();
		$this->load->model("login_model");
		$this->load->model("home_model");
	}
	public function facebook_login(){
		$fb_id = $this->input->post("fbId");
		$fb_name = $this->input->post("fname");
		$lname = $this->input->post("lname");
		$email = $this->input->post("email");
		$img = $fb_id . "/picture";
		$data = array(
			"fb_id" => $fb_id,
			"name" => $fb_name,
			"last_name" => $lname,
			"email" => $email,
			"img" => $img
		);
		$fb_user = $this->login_model->select_fb_user($fb_id);
		if($fb_user == 0){
			$this->login_model->reg_fb_user($data);
			$newdata = $this->login_model->select_fb_user($fb_id,true);
			$this->session->set_userdata($newdata);
		}else{
			$newdata = $this->login_model->select_fb_user($fb_id,true);
			$this->session->set_userdata($newdata);
		}
	}

	public function auth(){
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