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
        $whitelist_brands = array("add", "edit", "list", "trash");
        if (in_array($form, $whitelist_brands)) {
            $this->load->model('backend_model');
            if ($form == "add" || $form == "edit") {

                if ($form == "add") {
                    $data['form'] = 'add';
                    //Pada Form Add, kolom isian dibuat kosong dulu
                    $data['brand']['brand_id'] = "";
                    $data['brand']['brand_name'] = "";
                    $data['brand']['brand_slug'] = "";
                    $data['brand']['brand_desc'] = "";
                    $data['brand']['brand_img'] = "";
                    $data['brand']['brand_status'] = 0;
                } else {
                    $data['form'] = 'edit';
                    //Ngecek apakah ID Brand ada di DB
                    $data['brand'] = $this->backend_model->get_all_brands($brand_id)[0];
                    if (!$data['brand']) {
                        redirect("backend/brands/list");
                    }
                }

                $this->load->library('form_validation');
                $this->form_validation->set_rules('BrandName', 'Brand Name', 'required');
                $this->form_validation->set_rules('BrandSlug', 'Slug', 'required');
                $this->form_validation->set_rules('BrandDescription', 'Description', 'required');
                $this->form_validation->set_rules('BrandImage', 'Image', 'required');
                $this->form_validation->set_rules('BrandStatus', 'Status', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('backend/header', $data);
                    $this->load->view('backend/brands-form');
                    $this->load->view('backend/footer');
                } else {
                    $name = $this->input->post('BrandName');
                    $slug = $this->input->post('BrandSlug');
                    $desc = $this->input->post('BrandDescription');
                    $image = $this->input->post('BrandImage');
                    $status = $this->input->post('BrandStatus');
                    if ($form == "add") {
                        $add = $this->backend_model->add_brand($name, $slug, $desc, $image, $status);
                        if ($add) {
                            $this->session->set_flashdata('msg', 'Swal.fire("New Data Added!");');
                            redirect('backend/brands/list/?msg=add-success');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Add Data Failed!");');
                            redirect('backend/brands/list/?msg=add-failed');
                        }
                    } else {
                        $update = $this->backend_model->edit_brand($name, $slug, $desc, $image, $status, $brand_id);
                        if ($update) {
                            $this->session->set_flashdata('msg', 'Swal.fire("Update Saved!");');
                            redirect('backend/brands/list/?msg=update-saved');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Update Failed!");');
                            redirect('backend/brands/edit/' . $brand_id . '?msg=update-failed');
                        }
                    }
                }
            } elseif ($form == "list") {
                //Menampilkan seluruh data brand
                $data['brands'] = $this->backend_model->get_all_brands();

                $data['total_products'] = array();
                foreach ($data['brands'] as $key => $brand) {
                    $items = $this->backend_model->count_product_in_brand($brand['brand_id']);
                    array_push($data['total_products'], $items);
                }

                $data['total_rooms'] = array();
                foreach ($data['brands'] as $key => $brand) {
                    $items = $this->backend_model->count_room_in_brand($brand['brand_id']);
                    array_push($data['total_rooms'], $items);
                }

                $data['total_cats'] = array();
                foreach ($data['brands'] as $key => $brand) {
                    $items = $this->backend_model->count_cat_in_brand($brand['brand_id']);
                    array_push($data['total_cats'], $items);
                }

                $this->load->view('backend/header', $data);
                $this->load->view('backend/brands-list');
                $this->load->view('backend/footer');
            } elseif ($form == "trash") {
                $cek_id = $this->backend_model->get_all_brands($brand_id);
                if (!$cek_id) {
                    redirect("backend/brands/list?msg=invalid-id");
                } else {
                    $soft_delete = $this->backend_model->soft_delete_brand($brand_id);
                    if ($soft_delete) {
                        $this->session->set_flashdata('msg', 'Swal.fire("Item Deleted!");');
                        redirect('backend/brands/list/?msg=delete-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Swal.fire("Delete Failed!");');
                        redirect('backend/brands/list/?msg=delete-failed');
                    }
                }
            }
        } else {
            redirect("backend/brands/list");
        }
    }

    public function rooms($form = null, $room_id = 0)
    {
        $whitelist_rooms = array("add", "edit", "list", "trash");
        if (in_array($form, $whitelist_rooms)) {
            $this->load->model('backend_model');
            if ($form == "add" || $form == "edit") {

                if ($form == "add") {
                    $data['form'] = 'add';
                    //Pada Form Add, kolom isian dibuat kosong dulu
                    $data['room']['room_id'] = "";
                    $data['room']['room_slug'] = "";
                    $data['room']['room_name'] = "";
                    $data['room']['room_img'] = "";
                    $data['room']['room_status'] = 0;
                } else {
                    $data['form'] = 'edit';
                    //Ngecek apakah ID Room ada di DB
                    $data['room'] = $this->backend_model->get_all_rooms($room_id)[0];
                    if (!$data['room']) {
                        redirect("backend/room/list");
                    }
                }

                $this->load->library('form_validation');
                $this->form_validation->set_rules('RoomName', 'Room Name', 'required');
                $this->form_validation->set_rules('RoomSlug', 'Slug', 'required');
                $this->form_validation->set_rules('RoomImage', 'Image', 'required');
                $this->form_validation->set_rules('RoomStatus', 'Status', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('backend/header', $data);
                    $this->load->view('backend/rooms-form');
                    $this->load->view('backend/footer');
                } else {
                    $name = $this->input->post('RoomName');
                    $slug = $this->input->post('RoomSlug');
                    $image = $this->input->post('RoomImage');
                    $status = $this->input->post('RoomStatus');
                    if ($form == "add") {
                        $add = $this->backend_model->add_room($name, $slug, $image, $status);
                        if ($add) {
                            $this->session->set_flashdata('msg', 'Swal.fire("New Data Added!");');
                            redirect('backend/rooms/list/?msg=add-success');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Add Data Failed!");');
                            redirect('backend/rooms/list/?msg=add-failed');
                        }
                    } else {
                        $update = $this->backend_model->edit_room($name, $slug, $image, $status, $room_id);
                        if ($update) {
                            $this->session->set_flashdata('msg', 'Swal.fire("Update Saved!");');
                            redirect('backend/rooms/list/?msg=update-saved');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Update Failed!");');
                            redirect('backend/rooms/edit/' . $room_id . '?msg=update-failed');
                        }
                    }
                }
            } elseif ($form == "list") {
                //Menampilkan seluruh data Room 
                $data['rooms'] = $this->backend_model->get_all_rooms();

                $data['room_items'] = array();
                foreach ($data['rooms'] as $key => $room) {
                    $items = $this->backend_model->count_item_in_room($room['room_id']);
                    array_push($data['room_items'], $items);
                }

                $this->load->view('backend/header', $data);
                $this->load->view('backend/rooms-list');
                $this->load->view('backend/footer');
            } elseif ($form == "trash") {
                $cek_id = $this->backend_model->get_all_rooms($room_id);
                if (!$cek_id) {
                    redirect("backend/rooms/list?msg=invalid-id");
                } else {
                    $soft_delete = $this->backend_model->soft_delete_room($room_id);
                    if ($soft_delete) {
                        $this->session->set_flashdata('msg', 'Swal.fire("Item Deleted!");');
                        redirect('backend/rooms/list/?msg=delete-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Swal.fire("Delete Failed!");');
                        redirect('backend/rooms/list/?msg=delete-failed');
                    }
                }
            }
        } else {
            redirect("backend/rooms/list");
        }
    }

    public function categories($form = null, $cat_id = 0)
    {
        $whitelist_rooms = array("add", "edit", "list", "trash");
        if (in_array($form, $whitelist_rooms)) {
            $this->load->model('backend_model');
            if ($form == "add" || $form == "edit") {

                if ($form == "add") {
                    $data['form'] = 'add';
                    //Pada Form Add, kolom isian dibuat kosong dulu
                    $data['cat']['cat_id'] = "";
                    $data['cat']['cat_name'] = "";
                    $data['cat']['cat_slug'] = "";
                    $data['cat']['cat_img'] = "";
                    $data['cat']['cat_status'] = 0;
                } else {
                    $data['form'] = 'edit';
                    //Ngecek apakah ID Category ada di DB
                    $data['cat'] = $this->backend_model->get_all_cats($cat_id)[0];
                    if (!$data['cat']) {
                        redirect("backend/categories/list");
                    }
                }

                $this->load->library('form_validation');
                $this->form_validation->set_rules('CatName', 'Category Name', 'required');
                $this->form_validation->set_rules('CatSlug', 'Slug', 'required');
                $this->form_validation->set_rules('CatImage', 'Image', 'required');
                $this->form_validation->set_rules('CatStatus', 'Status', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('backend/header', $data);
                    $this->load->view('backend/categories-form');
                    $this->load->view('backend/footer');
                } else {
                    $name = $this->input->post('CatName');
                    $slug = $this->input->post('CatSlug');
                    $image = $this->input->post('CatImage');
                    $status = $this->input->post('CatStatus');
                    if ($form == "add") {
                        $add = $this->backend_model->add_cat($name, $slug, $image, $status);
                        if ($add) {
                            $this->session->set_flashdata('msg', 'Swal.fire("New Data Added!");');
                            redirect('backend/categories/list/?msg=add-success');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Add Data Failed!");');
                            redirect('backend/categories/list/?msg=add-failed');
                        }
                    } else {
                        $update = $this->backend_model->edit_cat($name, $slug, $image, $status, $cat_id);
                        if ($update) {
                            $this->session->set_flashdata('msg', 'Swal.fire("Update Saved!");');
                            redirect('backend/categories/list/?msg=update-saved');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Update Failed!");');
                            redirect('backend/categories/edit/' . $cat_id . '?msg=update-failed');
                        }
                    }
                }
            } elseif ($form == "list") {
                //Menampilkan seluruh data Category
                $data['cats'] = $this->backend_model->get_all_cats();

                $data['cat_items'] = array();
                foreach ($data['cats'] as $key => $cat) {
                    $items = $this->backend_model->count_item_in_cat($cat['cat_id']);
                    array_push($data['cat_items'], $items);
                }

                $this->load->view('backend/header', $data);
                $this->load->view('backend/categories-list');
                $this->load->view('backend/footer');
            } elseif ($form == "trash") {
                $cek_id = $this->backend_model->get_all_cats($cat_id);
                if (!$cek_id) {
                    redirect("backend/categories/list?msg=invalid-id");
                } else {
                    $soft_delete = $this->backend_model->soft_delete_cat($cat_id);
                    if ($soft_delete) {
                        $this->session->set_flashdata('msg', 'Swal.fire("Item Deleted!");');
                        redirect('backend/categories/list/?msg=delete-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Swal.fire("Delete Failed!");');
                        redirect('backend/categories/list/?msg=delete-failed');
                    }
                }
            }
        } else {
            redirect("backend/categories/list");
        }
    }

    public function stores($form = null, $store_id = 0)
    {
        $whitelist_rooms = array("add", "edit", "list", "trash");
        if (in_array($form, $whitelist_rooms)) {
            $this->load->model('backend_model');
            if ($form == "add" || $form == "edit") {

                if ($form == "add") {
                    $data['form'] = 'add';
                    //Pada Form Add, kolom isian dibuat kosong dulu
                    $data['store']['store_id'] = "";
                    $data['store']['store_name'] = "";
                    $data['store']['store_addrs'] = "";
                    $data['store']['store_wa'] = "";
                    $data['store']['store_default_text'] = "";
                    $data['store']['store_phone'] = "";
                    $data['store']['store_gmap'] = "";
                    $data['store']['store_img'] = "";
                    $data['store']['store_order'] = "";
                    $data['store']['store_status'] = "";
                    $data['store']['store_id'] = 0;
                } else {
                    $data['form'] = 'edit';
                    //Ngecek apakah ID Store ada di DB
                    $data['store'] = $this->backend_model->get_all_stores($store_id)[0];
                    if (!$data['store']) {
                        redirect("backend/stores/list");
                    }
                }

                $this->load->library('form_validation');
                $this->form_validation->set_rules('StoreName', 'Store Name', 'required');
                $this->form_validation->set_rules('StoreAddress', 'Address', 'required');
                $this->form_validation->set_rules('StoreWA', 'Whatsapp Number', 'required');
                $this->form_validation->set_rules('StoreDefaultText', 'Whatsapp Default Text', 'required');
                $this->form_validation->set_rules('StorePhone', 'Office Phone Number', 'required');
                $this->form_validation->set_rules('StoreGmap', 'Google Maps URL', 'required');
                $this->form_validation->set_rules('StoreImage', 'Thumbnail', 'required');
                $this->form_validation->set_rules('StoreOrder', 'Order', 'required');
                $this->form_validation->set_rules('StoreStatus', 'Status', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('backend/header', $data);
                    $this->load->view('backend/stores-form');
                    $this->load->view('backend/footer');
                } else {
                    $name = $this->input->post('StoreName');
                    $address = $this->input->post('StoreAddress');
                    $wa = $this->input->post('StoreWA');
                    $default_text = urlencode($this->input->post('StoreDefaultText'));
                    $phone = $this->input->post('StorePhone');
                    $gmap = $this->input->post('StoreGmap');
                    $img = $this->input->post('StoreImage');
                    $order = $this->input->post('StoreOrder');
                    $status = $this->input->post('StoreStatus');
                    if ($form == "add") {
                        $add = $this->backend_model->add_store($name, $address, $wa, $default_text, $phone, $gmap, $img, $order, $status);
                        if ($add) {
                            $this->session->set_flashdata('msg', 'Swal.fire("New Data Added!");');
                            redirect('backend/stores/list/?msg=add-success');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Add Data Failed!");');
                            redirect('backend/stores/list/?msg=add-failed');
                        }
                    } else {
                        $update = $this->backend_model->edit_store($name, $address, $wa, $default_text, $phone, $gmap, $img, $order, $status, $store_id);
                        if ($update) {
                            $this->session->set_flashdata('msg', 'Swal.fire("Update Saved!");');
                            redirect('backend/stores/list/?msg=update-saved');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Update Failed!");');
                            redirect('backend/stores/edit/' . $store_id . '?msg=update-failed');
                        }
                    }
                }
            } elseif ($form == "list") {
                //Menampilkan seluruh data Store
                $data['stores'] = $this->backend_model->get_all_stores();

                $this->load->view('backend/header', $data);
                $this->load->view('backend/stores-list');
                $this->load->view('backend/footer');
            } elseif ($form == "trash") {
                $cek_id = $this->backend_model->get_all_stores($store_id);
                if (!$cek_id) {
                    redirect("backend/stores/list?msg=invalid-id");
                } else {
                    $soft_delete = $this->backend_model->soft_delete_store($store_id);
                    if ($soft_delete) {
                        $this->session->set_flashdata('msg', 'Swal.fire("Item Deleted!");');
                        redirect('backend/stores/list/?msg=delete-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Swal.fire("Delete Failed!");');
                        redirect('backend/stores/list/?msg=delete-failed');
                    }
                }
            }
        } else {
            redirect("backend/stores/list");
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

    public function testlanding()
    {
        $this->load->view('landing/klik_wa');
    }
}
