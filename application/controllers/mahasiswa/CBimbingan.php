<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CBimbingan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Mahasiswa') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model(["MBimbingan","MDosen"]);
        $this->load->library("form_validation");
    }

    public function index()
    {   
        $data['title'] = 'Bimbingan Tugas Akhir';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        // $data["status"] = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        // $NIP = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        // if($data["status"] != null){
        //     $NIM = $NIP->NIM;
        //     $NIP1 = $NIP->pembimbing1;
        //     $NIP2 = $NIP->pembimbing2;
        //     if($NIP2 != NULL){
        //         $data["output"] = $this->MPengajuanTugasAkhir->outputIndex($NIM, $NIP1, $NIP2);
        //     }else{
        //         $data["output"] = $this->MPengajuanTugasAkhir->outputIndex1($NIM, $NIP1);
        //     }
        // }
        // var_dump($data["output"]);
        // die();
        $this->load->view("mahasiswa/bimbingan/index", $data);
    }

    public function add()
    {

    }

    public function edit($NIP = null)
    {

    }

    public function delete($NIP=null)
    {

    }
}
