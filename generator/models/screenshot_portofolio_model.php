<?php

class Screenshot_portofolio_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('screenshot_portofolio', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id_screenshot_portofolio', $id);
        $result = $this->db->get('screenshot_portofolio');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'title_screenshot' => $this->input->post('title_screenshot', TRUE),
           
        );
        $this->db->insert('screenshot_portofolio', $data);
    }

    function update($id) {
        $data = array(
         
       'title_screenshot' => $this->input->post('title_screenshot', TRUE),
       
        );
        $this->db->where('id_screenshot_portofolio', $id);
        $this->db->update('screenshot_portofolio', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_screenshot_portofolioid_portofolio', $id);
        $result = $this->db->get('screenshot_portofolio');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'title_screenshot' => $this->input->post('title_screenshot', TRUE),
           
        );
        $this->db->insert('screenshot_portofolio', $data);
    }

    function update($id) {
        $data = array(
         
       'title_screenshot' => $this->input->post('title_screenshot', TRUE),
       
        );
        $this->db->where('id_portofolio', $id);
        $this->db->update('screenshot_portofolio', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_portofolio', $sip);
            $this->db->delete('screenshot_portofolio');
        }
    }

}
?>
