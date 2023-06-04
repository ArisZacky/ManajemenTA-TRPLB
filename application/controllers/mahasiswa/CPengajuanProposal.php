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
    }

    public function index()
    {   
        $data['title'] = 'Pengajuan Proposal';
        $data['NIM'] = $this->session->userdata('NIM/NIP');
        $data["status"] = $this->MPengajuanProposal->getByNIM($data['NIM']);
        $NIP = $this->MPengajuanProposal->getByNIM($data['NIM']);
        if($data["status"] != null){
            $NIM = $NIP->NIM;
            $NIP1 = $NIP->pembimbing1;
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
            $tes = $this->fileProposal();
            var_dump($tes);
            die();
            $pengajuanProposal->save();
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Ditambahkan!</p>');
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
        if ( !$this->upload->do_upload('fileProposal'))
        {
            $data['error'] = $this->upload->display_errors();
            return false;
        }
        else
        {
            $uploadedData = $this->upload->data();
            $berkasProposal = $uploadedData['file_name'];
            return $berkasProposal;
        }
    }    

    public function edit($NIP = null)
    {

    }

    public function delete($NIP=null)
    {

    }
}
