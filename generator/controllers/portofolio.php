<?php

class portofolio extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('portofolio_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/portofolio/index/',
            'total_rows' => $this->db->count_all('portofolio'),
            'per_page' => 5,
        );
        $this->pagination->initialize($config);
        $data['content'] = 'portofolio_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['portofolios'] = $this->portofolio_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'title_portofolio',
                'label' => 'title_portofolio',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'content_portofolio',
                'label' => 'content_portofolio',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'pict_tumbh',
                'label' => 'pict_tumbh',
                'rules' => 'required'
            ),
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->portofolio_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('portofolio');
            }
        }
        $data['content'] = 'form_portofolio';
        $data['type_form'] = 'post';
        $this->load->view('template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->portofolio_model->get_one($id);
            $data['content'] = 'form_portofolio';
            $data['type_form'] = 'update';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('portofolio');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'title_portofolio',
                'label' => 'title_portofolio',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'content_portofolio',
                'label' => 'content_portofolio',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'pict_tumbh',
                'label' => 'pict_tumbh',
                'rules' => 'required'
            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->portofolio_model->update($this->input->post('id_portofolio'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('portofolio');
            }
        } else {
            $this->form_update($this->input->post('id_portofolio'));
        }
    }

    function delete() {
        if (isset($_POST['id_portofolio'])) {
            $this->portofolio_model->delete($_POST['id_portofolio']);
            
                $this->portofolio_model->update($this->input->post('id_category_portofolio'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('portofolio');
            }
        } else {
            $this->form_update($this->input->post('id_category_portofolio'));
        }
    }

    function delete() {
        if (isset($_POST['id_category_portofolio'])) {
            $this->portofolio_model->delete($_POST['id_category_portofolio']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('portofolio');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('portofolio');
        }
    }

}

?>
