<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend extends CI_Controller
{

    public function login()
    {
    }

    public function dashboard()
    {
        $this->load->view('backend/header');
        echo "<div class='container' style='margin-top:100px'><h1>Welcome to Admin Panel</h1></div>";
        $this->load->view('backend/footer');
    }

    public function brands($form = null, $brand_id = 0)
    {
        $data['form'] = $form;
        if ($form == "add") {
            echo "Add Page";
        } elseif ($form == "edit" && $brand_id > 0) {
            //Edit data brand spesifik
            $this->load->model('backend_model');
            $data['brand'] = $this->backend_model->get_all_brands($brand_id)[0];

            $this->load->library('form_validation');
            $this->form_validation->set_rules('BrandName', 'Brand Name', 'required');
            $this->form_validation->set_rules('BrandSlug', 'Slug', 'required');
            $this->form_validation->set_rules('BrandDescription', 'Description', 'required');
            $this->form_validation->set_rules('BrandImage', 'Image', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('backend/header', $data);
                $this->load->view('backend/brands-form');
                $this->load->view('backend/footer');
            } else {
                $name = $this->input->post('BrandName');
                $slug = $this->input->post('BrandSlug');
                $desc = $this->input->post('BrandDescription');
                $image = $this->input->post('BrandImage');

                $update = $this->backend_model->edit_brand($name, $slug, $desc, $image, $brand_id);
                if($update){
                    $this->session->set_flashdata('msg', 'Swal.fire("Update Saved!");');
                    redirect('backend/brands/list/?msg=update-saved');
                }else{
                    $this->session->set_flashdata('msg', 'Swal.fire("Update Failed!");');
                    redirect('backend/brands/edit/'.$brand_id.'?msg=update-failed');
                }
                
            }
        } elseif ($form == "list") {
            //Menampilkan seluruh data brand
            $this->load->model('backend_model');
            $data['brands'] = $this->backend_model->get_all_brands();
            $this->load->view('backend/header', $data);
            $this->load->view('backend/brands-list');
            $this->load->view('backend/footer');
        } else {
            redirect("backend/brands/list");
        }
    }

    public function products()
    {
        $this->load->model('backend_model');
        $data['products'] = $this->backend_model->get_all_products();

        $this->load->view('backend/header', $data);
        $this->load->view('backend/products-list');
        $this->load->view('backend/footer');
    }

    public function rooms()
    {
        $this->load->model('backend_model');
        $data['rooms'] = $this->backend_model->get_all_rooms();

        $this->load->view('backend/header', $data);
        $this->load->view('backend/rooms-list');
        $this->load->view('backend/footer');
    }

    public function categories()
    {
        $this->load->model('backend_model');
        $data['cats'] = $this->backend_model->get_all_cats();

        $this->load->view('backend/header', $data);
        $this->load->view('backend/categories-list');
        $this->load->view('backend/footer');
    }

    public function stores()
    {
        $this->load->model('backend_model');
        $data['stores'] = $this->backend_model->get_all_stores();

        $this->load->view('backend/header', $data);
        $this->load->view('backend/stores-list');
        $this->load->view('backend/footer');
    }

    public function testlanding()
    {
        $this->load->view('landing/klik_wa');
    }
}
