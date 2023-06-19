<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CBimbingan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Mahasiswa') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model(["MBimbingan","MDosen","MPengajuanTugasAkhir"]);
        $this->load->library("form_validation");
    }

    public function index()
    {   
        $data['title'] = 'Bimbingan Tugas Akhir';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["pengajuan"] = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        $data['p1'] = $this->MDosen->getById($data['pengajuan']->pembimbing1);
        $data['p2'] = $this->MDosen->getById($data['pengajuan']->pembimbing2);
        $data['b1'] = $this->MBimbingan->getByPembimbing1($data['pengajuan']->idPengajuanTA, $data['pengajuan']->pembimbing1);
        $data['b2'] = $this->MBimbingan->getByPembimbing2($data['pengajuan']->idPengajuanTA, $data['pengajuan']->pembimbing2);

        // $data["status"] = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        // $NIP = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        // if($data["status"] != null){
        //     $NIM = $NIP->NIM;
        //     $NIP1 = $NIP->pembimbing1;
        //     $NIP2 = $NIP->pembimbing2;
        //     if($NIP2 != NULL){
        //         $data["output"] = $this->MPengajuanTugasAkhir->outputIndex($NIM, $NIP1, $NIP2);
        //     }else{
        //         $data["output"] = $this->MPengajuanTugasAkhir->outputIndex1($NIM, $NIP1);
        //     }
        // }
        // var_dump($data["output"]);
        // die();
        $this->load->view("mahasiswa/bimbingan/index", $data);
    }

    public function add()
    {
        $data['title'] = 'Bimbingan Tugas Akhir';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["pengajuan"] = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        $data['p1'] = $this->MDosen->getById($data['pengajuan']->pembimbing1);
        $data['p2'] = $this->MDosen->getById($data['pengajuan']->pembimbing2);
        $data['b1'] = $this->MBimbingan->getByPembimbing1($data['pengajuan']->idPengajuanTA, $data['pengajuan']->pembimbing1);
        $data['b2'] = $this->MBimbingan->getByPembimbing2($data['pengajuan']->idPengajuanTA, $data['pengajuan']->pembimbing2);
        

        $bimbingan = $this->MBimbingan;
        $validation = $this->form_validation;
        $validation->set_rules($bimbingan->rules());

        if ($validation->run()) {
            $fileRevisi = $this->bimbingan();

            $bimbingan->save($fileRevisi);
            $url = base_url('mahasiswa/CBimbingan');
            echo "<script> alert('Bimbingan Berhasil Diajukan') </script>";
            redirect($url, 'refresh');
        }
    }

    public function bimbingan()
    {
        $data['title'] = 'Bimbingan Proposal';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["pengajuan"] = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        
        $data['count'] = $this->MBimbingan->count($data['pengajuan']->idPengajuanTA);
        $cnt = $data['count']->cnt;
        $currentCount = $cnt + 1;

        $filename = str_replace('','', 'BimbinganProposal_'.$this->session->userdata('NIM/NIP').'_'.$currentCount);
        $config['upload_path']          = FCPATH.'/upload/bimbinganProposal/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $filename;
		$config['overwrite']            = true;
		$config['max_size']             = 10000; // 10MB
        $this->load->library('upload', $config);

        if(!empty($_FILES['berkasBimbingan'])){
            if(!$this->upload->do_upload('berkasBimbingan')){
                $data['error'] = $this->upload->display_errors();
                return false;
            }else{
                $uploadedData = $this->upload->data();
                $fileBimbingan = $uploadedData['file_name'];
                return $fileBimbingan;
            }
        }else{
            $data['error'] = $this->upload->display_errors();
            return false;
        }
    }
    public function edit($NIP = null)
    {

    }

    public function delete($NIP=null)
    {

    }
}
