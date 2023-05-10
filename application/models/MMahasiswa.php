<?php
class MMahasiswa extends CI_Model
{

    public function rules()
{
    return [
        ['field' => 'NIM',
        'label' => 'NIM',
        'rules' => 'required'],

        ['field' => 'namaMahasiswa',
        'label' => 'namaMahasiswa',
        'rules' => 'required'],
        
        ['field' => 'prodi',
        'label' => 'prodi',
        'rules' => 'required'],

        ['field' => 'email',
        'label' => 'email',
        'rules' => 'required']
    ];
}
    public function getAll()
    {
        return $this->db->get('mahasiswa')->result();
    }

    public function getById($NIM)
    {
        return $this->db->get_where("mahasiswa", ["NIM" => $NIM])->row();
    }
    
    public function save()
    {
        $post = $this->input->post();
        $this->NIM = $post["NIM"];
        $this->namaMahasiswa = $post["namaMahasiswa"];
        $this->prodi = $post["prodi"];
        $this->email = $post["email"];
        return $this->db->insert('mahasiswa', $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->NIM = $post["NIM"];
        $this->namaMahasiswa = $post["namaMahasiswa"];
        $this->prodi = $post["prodi"];
        $this->email = $post["email"];
        return $this->db->update('mahasiswa', $this, array('NIM' => $post['NIM']));
    }

    public function delete($NIM)
    {
        return $this->db->delete('mahasiswa', array("NIM" => $NIM));
    }
}
