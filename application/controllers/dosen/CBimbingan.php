<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CBimbingan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Dosen') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model(["MPengajuanTugasAkhir", "MBimbingan","MDosen"]);
        $this->load->library("form_validation");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
        $data['title'] = 'Ujian Proposal Belum Dinilai';
        $data['NIP'] = $this->session->userdata('NIM/NIP');
        $data["bimbingan"] = $this->MBimbingan->outputIndexDosen($data['NIP']);
        // var_dump($data["bimbingan"]);
        // die();
        $this->load->view("dosen/bimbingan/belumDiterima", $data);
    }

    public function sudahDinilai()
    {   
        $data['title'] = 'Ujian Proposal Sudah Dinilai';
        $data['NIP'] = $this->session->userdata('NIM/NIP');
        $data["bimbingan"] = $this->MBimbingan->outputIndexDosenSudahDiproses($data['NIP']);
        $this->load->view("dosen/bimbingan/sudahDiterima", $data);
    }

    public function add()
    {

    }

    public function prosesBimbingan($id=null)
    {
        $data['title'] = 'Proses Bimbingan';
        $data['output'] = $this->MBimbingan->outputProsesDosen($id);
        $data['NIP'] = $this->session->userdata('NIM/NIP');

        if(!isset($id)) redirect('dosen/CBimbingan/');
        if($data['output'] == null){
            $url = base_url('dosen/CBimbingan/');
            echo "<script> alert('Maaf data tidak ada') </script>";
            redirect($url, 'refresh');
        }
        if($data['output']->status != 'Diproses'){
            $url = base_url('dosen/CBimbingan/');
            echo "<script> alert('Maaf data sudah di proses') </script>";
            redirect($url, 'refresh');
        }
        if($data['output']->NIP != $data['NIP']){
            $url = base_url('dosen/CBimbingan/');
            echo "<script> alert('Maaf data ini bukan data bimbingan yang diberi kepada anda!') </script>";
            redirect($url, 'refresh');
        }
        $this->load->view("dosen/bimbingan/proses", $data);
    }

    public function updateBimbingan(){
        $bimbingan = $this->MBimbingan;
        $validation = $this->form_validation;
        $validation->set_rules($bimbingan->rulesDosen());

        if($validation->run()){
            $bimbingan->updateDosen();
            $url = base_url('dosen/CBimbingan/');
            echo "<script> alert('Bimbingan berhasil di terima') </script>";
            redirect($url, 'refresh');
        }
    }

    public function downloadFileBimbingan($id = NULL)
    {
        $data['status'] = $this->MBimbingan->getById($id);

        $file = $data['status']->berkasBimbingan;
        force_download('./upload/bimbinganProposal/'.$file, NULL);
    }

    public function edit($NIP = null)
    {

    }

    public function delete($NIP=null)
    {

    }
}
