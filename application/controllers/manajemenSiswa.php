<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManajemenSiswa  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['tittle'] = 'Manajemen Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manajemen', $data);
        $this->load->view('templates/footer');
    }

    public function TambahUser()
    {


        // Set rules untuk validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Kolom {field} harus diisi!'));
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email is alredy registered!',
            'required' => 'Kolom {field} harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Kolom {field} harus diisi!'));
        $this->form_validation->set_rules('roleId', 'Role ID', 'required|in_list[1,2]', array('required' => 'pilih {field} terlebih dahulu'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('manajemenSiswa');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('roleId'),
                'date_created' => time(),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Selamat pengguna berhasil ditambahkan!
		  </div>');
            redirect('manajemenSiswa');
        }
    }
}
