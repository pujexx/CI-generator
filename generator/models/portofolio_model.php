<?php

class Portofolio_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('portofolio', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id_portofolio', $id);
        $result = $this->db->get('portofolio');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'title_portofolio' => $this->input->post('title_portofolio', TRUE),
           
            'content_portofolio' => $this->input->post('content_portofolio', TRUE),
           
            'pict_tumbh' => $this->input->post('pict_tumbh', TRUE),
           
        );
        $this->db->insert('portofolio', $data);
    }

    function update($id) {
        $data = array(
         
       'title_portofolio' => $this->input->post('title_portofolio', TRUE),
       
       'content_portofolio' => $this->input->post('content_portofolio', TRUE),
       
       'pict_tumbh' => $this->input->post('pict_tumbh', TRUE),
       
        );
        $this->db->where('id_portofolio', $id);
        $this->db->update('portofolio', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_portofolioid_category_portofolio', $id);
        $result = $this->db->get('portofolio');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'title_portofolio' => $this->input->post('title_portofolio', TRUE),
           
            'content_portofolio' => $this->input->post('content_portofolio', TRUE),
           
            'pict_tumbh' => $this->input->post('pict_tumbh', TRUE),
           
        );
        $this->db->insert('portofolio', $data);
    }

    function update($id) {
        $data = array(
         
       'title_portofolio' => $this->input->post('title_portofolio', TRUE),
       
       'content_portofolio' => $this->input->post('content_portofolio', TRUE),
       
       'pict_tumbh' => $this->input->post('pict_tumbh', TRUE),
       
        );
        $this->db->where('id_category_portofolio', $id);
        $this->db->update('portofolio', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_category_portofolio', $sip);
            $this->db->delete('portofolio');
        }
    }

}
?>
