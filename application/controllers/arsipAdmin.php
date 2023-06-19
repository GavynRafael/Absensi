
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class arsipAdmin extends CI_Controller

{

    public function index()
    {

        $data = [
            'tittle' => 'Arsip',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'id_user' => $this->input->post('idUser')
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/arsipAbsenUser', $data);
        $this->load->view('templates/footer');
    }

}
