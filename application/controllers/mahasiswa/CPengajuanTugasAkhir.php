<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CPengajuanTugasAkhir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Mahasiswa') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model("MPengajuanTugasAkhir");
        $this->load->library("form_validation");
    }

    public function index()
    {   
        $data['title'] = 'Pengajuan Tugas Akhir';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["status"] = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);        
        $this->load->view("mahasiswa/pengajuanTugasAkhir/index", $data);
    }

    public function add()
    {
        $data['title'] = 'Pengajuan Tugas Akhir';
        $pengajuanTugasAkhir = $this->MPengajuanTugasAkhir;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuanTugasAkhir->rules());

        if ($validation->run()) {
            $pengajuanTugasAkhir->save();
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Ditambahkan!</p>');
        }

        $this->load->view("mahasiswa/pengajuanTugasAkhir/create", $data);
    }

    // public function edit($NIP = null)
    // {
    //     $data['title'] = 'CRUD Kaprodi';
    //     if (!isset($NIP)) redirect('mahasiswa/CCrudKaprodi');
       
    //     $kaprodi = $this->MKaprodi;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($kaprodi->rules());

    //     if ($validation->run()) {
    //         $kaprodi->update();
    //         echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
    //         <h3>Selamat</h3>
    //         <p>Data Berhasil Diedit!</p>');
    //     }

    //     $data["kaprodi"] = $kaprodi->getById($NIP);
    //     if (!$data["kaprodi"]) show_404();
        
    //     $this->load->view("admin/pengajuanTugasAkhir/update", $data);
    // }

    // public function delete($NIP=null)
    // {
    //     if (!isset($NIP)) show_404();
            
    //     if ($this->MKaprodi->delete($NIP)) {
    //         redirect(base_url('admin/CCrudKaprodi'));
    //     }
    // }
}
