<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CCrudKaprodi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'Admin') {
            $url = base_url();
            echo "<script> alert('Maaf Anda Tidak Memiliki Akses ke Halaman Ini!') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model("MKaprodi");
        $this->load->library("form_validation");
    }

    public function index()
    {   $data['title'] = 'CRUD Kaprodi';
        $data["kaprodi"] = $this->MKaprodi->getAll();
        $this->load->view("admin/crudKaprodi/read", $data);
    }

    public function add()
    {
        $data['title'] = 'CRUD Kaprodi';
        $kaprodi = $this->MKaprodi;
        $validation = $this->form_validation;
        $validation->set_rules($kaprodi->rules());

        if ($validation->run()) {
            $kaprodi->save();
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Ditambahkan!</p>');
        }

        $this->load->view("admin/crudKaprodi/create", $data);
    }

    public function edit($NIP = null)
    {
        $data['title'] = 'CRUD Kaprodi';
        if (!isset($NIP)) redirect('admin/CCrudKaprodi');
       
        $kaprodi = $this->MKaprodi;
        $validation = $this->form_validation;
        $validation->set_rules($kaprodi->rules());

        if ($validation->run()) {
            $kaprodi->update();
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Diedit!</p>');
        }

        $data["kaprodi"] = $kaprodi->getById($NIP);
        if (!$data["kaprodi"]) show_404();
        
        $this->load->view("admin/crudKaprodi/update", $data);
    }

    public function delete($NIP=null)
    {
        if (!isset($NIP)) show_404();
            
        if ($this->MKaprodi->delete($NIP)) {
            redirect(base_url('admin/CCrudKaprodi'));
        }
    }
}
