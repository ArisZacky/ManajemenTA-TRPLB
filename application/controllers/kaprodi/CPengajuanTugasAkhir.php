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

    public function belumDiterima()
    {         
        $data['title'] = 'Pengajuan Tugas Akhir Belum Diterima';
        $data["pengajuanTugasAkhir"] = $this->MPengajuanTugasAkhir->outputIndexKaprodiBelumDiterima();
        $this->load->view("kaprodi/pengajuanTugasAkhir/belumDiterima", $data);
    }

    public function sudahDiterima()
    {         
        $data['title'] = 'Pengajuan Tugas Akhir Sudah Diterima';
        $data["pengajuanTugasAkhir"] = $this->MPengajuanTugasAkhir->outputIndexKaprodiSudahDiterima();
        $this->load->view("kaprodi/pengajuanTugasAkhir/sudahDiterima", $data);
    }

    public function proses($idPengajuan = null)
    {
        $data['title'] = "Approve Pengajuan";
        if(!isset($idPengajuan)) redirect('kaprodi/CPengajuanTugasAkhir/belumDiterima');
        
        $pengajuan = $this->MPengajuanTugasAkhir;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuan->rulesKaprodi());
        $NIP = $pengajuan->outputProsesKaprodi($idPengajuan);
        if ($NIP == null) {
            $url = base_url('kaprodi/CPengajuanTugasAkhir/belumDiterima');
            echo "<script> alert('Maaf data tidak ada') </script>";
            redirect($url, 'refresh');
        };
        
        $pembimbing1 = $NIP->pembimbing1;
        $status = $NIP->status;
        
        $data["pengajuan"] = $pengajuan->outputProsesKaprodi($idPengajuan);
        $data['dosen'] = $this->MDosen->getAllPembimbing2($pembimbing1);

        if(!$data["pengajuan"]) show_404();

        if ($status != 'Diproses') {
            $url = base_url('kaprodi/CPengajuanTugasAkhir/belumDiterima');
            echo "<script> alert('Maaf data pengajuan ini telah di terima') </script>";
            redirect($url, 'refresh');
        };

        if($validation->run() == false){
            $this->load->view("kaprodi/pengajuanTugasAkhir/proses", $data);
        }else{
            $pengajuan->update();
            $url = base_url('kaprodi/CPengajuanTugasAkhir/sudahDiterima');
            echo "<script> alert('Propsal berhasil di approve!') </script>";
            redirect($url, 'refresh');
            // redirect('kaprodi/CPengajuanTugasAkhir/belumDiterima');
            // echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            // <h3>Selamat</h3>
            // <p>Data Berhasil Diedit!</p>');
        }
        


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
