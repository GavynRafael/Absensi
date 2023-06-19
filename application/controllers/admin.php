<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
    }

    public function index()
    {
        $data['tittle'] = 'dasboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jumlah_user'] = $this->db->where('role_id', 2)->from('user')->count_all_results();
        $data['jumlah_admin'] = $this->db->where('role_id', 1)->from('user')->count_all_results();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/admin_dasboard', $data);
        $this->load->view('templates/footer');
    }

    public function deleteUser($id)
    {
        // Hapus pengguna berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('user');

        // Redirect ke halaman yang diinginkan setelah penghapusan
        redirect('manajemenSiswa');
    }

}
