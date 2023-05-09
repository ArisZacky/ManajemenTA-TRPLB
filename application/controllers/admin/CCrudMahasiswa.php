<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CCrudMahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("MMahasiswa");
    }

    public function index()
    {
        $data["mahasiswa"] = $this->MMahasiswa->getAll();
        $this->load->view("admin/crudAdmin/read", $data);
    }
}
