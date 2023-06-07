<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CUjianProposal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Mahasiswa') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model(["MUjianProposal","MDosen"]);
        $this->load->library("form_validation");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
        $data['title'] = 'Ujian Proposal';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["output"] = $this->MUjianProposal->outputIndexMahasiswa($data['NIM']);
        // var_dump($data["output"]);
        // die();
        // $NIP = $this->MUjianProposal->getByNIM($data['NIM']);
        // var_dump($data["output"]);
        // die();
        $this->load->view("mahasiswa/ujianProposal/index", $data);
    }

    public function add()
    {

    }

    public function downloadFileProposal($NIM = NULL)
    {
        $data['status'] = $this->MUjianProposal->getByNIM($NIM);
        $file = $data['status']->fileProposal;
        force_download('./upload/ujianProposal/'.$file, NULL);
    }

    public function downloadSuratKetersediaanPembimbing1($NIM = NULL)
    {
        $data['status'] = $this->MUjianProposal->getByNIM($NIM);
        $file = $data['status']->suratKetersediaanPembimbing1;
        force_download('./upload/suratKetersediaanPembimbing1/'.$file, NULL);
    }

    public function edit($NIP = null)
    {

    }

    public function delete($NIP=null)
    {

    }
}
