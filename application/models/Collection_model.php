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
}