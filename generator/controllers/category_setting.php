<?php

class category_setting extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_setting_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/category_setting/index/',
            'total_rows' => $this->db->count_all('category_setting'),
            'per_page' => 5,
        );
        $this->pagination->initialize($config);
        $data['content'] = 'category_setting_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['category_settings'] = $this->category_setting_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'title_category_setting',
                'label' => 'title_category_setting',
                'rules' => 'required'
            ),
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->category_setting_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('category_setting');
            }
        }
        $data['content'] = 'form_category_setting';
        $data['type_form'] = 'post';
        $this->load->view('template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->category_setting_model->get_one($id);
            $data['content'] = 'form_category_setting';
            $data['type_form'] = 'update';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('category_setting');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'title_category_setting',
                'label' => 'title_category_setting',
                'rules' => 'required'
            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->category_setting_model->update($this->input->post('id_category_setting'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('category_setting');
            }
        } else {
            $this->form_update($this->input->post('id_category_setting'));
        }
    }

    function delete() {
        if (isset($_POST['id_category_setting'])) {
            $this->category_setting_model->delete($_POST['id_category_setting']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('category_setting');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('category_setting');
        }
    }

}

?>
