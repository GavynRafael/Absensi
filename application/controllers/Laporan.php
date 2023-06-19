<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller

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
        $data = [
            'bulan' => $this->input->post('bulan'),
            'tittle' => 'laporan Bulanan',
        ];

        $data['tittle'] = 'Laporan Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/laporan_bulanan', $data);
        $this->load->view('templates/footer');
    }
}
