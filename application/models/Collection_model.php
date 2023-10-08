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

    public function get_spesific_room($room_slug)
    {
        $this->db->select('*');
        $this->db->from('ml_rooms');
        $this->db->where('room_status', 1);
        $this->db->where('room_slug', $room_slug);
        $get_spesific_room = $this->db->get()->row_array();

        return $get_spesific_room;
    }

    public function get_spesific_cat($cat_slug)
    {
        $this->db->select('*');
        $this->db->from('ml_category');
        $this->db->where('cat_status', 1);
        $this->db->where('cat_slug', $cat_slug);
        $get_spesific_cat = $this->db->get()->row_array();

        return $get_spesific_cat;
    }

    public function get_products($brand_id = 0, $room_id = 0, $cat_id = 0, $page = 1)
    {
        $this->db->select('*');
        $this->db->from('ml_products');
        $this->db->where('product_status', 1);
        if ($brand_id) {
            $this->db->where('brand_id', $brand_id);
        }
        if ($room_id) {
            $this->db->like('room_id', $room_id);
        }
        if ($cat_id) {
            $this->db->where('cat_id', $cat_id);
        }
        $this->db->order_by('product_name', 'ASC');
        $this->db->limit(8, (8 * ($page - 1)));
        $get_products = $this->db->get()->result_array();


        return $get_products;
    }

    public function get_related_products($brand_id = 0, $room_id = 0, $cat_id = 0, $exclude_product = 0, $exclude_type = 0)
    {
        $this->db->select('product_slug, product_name, product_thumbnail');
        $this->db->from('ml_products');
        $this->db->where('product_status', 1);
        if ($brand_id) {
            $this->db->where('brand_id', $brand_id);
        }
        if ($room_id) {
            $this->db->like('room_id', $room_id);
        }
        if ($cat_id) {
            $this->db->where('cat_id', $cat_id);
        }
        if ($exclude_product) {
            $this->db->where_not_in('product_slug', $exclude_product);
        }
        if ($exclude_type) {
            $this->db->where_not_in('cat_id', $exclude_type);
        }
        $this->db->order_by('product_name', 'ASC');
        $this->db->limit(8, 0);
        $get_products = $this->db->get()->result_array();


        return $get_products;
    }

    public function get_count_products($brand_id = 0, $room_id = 0, $cat_id = 0)
    {
        $this->db->select('product_id');
        $this->db->from('ml_products');
        $this->db->where('product_status', 1);
        if ($brand_id) {
            $this->db->where('brand_id', $brand_id);
        }
        if ($room_id) {
            $this->db->like('room_id', $room_id);
        }
        if ($cat_id) {
            $this->db->where('cat_id', $cat_id);
        }

        $get_count_products = $this->db->get()->result_array();


        return count($get_count_products);
    }

    public function get_spesific_product($product_slug)
    {
        $this->db->select('*');
        $this->db->from('ml_products');
        $this->db->join('ml_brands', 'ml_brands.brand_id = ml_products.brand_id');
        $this->db->join('ml_rooms', 'ml_rooms.room_id = ml_products.room_id');
        $this->db->join('ml_category', 'ml_category.cat_id = ml_products.cat_id');
        $this->db->where('product_status', 1);
        $this->db->where('product_slug', $product_slug);
        $get_spesific_product = $this->db->get()->row_array();

        return $get_spesific_product;
    }

    public function get_all_catalog($brand_id)
    {
        $this->db->select("GROUP_CONCAT(product_id ORDER BY product_name ASC) AS 'PID', GROUP_CONCAT(product_name ORDER BY product_name ASC) AS 'Name', GROUP_CONCAT(product_slug ORDER BY product_name ASC) AS 'Slug', GROUP_CONCAT(product_thumbnail ORDER BY product_name ASC) AS 'Thumbnail', GROUP_CONCAT(ml_category.cat_name ORDER BY product_name ASC) AS 'Category', GROUP_CONCAT(ml_brands.brand_name ORDER BY product_name ASC) AS 'Brand', GROUP_CONCAT(ml_rooms.room_name ORDER BY product_name ASC) AS 'Room', GROUP_CONCAT(product_status ORDER BY product_name ASC) AS 'Status'");
        $this->db->from('ml_products');
        $this->db->join('ml_brands', 'ml_brands.brand_id = ml_products.brand_id');
        $this->db->join('ml_rooms', 'ml_rooms.room_id = ml_products.room_id');
        $this->db->join('ml_category', 'ml_category.cat_id = ml_products.cat_id');
        $this->db->group_by('ml_category.cat_name');
        $this->db->where('ml_products.brand_id', $brand_id);
        $get_all_catalog = $this->db->get()->result_array();

        return $get_all_catalog;
    }
}
