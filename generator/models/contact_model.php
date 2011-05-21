<?php

class Contact_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('contact', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id_contact', $id);
        $result = $this->db->get('contact');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'title_contact' => $this->input->post('title_contact', TRUE),
           
            'content_contact' => $this->input->post('content_contact', TRUE),
           
        );
        $this->db->insert('contact', $data);
    }

    function update($id) {
        $data = array(
         
       'title_contact' => $this->input->post('title_contact', TRUE),
       
       'content_contact' => $this->input->post('content_contact', TRUE),
       
        );
        $this->db->where('id_contact', $id);
        $this->db->update('contact', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_contact', $sip);
            $this->db->delete('contact');
        }
    }

}
?>
