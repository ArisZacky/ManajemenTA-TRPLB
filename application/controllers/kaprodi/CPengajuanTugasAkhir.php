<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CPengajuanTugasAkhir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Kaprodi') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        // $this->load->model(["MPengajuanTugasAkhir","MDosen","MMahasiswa"]);
        $this->load->model(["MPengajuanTugasAkhir", "MDosen"]);
        $this->load->library("form_validation");
    }

    public function index()
    {         
        $data['title'] = 'Pengajuan Tugas Akhir';
        $data["pengajuanTugasAkhir"] = $this->MPengajuanTugasAkhir->getAll();
        // foreach($data["pengajuanTugasAkhir"] as $namaPembimbing){
        //     $NIP1 = $namaPembimbing->pembimbing1;
        // }
        // $data["pembimbing1"] = $this->MDosen->getById($NIP1);

        // var_dump($NIP1);
        // die();
        $this->load->view("kaprodi/pengajuanTugasAkhir/index", $data);
    }

    public function add()
    {

    }

    public function edit($NIP = null)
    {
        $data['title'] = 'CRUD Kaprodi';
        if (!isset($NIP)) redirect('mahasiswa/CCrudKaprodi');
       
        $kaprodi = $this->MKaprodi;
        $validation = $this->form_validation;
        $validation->set_rules($kaprodi->rules());

        if ($validation->run()) {
            $kaprodi->update();
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Diedit!</p>');
        }

        $data["kaprodi"] = $kaprodi->getById($NIP);
        if (!$data["kaprodi"]) show_404();
        
        $this->load->view("admin/pengajuanTugasAkhir/update", $data);
    }

    public function delete($NIP=null)
    {

    }
}
