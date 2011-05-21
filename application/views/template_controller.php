{php_open}

class {nama_tabel} extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('{nama_tabel}_model');
    }

    function index() {

        $config = array(
            'base_url' => site_url() . '/{nama_tabel}/index/',
            'total_rows' => $this->db->count_all('{nama_tabel}'),
            'per_page' => 5,
        );
        $this->pagination->initialize($config);
        $data['content'] = '{nama_tabel}_all';
        $data['pagination'] = $this->pagination->create_links();
        $data['{nama_tabel}s'] = $this->{nama_tabel}_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('template', $data);
    }

    function add() {
        $config = array(
        {fields_tabel1}
            array(
                'field' => '{name_field_table}',
                'label' => '{name_field_table}',
                'rules' => 'required'
            ),
            {/fields_tabel1}
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('post')) {

                $this->{nama_tabel}_model->insert();
                $this->session->set_flashdata('notif', 'data has been inserted');
                redirect('{nama_tabel}');
            }
        }
        $data['content'] = 'form_{nama_tabel}';
        $data['type_form'] = 'post';
        $this->load->view('template', $data);
    }

    function form_update($id='') {
        if ($id != '') {

            $data['isi'] = $this->{nama_tabel}_model->get_one($id);
            $data['content'] = 'form_{nama_tabel}';
            $data['type_form'] = 'update';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('notif', 'no data');
            redirect('{nama_tabel}');
        }
    }

    function update() {
        $config = array(
          {fields_tabel1}
            array(
                'field' => '{name_field_table}',
                'label' => '{name_field_table}',
                'rules' => 'required'
            ),
            {/fields_tabel1}
           
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('update')) {

            {primary_key_tabel}
                $this->{nama_tabel}_model->update($this->input->post('{primary_key}'));
                $this->session->set_flashdata('notif', 'Data is updated');
                redirect('{nama_tabel}');
            }
        } else {
            $this->form_update($this->input->post('{primary_key}'));
        }
    }

    function delete() {
        if (isset($_POST['{primary_key}'])) {
            $this->{nama_tabel}_model->delete($_POST['{primary_key}']);
            {/primary_key_tabel}
             $this->session->set_flashdata('notif','data has been deleted');
                redirect('{nama_tabel}');
        } else {
            $this->session->set_flashdata('notif', 'no data deleted');
            redirect('{nama_tabel}');
        }
    }

}

{php_close}
