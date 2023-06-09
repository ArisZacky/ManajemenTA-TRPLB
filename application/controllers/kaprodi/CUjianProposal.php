<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CUjianProposal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Kaprodi') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model(["MUjianProposal","MDosen","MNilaiProposalAlat","MNilaiProposalSistem"]);
        $this->load->library("form_validation");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
        $data['title'] = 'Ujian Proposal';
        $data["ujianProposal"] = $this->MUjianProposal->outputIndexKaprodiBelumDiterima();
        // var_dump($data["ujianProposal"]);
        // die();
        // $NIP = $this->MUjianProposal->getByNIM($data['NIM']);
        // var_dump($data["output"]);
        // die();
        $this->load->view("kaprodi/ujianProposal/belumDiterima", $data);
    }

    public function add()
    {

    }

    public function nilaiProposalAlat($id=null)
    {
        $data['title'] = 'Nilai Proposal';
        $data['output'] = $this->MUjianProposal->outputIndexDosenNilai($id);

        $nilaiProposalAlat = $this->MNilaiProposalAlat;
        $validation = $this->form_validation;
        $validation->set_rules($nilaiProposalAlat->rules());

        if ($validation->run()) {
            $nilaiProposalAlat->save();
            $pwd = $dosen->NIP;
            $level = "Dosen";
            $login->save($pwd, $level);
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Ditambahkan!</p>');
        }

        $this->load->view("dosen/ujianProposal/nilaiProposal", $data);
    }

    public function nilaiProposalSistem($id=null)
    {
        $data['title'] = 'Nilai Proposal';
        $nilaiProposalSistem = $this->MNilaiProposalSistem;
        $data['output'] = $this->MUjianProposal->outputIndexDosenNilai($id);

        $validation = $this->form_validation;
        $validation->set_rules($nilaiProposalSistem->rules());

        if ($validation->run()) {
            $penilaianPenampilan = $this->penampilan = $post["penampilan"];
            var_dump($penilaianPenampilan);
            die();
            $nilaiProposalSistem->save();
            $pwd = $dosen->NIP;
            $level = "Dosen";
            $login->save($pwd, $level);
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Ditambahkan!</p>');
        }

        $this->load->view("dosen/ujianProposal/nilaiProposal", $data);
    }

    public function tambahNilaiProposal()
    {   
        $NIM = $_POST['NIM'];
        $NIP = $_POST['NIP'];
        $modelProposal = $_POST['modelProposal'];
        $idUjianProposal = $_POST['idUjianProposal'];


        $penampilan = $_POST['penampilan'];
        $bobotPenampilan = $penampilan*0.1;
        // 10%

        $kPengetahuan = $_POST['kPengetahuan'];
        $bobotkPengetahuan = $kPengetahuan*0.2;
        // 20%

        $KSDP = $_POST['KSDP'];
        $bobotKSDP = $KSDP*0.2;
        // 20%

        $KPTH = $_POST['KPTH'];
        $bobotKPTH = $KPTH*0.1;
        // 10%
        if($modelProposal == 'Analisa Sistem'){
            $KLTP = $_POST['KLTP'];
            $bobotKLTP = $KLTP*0.2;
            // 20%
    
            $KMPA = $_POST['KMPA'];
            $bobotKMPA = $KMPA*0.2;
            // 20%

            $total = $bobotPenampilan + $bobotkPengetahuan + $bobotKSDP +
            $bobotKPTH + $bobotKLTP + $bobotKMPA;
            $predikat;

            if($total >= 81 && $total <=100){
                $predikat = 'A';
            }elseif($total >= 76 && $total <=80){
                $predikat = 'AB';
            }elseif($total >= 66 && $total <=75){
                $predikat = 'B';
            }elseif($total >= 61 && $total <=65){
                $predikat = 'BC';
            }elseif($total >= 56 && $total <=60){
                $predikat = 'C';
            }elseif($total >= 41 && $total <=55){
                $predikat = 'D';
            }elseif($total < 41){
                $predikat = 'E';
            }

            $nilaiProposalSistem = $this->MNilaiProposalSistem;
            $validation = $this->form_validation;
            $validation->set_rules($nilaiProposalSistem->rules());
    
            if ($validation->run()) {
                $nilaiProposalSistem->save($idUjianProposal, $NIM, $NIP, $total, $predikat);
                $url = base_url('dosen/CUjianProposal');
                echo "<script> alert('Propsal berhasil di nilai!') </script>";
                redirect($url, 'refresh');
            }
        }

        if($modelProposal == 'Pembuatan Alat'){
            $kPerencanaan = $_POST['kPerencanaan'];
            $bobotkPerencanaan = $kPerencanaan*0.2;
            // 20%
    
            $kRancangan = $_POST['kRancangan'];
            $bobotkRancangan = $kRancangan*0.2;
            // 20%

            $total = $bobotPenampilan + $bobotkPengetahuan + $bobotKSDP +
            $bobotKPTH + $bobotkPerencanaan + $bobotkRancangan;
            $predikat;

            if($total >= 81 && $total <=100){
                $predikat = 'A';
            }elseif($total >= 76 && $total <=80){
                $predikat = 'AB';
            }elseif($total >= 66 && $total <=75){
                $predikat = 'B';
            }elseif($total >= 61 && $total <=65){
                $predikat = 'BC';
            }elseif($total >= 56 && $total <=60){
                $predikat = 'C';
            }elseif($total >= 41 && $total <=55){
                $predikat = 'D';
            }elseif($total < 41){
                $predikat = 'E';
            }
            
            $nilaiProposalAlat = $this->MNilaiProposalAlat;
            $validation = $this->form_validation;
            $validation->set_rules($nilaiProposalAlat->rules());
    
            if ($validation->run()) {
                $nilaiProposalAlat->save($idUjianProposal, $NIM, $NIP, $total, $predikat);
                $url = base_url('dosen/CUjianProposal');
                echo "<script> alert('Propsal berhasil di nilai!') </script>";
                redirect($url, 'refresh');
            }
        }
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
