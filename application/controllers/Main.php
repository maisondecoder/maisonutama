<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('setting_model');
		$cloudcone_url = $this->setting_model->get_setting_value("cloudcone_url");

		$GLOBALS['domain_static'] = $cloudcone_url;

		//Detek Kode Unik Marketer
		if (isset($_GET['code']) || isset($_SESSION['code'])) {
			if (isset($_GET['code']) && $_GET['code'] == 'pkj') {
				$this->session->set_userdata('code', 'pkj');
			} else {
				//$this->session->set_userdata('code', '');
			}
		}
	}

	public function index()
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('store_model');
		$this->load->model('collection_model');
		$all_cats = $this->collection_model->get_all_cats();
		$data['all_cats'] = $all_cats;
		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_stores'] = $this->store_model->get_all_stores();
		$bs_group = $this->collection_model->group_catalog(1);
		$data['bs_products'] = $this->collection_model->selected_group_items($bs_group['group_items']);
		//** End */

		//Folder Home Cover
		$folder_homecover = FCPATH . 'assets/home_cover/';
		$data['foto_homecovers'] = array_map('basename', glob($folder_homecover . '*.{webp}', GLOB_BRACE));

		//Get Popup Banner
		$data['popup'] = $this->collection_model->get_active_popup();

		//print_r($data['popup']);

		$data['title_page'] = "Welcome to Maison Living";
		$data['nav'] = "home";

		if ($this->session->has_userdata('code')) {
			$data['code'] = '?code=pkj';
		} else {
			$data['code'] = '';
		}

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/index');
		$this->load->view('revamp/footer');
	}

	public function search()
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('store_model');
		$this->load->model('collection_model');
		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_rooms'] = $this->collection_model->get_all_rooms();
		$data['all_cats'] = $this->collection_model->get_all_cats();
		//** End */

		$data['title_page'] = "Welcome to Maison Living";
		$data['nav'] = "home";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/search');
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

		$this->load->model('collection_model');
		$all_cats = $this->collection_model->get_all_cats();
		$data['all_cats'] = $all_cats;

		$data['title_page'] = "Maison Living Brand Partners";
		$data['nav'] = "brand";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/brand');
		$this->load->view('revamp/footer');
	}

	public function brand_detail($brand_slug, $page = 1)
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('store_model');
		$data['all_stores'] = $this->store_model->get_all_stores();
		//** End */
		$whitelist_category = array();
		$whitelist_catid = array();
		$brand_data = $this->brand_model->get_spesific_brand($brand_slug);
		$data['all_brand_cats'] = $this->brand_model->get_avail_brand_category($brand_data['brand_id']);
		$catalogs = $this->brand_model->get_catalogs($brand_data['brand_id']);
		$data['catalogs'] = $catalogs;

		foreach ($data['all_brand_cats'] as $key => $cat) {
			array_push($whitelist_category, $cat['cat_slug']);
			array_push($whitelist_catid, $cat['cat_id']);
		}

		if (!$brand_data) {
			redirect('/?error');
		}
		if (!$page) {
			redirect($brand_slug);
		}
		$data['page'] = $page;
		$this->load->model('collection_model');
		$products = $this->collection_model->get_products($brand_data['brand_id'], 0, 0, $page);

		$all_cats = $this->collection_model->get_all_cats();
		$data['all_cats'] = $all_cats;

		if (isset($_GET['category'])) {
			if (in_array($_GET['category'], $whitelist_category)) {
				$index_cat = array_search($_GET['category'], $whitelist_category);
				$products = $this->collection_model->get_products($brand_data['brand_id'], 0, $whitelist_catid[$index_cat], $page);
				$jumlah_total_produk = $this->collection_model->get_count_products($brand_data['brand_id'], 0, $whitelist_catid[$index_cat]);
				//echo 'ada di whitelist';
			} else {
				redirect($brand_data['brand_slug']);
			}
		} else {
			$jumlah_total_produk = $this->collection_model->get_count_products($brand_data['brand_id']);
			$_GET['category'] = null;
		}

		//Pagination
		$tampil_per_page = 12;
		$jumlah_halaman = ceil($jumlah_total_produk / $tampil_per_page);
		if (!$jumlah_total_produk) {
			$jumlah_halaman = 1;
		}
		$data['jumlah_halaman'] = $jumlah_halaman;
		//echo $page;
		//echo $jumlah_halaman;
		if ($page > $jumlah_halaman) {
			redirect($brand_slug);
		}

		//Folder Catalogs
		//$folder_catalog = FCPATH . 'assets/catalogs/' . $brand_data['brand_slug'] . '/';
		//$data['catalogs'] = glob($folder_catalog . '*.{pdf}', GLOB_BRACE);

		$data['jumlah_total_produk'] = $jumlah_total_produk;
		$data['products'] = $products;
		$data['brand_data'] = $brand_data;
		$data['all_brands'] = $this->brand_model->get_all_brands($brand_slug);

		$brand_title = $brand_data['brand_name'] . " Collections - Maison Living";

		$data['title_page'] = $brand_title;
		$data['nav'] = "brand";

		if ($this->session->has_userdata('code')) {
			$data['code'] = '?code=pkj';
		} else {
			$data['code'] = '';
		}

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

		$data['title_page'] = "Maison Living All Product Collections";
		$data['nav'] = "collection";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/collection');
		$this->load->view('revamp/footer');
	}

	public function product_detail($product_slug, $variation = null)
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('collection_model');
		$this->load->model('setting_model');

		$data['setting_price_position'] = $this->setting_model->get_setting_value("price_position");
		$data['setting_video_product_source'] = $this->setting_model->get_setting_value("video_product_source");
		$product_data = $this->collection_model->get_spesific_product($product_slug);
		$data['products'] = $product_data;
		$data['product_content'] = json_decode($product_data['product_content'], true);
		$data['contentlength'] = strlen($product_data['product_content']);

		$other_product_same_room = $this->collection_model->get_products(0, $product_data['room_id']);
		$data['same_room'] = $other_product_same_room;
		$other_product_same_category = $this->collection_model->get_products(0, $product_data['cat_id']);
		$data['same_cat'] = $other_product_same_category;

		if (!$product_data) {
			redirect('/?error');
		}

		$data['title_page'] = $product_data['product_name'] . " " . $product_data['cat_name'] . " by " . $product_data['brand_name'] . ' - Maison Living';
		$data['nav'] = "collection";

		$data['same_room'] = $this->collection_model->get_related_products(0, $product_data['room_id'], 0, $product_data['product_slug'], $product_data['cat_id']);
		$data['same_cat'] = $this->collection_model->get_related_products(0, 0, $product_data['cat_id'], $product_data['product_slug']);

		//print_r($data['same_cat']);

		$data['all_brands'] = $this->brand_model->get_all_brands($product_data['brand_slug']);
		$data['all_rooms'] = $this->collection_model->get_all_rooms($product_data['room_slug']);
		$data['all_cats'] = $this->collection_model->get_all_cats($product_data['cat_slug']);
		if (isset($_GET['target'])) {
			if ($_GET['target'] == 'designer') {
				$template = "Halo, saya bertanya tentang produk " . $product_data['product_name'] . " dari " . $product_data['brand_name'];
			} else {
				$template = "Halo, saya tertarik dengan " . $product_data['product_name'] . " dari " . $product_data['brand_name'];
			}
		} else {
			$template = "Halo, saya tertarik dengan " . $product_data['product_name'] . " dari " . $product_data['brand_name'];
		}
		$template_wa_full = urlencode($template);

		$get_list_variation =  $this->collection_model->get_list_variation($product_data['product_id']);

		if ($variation) {
			$get_variation =  $this->collection_model->get_variation($product_data['product_id'], $variation);
			if ($get_variation) {
				//default gallery dari varian
				$product_gallery = $get_variation['pv_gallery'];
			} else {
				//jika variasi tidak ada di database, maka redirect
				redirect(base_url('our-collections/') . $product_data['product_slug']);
			}
		} else {
			//default gallery dari product utama
			$product_gallery = $product_data['folder_gallery'];
		}

		$folder_specs = $GLOBALS['domain_static'] . '/assets' . $product_data['product_specs'];
		$data['specs'] = $folder_specs;

		$data['gallery'] = $product_gallery;
		$data['selected'] = $variation;
		$data['variation'] = $get_list_variation;
		//print_r($get_list_variation);
		$folder = FCPATH . 'assets/gallery/' . $product_gallery . '/';
		$data['images'] = glob($folder . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);

		//Nomor Whatsapp MARKETER

		//PAKARJASA
		// $api_url = "https://gass.maisonliving.id/cta?p=8C24EFB7E436B199E0A319FA9941EEAB&divisi=lead&msg=ID+%5B_gid_%5D%25break%25(Mohon+jangan+dihapus+ID+Pelanggan+di+atas)%25break%25%25break%25";
		//$data['cta_link'] = $api_url.$template_wa_full;
		$api_url = "https://api.whatsapp.com/send/?phone=";
		$no_wa = "6285931023339";
		$data['cta_link'] = $api_url . $no_wa . "&text=" . $template_wa_full . "&type=phone_number&app_absent=0";
		//echo "marketer = pakarjasa";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/product-detail');
		$this->load->view('revamp/footer');
	}

	public function room($room_slug, $page = 1)
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('collection_model');
		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_rooms'] = $this->collection_model->get_all_rooms($room_slug);
		$data['all_cats'] = $this->collection_model->get_all_cats();
		//** End */

		$room_data = $this->collection_model->get_spesific_room($room_slug);
		$data['room_data'] = $room_data;
		if (!$room_data) {
			redirect('/?error');
		}
		if (!$page) {
			redirect('room/' . $room_slug);
		}
		$data['page'] = $page;

		$products = $this->collection_model->get_products(0, $room_data['room_id'], 0, $page);
		$data['products'] = $products;

		////Pagination START////
		$jumlah_total_produk = $this->collection_model->get_count_products(0, $room_data['room_id']);
		$tampil_per_page = 12;
		$jumlah_halaman = ceil($jumlah_total_produk / $tampil_per_page);
		if (!$jumlah_total_produk) {
			$jumlah_halaman = 1;
		}
		$data['jumlah_halaman'] = $jumlah_halaman;
		if ($page > $jumlah_halaman) {
			redirect('room/' . $room_slug);
		}
		$data['jumlah_total_produk'] = $jumlah_total_produk;
		////Pagination END////

		$room_title = $room_data['room_name'] . " Collections - Maison Living";

		$data['title_page'] = $room_title;
		$data['nav'] = "collection";

		$this->load->model('collection_model');

		if ($this->session->has_userdata('code')) {
			$data['code'] = '?code=pkj';
		} else {
			$data['code'] = '';
		}

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/collection-room');
		$this->load->view('revamp/footer');
	}

	public function cat($cat_slug, $page = 1)
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
		if (!$page) {
			redirect('category/' . $cat_slug);
		}
		$data['page'] = $page;

		$products = $this->collection_model->get_products(0, 0, $category_data['cat_id'], $page);
		$data['products'] = $products;

		////Pagination START////
		$jumlah_total_produk = $this->collection_model->get_count_products(0, 0, $category_data['cat_id']);
		$tampil_per_page = 12;
		$jumlah_halaman = ceil($jumlah_total_produk / $tampil_per_page);
		if (!$jumlah_total_produk) {
			$jumlah_halaman = 1;
		}
		$data['jumlah_halaman'] = $jumlah_halaman;

		if ($page > $jumlah_halaman) {
			redirect('category/' . $cat_slug);
		}
		$data['jumlah_total_produk'] = $jumlah_total_produk;
		////Pagination END////

		$data['category_data'] = $category_data;

		$cat_title = $category_data['cat_name'] . " Collections - Maison Living";

		$data['title_page'] = $cat_title;
		$data['nav'] = "collection";

		$this->load->model('collection_model');
		//$products = $this->collection_model->get_products(0, 0, $category_data['cat_id']);
		$data['products'] = $products;

		if ($this->session->has_userdata('code')) {
			$data['code'] = '?code=pkj';
		} else {
			$data['code'] = '';
		}

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

		$this->load->model('collection_model');
		$all_cats = $this->collection_model->get_all_cats();
		$data['all_cats'] = $all_cats;

		$data['title_page'] = "About Maison Living";
		$data['nav'] = "about";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/about');
		$this->load->view('revamp/footer');
	}

	public function all_catalog($brand_slug = 0)
	{
		$this->load->model('brand_model');
		$this->load->model('collection_model');
		$brand = $this->brand_model->get_spesific_brand($brand_slug);
		$all_catalog = $this->collection_model->get_all_catalog($brand['brand_id']);

		$data['brand'] = $brand;
		$data['all_catalog'] = $all_catalog;
		//print_r($all_catalog);
		$this->load->view('revamp/all_catalog', $data);
	}

	public function our_project($id)
	{
		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$data['all_brands'] = $this->brand_model->get_all_brands();

		$this->load->model('collection_model');
		$all_cats = $this->collection_model->get_all_cats();
		$data['all_cats'] = $all_cats;

		$this->load->model('project_model');
		$data['project'] = $this->project_model->get_spesific_project($id);


		if (!$data['project']) {
			redirect('/?error');
		}

		//Get Semua Foto Gallery
		$data['images'] = explode(";", $data['project']['project_img']);
		//print_r($data['images']);

		//Get semua product yg digunakan dalam project
		$this->load->model('collection_model');
		$data['products'] = $this->collection_model->selected_group_items($data['project']['product_id']);

		//print_r($data['products']);	

		$data['title_page'] = "Our Project";
		$data['nav'] = "project";

		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/project-detail-new');
		$this->load->view('revamp/footer');
	}

	public function testlanding()
	{
		$this->load->view('landing/klik_wa');
	}

	public function showcase(){

		//Global Data To Display *Mandatory
		$this->load->model('brand_model');
		$this->load->model('collection_model');
		$this->load->model('setting_model');

		$data['setting_price_position'] = $this->setting_model->get_setting_value("price_position");
		$data['setting_video_product_source'] = $this->setting_model->get_setting_value("video_product_source");
		$product_data = $this->collection_model->get_products_with_video();
		$data['products'] = $product_data;
		//print_r($data['products']);
		$data['title_page'] = 'Showcase Video - Maison Living';
		$data['nav'] = "home";

		$data['all_brands'] = $this->brand_model->get_all_brands();
		$data['all_rooms'] = $this->collection_model->get_all_rooms();
		$data['all_cats'] = $this->collection_model->get_all_cats();


		$this->load->view('revamp/header', $data);
		$this->load->view('revamp/showcase-video');
		$this->load->view('revamp/footer');
	}
}
