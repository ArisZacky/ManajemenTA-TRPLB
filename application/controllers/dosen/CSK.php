<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CSK extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Dosen') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model("MSK");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
        $data['title'] = 'SK';
        $data["SK"] = $this->MSK->getAll();
        $this->load->view("dosen/sk/index", $data);
    }

    public function add()
    {
    }

    public function edit()
    {   
    }

    public function delete()
    {
    }

    public function downloadFileSK($idSK = NULL)
    {
        $data['status'] = $this->MSK->getById($idSK);
        $file = $data['status']->fileSK;
        force_download('./upload/SK/'.$file, NULL);
    }

}
