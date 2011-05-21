<?php

class about extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('about_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/about/index/',
            'total_rows' => $this->db->count_all('about'),
            'per_page' => 5,
        );
        $this->pagination->initialize($config);
        $data['content'] = 'about_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['abouts'] = $this->about_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('template', $data);
    }

    function add() {
        $config = array(
        
            array(
                'field' => 'title_about',
                'label' => 'title_about',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'content_about',
                'label' => 'content_about',
                'rules' => 'required'
            ),
            
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->about_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('about');
            }
        }
        $data['content'] = 'form_about';
        $data['type_form'] = 'post';
        $this->load->view('template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->about_model->get_one($id);
            $data['content'] = 'form_about';
            $data['type_form'] = 'update';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('about');
        }
    }

    function update() {
        $config = array(
          
            array(
                'field' => 'title_about',
                'label' => 'title_about',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'content_about',
                'label' => 'content_about',
                'rules' => 'required'
            ),
            
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            
                $this->about_model->update($this->input->post('idabout'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('about');
            }
        } else {
            $this->form_update($this->input->post('idabout'));
        }
    }

    function delete() {
        if (isset($_POST['idabout'])) {
            $this->about_model->delete($_POST['idabout']);
            
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('about');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('about');
        }
    }

}

?>
