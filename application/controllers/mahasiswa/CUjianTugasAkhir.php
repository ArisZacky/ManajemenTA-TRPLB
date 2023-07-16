<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CUjianTugasAkhir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Mahasiswa') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model(["MUjianTugasAkhir", "MPengajuanTugasAkhir", "MDosen", "MPengujiTa"]);
        $this->load->library("form_validation");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
        $data['title'] = 'Ujian Proposal';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["pengajuan"] = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        $data["pembimbing1"] = $this->MDosen->getById($data["pengajuan"]->pembimbing1);
        $data["pembimbing2"] = $this->MDosen->getById($data["pengajuan"]->pembimbing2);
        $data["ujianTa"] = $this->MUjianTugasAkhir->outputIndexMahasiswa($data["pengajuan"]->idPengajuanTA);
        if($data["ujianTa"] != NULL){
            $data["penguji"] = $this->MPengujiTa->getByIdUjianTA($data['ujianTa']->idUjianTA);
            $data["penguji1"] = $this->MDosen->getById($data['penguji'][0]->NIP);
            $data["penguji2"] = $this->MDosen->getById($data['penguji'][1]->NIP);
            $data["penguji3"] = $this->MDosen->getById($data['penguji'][2]->NIP);
        }
        $this->load->view("mahasiswa/ujianTugasAkhir/index", $data);
    }

    public function add()
    {
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["pengajuan"] = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        $ujianTa = $this->MUjianTugasAkhir;
        $validation = $this->form_validation;
        $validation->set_rules($ujianTa->rules());
        if($validation->run()){
            $suratSelesaiBimbingan = $this->suratSelesaiBimbingan();
            $fileLaporanTA = $this->fileLaporanTA();

            if($suratSelesaiBimbingan == false || $fileLaporanTA == false){
                $url = base_url('mahasiswa/CUjianTugasAkhir');
                echo "<script> alert('Tugas Akhir Gagal Diajukan, File Lebih Besar Dari 10 MB!') </script>";
                redirect($url, 'refresh');    
            }else{
                $ujianTa->save($suratSelesaiBimbingan, $fileLaporanTA);
                $url = base_url('mahasiswa/CUjianTugasAkhir');
                echo "<script> alert('Tugas Akhir Berhasil Diajukan') </script>";
                redirect($url, 'refresh');    
            }
        }else{
            $url = base_url('mahasiswa/CUjianTugasAkhir');
            echo "<script> alert('Tugas Akhir Gagal Diajukan') </script>";
            redirect($url, 'refresh');
        }
    }

    public function suratSelesaiBimbingan()
    {
        $data['title'] = 'Surat Selesai Bimbingan';
        $filename = str_replace('','', 'SuratSelesaiBimbingan_'.$this->session->userdata('NIM/NIP'));
        $config['upload_path']          = FCPATH.'/upload/suratSelesaiBimbingan/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $filename;
		$config['overwrite']            = true;
		$config['max_size']             = 10000; // 10MB
        $this->load->library('upload', $config);

        if(!empty($_FILES['suratSelesaiBimbingan'])){
            if(!$this->upload->do_upload('suratSelesaiBimbingan')){
                $data['error'] = $this->upload->display_errors();
                return false;
            }else{
                $uploadedData = $this->upload->data();
                $suratSelesaiBimbingan = $uploadedData['file_name'];
                return $suratSelesaiBimbingan;
            }
        }else{
            $data['error'] = $this->upload->display_errors();
            return false;
        }
    }

    public function fileLaporanTA()
    {
        $data['title'] = 'Laporan Tugas Akhir';
        $filename = str_replace('','', 'LaporanTugasAkhir_'.$this->session->userdata('NIM/NIP'));
        $config['upload_path']          = FCPATH.'/upload/fileLaporanTA/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $filename;
		$config['overwrite']            = true;
		$config['max_size']             = 10000; // 10MB
        $this->upload->initialize($config);

        if(!empty($_FILES['fileLaporanTA'])){
            if(!$this->upload->do_upload('fileLaporanTA')){
                $data['error'] = $this->upload->display_errors();
                return false;
            }else{
                $uploadedData = $this->upload->data();
                $fileLaporanTA = $uploadedData['file_name'];
                return $fileLaporanTA;
            }
        }else{
            $data['error'] = $this->upload->display_errors();
            return false;
        }
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


    public function edit($NIP = null)
    {

    }

    public function delete($NIP=null)
    {

    }
}
