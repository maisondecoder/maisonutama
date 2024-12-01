
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('setting_model');
        $cloudcone_url = $this->setting_model->get_setting_value("cloudcone_url");

        $GLOBALS['domain_static'] = $cloudcone_url;

		//Detek Kode Unik Marketer
		if(isset($_GET['code']) || isset($_SESSION['code'])){
			if(isset($_GET['code']) && $_GET['code']=='pkj'){
				$this->session->set_userdata('code', 'pkj');
			}else{
				//$this->session->set_userdata('code', '');
			}
		}
    }

    public function blackfriday2024($brand_slug='papadatos', $page = 1)
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

		$data['products'] = $products;
		$data['brand_data'] = $brand_data;
		$data['all_brands'] = $this->brand_model->get_all_brands($brand_slug);


        $bs_group = $this->collection_model->group_catalog(2);
		$data['promo_products'] = $this->collection_model->selected_group_items($bs_group['group_items']);

		$brand_title = "Black Friday - Maison Living";

		$data['title_page'] = $brand_title;
		$data['nav'] = "";


		$this->load->view('revamp/header', $data);
		$this->load->view('landing/blackfriday2024');
		$this->load->view('revamp/footer');
    }

	public function christmas2024($brand_slug='papadatos', $page = 1)
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

		$data['products'] = $products;
		$data['brand_data'] = $brand_data;
		$data['all_brands'] = $this->brand_model->get_all_brands($brand_slug);


        $bs_group = $this->collection_model->group_catalog(3);
		$data['promo_products'] = $this->collection_model->selected_group_items($bs_group['group_items']);

		$brand_title = "Christmas Sale - Maison Living";

		$data['title_page'] = $brand_title;
		$data['nav'] = "";


		$this->load->view('revamp/header', $data);
		$this->load->view('landing/christmas2024');
		$this->load->view('revamp/footer');
    }

	public function landingpakarjasa()
    {
		$this->load->view('landing/landing_pakarjasa');
	}
}
