<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CCrudDosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Admin') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model("MDosen");
        $this->load->library("form_validation");
    }

    public function index()
    {   $data['title'] = 'CRUD Dosen';
        $data["dosen"] = $this->MDosen->getAll();
        $this->load->view("admin/crudDosen/read", $data);
    }

    public function add()
    {
        $data['title'] = 'CRUD Dosen';
        $dosen = $this->MDosen;
        $validation = $this->form_validation;
        $validation->set_rules($dosen->rules());

        if ($validation->run()) {
            $dosen->save();
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Ditambahkan!</p>');
        }

        $this->load->view("admin/crudDosen/create", $data);
    }

    public function edit($NIP = null)
    {
        $data['title'] = 'CRUD Dosen';
        if (!isset($NIP)) redirect('admin/CCrudDosen');
       
        $dosen = $this->MDosen;
        $validation = $this->form_validation;
        $validation->set_rules($dosen->rules());

        if ($validation->run()) {
            $dosen->update();
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Diedit!</p>');
        }

        $data["dosen"] = $dosen->getById($NIP);
        if (!$data["dosen"]) show_404();
        
        $this->load->view("admin/crudDosen/update", $data);
    }

    public function delete($NIP=null)
    {
        if (!isset($NIP)) show_404();
            
        if ($this->MDosen->delete($NIP)) {
            redirect(base_url('admin/CCrudDosen'));
        }
    }
}
