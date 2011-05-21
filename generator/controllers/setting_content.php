<?php

class setting_content extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('setting_content_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/setting_content/index/',
            'total_rows' => $this->db->count_all('setting_content'),
            'per_page' => 5,
        );
        $this->pagination->initialize($config);
        $data['content'] = 'setting_content_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['setting_contents'] = $this->setting_content_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'title_setting',
                'label' => 'title_setting',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'content_setting',
                'label' => 'content_setting',
                'rules' => 'required'
            ),
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->setting_content_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('setting_content');
            }
        }
        $data['content'] = 'form_setting_content';
        $data['type_form'] = 'post';
        $this->load->view('template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->setting_content_model->get_one($id);
            $data['content'] = 'form_setting_content';
            $data['type_form'] = 'update';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('setting_content');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'title_setting',
                'label' => 'title_setting',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'content_setting',
                'label' => 'content_setting',
                'rules' => 'required'
            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->setting_content_model->update($this->input->post('id_setting'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('setting_content');
            }
        } else {
            $this->form_update($this->input->post('id_setting'));
        }
    }

    function delete() {
        if (isset($_POST['id_setting'])) {
            $this->setting_content_model->delete($_POST['id_setting']);
            
                $this->setting_content_model->update($this->input->post('id_category_setting'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('setting_content');
            }
        } else {
            $this->form_update($this->input->post('id_category_setting'));
        }
    }

    function delete() {
        if (isset($_POST['id_category_setting'])) {
            $this->setting_content_model->delete($_POST['id_category_setting']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('setting_content');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('setting_content');
        }
    }

}

?>
