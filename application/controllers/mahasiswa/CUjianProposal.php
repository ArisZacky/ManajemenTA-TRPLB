<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CUjianProposal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Mahasiswa') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model(["MUjianProposal","MDosen"]);
        $this->load->library("form_validation");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
        $data['title'] = 'Ujian Proposal';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["output"] = $this->MUjianProposal->outputIndexMahasiswa($data['NIM']);

        $data["count"] = $this->MUjianProposal->countMahasiswa($data["output"]->idUjianProposal);
        // var_dump($data["count"]);
        // die();
        // var_dump($data["output"]);
        // die();
        // $NIP = $this->MUjianProposal->getByNIM($data['NIM']);
        // var_dump($data["output"]);
        // die();
        $this->load->view("mahasiswa/ujianProposal/index", $data);
    }

    public function add()
    {

    }
    
    public function addRevisi()
    {
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["output"] = $this->MUjianProposal->outputIndexMahasiswa($data['NIM']);
        $idUjian = $data["output"]->idUjianProposal;
        // var_dump($idUjian);
        // die();
        $ujianProposal = $this->MUjianProposal;
        $validation = $this->form_validation;
        $validation->set_rules($ujianProposal->rulesRevisi());

        if ($validation->run()) {
            $fileRevisi = $this->revisi();

            $ujianProposal->save($idUjian, $fileRevisi);
            $url = base_url('mahasiswa/CUjianProposal');
            echo "<script> alert('Revisi Proposal Berhasil Diajukan') </script>";
            redirect($url, 'refresh');
        }
    }

    public function revisi()
    {
        $data['title'] = 'Revisi Proposal';
        $filename = str_replace('','', 'RevisiProposal_'.$this->session->userdata('NIM/NIP'));
        $config['upload_path']          = FCPATH.'/upload/revisiProposal/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $filename;
		$config['overwrite']            = true;
		$config['max_size']             = 10000; // 10MB
        $this->load->library('upload', $config);

        if(!empty($_FILES['fileRevisi'])){
            if(!$this->upload->do_upload('fileRevisi')){
                $data['error'] = $this->upload->display_errors();
                return false;
            }else{
                $uploadedData = $this->upload->data();
                $fileRevisi = $uploadedData['file_name'];
                return $fileRevisi;
            }
        }else{
            $data['error'] = $this->upload->display_errors();
            return false;
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
