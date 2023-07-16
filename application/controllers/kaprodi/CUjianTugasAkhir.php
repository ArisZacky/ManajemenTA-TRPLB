<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CUjianTugasAkhir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Kaprodi') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model(["MPengajuanTugasAkhir","MDosen", "MUjianTugasAkhir", "MPengujiTa"]);
        $this->load->library("form_validation");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
    }

    public function menunggu()
    {   
        $data['title'] = 'Ujian Tugas Akhir Menunggu';
        $data["ujianTa"] = $this->MUjianTugasAkhir->outputIndexKaprodiMenunggu();
        $this->load->view("kaprodi/ujianTugasAkhir/menunggu", $data);
    }

    public function dijadwalkan()
    {   
        $data['title'] = 'Ujian Tugas Akhir Dijadwalkan';
        $data["ujianTa"] = $this->MUjianTugasAkhir->outputIndexKaprodiDijadwalkan();
        $this->load->view("kaprodi/ujianTugasAkhir/dijadwalkan", $data);
    }

    public function lulus()
    {   
        $data['title'] = 'Ujian Tugas Akhir Lulus';
        $data["ujianTa"] = $this->MUjianTugasAkhir->outputIndexKaprodiLulus();
        $this->load->view("kaprodi/ujianTugasAkhir/lulus", $data);
    }

    public function lulusRevisi()
    {   
        $data['title'] = 'Ujian Tugas Akhir Lulus Revisi';
        $data["ujianTa"] = $this->MUjianTugasAkhir->outputIndexKaprodiLulusRevisi();
        $this->load->view("kaprodi/ujianTugasAkhir/lulus", $data);
    }

    public function add()
    {

    }

    public function prosesJadwal($idUjianTA = null)
    {
        $data['title'] = "Jadwalkan Tugas Akhir";
        if(!isset($idUjianTA)) redirect('kaprodi/CUjianProposal/');
        
        
        $ujianTa = $this->MUjianTugasAkhir;

        $x = $ujianTa->outputIndexKaprodiProses($idUjianTA);
        if ($x == null) {
            $url = base_url('kaprodi/CUjianTugasAkhir/menunggu');
            echo "<script> alert('Maaf data tidak ada') </script>";
            redirect($url, 'refresh');
        };
        
        $data["ujianTa"] = $this->MUjianTugasAkhir->outputIndexKaprodiProses($idUjianTA);
        $data['dosen'] = $this->MDosen->getAll();

        if ($data["ujianTa"]->status != 'Menunggu') {
            $url = base_url('kaprodi/CUjianTugasAkhir/menunggu');
            echo "<script> alert('Maaf data tugas akhir ini telah di jadwalkan') </script>";
            redirect($url, 'refresh');
        };

        $this->load->view("kaprodi/ujianTugasAkhir/proses", $data);
    }

    public function kaprodiAddJadwal(){

        $ujianTa = $this->MUjianTugasAkhir;
        $pengujiTa = $this->MPengujiTa;
        $validation = $this->form_validation;
        $validation->set_rules($ujianTa->rulesKaprodi());
        $idUjianTA = $_POST["idUjianTA"];
        $penguji1 = $_POST["penguji1"];
        $penguji2 = $_POST["penguji2"];
        $penguji3 = $_POST["penguji3"];

        if($validation->run()){
            if($penguji1 == $penguji2 || $penguji1 == $penguji3){
                $url = base_url('kaprodi/CUjianTugasAkhir/menunggu');
                echo "<script> alert('Tugas Akhir Gagal Diproses, Dosen Penguji Tidak Boleh Sama!') </script>";
                redirect($url, 'refresh');    
            }else{
                $this->db->trans_begin();
                $ujianTa->updateKaprodi();
                $pengujiTa->save("Penguji 1", $penguji1);
                $pengujiTa->save("Penguji 2", $penguji2);
                $pengujiTa->save("Penguji 3", $penguji3);
                if ($this->db->trans_status() === FALSE)
                {
                        $this->db->trans_rollback();
                }
                else
                {
                        $this->db->trans_commit();
                }
                $url = base_url('kaprodi/CUjianTugasAkhir/menunggu');
                echo "<script> alert('Tugas Akhir Berhasil Dijadwalkan') </script>";
                redirect($url, 'refresh');    
            }
        }else{
            $url = base_url('kaprodi/CUjianTugasAkhir/menunggu');
            echo "<script> alert('Tugas Akhir Gagal Di Proses!') </script>";
            redirect($url, 'refresh');
        }

    }

    public function edit($NIP = null)
    {

    }

    public function delete($NIP=null)
    {

    }

    public function downloadFileLaporanTugasAkhir($idUjianTA = NULL)
    {
        $data['status'] = $this->MUjianTugasAkhir->getById($idUjianTA);
        $file = $data['status']->fileLaporanTA;
        force_download('./upload/fileLaporanTA/'.$file, NULL);
    }

    public function downloadSuratSelesaiBimbingan($idUjianTA = NULL)
    {
        $data['status'] = $this->MUjianTugasAkhir->getById($idUjianTA);
        $file = $data['status']->suratSelesaiBimbingan;
        force_download('./upload/suratSelesaiBimbingan/'.$file, NULL);
    }

}
