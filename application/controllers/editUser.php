<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditUser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index($id)
    {
        $data['tittle'] = 'Arsip';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $id;

        // Menampilkan halaman edit dengan data pengguna yang diperoleh
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editUser', $data);
        $this->load->view('templates/footer');
    }

    public function updateUser()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Ambil data pengguna dari database
        $user = $this->db->get_where('user', ['id' => $id])->row();

        // Periksa apakah password baru dimasukkan
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $data['password'] = $hashedPassword;
        }

        // Update data pengguna
        $data['name'] = $name;
        $data['email'] = $email;

        // Simpan perubahan ke database
        $this->db->where('id', $id);
        $this->db->update('user', $data);

        // Redirect atau tampilkan pesan sukses
        redirect('admin');
    }
}
