<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CCrudMahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("MMahasiswa");
        $this->load->library("form_validation");
    }

    public function index()
    {   $data['title'] = 'CRUD Mahasiswa';
        $data["mahasiswa"] = $this->MMahasiswa->getAll();
        $this->load->view("admin/crudAdmin/read", $data);
    }

    public function add()
    {
        $data['title'] = 'CRUD Mahasiswa';
        $mahasiswa = $this->MMahasiswa;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        if ($validation->run()) {
            $mahasiswa->save();
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Ditambahkan!</p>');
        }

        $this->load->view("admin/crudadmin/create", $data);
    }

    public function edit($NIM = null)
    {
        $data['title'] = 'CRUD Mahasiswa';
        if (!isset($NIM)) redirect('admin/CCrudMahasiswa');
       
        $mahasiswa = $this->MMahasiswa;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        if ($validation->run()) {
            $mahasiswa->update();
            echo $this->session->set_flashdata('success', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Selamat</h3>
            <p>Data Berhasil Diedit!</p>');
        }

        $data["mahasiswa"] = $mahasiswa->getById($NIM);
        if (!$data["mahasiswa"]) show_404();
        
        $this->load->view("admin/crudAdmin/update", $data);
    }

    public function delete($NIM=null)
    {
        if (!isset($NIM)) show_404();
            
        if ($this->MMahasiswa->delete($NIM)) {
            redirect(base_url('admin/CCrudMahasiswa'));
        }
    }
}
