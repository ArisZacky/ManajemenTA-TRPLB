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

        $filename = str_replace('','', $this->session->userdata('NIM/NIP'));
        $config['upload_path']          = FCPATH.'/upload/pengajuanTugasAkhir/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $filename;
		$config['overwrite']            = true;
		$config['max_size']             = 10000; // 10MB

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('berkasProposal'))
        {
            echo "GAGAL COY";
        }
        else
        {
            $berkasProposal = $this->upload->data();
            $berkasProposal = $berkasProposal['file_name'];
            $NIM = $this->input->post('NIM',TRUE);
            $judulProposal = $this->input->post('judulProposal',TRUE);
            $abstrak = $this->input->post('abstrak',TRUE);
            $pembimbing1 = $this->input->post('pembimbing1',TRUE);
            $status = $this->input->post('status',TRUE);

            $inputan = array(
                'NIM'=> $NIM,
                'judulProposal' => $judulProposal,
                'abstrak' => $abstrak,
                'pembimbing1' => $pembimbing1,
                'berkasProposal' => $berkasProposal,
                'status' => $status
            );
            $this->db->insert('pengajuanta', $inputan);
            $url = base_url('mahasiswa/CPengajuanTugasAkhir');
            echo "<script> alert('Tugas Akhir Berhasil Diajukan') </script>";
            redirect($url, 'refresh');
        }

        $this->load->view("mahasiswa/pengajuanTugasAkhir/create", $data);
    }

    public function edit($NIP = null)
    {

    }

    public function delete($NIP=null)
    {

    }
}
