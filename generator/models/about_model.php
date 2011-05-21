<?php

class About_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('about', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('idabout', $id);
        $result = $this->db->get('about');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'title_about' => $this->input->post('title_about', TRUE),
           
            'content_about' => $this->input->post('content_about', TRUE),
           
        );
        $this->db->insert('about', $data);
    }

    function update($id) {
        $data = array(
         
       'title_about' => $this->input->post('title_about', TRUE),
       
       'content_about' => $this->input->post('content_about', TRUE),
       
        );
        $this->db->where('idabout', $id);
        $this->db->update('about', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('idabout', $sip);
            $this->db->delete('about');
        }
    }

}
?>
