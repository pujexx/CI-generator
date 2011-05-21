<?php

class Category_portofolio_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('category_portofolio', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id_category_portofolio', $id);
        $result = $this->db->get('category_portofolio');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'title_category_portofolio' => $this->input->post('title_category_portofolio', TRUE),
           
        );
        $this->db->insert('category_portofolio', $data);
    }

    function update($id) {
        $data = array(
         
       'title_category_portofolio' => $this->input->post('title_category_portofolio', TRUE),
       
        );
        $this->db->where('id_category_portofolio', $id);
        $this->db->update('category_portofolio', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_category_portofolio', $sip);
            $this->db->delete('category_portofolio');
        }
    }

}
?>
