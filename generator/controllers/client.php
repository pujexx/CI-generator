<?php

class client extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('client_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/client/index/',
            'total_rows' => $this->db->count_all('client'),
            'per_page' => 5,
        );
        $this->pagination->initialize($config);
        $data['content'] = 'client_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['clients'] = $this->client_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'name_client',
                'label' => 'name_client',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'content_client',
                'label' => 'content_client',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'client_tumbh',
                'label' => 'client_tumbh',
                'rules' => 'required'
            ),
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->client_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('client');
            }
        }
        $data['content'] = 'form_client';
        $data['type_form'] = 'post';
        $this->load->view('template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->client_model->get_one($id);
            $data['content'] = 'form_client';
            $data['type_form'] = 'update';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('client');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'name_client',
                'label' => 'name_client',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'content_client',
                'label' => 'content_client',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'client_tumbh',
                'label' => 'client_tumbh',
                'rules' => 'required'
            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->client_model->update($this->input->post('id_client'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('client');
            }
        } else {
            $this->form_update($this->input->post('id_client'));
        }
    }

    function delete() {
        if (isset($_POST['id_client'])) {
            $this->client_model->delete($_POST['id_client']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('client');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('client');
        }
    }

}

?>
