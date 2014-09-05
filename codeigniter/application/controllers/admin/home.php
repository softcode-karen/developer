<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("home_model");
	}
	public function index(){
		$this->load->admin_view('index');
	}

	public function flot(){
		//echo $this->uri->segment('3');die;
		$this->load->admin_view('flot');
	}

	public function tables(){
		//echo $this->uri->segment('3');die;
		$this->load->admin_view('tables');
	}
	public function morris(){
		$this->load->admin_view('morris');
	}
	public function forms(){
		$this->load->admin_view('forms');
	}
	public function panels_wells(){
		$this->load->admin_view('panels-wells');
	}
	public function buttons(){
		$this->load->admin_view('buttons');
	}
	public function notifications(){
		$this->load->admin_view('notifications');
	}
	public function typography(){
		$this->load->admin_view('typography');
	}
	public function grid(){
		$this->load->admin_view('grid');
	}
	public function blank(){
		$this->load->admin_view('blank');
	}
	public function login(){
		$this->load->admin_view('login');
	}
	public function menu(){
		$data["query"] = $this->home_model->getMenu();
		$this->load->admin_view('menu',$data);
	}
}