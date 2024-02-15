<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend extends CI_Controller
{

    public function login()
	{
        
    }

    public function brands(){
        $this->load->model('backend_model');
        $data['brands'] = $this->backend_model->get_all_brands();

        $this->load->view('backend/header', $data);
		$this->load->view('backend/brands-list');
		$this->load->view('backend/footer');
    }

    public function products(){
        $this->load->model('backend_model');
        $data['products'] = $this->backend_model->get_all_products();

        $this->load->view('backend/header', $data);
		$this->load->view('backend/products-list');
		$this->load->view('backend/footer');
    }

    public function rooms(){
        $this->load->model('backend_model');
        $data['rooms'] = $this->backend_model->get_all_rooms();

        $this->load->view('backend/header', $data);
		$this->load->view('backend/rooms-list');
		$this->load->view('backend/footer');
    }

    public function categories(){
        $this->load->model('backend_model');
        $data['cats'] = $this->backend_model->get_all_cats();

        $this->load->view('backend/header', $data);
		$this->load->view('backend/categories-list');
		$this->load->view('backend/footer');
    }

    public function stores(){
        $this->load->model('backend_model');
        $data['stores'] = $this->backend_model->get_all_stores();

        $this->load->view('backend/header', $data);
		$this->load->view('backend/stores-list');
		$this->load->view('backend/footer');
    }

    public function testlanding(){
        $this->load->view('landing/klik_wa');
    }

}