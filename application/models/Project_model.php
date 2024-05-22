<?php

class Project_model extends CI_Model
{
    //POV Visitor, jadi statusnya harus ON
    public function get_all_projects()
    {
        $this->db->select('*');
        $this->db->from('ml_project');
        $this->db->where('project_status', 1);
        $get_all_projects = $this->db->get()->result_array();

        return $get_all_projects;
    }

    //POV Visitor, jadi statusnya harus ON
    public function get_spesific_project($id)
    {
        $this->db->select('*');
        $this->db->from('ml_project');
        $this->db->where('project_id', $id);
        $this->db->where('project_status', 1);
        $get_spesific_project = $this->db->get()->row_array();

        return $get_spesific_project;
    }
}