<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CPengajuanProposal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Mahasiswa') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model(["MPengajuanProposal","MDosen"]);
        $this->load->library("form_validation");
        $this->load->helper(['url','download']);
    }

    public function index()
    {   
        $data['title'] = 'Pengajuan Proposal';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["status"] = $this->MPengajuanProposal->getByNIM($data['NIM']);
        // $NIP = $this->MPengajuanProposal->getByNIM($data['NIM']);
        if($data["status"] != null){
            $NIM = $data['status']->NIM;
            $NIP1 = $data['status']->pembimbing1;
            $data["output"] = $this->MPengajuanProposal->outputIndex1($NIM, $NIP1);
        }
        // var_dump($data["output"]);
        // die();
        $this->load->view("mahasiswa/pengajuanProposal/index", $data);
    }

    public function add()
    {
        $pengajuanProposal = $this->MPengajuanProposal;
        $data['title'] = 'Pengajuan Proposal';
        $data['dosen'] = $this->MDosen->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($pengajuanProposal->rules());

        if ($validation->run()) {
            $berkasProposal = $this->fileProposal();
            $suratKetersediaan = $this->suratKetersediaanPembimbing1();

            $pengajuanProposal->save($berkasProposal, $suratKetersediaan);
            $url = base_url('mahasiswa/CPengajuanProposal');
            echo "<script> alert('Tugas Akhir Berhasil Diajukan') </script>";
            redirect($url, 'refresh');
        }

        $this->load->view("mahasiswa/pengajuanProposal/create", $data);
    }

    public function fileProposal()
    {
        $filename = str_replace('','', 'PengajuanProposal_'.$this->session->userdata('NIM/NIP'));
        $config['upload_path']          = FCPATH.'/upload/pengajuanProposal/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $filename;
		$config['overwrite']            = true;
		$config['max_size']             = 10000; // 10MB
        $this->load->library('upload', $config);

        if(!empty($_FILES['fileProposal'])){
            if(!$this->upload->do_upload('fileProposal')){
                $data['error'] = $this->upload->display_errors();
                return false;
            }else{
                $uploadedData = $this->upload->data();
                $berkasProposal = $uploadedData['file_name'];
                return $berkasProposal;
            }
        }else{
            $data['error'] = $this->upload->display_errors();
            return false;
        }
    } 

    public function suratKetersediaanPembimbing1()
    {
        $filename = str_replace('','', 'SuratKetersediaanPembimbing1_'.$this->session->userdata('NIM/NIP'));
        $config2['upload_path']          = FCPATH.'/upload/suratKetersediaanPembimbing1/';
		$config2['allowed_types']        = 'pdf';
		$config2['file_name']            = $filename;
		$config2['overwrite']            = true;
		$config2['max_size']             = 10000; // 10MB
        $this->upload->initialize($config2);

        if(!empty($_FILES['suratKetersediaanPembimbing1'])){
            if(!$this->upload->do_upload('suratKetersediaanPembimbing1')){
                $data['error'] = $this->upload->display_errors();
                return false;
            }else{
                $uploadedData = $this->upload->data();
                $suratKetersediaan = $uploadedData['file_name'];
                return $suratKetersediaan;
            }
        }else{
            $data['error'] = $this->upload->display_errors();
            return false;
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

    public function edit($NIP = null)
    {

    }

    public function delete($NIP=null)
    {

    }
}
