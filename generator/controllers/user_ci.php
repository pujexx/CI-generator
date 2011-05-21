<?php

class user_ci extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_ci_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/user_ci/index/',
            'total_rows' => $this->db->count_all('user_ci'),
            'per_page' => 5,
        );
        $this->pagination->initialize($config);
        $data['content'] = 'user_ci_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['user_cis'] = $this->user_ci_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'level',
                'label' => 'level',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'status',
                'label' => 'status',
                'rules' => 'required'
            ),
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->user_ci_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('user_ci');
            }
        }
        $data['content'] = 'form_user_ci';
        $data['type_form'] = 'post';
        $this->load->view('template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->user_ci_model->get_one($id);
            $data['content'] = 'form_user_ci';
            $data['type_form'] = 'update';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('user_ci');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'level',
                'label' => 'level',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'status',
                'label' => 'status',
                'rules' => 'required'
            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->user_ci_model->update($this->input->post('id'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('user_ci');
            }
        } else {
            $this->form_update($this->input->post('id'));
        }
    }

    function delete() {
        if (isset($_POST['id'])) {
            $this->user_ci_model->delete($_POST['id']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('user_ci');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('user_ci');
        }
    }

}

?>
