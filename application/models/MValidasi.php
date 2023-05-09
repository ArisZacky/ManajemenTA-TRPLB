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
}
