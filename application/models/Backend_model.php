<?php

class Backend_model extends CI_Model
{
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

    public function get_all_rooms()
    {
        $this->db->select('*');
        $this->db->from('ml_rooms');
        $get_all_rooms = $this->db->get()->result_array();

        return $get_all_rooms;
    }

    public function get_all_cats()
    {
        $this->db->select('*');
        $this->db->from('ml_category');
        $get_all_cats = $this->db->get()->result_array();

        return $get_all_cats;
    }

    public function get_all_stores()
    {
        $this->db->select('*');
        $this->db->from('ml_sto');
        $get_all_stores = $this->db->get()->result_array();

        return $get_all_stores;
    }
}
