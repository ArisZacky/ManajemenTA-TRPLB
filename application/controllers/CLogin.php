<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
    }

    public function index()
    {
        if ($this->session->userdata('logged') != TRUE) {
            $this->load->view('vlogin');
        } else {
            $url = base_url('cdashboard');
            redirect($url);
        }
    }

    public function auth()
    {
        $emailInput = $this->input->post('email');
        $passwordInput = $this->input->post('password');

        $validateEmail = $this->Mlogin->auth_email($emailInput);
        if ($validateEmail->num_rows() > 0) {
            $validatePassword = $this->Mlogin->auth_password($emailInput, $passwordInput);
            if ($validatePassword->num_rows() > 0) {
                $x = $validatePassword->row_array();
                //Masasiswa
                if ($x['level'] == 'Mahasiswa') {
                    $level = $x['level'];
                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('email', $emailInput);
                    $this->session->set_userdata('level', $level);

                    $sql = "SELECT * FROM mahasiswa WHERE email = '" . $emailInput . "'";
                    $query = $this->db->query($sql);
                    $mahasiswa = $query->row_array();
                    $NIM = $mahasiswa['NIM'];
                    $namaMahasiswa = $mahasiswa['namaMahasiswa'];
                    $prodi =  $mahasiswa['prodi'];

                    $this->session->set_userdata('NIM/NIP', $NIM);
                    $this->session->set_userdata('nama', $namaMahasiswa);
                    $this->session->set_userdata('prodi', $prodi);

                    redirect('cdashboard');
                } elseif ($x['level'] == 'Dosen') {
                    $level = $x['level'];
                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('email', $emailInput);
                    $this->session->set_userdata('level', $level);

                    $sql = "SELECT * FROM dosen WHERE email = '" . $emailInput . "'";
                    $query = $this->db->query($sql);
                    $dosen = $query->row_array();
                    $NIP = $dosen['NIP'];
                    $namaDosen = $dosen['namaDosen'];
                    $prodi =  $dosen['prodi'];

                    $this->session->set_userdata('NIM/NIP', $NIP);
                    $this->session->set_userdata('nama', $namaDosen);
                    $this->session->set_userdata('prodi', $prodi);

                    redirect('cdashboard');
                } elseif ($x['level'] == 'Kaprodi') {
                    $level = $x['level'];
                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('email', $emailInput);
                    $this->session->set_userdata('level', $level);

                    $sql = "SELECT * FROM kaprodi WHERE email = '" . $emailInput . "'";
                    $query = $this->db->query($sql);
                    $kaprodi = $query->row_array();
                    $NIP = $kaprodi['NIP'];
                    $namaKaprodi = $kaprodi['namaKaprodi'];
                    $tahunJabatan =  $kaprodi['tahunJabatan'];

                    $this->session->set_userdata('NIM/NIP', $NIP);
                    $this->session->set_userdata('nama', $namaKaprodi);
                    $this->session->set_userdata('tahunJabatan', $tahunJabatan);

                    redirect('cdashboard');
                }
                elseif ($x['level'] == 'Admin') {
                    $level = $x['level'];
                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('email', $emailInput);
                    $this->session->set_userdata('level', $level);

                    $sql = "SELECT * FROM admin WHERE email = '" . $emailInput . "'";
                    $query = $this->db->query($sql);
                    $admin = $query->row_array();
                    $NIP = $admin['NIP'];
                    $namaAdmin = $admin['namaAdmin'];
                    $prodi =  $admin['prodi'];

                    $this->session->set_userdata('NIM/NIP', $NIP);
                    $this->session->set_userdata('nama', $namaAdmin);
                    $this->session->set_userdata('prodi', $prodi);

                    redirect('cdashboard');
                }
            } else {
                $url = base_url();
                echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect($url);
            }
        } else {
            $url = base_url();
            echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Uupps!</h3>
            <p>Email yang kamu masukan salah.</p>');
            redirect($url);
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url();
        redirect($url);
    }
}
