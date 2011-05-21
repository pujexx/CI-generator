<?php

class Log_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('log', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id_log', $id);
        $result = $this->db->get('log');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'time' => $this->input->post('time', TRUE),
           
            'date' => $this->input->post('date', TRUE),
           
            'name_log' => $this->input->post('name_log', TRUE),
           
        );
        $this->db->insert('log', $data);
    }

    function update($id) {
        $data = array(
         
       'time' => $this->input->post('time', TRUE),
       
       'date' => $this->input->post('date', TRUE),
       
       'name_log' => $this->input->post('name_log', TRUE),
       
        );
        $this->db->where('id_log', $id);
        $this->db->update('log', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id_log', $sip);
            $this->db->delete('log');
        }
    }

}
?>
