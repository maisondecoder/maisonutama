<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if (is_logged_in()) {
            redirect('backend/dashboard?msg=already-login');
            exit;
        }

        $data['current_nav'] = 'login';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/login', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('backend_model');
            $check_email = $this->backend_model->check_email($email)['Exist'];
            if ($check_email) {
                $check_pass = $this->backend_model->check_pass($email)['Pass'];
                //echo $check_pass;
                $input_pass = password_hash($password, PASSWORD_DEFAULT);
                if (password_verify($password, $check_pass)) {
                    $this->session->set_userdata('ses_login', $check_email);
                    redirect('backend/dashboard?msg=login-success');
                } else {
                    $this->session->set_flashdata('msg', 'Swal.fire("Email or Password is Invalid!");');
                    redirect('backend/login?msg=login-failed');
                }
            } else {
                $this->session->set_flashdata('msg', 'Swal.fire("Email or Password is Invalid!");');
                redirect('backend/login?msg=login-failed');
            }
        }
    }

    public function reset_password($token_reset = null)
    {
        if (is_logged_in()) {
            redirect('backend/dashboard?msg=already-login');
            exit;
        }

        if ($token_reset) {
            $this->load->model('backend_model');
            $check = $this->backend_model->check_reset_token($token_reset);
            if ($check) {
                $data['current_nav'] = 'login';
                $data['token'] = $token_reset;
                $this->load->library('form_validation');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('backend/new_password', $data);
                } else {
                    $email = $check['admin_email'];
                    $password = $this->input->post('password');
                    $reset_pass = $this->backend_model->new_password($email, $password);
                    if ($reset_pass) {
                        $this->session->set_flashdata('msg', 'Swal.fire("Password has been successfully changed, please login using your new password");');
                        redirect('backend/login?msg=reset-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Swal.fire("There was an error in resetting the password, please try again");');
                        redirect('backend/login?msg=reset-failed');
                    }
                }
            } else {
                redirect('backend/login?msg=reset-token-invalid');
            }
        } else {

            $data['current_nav'] = 'login';

            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email Address', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('backend/request_reset_password', $data);
            } else {
                $email = $this->input->post('email');

                $this->load->model('backend_model');
                $email = $this->backend_model->check_email($email)['admin_email'];
                if ($email) {
                    $tujuan = $email;
                    $string = $this->backend_model->admin_reset_request($email);
                    $judul = "Password Reset Request [" . $string . "]";
                    $body = "You have requested a password reset, click the following link to create a new password. <a href='" . base_url('backend/reset_password/') . $string . "'> Click Here to Reset</a>";
                    $this->backend_model->send_email($tujuan, $judul, $body);

                    $this->session->set_flashdata('msg', 'Swal.fire("We have sent a password reset link to your email, please check your email inbox");');
                    redirect('backend/login?msg=request_sent');
                } else {
                    $this->session->set_flashdata('msg', 'Swal.fire("Email is Invalid!");');
                    redirect('backend/reset_password?msg=email_invalid');
                }
            }
        }
    }

    public function logout()
    {
        if ($this->session->userdata('ses_login')) {
            session_destroy();
            redirect('backend/login?msg=logout-success');
        } else {
            echo 'not login yet';
            redirect('backend/login?msg=no-session-yet');
        }
    }

    public function dashboard()
    {
        if (!is_logged_in()) {
            redirect('backend/login');
            exit;
        }
        //untuk tanda di menu navigasi aktif
        $data['current_nav'] = 'dashboard';

        $this->load->view('backend/header', $data);
        echo "<div class='container' style='margin-top:100px'><h1>Welcome to Admin Panel</h1></div>";
        $this->load->view('backend/footer');
    }

    public function brands($form = null, $brand_id = 0)
    {
        if (!is_logged_in()) {
            redirect('backend/login');
            exit;
        }

        //untuk tanda di menu navigasi aktif
        $data['current_nav'] = 'brand';

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
        if (!is_logged_in()) {
            redirect('backend/login');
            exit;
        }
        //untuk tanda di menu navigasi aktif
        $data['current_nav'] = 'room';

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
        if (!is_logged_in()) {
            redirect('backend/login');
            exit;
        }

        //untuk tanda di menu navigasi aktif
        $data['current_nav'] = 'category';

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
        if (!is_logged_in()) {
            redirect('backend/login');
            exit;
        }

        //untuk tanda di menu navigasi aktif
        $data['current_nav'] = 'store';

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
                    $data['store']['store_status'] = 0;
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

    public function groups($form = null, $group_id = 0, $reorder = 0)
    {
        if (!is_logged_in()) {
            redirect('backend/login');
            exit;
        }

        //untuk tanda di menu navigasi aktif
        $data['current_nav'] = 'group';

        $whitelist_groups = array("add", "edit", "list", "trash");
        if (in_array($form, $whitelist_groups)) {
            $this->load->model('backend_model');
            if ($form == "add" || $form == "edit") {

                if ($form == "add") {
                    $data['form'] = 'add';
                    $data['products'] = $this->backend_model->get_avail_products();
                    //Pada Form Add, kolom isian dibuat kosong dulu
                    $data['group']['group_id'] = "";
                    $data['group']['group_name'] = "";
                    $data['group']['group_items'] = "";
                    $data['group']['group_status'] = 0;
                } else {
                    $data['form'] = 'edit';
                    //Ngecek apakah ID Group ada di DB
                    $data['group'] = $this->backend_model->get_all_groups($group_id)[0];
                    $data['products'] = $this->backend_model->get_avail_products();
                    $items = explode(",", $data['group']['group_items']);
                    //print_r($items);
                    $data['selected_items'] = $this->backend_model->selected_group_items($items, $data['group']['group_items']);
                    //print_r($data['selected_items']);
                    if (!$data['group']) {
                        redirect("backend/groups/list");
                    }
                }

                $this->load->library('form_validation');
                $this->form_validation->set_rules('GroupName', 'Group Name', 'required');
                $this->form_validation->set_rules('GroupItems[]', 'Items', 'required');
                $this->form_validation->set_rules('GroupStatus', 'Status', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('backend/header', $data);
                    $this->load->view('backend/groups-form');
                    $this->load->view('backend/footer');
                } else {
                    $name = $this->input->post('GroupName');
                    $items = $this->input->post('GroupItems[]');
                    $status = $this->input->post('GroupStatus');
                    $items = implode(",", $items);
                    //echo $group_item;
                    //exit();
                    if ($form == "add") {
                        $add = $this->backend_model->add_group($name, $items, $status);
                        if ($add) {
                            $this->session->set_flashdata('msg', 'Swal.fire("New Data Added!");');
                            redirect('backend/groups/list/?msg=add-success');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Add Data Failed!");');
                            redirect('backend/groups/list/?msg=add-failed');
                        }
                    } else {
                        if (!$reorder) {
                            echo 'update';
                            exit;
                            $update = $this->backend_model->edit_group($name, $items, $status, $group_id);
                            if ($update) {
                                $this->session->set_flashdata('msg', 'Swal.fire("Update Saved!");');
                                redirect('backend/groups/list/?msg=update-saved');
                            } else {
                                $this->session->set_flashdata('msg', 'Swal.fire("Update Failed!");');
                                redirect('backend/groups/edit/' . $group_id . '?msg=update-failed');
                            }
                        } else {
                            echo 'reorder';
                        }
                    }
                }
            } elseif ($form == "list") {
                //Menampilkan seluruh data Store
                $data['groups'] = $this->backend_model->get_all_groups();

                $this->load->view('backend/header', $data);
                $this->load->view('backend/groups-list');
                $this->load->view('backend/footer');
            } elseif ($form == "trash") {
                $cek_id = $this->backend_model->get_all_groups($group_id);
                if (!$cek_id) {
                    redirect("backend/groups/list?msg=invalid-id");
                } else {
                    $soft_delete = $this->backend_model->soft_delete_group($group_id);
                    if ($soft_delete) {
                        $this->session->set_flashdata('msg', 'Swal.fire("Item Deleted!");');
                        redirect('backend/groups/list/?msg=delete-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Swal.fire("Delete Failed!");');
                        redirect('backend/groups/list/?msg=delete-failed');
                    }
                }
            }
        } else {
            redirect("backend/groups/list");
        }
    }

    public function projects($form = null, $project_id = 0, $reorder = 0)
    {
        if (!is_logged_in()) {
            redirect('backend/login');
            exit;
        }

        //untuk tanda di menu navigasi aktif
        $data['current_nav'] = 'project';

        $whitelist_projects = array("add", "edit", "list", "trash");
        if (in_array($form, $whitelist_projects)) {
            $this->load->model('backend_model');
            if ($form == "add" || $form == "edit") {

                if ($form == "add") {
                    $data['form'] = 'add';
                    $data['products'] = $this->backend_model->get_avail_products();
                    $data['all_designers'] = $this->backend_model->get_all_designer();
                    //Pada Form Add, kolom isian dibuat kosong dulu
                    $data['project']['project_id'] = "";
                    $data['project']['project_name'] = "";
                    $data['project']['project_img'] = "";
                    $data['project']['designer_id'] = "";
                    $data['project']['product_id'] = 0;
                    $data['project']['project_status'] = 1;
                } else {
                    $data['form'] = 'edit';
                    //Ngecek apakah ID Group ada di DB
                    $data['project'] = $this->backend_model->get_all_projects($project_id)[0];
                    $data['all_designers'] = $this->backend_model->get_all_designer();
                    $data['products'] = $this->backend_model->get_avail_products();
                    $items = explode(",", $data['project']['product_id']);
                    //print_r($items);
                    $data['selected_items'] = $this->backend_model->selected_group_items($items, $data['project']['product_id']);
                    //print_r($data['selected_items']);
                    if (!$data['project']) {
                        redirect("backend/projects/list");
                    }
                }

                $this->load->library('form_validation');
                $this->form_validation->set_rules('ProjectTitle', 'Project Title', 'required');
                $this->form_validation->set_rules('Products[]', 'Products', 'required');
                $this->form_validation->set_rules('Status', 'Status', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('backend/header', $data);
                    $this->load->view('backend/projects-form');
                    $this->load->view('backend/footer');
                } else {
                    $title = $this->input->post('ProjectTitle');
                    $images = $this->input->post('ProjectImage');
                    $designer = $this->input->post('Designers');
                    $products = $this->input->post('Products');
                    $status = $this->input->post('Status');
                    if ($designer) {
                        $designer = implode(",", $designer);
                    } else {
                        $designer = 0;
                    }

                    if ($products > 1) {
                        $items = implode(",", $products);
                    } else {
                        $items = 0;
                    }
                    //echo $group_item;
                    //exit();
                    if ($form == "add") {
                        $add = $this->backend_model->add_project($title, $images, $designer, $items, $status);
                        if ($add) {
                            $this->session->set_flashdata('msg', 'Swal.fire("New Data Added!");');
                            redirect('backend/projects/list/?msg=add-success');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Add Data Failed!");');
                            redirect('backend/projects/list/?msg=add-failed');
                        }
                    } else {
                        $edit = $this->backend_model->edit_project($title, $images, $designer, $items, $status, $project_id);
                        if ($edit) {
                            $this->session->set_flashdata('msg', 'Swal.fire("Edit Data Saved");');
                            //print_r($edit);
                            redirect('backend/projects/list/?msg=edit-success');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Edit Data Failed!");');
                            //print_r($edit);
                            redirect('backend/projects/list/?msg=edit-failed');
                        }
                    }
                }
            } elseif ($form == "list") {
                //Menampilkan seluruh data Store
                $data['projects'] = $this->backend_model->get_all_projects();

                $this->load->view('backend/header', $data);
                $this->load->view('backend/projects-list');
                $this->load->view('backend/footer');
            } elseif ($form == "trash") {
                $cek_id = $this->backend_model->get_all_projects($project_id);
                if (!$cek_id) {
                    redirect("backend/projects/list?msg=invalid-id");
                } else {
                    $soft_delete = $this->backend_model->soft_delete_project($project_id);
                    if ($soft_delete) {
                        $this->session->set_flashdata('msg', 'Swal.fire("Item Deleted!");');
                        redirect('backend/projects/list/?msg=delete-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Swal.fire("Delete Failed!");');
                        redirect('backend/projects/list/?msg=delete-failed');
                    }
                }
            }
        } else {
            redirect("backend/groups/list");
        }
    }

    public function products($form = null, $product_id = 0)
    {
        if (!is_logged_in()) {
            redirect('backend/login');
            exit;
        }

        //untuk tanda di menu navigasi aktif
        $data['current_nav'] = 'product';

        $whitelist_products = array("add", "edit", "list", "trash");
        if (in_array($form, $whitelist_products)) {
            $this->load->model('backend_model');
            if ($form == "add" || $form == "edit") {

                if ($form == "add") {
                    $data['form'] = 'add';
                    $data['products'] = $this->backend_model->get_avail_products();
                    $data['rooms'] = $this->backend_model->get_all_rooms();
                    $data['cats'] = $this->backend_model->get_all_cats();
                    $data['brands'] = $this->backend_model->get_all_brands();
                    $data['contents'] = array("Section Title" => "Section Description");
                    //Pada Form Add, kolom isian dibuat kosong dulu
                    $data['products']['product_id'] = "";
                    $data['products']['product_name'] = "";
                    $data['products']['product_slug'] = "";
                    $data['products']['brand_id'] = "";
                    $data['products']['room_id'] = "";
                    $data['products']['cat_id'] = "";
                    $data['products']['product_thumbnail'] = "";
                    $data['products']['product_status'] = "";
                } else {
                    $data['form'] = 'edit';
                    //Ngecek apakah ID Product ada di DB
                    $data['products'] = $this->backend_model->get_all_products($product_id)[0];
                    $data['rooms'] = $this->backend_model->get_all_rooms();
                    $data['cats'] = $this->backend_model->get_all_cats();
                    $data['brands'] = $this->backend_model->get_all_brands();
                    $data['contents'] = json_decode($data['products']['product_content'], true);
                    //print_r($data['contents']);
                    //echo count($data['contents']);
                    //print_r($data['products']);
                    if (!$data['products']) {
                        redirect("backend/groups/list");
                    }
                }

                $this->load->library('form_validation');
                $this->form_validation->set_rules('ProductName', 'Product Name', 'required');
                $this->form_validation->set_rules('ProductSlug', 'Slug', 'required');
                $this->form_validation->set_rules('Brand', 'Brand', 'required');
                $this->form_validation->set_rules('Room', 'Room', 'required');
                $this->form_validation->set_rules('Category', 'Category', 'required');
                $this->form_validation->set_rules('ProductThumbnail', 'Brand', 'required');
                $this->form_validation->set_rules('ProductStatus', 'Status', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('backend/header', $data);
                    $this->load->view('backend/products-form');
                    $this->load->view('backend/footer');
                } else {
                    $name = $this->input->post('ProductName');
                    $slug = $this->input->post('ProductSlug');
                    $brand = $this->input->post('Brand');
                    $room = $this->input->post('Room');
                    $cat = $this->input->post('Category');
                    $thumbnail = $this->input->post('ProductThumbnail');
                    $status = $this->input->post('ProductStatus');
                    $discontinue = $this->input->post('ProductDiscontinue');

                    $content_titles = $this->input->post('SectionTitle[]');
                    $content_values = $this->input->post('SectionValue[]');
                    $content = array_combine($content_titles, $content_values);
                    $content = json_encode($content, true);

                    if ($form == "add") {
                        $add = $this->backend_model->add_product($name, $slug, $content, $brand, $room, $cat, $thumbnail, $status);
                        if ($add) {
                            $this->session->set_flashdata('msg', 'Swal.fire("New Data Added!");');
                            redirect('backend/products/list/?msg=add-success');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Add Data Failed!");');
                            redirect('backend/products/list/?msg=add-failed');
                        }
                    } else {
                        $update = $this->backend_model->edit_product($name, $slug, $content, $brand, $room, $cat, $thumbnail, $status, $discontinue, $product_id);
                        if ($update) {
                            $this->session->set_flashdata('msg', 'Swal.fire("Update Saved!");');
                            redirect('backend/products/list/?msg=update-saved');
                        } else {
                            $this->session->set_flashdata('msg', 'Swal.fire("Update Failed!");');
                            redirect('backend/products/edit/' . $product_id . '?msg=update-failed');
                        }
                    }
                }
            } elseif ($form == "list") {
                //Menampilkan seluruh data Product
                $data['products'] = $this->backend_model->get_all_products();

                $this->load->view('backend/header', $data);
                $this->load->view('backend/products-list');
                $this->load->view('backend/footer');
            } elseif ($form == "trash") {
                $cek_id = $this->backend_model->get_all_products($product_id);
                if (!$cek_id) {
                    redirect("backend/products/list?msg=invalid-id");
                } else {
                    $soft_delete = $this->backend_model->soft_delete_product($product_id);
                    if ($soft_delete) {
                        $this->session->set_flashdata('msg', 'Swal.fire("Item Deleted!");');
                        redirect('backend/products/list/?msg=delete-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Swal.fire("Delete Failed!");');
                        redirect('backend/products/list/?msg=delete-failed');
                    }
                }
            }
        } else {
            redirect("backend/products/list");
        }
    }

    public function trash($table = null, $form = 'list', $id = null)
    {
        if (!is_logged_in()) {
            redirect('backend/login');
            exit;
        }

        //untuk tanda di menu navigasi aktif
        $data['current_nav'] = 'trash';

        $whitelist_trash = array("list", "restore", "delete");
        if (in_array($form, $whitelist_trash)) {

            $this->load->model('backend_model');

            if ($table == 'product') {
                $db = "ml_products";
                $label = "product";
            }elseif ($table == 'project') {
                $db = "ml_project";
                $label = "project";
            } elseif ($table == 'group') {
                $db = "ml_group";
                $label = "group";
            } elseif ($table == 'brand') {
                $db = "ml_brands";
                $label = "brand";
            } elseif ($table == 'room') {
                $db = "ml_rooms";
                $label = "room";
            } elseif ($table == 'category') {
                $db = "ml_category";
                $label = "cat";
            } elseif ($table == 'store') {
                $db = "ml_sto";
                $label = "store";
            } else {
                redirect('backend/trash/product');
            }

            if ($form == "list") {
                $data['table'] = $table;
                $data['trash'] = $this->backend_model->get_trash($db, $label);
                $data['ct_product'] = $this->backend_model->count_trash('ml_products', 'product');
                $data['ct_project'] = $this->backend_model->count_trash('ml_project', 'project');
                $data['ct_group'] = $this->backend_model->count_trash('ml_group', 'group');
                $data['ct_brand'] = $this->backend_model->count_trash('ml_brands', 'brand');
                $data['ct_room'] = $this->backend_model->count_trash('ml_rooms', 'room');
                $data['ct_category'] = $this->backend_model->count_trash('ml_category', 'cat');
                $data['ct_store'] = $this->backend_model->count_trash('ml_sto', 'store');
                $this->load->view('backend/header', $data);
                $this->load->view('backend/trash-list');
                $this->load->view('backend/footer');
            } elseif ($form == "restore") {
                if ($id) {
                    $restore = $this->backend_model->restore_trash($id, $db, $label);
                    if ($restore) {
                        $this->session->set_flashdata('msg', 'Swal.fire("Restore Success!");');
                        redirect('backend/trash/' . $table . '?msg=restore-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Swal.fire("Restore Failed!");');
                        redirect('backend/trash/' . $table . '?msg=restore-failed');
                    }
                } else {
                    redirect('backend/trash/' . $table . '?msg=invalid-id');
                }
            } elseif ($form == "delete") {
                if ($id) {
                    $delete = $this->backend_model->delete_trash($id, $db, $label);
                    if ($delete) {
                        $this->session->set_flashdata('msg', 'Swal.fire("Delete Success!");');
                        redirect('backend/trash/' . $table . '?msg=delete-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Swal.fire("Delete Failed!");');
                        redirect('backend/trash/' . $table . '?msg=delete-failed');
                    }
                } else {
                    redirect('backend/trash/' . $table . '?msg=invalid-id');
                }
            }
        } else {
            redirect('backend/trash/' . $table);
        }
    }

    public function filemanager($folder = null, $folder2 = null)
    {
        if (!is_logged_in()) {
            redirect('backend/login');
            exit;
        }

        $config['upload_path']          = './assets/' . $folder . '/' . $folder2;
        $config['allowed_types']        = 'jpg|png|webp';
        $config['max_size']             = 1000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['folder'] = $folder;
            $data['folder2'] = $folder2;
            $data['error'] = array('error' => $this->upload->display_errors());

            $this->load->view('filemanager/upload_form', $data);
        } else {
            $data = $this->upload->data();
            echo '<div id="filename">' . $data['file_name'] . '</div>';
            echo '<script>setTimeout("window.close()", 1000);</script><html>';
        }
    }
}
