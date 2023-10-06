<?php

class Collection_model extends CI_Model
{
    public function get_all_rooms($exclude = '0')
    {
        $this->db->select('*');
        $this->db->from('ml_rooms');
        $this->db->where('room_status', 1);
        $this->db->where_not_in('room_slug', $exclude);
        $get_all_rooms = $this->db->get()->result_array();

        return $get_all_rooms;
    }

    public function get_all_cats($exclude = '0')
    {
        $this->db->select('*');
        $this->db->from('ml_category');
        $this->db->where('cat_status', 1);
        $this->db->where_not_in('cat_slug', $exclude);
        $get_all_cats = $this->db->get()->result_array();

        return $get_all_cats;
    }

    public function get_spesific_room($room_slug){
        $this->db->select('*');
        $this->db->from('ml_rooms');
        $this->db->where('room_status', 1);
        $this->db->where('room_slug', $room_slug);
        $get_spesific_room = $this->db->get()->row_array();

        return $get_spesific_room;
    }

    public function get_spesific_cat($cat_slug){
        $this->db->select('*');
        $this->db->from('ml_category');
        $this->db->where('cat_status', 1);
        $this->db->where('cat_slug', $cat_slug);
        $get_spesific_cat = $this->db->get()->row_array();

        return $get_spesific_cat;
    }

    public function get_products($brand_id = 0, $room_id = 0, $cat_id = 0, $page=1){
        $this->db->select('*');
        $this->db->from('ml_products');
        $this->db->where('product_status', 1);
        if($brand_id){
            $this->db->where('brand_id', $brand_id);
        }
        if($room_id){
            $this->db->like('room_id', $room_id);
        }
        if($cat_id){
            $this->db->where('cat_id', $cat_id);
        }
        $this->db->order_by('product_name', 'ASC');
        $this->db->limit(8, (8*($page-1)));
        $get_products = $this->db->get()->result_array();
        

        return $get_products;
    }

    public function get_count_products($brand_id = 0, $room_id = 0, $cat_id = 0){
        $this->db->select('product_id');
        $this->db->from('ml_products');
        $this->db->where('product_status', 1);
        if($brand_id){
            $this->db->where('brand_id', $brand_id);
        }
        if($room_id){
            $this->db->like('room_id', $room_id);
        }
        if($cat_id){
            $this->db->where('cat_id', $cat_id);
        }
        
        $get_count_products = $this->db->get()->result_array();
        

        return count($get_count_products);
    }

    public function get_spesific_product($product_slug){
        $this->db->select('*');
        $this->db->from('ml_products');
        $this->db->join('ml_brands', 'ml_brands.brand_id = ml_products.brand_id');
        $this->db->join('ml_category', 'ml_category.cat_id = ml_products.cat_id');
        $this->db->where('product_status', 1);
        $this->db->where('product_slug', $product_slug);
        $get_spesific_product = $this->db->get()->row_array();

        return $get_spesific_product;
    }
}