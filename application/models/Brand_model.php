<?php

class Brand_model extends CI_Model
{
    public function get_all_brands($exclude = '0')
    {
        $this->db->select('*');
        $this->db->from('ml_brands');
        $this->db->where('brand_status', 1);
        $this->db->where_not_in('brand_slug', $exclude);
        $get_all_brands = $this->db->get()->result_array();

        return $get_all_brands;
    }

    public function get_spesific_brand($brand_slug){
        $this->db->select('*');
        $this->db->from('ml_brands');
        $this->db->where('brand_status', 1);
        $this->db->where('brand_slug', $brand_slug);
        $get_spesific_brand = $this->db->get()->row_array();

        return $get_spesific_brand;
    }
}
