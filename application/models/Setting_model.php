<?php

class Setting_model extends CI_Model
{
    //Get Setting Value
    public function get_setting_value($setting_name)
    {
        $this->db->select('setting_value');
        $this->db->from('ml_settings');
        $this->db->where('setting_name', $setting_name);
        $get_setting_value = $this->db->get()->row_array();

        return $get_setting_value['setting_value'];
    }
}