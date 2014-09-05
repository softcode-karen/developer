<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
	    parent::__construct();
		$this->load->model("home_model");
	}

	public function index(){
		$this->load->library('pagination');

	  	$perPage = 2;

		$config['base_url'] = 'http://localhost/developer/codeigniter/index.php/home/index';
		$config['total_rows'] = '6';
		$config['per_page'] = $perPage; 
	 	$config['use_page_numbers'] = TRUE;
		// $config['uri_segment'] = 2;
		if ($this->uri->segment(3) > 0) {
		     $id = $this->uri->segment(3) * $perPage - $perPage;
		 } else {
		     $id = $this->uri->segment(3);
		 }
		// $config['num_links'] = 4;


		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";


		$this->pagination->initialize($config); 

		$data['pagination'] = $this->pagination->create_links();
		
		$data["query"] = $this->home_model->getMenu();
		$data["products"] = $this->home_model->getProduct($perPage,$id);
		$this->load->template_view("home",$data);
	}
}
