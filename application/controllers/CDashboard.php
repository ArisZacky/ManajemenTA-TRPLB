<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CDashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url();
            echo "<script> alert('Maaf Session Anda Telah Berakhir') </script>";
            redirect($url, 'refresh');
        };
        $this->load->model("MLogin");
        $this->load->library("form_validation");
    }

    public function index()
    {   $data['title'] = 'Dashboard';
        if($this->session->userdata('level') == 'Mahasiswa'){
            $this->load->view('mahasiswa/index', $data);
        }elseif($this->session->userdata('level') == 'Dosen'){
            $this->load->view('dosen/index', $data);
        }elseif($this->session->userdata('level') == 'Kaprodi'){
            $this->load->view('kaprodi/index', $data);
        }elseif($this->session->userdata('level') == 'Admin'){
            $this->load->view('admin/index', $data);
        }else{
            $url = base_url();
            echo "<script> alert('Maaf Level Tidak Valdi') </script>";
            redirect($url, 'refresh');
        }
        // $this->load->view('vdashboard');
    }
    public function changePassword($idLogin = null)
    {
        $data['title'] = 'Ganti Password';
        $oldPassword = $this->input->post('oldpassword');
        $password = $this->input->post('password');
        $renewPassword = $this->input->post('renewpassword');
        
        $email = $this->session->userdata('email');

        $login = $this->MLogin;
        $validateEmail = $login->auth_email($email);
        $akun = $validateEmail->row_array();

        $validation = $this->form_validation;
        $validation->set_rules($login->rulesGantiPassword());

        if($validation->run()){
            if(password_verify($oldPassword, $akun['password'])){
                if($oldPassword == $password){
                    $url = base_url('CDashboard');
                    echo "<script> alert('Password baru tidak boleh sama dengan password lama!') </script>";
                    redirect($url, 'refresh');
                }
                
                if($password == $renewPassword){
                    $login->updatePassword($idLogin, $password);
                    $url = base_url('CDashboard');
                    echo "<script> alert('Password berhasil diubah!') </script>";
                    redirect($url, 'refresh');
                }
                else{
                    $url = base_url('CDashboard');
                    echo "<script> alert('Password Tidak Sesuai!') </script>";
                    redirect($url, 'refresh');
                }
            }else{
            $url = base_url('CDashboard');
            echo "<script> alert('Password Lama Anda Tidak Sesuai!') </script>";
            redirect($url, 'refresh');
            }
            // $login->updatePassword($email);
            
        }
    }
}
