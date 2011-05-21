<?php

class screenshot_portofolio extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('screenshot_portofolio_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/screenshot_portofolio/index/',
            'total_rows' => $this->db->count_all('screenshot_portofolio'),
            'per_page' => 5,
        );
        $this->pagination->initialize($config);
        $data['content'] = 'screenshot_portofolio_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['screenshot_portofolios'] = $this->screenshot_portofolio_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'title_screenshot',
                'label' => 'title_screenshot',
                'rules' => 'required'
            ),
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->screenshot_portofolio_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('screenshot_portofolio');
            }
        }
        $data['content'] = 'form_screenshot_portofolio';
        $data['type_form'] = 'post';
        $this->load->view('template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->screenshot_portofolio_model->get_one($id);
            $data['content'] = 'form_screenshot_portofolio';
            $data['type_form'] = 'update';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('screenshot_portofolio');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'title_screenshot',
                'label' => 'title_screenshot',
                'rules' => 'required'
            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->screenshot_portofolio_model->update($this->input->post('id_screenshot_portofolio'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('screenshot_portofolio');
            }
        } else {
            $this->form_update($this->input->post('id_screenshot_portofolio'));
        }
    }

    function delete() {
        if (isset($_POST['id_screenshot_portofolio'])) {
            $this->screenshot_portofolio_model->delete($_POST['id_screenshot_portofolio']);
            
                $this->screenshot_portofolio_model->update($this->input->post('id_portofolio'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('screenshot_portofolio');
            }
        } else {
            $this->form_update($this->input->post('id_portofolio'));
        }
    }

    function delete() {
        if (isset($_POST['id_portofolio'])) {
            $this->screenshot_portofolio_model->delete($_POST['id_portofolio']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('screenshot_portofolio');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('screenshot_portofolio');
        }
    }

}

?>
