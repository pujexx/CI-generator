<?php

class Setting_content_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('setting_content', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id_setting', $id);
        $result = $this->db->get('setting_content');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'title_setting' => $this->input->post('title_setting', TRUE),
           
            'content_setting' => $this->input->post('content_setting', TRUE),
           
        );
        $this->db->insert('setting_content', $data);
    }

    function update($id) {
        $data = array(
         
       'title_setting' => $this->input->post('title_setting', TRUE),
       
       'content_setting' => $this->input->post('content_setting', TRUE),
       
        );
        $this->db->where('id_setting', $id);
        $this->db->update('setting_content', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_settingid_category_setting', $id);
        $result = $this->db->get('setting_content');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'title_setting' => $this->input->post('title_setting', TRUE),
           
            'content_setting' => $this->input->post('content_setting', TRUE),
           
        );
        $this->db->insert('setting_content', $data);
    }

    function update($id) {
        $data = array(
         
       'title_setting' => $this->input->post('title_setting', TRUE),
       
       'content_setting' => $this->input->post('content_setting', TRUE),
       
        );
        $this->db->where('id_category_setting', $id);
        $this->db->update('setting_content', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_category_setting', $sip);
            $this->db->delete('setting_content');
        }
    }

}
?>
