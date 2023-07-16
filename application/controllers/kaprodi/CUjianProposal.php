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
        $this->load->model(["MPengajuanTugasAkhir","MDosen","MUjianProposal","MNilaiProposal","MPengajuanProposal"]);
        $this->load->library("form_validation");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
        $data['title'] = 'Ujian Proposal Belum Diterima';
        $data["ujianProposal"] = $this->MUjianProposal->outputIndexKaprodiBelumDiterima();
        $this->load->view("kaprodi/ujianProposal/belumDiterima", $data);
    }

    public function sudahDiterima()
    {   
        $data['title'] = 'Ujian Proposal Sudah Diterima';
        $data["ujianProposal"] = $this->MUjianProposal->outputIndexKaprodiSudahDiterima();
        $this->load->view("kaprodi/ujianProposal/sudahDiterima", $data);
    }

    public function add()
    {

    }

    public function proses($idUjianProposal = null)
    {
        $data['title'] = "Approve Revisi";
        if(!isset($idUjianProposal)) redirect('kaprodi/CUjianProposal/');
        
        
        $ujianProposal = $this->MUjianProposal;
        $nilaiProposal = $this->MNilaiProposal;
        $pengajuan = $this->MPengajuanTugasAkhir;
        $validation = $this->form_validation;
        $validation->set_rules($ujianProposal->rulesKaprodi());
        // $validation2 = $this->form_validation;
        // $validation2->set_rules($pengajuan->rulesKaprodi());

        $avgNilai = $nilaiProposal->getAvg($idUjianProposal);
        // var_dump($avgNilai->total);
        // die();

        $x = $ujianProposal->outputProsesKaprodi($idUjianProposal);
        if ($x == null) {
            $url = base_url('kaprodi/CUjianProposal/belumDiterima');
            echo "<script> alert('Maaf data tidak ada') </script>";
            redirect($url, 'refresh');
        };
        
        $y = $nilaiProposal->countMahasiswa($idUjianProposal);

        if($y->cnt != 3){
            $url = base_url('kaprodi/CUjianProposal/belumDiterima');
            echo "<script> alert('Maaf data belum dinilai secara lengkap') </script>";
            redirect($url, 'refresh');
        }


        $data["ujianProposal"] = $ujianProposal->outputProsesDetailKaprodi($idUjianProposal);
        $data["nilaiProposal"] = $nilaiProposal->getByidUjianProposal($idUjianProposal);
        $data['dosen'] = $this->MDosen->getAllPembimbing2($x->pembimbing1);

        if(!$data["ujianProposal"]) show_404();

        if ($data["ujianProposal"]->status == 'Telah Selesai Ujian') {
            $url = base_url('kaprodi/CUjianProposal/belumDiterima');
            echo "<script> alert('Maaf data pengajuan ini telah di terima') </script>";
            redirect($url, 'refresh');
        };

        if($validation->run() == false){
            $this->load->view("kaprodi/ujianProposal/proses", $data);
        }else{
            if($_POST['status'] == 'Telah Selesai Ujian'){
                $this->db->trans_begin();
                $ujianProposal->update();
                $pengajuan->saveKaprodi();
                if ($this->db->trans_status() === FALSE)
                {
                        $this->db->trans_rollback();
                        echo "Gagal!";
                }
                else
                {
                        $this->db->trans_commit();
                        echo "Berhasil";
                }
                
                $url = base_url('kaprodi/CUjianProposal/sudahDiterima');
                echo "<script> alert('Propsal berhasil di approve!') </script>";
                redirect($url, 'refresh');    
            }
            elseif($_POST['status'] == 'Revisi Ditolak'){
                $ujianProposal->update();
                
                $url = base_url('kaprodi/CUjianProposal/sudahDiterima');
                echo "<script> alert('Propsal berhasil di tolak!') </script>";
                redirect($url, 'refresh');
            }
        }
    }

    public function downloadFileProposal($NIM = NULL)
    {
        $data['status'] = $this->MPengajuanProposal->getByNIM($NIM);
        $file = $data['status']->fileProposal;
        force_download('./upload/pengajuanProposal/'.$file, NULL);
    }

    public function downloadSuratKetersediaanPembimbing1($NIM = NULL)
    {
        $data['status'] = $this->MPengajuanProposal->getByNIM($NIM);
        $file = $data['status']->suratKetersediaanPembimbing1;
        force_download('./upload/suratKetersediaanPembimbing1/'.$file, NULL);
    }

    public function downloadFileRevisi($id = NULL)
    {
        $data['status'] = $this->MUjianProposal->getByID($id);
        $file = $data['status']->fileRevisi;
        force_download('./upload/revisiProposal/'.$file, NULL);
    }

    public function edit($NIP = null)
    {

    }

    public function delete($NIP=null)
    {

    }
}
