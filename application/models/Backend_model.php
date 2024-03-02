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

    public function get_all_products()
    {
        $this->db->select('*');
        $this->db->from('ml_products');
        $this->db->join('ml_brands', 'ml_brands.brand_id = ml_products.brand_id');
        $this->db->join('ml_rooms', 'ml_rooms.room_id = ml_products.room_id');
        $this->db->join('ml_category', 'ml_category.cat_id = ml_products.cat_id');
        $get_all_products = $this->db->get()->result_array();

        return $get_all_products;
    }
}
