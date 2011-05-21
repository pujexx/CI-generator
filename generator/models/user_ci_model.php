<?php

class User_ci_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('user_ci', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('user_ci');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'username' => $this->input->post('username', TRUE),
           
            'password' => $this->input->post('password', TRUE),
           
            'email' => $this->input->post('email', TRUE),
           
            'level' => $this->input->post('level', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
        );
        $this->db->insert('user_ci', $data);
    }

    function update($id) {
        $data = array(
         
       'username' => $this->input->post('username', TRUE),
       
       'password' => $this->input->post('password', TRUE),
       
       'email' => $this->input->post('email', TRUE),
       
       'level' => $this->input->post('level', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('user_ci', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id', $sip);
            $this->db->delete('user_ci');
        }
    }

}
?>
