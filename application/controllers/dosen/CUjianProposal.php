<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CUjianProposal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Dosen') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model(["MUjianProposal","MDosen","MNilaiProposal","MPengajuanProposal"]);
        $this->load->library("form_validation");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
        $data['title'] = 'Ujian Proposal Belum Dinilai';
        $data['NIP'] = $this->session->userdata('NIM/NIP');
        $data["ujianProposal"] = $this->MUjianProposal->outputIndexDosen($data['NIP']);
        $this->load->view("dosen/ujianProposal/belumDinilai", $data);
    }

    public function sudahDinilai()
    {   
        $data['title'] = 'Ujian Proposal Sudah Dinilai';
        $data['NIP'] = $this->session->userdata('NIM/NIP');
        $data["ujianProposal"] = $this->MUjianProposal->outputIndexDosenSudahNilai($data['NIP']);
        $this->load->view("dosen/ujianProposal/sudahDinilai", $data);
    }

    public function add()
    {

    }

    public function nilaiProposal($id=null)
    {
        $data['title'] = 'Nilai Proposal';
        $data['output'] = $this->MUjianProposal->outputIndexDosenNilai($id);
        $this->load->view("dosen/ujianProposal/nilaiProposal", $data);
    }

    public function tambahNilaiProposal()
    {   
        $NIP = $_POST['NIP'];
        $modelProposal = $_POST['modelProposal'];
        $idUjianProposal = $_POST['idUjianProposal'];


        $k1 = $_POST['k1'];
        $bobotk1 = $k1*0.1;
        // 10%

        $k2 = $_POST['k2'];
        $bobotk2 = $k2*0.2;
        // 20%

        $k3 = $_POST['k3'];
        $bobotk3 = $k3*0.2;
        // 20%

        $k4 = $_POST['k4'];
        $bobotk4 = $k4*0.1;
        // 10%

        $k5 = $_POST['k5'];
        $bobotk5 = $k5*0.2;
        // 20%
            
        $k6 = $_POST['k6'];
        $bobotk6 = $k6*0.2;
        // 20%

        if($modelProposal == 'Analisa Sistem'){


            $total = $bobotk1 + $bobotk2 + $bobotk3 +
            $bobotk4 + $bobotk5 + $bobotk6;
            // $predikat;

            // if($total >= 81 && $total <=100){
            //     $predikat = 'A';
            // }elseif($total >= 76 && $total <=80){
            //     $predikat = 'AB';
            // }elseif($total >= 66 && $total <=75){
            //     $predikat = 'B';
            // }elseif($total >= 61 && $total <=65){
            //     $predikat = 'BC';
            // }elseif($total >= 56 && $total <=60){
            //     $predikat = 'C';
            // }elseif($total >= 41 && $total <=55){
            //     $predikat = 'D';
            // }elseif($total < 41){
            //     $predikat = 'E';
            // }

            $nilaiProposal = $this->MNilaiProposal;
            $validation = $this->form_validation;
            $validation->set_rules($nilaiProposal->rules());
    
            if ($validation->run()) {
                $nilaiProposal->save($idUjianProposal, $NIP, $total);
                $url = base_url('dosen/CUjianProposal');
                echo "<script> alert('Propsal berhasil di nilai!') </script>";
                redirect($url, 'refresh');
            }
        }

        if($modelProposal == 'Pembuatan Alat'){

            $total = $bobotk1 + $bobotk2 + $bobotk3 +
            $bobotk4 + $bobotk5 + $bobotk6;
            // $predikat;

            // if($total >= 81 && $total <=100){
            //     $predikat = 'A';
            // }elseif($total >= 76 && $total <=80){
            //     $predikat = 'AB';
            // }elseif($total >= 66 && $total <=75){
            //     $predikat = 'B';
            // }elseif($total >= 61 && $total <=65){
            //     $predikat = 'BC';
            // }elseif($total >= 56 && $total <=60){
            //     $predikat = 'C';
            // }elseif($total >= 41 && $total <=55){
            //     $predikat = 'D';
            // }elseif($total < 41){
            //     $predikat = 'E';
            // }
            
            $nilaiProposal = $this->MNilaiProposal;
            $validation = $this->form_validation;
            $validation->set_rules($nilaiProposal->rules());
    
            if ($validation->run()) {
                $nilaiProposal->save($idUjianProposal, $NIP, $total);
                $url = base_url('dosen/CUjianProposal');
                echo "<script> alert('Propsal berhasil di nilai!') </script>";
                redirect($url, 'refresh');
            }
        }
    }

    public function downloadFileProposal($NIM = NULL)
    {
        $data['status'] = $this->MPengajuanProposal->getByNIM($NIM);
        $file = $data['status']->fileProposal;
        force_download('./upload/ujianProposal/'.$file, NULL);
    }

    public function downloadSuratKetersediaanPembimbing1($NIM = NULL)
    {
        $data['status'] = $this->MPengajuanProposal->getByNIM($NIM);
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
