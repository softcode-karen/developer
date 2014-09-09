<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
	    parent::__construct();
		$this->load->model("home_model");
	}

	public function index(){
		$this->load->library('pagination');

	  	$perPage = 2;
	  	$count = $this->home_model->getCount();
		$config['base_url'] = base_url('/index.php/home/index');
		$config['total_rows'] = $count;
		$config['per_page'] = $perPage; 
	 	$config['use_page_numbers'] = TRUE;
		if ($this->uri->segment(3) > 0) {
		     $id = $this->uri->segment(3) * $perPage - $perPage;
		 } else {
		     $id = $this->uri->segment(3);
		 }

	}
}
