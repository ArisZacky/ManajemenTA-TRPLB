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
        $this->load->model(["MPengajuanTugasAkhir","MDosen"]);
        $this->load->library("form_validation");
    }

    public function index()
    {   
        $data['title'] = 'Pengajuan Tugas Akhir';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["status"] = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        // $NIP = $this->MPengajuanTugasAkhir->getByNIM($data['NIM']);
        if($data["status"] != null){
            $NIM = $data["status"]->NIM;
            $NIP1 = $data["status"]->pembimbing1;
            $NIP2 = $data["status"]->pembimbing2;
            if($NIP2 != NULL){
                $data["output"] = $this->MPengajuanTugasAkhir->outputIndex($NIM, $NIP1, $NIP2);
            }else{
                $data["output"] = $this->MPengajuanTugasAkhir->outputIndex1($NIM, $NIP1);
            }
        }
        // var_dump($data["output"]);
        // die();
        $this->load->view("mahasiswa/pengajuanTugasAkhir/index", $data);
    }

    public function add()
    {
        $data['title'] = 'Pengajuan Tugas Akhir';
        $data['dosen'] = $this->MDosen->getAll();
        $pengajuanTugasAkhir = $this->MPengajuanTugasAkhir;

        $data['id'] = $this->MPengajuanTugasAkhir->getByNIM($this->session->userdata('NIM/NIP'));
        $data['p1'] = $this->MDosen->getById($data['id']->pembimbing1);
        $data['p2'] = $this->MDosen->getById($data['id']->pembimbing2);
        $id = $data['id']->idPengajuanTA;


        $validation = $this->form_validation;
        $validation->set_rules($pengajuanTugasAkhir->rules());
        if ($validation->run()) {
            $fileTugasAkhir = $this->fileTugasAkhir();

            $pengajuanTugasAkhir->updateMahasiswa($id, $fileTugasAkhir);
            $url = base_url('mahasiswa/CPengajuanTugasAkhir');
            echo "<script> alert('Tugas Akhir Berhasil Diajukan') </script>";
            redirect($url, 'refresh');
        }
        // var_dump($data['p2']);
        // die();

        $this->load->view("mahasiswa/pengajuanTugasAkhir/create", $data);
    }

    public function fileTugasAkhir()
    {
        $filename = str_replace('','', 'PengajuanProposal_'.$this->session->userdata('NIM/NIP'));
        $config['upload_path']          = FCPATH.'/upload/pengajuanTugasAkhir/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $filename;
		$config['overwrite']            = true;
		$config['max_size']             = 10000; // 10MB
        $this->load->library('upload', $config);

        if(!empty($_FILES['fileTugasAkhir'])){
            if(!$this->upload->do_upload('fileTugasAkhir')){
                $data['error'] = $this->upload->display_errors();
                return false;
            }else{
                $uploadedData = $this->upload->data();
                $fileTugasAkhir = $uploadedData['file_name'];
                return $fileTugasAkhir;
            }
        }else{
            $data['error'] = $this->upload->display_errors();
            return false;
        }
    } 

    public function edit($idPengajuanTA = null)
    {
        // $data['title'] = 'Pengajuan Tugas Akhir';
        // $this->load->view("mahasiswa/pengajuanTugasAkhir/create", $data);
    }

    public function delete($NIP=null)
    {

    }
}
