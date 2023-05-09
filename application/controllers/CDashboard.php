<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CDashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url();
            echo "<script> alert('Maaf Session Anda Telah Berakhir') </script>";
            redirect($url, 'refresh');
        };
    }

    public function index()
    {
        if($this->session->userdata('level') == 'Mahasiswa'){
            $this->load->view('mahasiswa/index');
        }elseif($this->session->userdata('level') == 'Dosen'){
            $this->load->view('dosen/index');
        }elseif($this->session->userdata('level') == 'Kaprodi'){
            $this->load->view('kaprodi/index');
        }elseif($this->session->userdata('level') == 'Admin'){
            $this->load->view('admin/index');
        }else{
            $url = base_url();
            echo "<script> alert('Maaf Level Tidak Valdi') </script>";
            redirect($url, 'refresh');
        }
        // $this->load->view('vdashboard');
    }
}
