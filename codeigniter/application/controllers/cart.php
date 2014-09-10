<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("cart_model");
		$this->load->model("home_model");
		$this->load->library('pagination');
	}
	public function index(){
		$data["query"] = $this->home_model->getMenu();
		$this->load->template_view("cart",$data);
	}

	public function step_two(){
		$data["query"] = $this->home_model->getMenu();
		$this->load->template_view("step_two",$data);
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
		$prod_arr = explode(",",$this->session->userdata["cart_product"]);

		if(($key = array_search($id, $prod_arr)) !== false) {
		    unset($prod_arr[$key]);
		}
		//unset($prod_arr[$id]);
		$prod_arr = implode(",",$prod_arr);
		$this->session->set_userdata('cart_product', $prod_arr);

		$count = $this->session->userdata["cart_count"] - 1;
		$this->session->set_userdata('cart_count', $count);
	}
}