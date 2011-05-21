<?php

class contact extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('contact_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/contact/index/',
            'total_rows' => $this->db->count_all('contact'),
            'per_page' => 5,
        );
        $this->pagination->initialize($config);
        $data['content'] = 'contact_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['contacts'] = $this->contact_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'title_contact',
                'label' => 'title_contact',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'content_contact',
                'label' => 'content_contact',
                'rules' => 'required'
            ),
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->contact_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('contact');
            }
        }
        $data['content'] = 'form_contact';
        $data['type_form'] = 'post';
        $this->load->view('template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->contact_model->get_one($id);
            $data['content'] = 'form_contact';
            $data['type_form'] = 'update';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('contact');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'title_contact',
                'label' => 'title_contact',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'content_contact',
                'label' => 'content_contact',
                'rules' => 'required'
            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->contact_model->update($this->input->post('id_contact'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('contact');
            }
        } else {
            $this->form_update($this->input->post('id_contact'));
        }
    }

    function delete() {
        if (isset($_POST['id_contact'])) {
            $this->contact_model->delete($_POST['id_contact']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('contact');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('contact');
        }
    }

}

?>
