<?php
class MValidasi extends CI_Model
{
    function validasi()
    {
        if ($this->session->userdata('username') == null) {
            echo "<script> alert('Session telah berakhir!') </script>";
            redirect('clogin/', 'refresh');
        }
    }

    function validasiAdmin()
    {
        if ($this->session->userdata('level') != 'Admin') {
            echo "<script> alert('Anda Tidak Memiliki Akses!') </script>";
            redirect('clogin/', 'refresh');
        }
    }
}
