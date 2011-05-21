<?php

class Category_setting_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('category_setting', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id_category_setting', $id);
        $result = $this->db->get('category_setting');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'title_category_setting' => $this->input->post('title_category_setting', TRUE),
           
        );
        $this->db->insert('category_setting', $data);
    }

    function update($id) {
        $data = array(
         
       'title_category_setting' => $this->input->post('title_category_setting', TRUE),
       
        );
        $this->db->where('id_category_setting', $id);
        $this->db->update('category_setting', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_category_setting', $sip);
            $this->db->delete('category_setting');
        }
    }

}
?>
