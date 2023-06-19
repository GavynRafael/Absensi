<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['tittle'] = 'Absen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/absen', $data);
            $this->load->view('templates/footer');
        } else {

            $foto = $_FILES['foto']['name'];
            if ($foto) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                } else {
                    echo $this->upload->display_errors();
                }
            }

            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'id_user' => ($this->input->post('id_user')),
                'status' => ($this->input->post('status')),
                'image' => $foto,
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('riwayat_absen', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Absensi Berhasil 
		  </div>');
            redirect('user');
        }
    }
}
