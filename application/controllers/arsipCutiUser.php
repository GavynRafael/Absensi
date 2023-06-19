
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class arsipCutiUser extends CI_Controller

{

    public function index()
    {

        $data = [
            'tittle' => 'Arsip',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/arsipCuti', $data);
        $this->load->view('templates/footer');
    }

}
