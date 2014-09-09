<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	    $this->load->library('pagination');
		$this->load->model("category_model");
		$this->load->model("home_model");
	}
	public function index($id = ""){
	  	$perPage = 2;
	  	$count = $this->category_model->get_count();
		$config['base_url'] = base_url('/index.php/category/index');
		$config['total_rows'] = $count;
		$config['per_page'] = $perPage; 
	 	$config['use_page_numbers'] = TRUE;
		// $config['uri_segment'] = 2;
		if ($this->uri->segment(4) > 0) {
		     $ids = $this->uri->segment(4) * $perPage - $perPage;
		 } else {
		     $ids = $this->uri->segment(4);
		 }
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
		$data["products"] = $this->category_model->get_product_to_category($id,$perPage,$ids);
		$data["query"] = $this->home_model->getMenu();

		$this->load->template_view("category",$data);

	}
}