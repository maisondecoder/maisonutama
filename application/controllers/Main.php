<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	public function index()
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('store_model');
		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_stores'] = $this->store_model->get_all_stores();
		//** End */

		$data['title_page'] = "Homepage";
		$data['nav'] = "home";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/index');
		$this->load->view('revamp/footer');
	}

	public function brands()
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('store_model');
		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_stores'] = $this->store_model->get_all_stores();
		//** End */

		$data['title_page'] = "Our Brands Partner";
		$data['nav'] = "brand";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/brand');
		$this->load->view('revamp/footer');
	}

	public function brand_detail($brand_slug)
	{

		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('store_model');
		$data['all_stores'] = $this->store_model->get_all_stores();
		//** End */

		$brand_data = $this->brand_model->get_spesific_brand($brand_slug);

		if (!$brand_data) {
			redirect('/?error');
		}

		$data['brand_data'] = $brand_data;
		$data['all_brands'] = $this->brand_model->get_all_brands($brand_slug);

		$brand_title = $brand_data['brand_name'] . " Product Collections";

		$data['title_page'] = $brand_title;
		$data['nav'] = "brand";

		$this->load->model('collection_model');
		$products = $this->collection_model->get_products($brand_data['brand_id']);
		$data['products'] = $products;

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/brand-detail');
		$this->load->view('revamp/footer');
	}

	public function collections()
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('collection_model');
		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_rooms'] = $this->collection_model->get_all_rooms();
		$data['all_cats'] = $this->collection_model->get_all_cats();
		//** End */

		$data['title_page'] = "Our Product Collections";
		$data['nav'] = "collection";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/collection');
		$this->load->view('revamp/footer');
	}

	public function product_detail($product_slug)
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('collection_model');
		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_rooms'] = $this->collection_model->get_all_rooms();
		$data['all_cats'] = $this->collection_model->get_all_cats();
		//** End */

		
		$product_data = $this->collection_model->get_spesific_product($product_slug);
		$data['products'] = $product_data;
		$data['product_content'] = json_decode($product_data['product_content'],true);

		$other_product_same_room = $this->collection_model->get_products(0, $product_data['room_id']);
		$data['same_room'] = $other_product_same_room;
		$other_product_same_category = $this->collection_model->get_products(0, $product_data['cat_id']);
		$data['same_cat'] = $other_product_same_category;

		if (!$product_data) {
			redirect('/?error');
		}

		$data['title_page'] = $product_data['product_name'] ." " . $product_data['cat_name'] . " by " . $product_data['brand_name'];
		$data['nav'] = "collection";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/product-detail');
		$this->load->view('revamp/footer');
	}

	public function room($room_slug)
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('collection_model');
		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_rooms'] = $this->collection_model->get_all_rooms($room_slug);
		$data['all_cats'] = $this->collection_model->get_all_cats();
		//** End */

		$room_data = $this->collection_model->get_spesific_room($room_slug);

		if (!$room_data) {
			redirect('/?error');
		}

		$data['room_data'] = $room_data;

		$room_title = $room_data['room_name'] . " Product Collections";

		$data['title_page'] = $room_title;
		$data['nav'] = "collection";

		$this->load->model('collection_model');
		$products = $this->collection_model->get_products(0,$room_data['room_id'] );
		$data['products'] = $products;
		
		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/collection-room');
		$this->load->view('revamp/footer');
	}

	public function cat($cat_slug)
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('collection_model');
		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_rooms'] = $this->collection_model->get_all_rooms();
		$data['all_cats'] = $this->collection_model->get_all_cats($cat_slug);
		//** End */

		$category_data = $this->collection_model->get_spesific_cat($cat_slug);

		if (!$category_data) {
			redirect('/?error');
		}

		$data['category_data'] = $category_data;

		$cat_title = $category_data['cat_name'] . " Product Collections";

		$data['title_page'] = $cat_title;
		$data['nav'] = "collection";

		$this->load->model('collection_model');
		$products = $this->collection_model->get_products(0,0,$category_data['cat_id'] );
		$data['products'] = $products;

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/collection-category');
		$this->load->view('revamp/footer');
	}

	public function about_us()
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('store_model');
		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_stores'] = $this->store_model->get_all_stores();
		//** End */

		$data['title_page'] = "About Maison Living";
		$data['nav'] = "about";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/about');
		$this->load->view('revamp/footer');
	}
}
