<?php

class Backend_model extends CI_Model
{
    public function get_all_brands()
    {
        $this->db->select('*');
        $this->db->from('ml_brands');
        $get_all_brands = $this->db->get()->result_array();

        return $get_all_brands;
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