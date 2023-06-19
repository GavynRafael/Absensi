<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailCuti extends CI_Controller
{

    public function index()
    {
        $data['id'] = $this->input->post('id_cuti');
        $data['id_user'] = $this->input->post('id_user');
        $data['tittle'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detailCuti', $data);
        $this->load->view('templates/footer');
    }
}

