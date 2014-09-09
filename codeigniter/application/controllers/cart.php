<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("cart_model");
		$this->load->model("home_model");
		$this->load->library('pagination');
	}
	public function index(){
	  	$perPage = 2;
	  	$count = $this->home_model->getCount();
		$config['base_url'] = base_url('/index.php/home/index');
		$config['total_rows'] = $count;
		$config['per_page'] = $perPage; 
	 	$config['use_page_numbers'] = TRUE;
		// $config['uri_segment'] = 2;
		if ($this->uri->segment(3) > 0) {
		     $id = $this->uri->segment(3) * $perPage - $perPage;
		 } else {
		     $id = $this->uri->segment(3);
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
		$data["query"] = $this->home_model->getMenu();
		$this->load->template_view("cart",$data);
	}
	public function add_cart($pr_id){
		$num = $this->cart_model->check_product_id($pr_id);
		echo $num;
		if($num == 1){
			$product = $this->cart_model->get_product_cart($pr_id);
			if(isset($this->session->userdata["cart_product"])){
				$count = $this->session->userdata["cart_count"] + 1;
				$this->session->set_userdata('cart_count', $count);

				$prod_arr = $this->session->userdata["cart_product"] . "," .$pr_id;
			}else{
				$count = 1;
				$this->session->set_userdata('cart_count', $count);

				$prod_arr = $pr_id;
			}
			$this->session->set_userdata('cart_product', $prod_arr);
		}
	}
	public function delete_product($id){
		$prod_arr = array_flip(explode(",",$this->session->userdata["cart_product"]));
		unset($prod_arr[$id]);
		$prod_arr = implode(",",array_flip($prod_arr));
		$this->session->set_userdata('cart_product', $prod_arr);

		$count = $this->session->userdata["cart_count"] - 1;
		$this->session->set_userdata('cart_count', $count);
	}
}