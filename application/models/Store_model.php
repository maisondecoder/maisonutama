<?php

class Store_model extends CI_Model
{
    public function get_all_stores()
    {
        $this->db->select('*');
        $this->db->from('ml_sto');
        $this->db->where('store_status', 1);
        $this->db->where('is_deleted', 0);
        $get_all_stores = $this->db->get()->result_array();

        return $get_all_stores;
    }
}