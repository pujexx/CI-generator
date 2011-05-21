<?php

class Client_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('client', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id_client', $id);
        $result = $this->db->get('client');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'name_client' => $this->input->post('name_client', TRUE),
           
            'content_client' => $this->input->post('content_client', TRUE),
           
            'client_tumbh' => $this->input->post('client_tumbh', TRUE),
           
        );
        $this->db->insert('client', $data);
    }

    function update($id) {
        $data = array(
         
       'name_client' => $this->input->post('name_client', TRUE),
       
       'content_client' => $this->input->post('content_client', TRUE),
       
       'client_tumbh' => $this->input->post('client_tumbh', TRUE),
       
        );
        $this->db->where('id_client', $id);
        $this->db->update('client', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_client', $sip);
            $this->db->delete('client');
        }
    }

}
?>
