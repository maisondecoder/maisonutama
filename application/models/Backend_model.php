<?php

class Backend_model extends CI_Model
{
    //////////////////////// BRAND START ////////////////////////

    public function get_all_brands($brand_id = 0)
    {
        $this->db->select('*');
        $this->db->from('ml_brands');
        if ($brand_id) {
            $this->db->where('brand_id', $brand_id);
        }
        $this->db->where('is_deleted', 0);
        $this->db->order_by('brand_id', 'desc');
        $get_all_brands = $this->db->get()->result_array();
        return $get_all_brands;
    }

    public function add_brand($name, $slug, $desc, $img, $status)
    {
        $data = array(
            'brand_name' => $name,
            'brand_slug' => $slug,
            'brand_desc' => $desc,
            'brand_img' => $img,
            'brand_status' => $status
        );
        $this->db->insert('ml_brands', $data);
        $add = $this->db->insert_id();
        return $add;
    }

    public function edit_brand($name, $slug, $desc, $img, $status, $brand_id)
    {
        $this->db->set('brand_name', $name);
        $this->db->set('brand_slug', $slug);
        $this->db->set('brand_desc', $desc);
        $this->db->set('brand_img', $img);
        $this->db->set('brand_status', $status);
        $this->db->where('brand_id', $brand_id);
        $this->db->update('ml_brands');

        $update = $this->db->affected_rows();
        return $update;
    }

    public function soft_delete_brand($brand_id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('brand_id', $brand_id);
        $this->db->update('ml_brands');

        $soft_delete = $this->db->affected_rows();
        return $soft_delete;
    }

    public function count_product_in_brand($brand_id)
    {
        $this->db->select('brand_id, count(product_id) as "total_item"');
        $this->db->from('ml_products');
        $this->db->where('brand_id', $brand_id);
        $count_product_in_brand = $this->db->get()->row_array();
        return $count_product_in_brand;
    }

    public function count_room_in_brand($brand_id)
    {
        $this->db->select('brand_id, count(DISTINCT room_id) as "total_room"');
        $this->db->from('ml_products');
        $this->db->where('brand_id', $brand_id);
        $count_room_in_brand = $this->db->get()->row_array();
        return $count_room_in_brand;
    }

    public function count_cat_in_brand($brand_id)
    {
        $this->db->select('brand_id, count(DISTINCT cat_id) as "total_cat"');
        $this->db->from('ml_products');
        $this->db->where('brand_id', $brand_id);
        $count_cat_in_brand = $this->db->get()->row_array();
        return $count_cat_in_brand;
    }
    //////////////////////// BRAND END ////////////////////////

    //////////////////////// ROOM START ////////////////////////

    public function get_all_rooms($room_id = 0)
    {
        $this->db->select('*');
        $this->db->from('ml_rooms');
        if ($room_id) {
            $this->db->where('room_id', $room_id);
        }
        $this->db->where('is_deleted', 0);
        $this->db->order_by('room_id', 'desc');
        $get_all_rooms = $this->db->get()->result_array();

        return $get_all_rooms;
    }

    public function add_room($name, $slug, $img, $status)
    {
        $data = array(
            'room_name' => $name,
            'room_slug' => $slug,
            'room_img' => $img,
            'room_status' => $status
        );
        $this->db->insert('ml_rooms', $data);
        $add = $this->db->insert_id();
        return $add;
    }

    public function edit_room($name, $slug, $img, $status, $room_id)
    {
        $this->db->set('room_name', $name);
        $this->db->set('room_slug', $slug);
        $this->db->set('room_img', $img);
        $this->db->set('room_status', $status);
        $this->db->where('room_id', $room_id);
        $this->db->update('ml_rooms');

        $update = $this->db->affected_rows();
        return $update;
    }

    public function soft_delete_room($room_id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('room_id', $room_id);
        $this->db->update('ml_rooms');

        $soft_delete = $this->db->affected_rows();
        return $soft_delete;
    }

    public function count_item_in_room($room_id)
    {
        $this->db->select('count(product_id) as "total_item"');
        $this->db->from('ml_products');
        $this->db->where('room_id', $room_id);
        $count_item_in_room = $this->db->get()->row_array();
        return $count_item_in_room;
    }

    //////////////////////// ROOM END ////////////////////////

    //////////////////////// CATEGORY START ////////////////////////

    public function get_all_cats($cat_id = 0)
    {
        $this->db->select('*');
        $this->db->from('ml_category');
        if ($cat_id) {
            $this->db->where('cat_id', $cat_id);
        }
        $this->db->where('is_deleted', 0);
        $this->db->order_by('cat_id', 'desc');
        $get_all_cats = $this->db->get()->result_array();

        return $get_all_cats;
    }

    public function add_cat($name, $slug, $img, $status)
    {
        $data = array(
            'cat_name' => $name,
            'cat_slug' => $slug,
            'cat_img' => $img,
            'cat_status' => $status
        );
        $this->db->insert('ml_category', $data);
        $add = $this->db->insert_id();
        return $add;
    }

    public function edit_cat($name, $slug, $img, $status, $cat_id)
    {
        $this->db->set('cat_name', $name);
        $this->db->set('cat_slug', $slug);
        $this->db->set('cat_img', $img);
        $this->db->set('cat_status', $status);
        $this->db->where('cat_id', $cat_id);
        $this->db->update('ml_category');

        $update = $this->db->affected_rows();
        return $update;
    }

    public function soft_delete_cat($cat_id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('cat_id', $cat_id);
        $this->db->update('ml_category');

        $soft_delete = $this->db->affected_rows();
        return $soft_delete;
    }

    public function count_item_in_cat($cat_id)
    {
        $this->db->select('count(product_id) as "total_item"');
        $this->db->from('ml_products');
        $this->db->where('cat_id', $cat_id);
        $count_item_in_cat = $this->db->get()->row_array();
        return $count_item_in_cat;
    }
    //////////////////////// CATEGORY END ////////////////////////

    //////////////////////// STORE START ////////////////////////

    public function get_all_stores($store_id = 0)
    {
        $this->db->select('*');
        $this->db->from('ml_sto');
        if ($store_id) {
            $this->db->where('store_id', $store_id);
        }
        $this->db->where('is_deleted', 0);
        $this->db->order_by('store_id', 'desc');
        $get_all_stores = $this->db->get()->result_array();

        return $get_all_stores;
    }

    public function add_store($name, $address, $wa, $default_text, $phone, $gmap, $img, $order, $status)
    {
        $data = array(
            'store_name' => $name,
            'store_addrs' => $address,
            'store_wa' => $wa,
            'store_default_text' => $default_text,
            'store_phone' => $phone,
            'store_gmap' => $gmap,
            'store_img' => $img,
            'store_order' => $order,
            'store_status' => $status,
        );
        $this->db->insert('ml_sto', $data);
        $add = $this->db->insert_id();
        return $add;
    }

    public function edit_store($name, $address, $wa, $default_text, $phone, $gmap, $img, $order, $status, $store_id)
    {
        $this->db->set('store_name', $name);
        $this->db->set('store_addrs', $address);
        $this->db->set('store_wa', $wa);
        $this->db->set('store_default_text', $default_text);
        $this->db->set('store_phone', $phone);
        $this->db->set('store_gmap', $gmap);
        $this->db->set('store_img', $img);
        $this->db->set('store_order', $order);
        $this->db->set('store_status', $status);
        $this->db->where('store_id', $store_id);
        $this->db->update('ml_sto');

        $update = $this->db->affected_rows();
        return $update;
    }

    public function soft_delete_store($store_id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('store_id', $store_id);
        $this->db->update('ml_sto');

        $soft_delete = $this->db->affected_rows();
        return $soft_delete;
    }

    //////////////////////// STORE END ////////////////////////

    //////////////////////// TRASH START ////////////////////////

    public function get_trash($table, $label)
    {
        $this->db->select($label . '_id as ID, ' . $label . '_name as Name');
        $this->db->from($table);
        $this->db->where('is_deleted', 1);
        $this->db->order_by($label . '_id', 'desc');
        $get_trash = $this->db->get()->result_array();

        return $get_trash;
    }

    public function count_trash($table, $label)
    {
        $this->db->select('count(' . $label . '_id) as qty');
        $this->db->from($table);
        $this->db->where('is_deleted', 1);
        $count_trash = $this->db->get()->row_array();

        return $count_trash;
    }

    public function restore_trash($id, $table, $label)
    {
        $this->db->set('is_deleted', 0);
        $this->db->set($label . '_status', 0);
        $this->db->where($label . '_id', $id);
        $this->db->update($table);

        $restore_trash = $this->db->affected_rows();
        return $restore_trash;
    }

    public function delete_trash($id, $table, $label)
    {
        $this->db->where('is_deleted', 1);
        $this->db->where($label . '_id', $id);
        $this->db->delete($table);

        $delete_trash = $this->db->affected_rows();
        return $delete_trash;
    }

    //////////////////////// TRASH END ////////////////////////

    //////////////////////// GROUP START ////////////////////////

    public function get_all_groups($group_id = 0)
    {
        $this->db->select('*');
        $this->db->from('ml_group');
        if ($group_id) {
            $this->db->where('group_id', $group_id);
        }
        $this->db->where('is_deleted', 0);
        $this->db->order_by('group_id', 'desc');
        $get_all_groups = $this->db->get()->result_array();

        return $get_all_groups;
    }

    public function add_group($name, $items, $status)
    {
        $data = array(
            'group_name' => $name,
            'group_items' => $items,
            'group_status' => $status
        );
        $this->db->insert('ml_group', $data);
        $add = $this->db->insert_id();
        return $add;
    }

    public function edit_group($name, $items, $status, $group_id)
    {
        $this->db->set('group_name', $name);
        $this->db->set('group_items', $items);
        $this->db->set('group_status', $status);
        $this->db->where('group_id', $group_id);
        $this->db->update('ml_group');

        $update = $this->db->affected_rows();
        return $update;
    }

    public function selected_group_items($items, $string_items)
    {
        $this->db->select('product_id, product_name, product_slug, product_thumbnail, brand_name');
        $this->db->from('ml_products');
        $this->db->join('ml_brands', 'ml_brands.brand_id = ml_products.brand_id');
        $this->db->where_in('product_id', $items);
        $this->db->where('product_status', 1);
        $this->db->where('ml_products.is_deleted', 0);
        $this->db->order_by('FIELD(product_id,' . $string_items . ')');

        $selected_group_items = $this->db->get()->result_array();
        return $selected_group_items;
    }

    public function soft_delete_group($group_id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('group_id', $group_id);
        $this->db->update('ml_group');

        $soft_delete = $this->db->affected_rows();
        return $soft_delete;
    }
    //////////////////////// GROUP END ////////////////////////

    //////////////////////// PROJECT START ////////////////////////

    public function get_all_projects($project_id = 0)
    {
        $this->db->select('*');
        $this->db->from('ml_project');
        if ($project_id) {
            $this->db->where('project_id', $project_id);
        }
        $this->db->where('is_deleted', 0);
        $this->db->order_by('project_id', 'desc');
        $get_all_projects = $this->db->get()->result_array();

        return $get_all_projects;
    }

    public function add_project($title, $images, $designer=0, $products=0, $status)
    {
        $data = array(
            'project_name' => $title,
            'project_img' => $images,
            'designer_id' => $designer,
            'product_id' => $products,
            'project_status' => $status,
        );
        $this->db->insert('ml_project', $data);
        $add = $this->db->insert_id();
        return $add;
    }

    public function edit_project($title, $images, $designer=0, $products=0, $status, $project_id)
    {
        $this->db->set('project_name', $title);
        $this->db->set('project_img', $images);
        $this->db->set('designer_id', $designer);
        $this->db->set('product_id', $products);
        $this->db->set('project_status', $status);
        $this->db->where('project_id', $project_id);
        $this->db->update('ml_project');

        $update = $this->db->affected_rows();
        return $update;
    }

    public function soft_delete_project($project_id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('project_id', $project_id);
        $this->db->update('ml_project');

        $soft_delete = $this->db->affected_rows();
        return $soft_delete;
    }

    public function get_all_designer(){
        $this->db->select('*');
        $this->db->from('ml_designer_studio');
        $get_all_designer = $this->db->get()->result_array();
        return $get_all_designer;
    }

    //////////////////////// PROJECT END ////////////////////////

    //////////////////////// LOGIN START ////////////////////////

    public function check_email($email)
    {
        $webapp = $this->load->database('webapp', TRUE);
        $webapp->select('count(admin_email) as Exist, admin_email');
        $webapp->from('ad_admin_data');
        $webapp->where('admin_email', $email);
        $check_email = $webapp->get()->row_array();

        return $check_email;
    }

    public function check_pass($email)
    {
        $webapp = $this->load->database('webapp', TRUE);
        $webapp->select('admin_pass as Pass');
        $webapp->from('ad_admin_data');
        $webapp->where('admin_email', $email);
        $check_pass = $webapp->get()->row_array();

        return $check_pass;
    }
    //////////////////////// LOGIN END ////////////////////////

    //////////////////////// Product START ////////////////////////
    public function add_product($name, $slug, $content, $brand, $room, $cat, $thumbnail, $status)
    {
        $data = array(
            'product_name' => $name,
            'product_slug' => $slug,
            'product_content' => $content,
            'brand_id' => $brand,
            'room_id' => $room,
            'cat_id' => $cat,
            'product_thumbnail' => $thumbnail,
            'product_status' => $status
        );
        $this->db->insert('ml_products', $data);
        $add = $this->db->insert_id();
        return $add;
    }

    public function edit_product($name, $slug, $content = 0, $brand, $room, $cat, $thumbnail, $status, $product_id)
    {
        $this->db->set('product_name', $name);
        $this->db->set('product_slug', $slug);
        if ($content) {
            $this->db->set('product_content', $content);
        }
        $this->db->set('brand_id', $brand);
        $this->db->set('room_id', $room);
        $this->db->set('cat_id', $cat);
        $this->db->set('product_thumbnail', $thumbnail);
        $this->db->set('product_status', $status);
        $this->db->where('product_id', $product_id);
        $this->db->update('ml_products');

        $update = $this->db->affected_rows();
        return $update;
    }

    public function get_all_products($product_id = 0)
    {
        $this->db->select('*');
        $this->db->from('ml_products');
        $this->db->join('ml_brands', 'ml_brands.brand_id = ml_products.brand_id');
        $this->db->join('ml_rooms', 'ml_rooms.room_id = ml_products.room_id');
        $this->db->join('ml_category', 'ml_category.cat_id = ml_products.cat_id');
        if ($product_id) {
            $this->db->where('product_id', $product_id);
        }
        $this->db->where('ml_products.is_deleted', 0);
        $this->db->order_by('product_id', 'desc');
        $get_all_products = $this->db->get()->result_array();

        return $get_all_products;
    }

    public function get_avail_products()
    {
        $this->db->select('*');
        $this->db->from('ml_products');
        $this->db->join('ml_brands', 'ml_brands.brand_id = ml_products.brand_id');
        $this->db->join('ml_rooms', 'ml_rooms.room_id = ml_products.room_id');
        $this->db->join('ml_category', 'ml_category.cat_id = ml_products.cat_id');
        $this->db->where('product_status', 1);
        $this->db->where('ml_products.is_deleted', 0);
        $get_all_products = $this->db->get()->result_array();

        return $get_all_products;
    }

    public function soft_delete_product($product_id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('product_id', $product_id);
        $this->db->update('ml_products');

        $soft_delete = $this->db->affected_rows();
        return $soft_delete;
    }
    //////////////////////// Product END ////////////////////////

    //////////////////////// RESET START ////////////////////////

    public function admin_reset_request($admin_email)
    {
        $this->load->helper('date');

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 12; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $data = array(
            'reset_token' => $randomString,
            'date_created' => now(),
            'date_expired' => now() + 300,
            'admin_email' => $admin_email
        );

        $this->db->insert('ml_admin_reset', $data);

        return $randomString;
    }

    //////////////////////// RESET END ////////////////////////

    public function reset_request($email, $token_string)
    {
        $data = array(
            'admin_email' => $email,
            'reset_token' => $token_string,
            'date_created' => now(),
            'date_expired' => now() + 300
        );

        $this->db->insert('ml_admin_reset', $data);
        $add = $this->db->insert_id();
        return $add;
    }

    public function check_reset_token($token_string){
        $this->db->select('*');
        $this->db->from('ml_admin_reset');
        $this->db->where('reset_token', $token_string);

        $check = $this->db->get()->row_array();
        return $check;
    }

    public function new_password($email, $password)
    {
        $webapp = $this->load->database('webapp', TRUE);

        $new_hash = password_hash($password, PASSWORD_DEFAULT);
        $webapp->set('admin_pass', $new_hash);
        $webapp->where('admin_email', $email);
        $webapp->update('ad_admin_data');

        $soft_delete = $webapp->affected_rows();
        return $soft_delete;
    }

    //Send Reset Request Email
    public function send_email($email_tujuan, $judul, $body)
    {
        $this->load->helper('date');

        $kode = rand(1111, 9999);
        $email = $email_tujuan;
        $judul = $judul;
        $body = $body;
        /*
        $data = array(
            'otp_email' => $email,
            'otp_code' => $kode,
            'otp_medium' => 'email',
            'date_created' => now(),
            'date_expired' => now()+300
        );*/

        //$this->db->insert('otp_request', $data);

        $subject = $judul;
        $sender = "auto-services";
        $symbol_send = "@";
        $domain_send = "maisonliving.id";
        $sendergroup = $sender . $symbol_send . $domain_send;
        $secret = 'zpcmcpgnxonutjfe';

        $config = [
            'protocol' => 'smtp',
            'priority' => 2,
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => $sendergroup,
            'smtp_pass' => $secret,
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from($sendergroup, 'Maison Living | Auto-Services');
        $this->email->to($email);
        $this->email->subject('' . $subject);
        $this->email->message('' . $body);

        $send = $this->email->send();

        return $send;
    }
}
