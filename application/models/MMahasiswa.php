<?php
class MMahasiswa extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('mahasiswa')->result();
    }
    public function getById($NIM)
    {
        return $this->db->get_where("mahasiswa", ["NIM" => $NIM])->row();
    }
}
