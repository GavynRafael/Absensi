<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller

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

        $data['tittle'] = 'Form izin cuti';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules(
            'status',
            'Status',
            'required|trim|in_list[cuti,sakit]',
            [
                'required' => 'Pilih {field} terlebih dahulu!',
                'in_list' => 'Pilihan {field} tidak valid!'
            ]
        );

        $this->form_validation->set_rules(
            'tanggal_mulai',
            'Tanggal_mulai',
            'required|trim',
            ['required' => 'kolom tanggal mulai cuti harus diisi!']
        );

        $this->form_validation->set_rules(
            'tanggal_selesai',
            'Tanggal_selesai',
            'required|trim',

            ['required' => 'kolom stanggal selesai cuti harus diisi!']
        );

        $this->form_validation->set_rules(
            'alasan',
            'Alasan',
            'required|trim',
            ['required' => 'kolom {field} harus diisi!']
        );
        

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/izin', $data);
            $this->load->view('templates/footer');
        } else {

            $lampiran = $_FILES['lampiran']['name'];
            if ($lampiran) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '5048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('lampiran')) {
                } else {
                }
            }


            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'id_user' => ($this->input->post('id_user')),
                'tanggal_mulai' => ($this->input->post('tanggal_mulai')),
                'tanggal_selesai' => ($this->input->post('tanggal_selesai')),
                'status' => ($this->input->post('status')),
                'alasan' => ($this->input->post('alasan')),
                'lampiran' => $lampiran,
                'date_created' => date('Y-m-d H:i:s')
            ];


                $this->db->insert('riwayat_cuti', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            	Pengajuan izin berhasil
              </div>');
                redirect('cuti');
        }
    }
}
