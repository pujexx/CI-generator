<?php

class log extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('log_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/log/index/',
            'total_rows' => $this->db->count_all('log'),
            'per_page' => 5,
        );
        $this->pagination->initialize($config);
        $data['content'] = 'log_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['logs'] = $this->log_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'time',
                'label' => 'time',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'date',
                'label' => 'date',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'name_log',
                'label' => 'name_log',
                'rules' => 'required'
            ),
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->log_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('log');
            }
        }
        $data['content'] = 'form_log';
        $data['type_form'] = 'post';
        $this->load->view('template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->log_model->get_one($id);
            $data['content'] = 'form_log';
            $data['type_form'] = 'update';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('log');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'time',
                'label' => 'time',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'date',
                'label' => 'date',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'name_log',
                'label' => 'name_log',
                'rules' => 'required'
            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->log_model->update($this->input->post('id_log'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('log');
            }
        } else {
            $this->form_update($this->input->post('id_log'));
        }
    }

    function delete() {
        if (isset($_POST['id_log'])) {
            $this->log_model->delete($_POST['id_log']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('log');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('log');
        }
    }

}

?>
