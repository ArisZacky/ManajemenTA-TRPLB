<?php
class MKaprodi extends CI_Model
{

    public function rules()
{
    return [
        ['field' => 'NIP',
        'label' => 'NIP',
        'rules' => 'required'],

        ['field' => 'namaKaprodi',
        'label' => 'namaKaprodi',
        'rules' => 'required'],
        
        ['field' => 'prodi',
        'label' => 'prodi',
        'rules' => 'required'],

        ['field' => 'tahunJabatan',
        'label' => 'tahunJabatan',
        'rules' => 'required'],

        ['field' => 'email',
        'label' => 'email',
        'rules' => 'required']
    ];
}
    public function getAll()
    {
        return $this->db->get('kaprodi')->result();
    }

    public function getById($NIP)
    {
        return $this->db->get_where("kaprodi", ["NIP" => $NIP])->row();
    }
    
    public function save()
    {
        $post = $this->input->post();
        $this->NIP = $post["NIP"];
        $this->namaKaprodi = $post["namaKaprodi"];
        $this->prodi = $post["prodi"];
        $this->tahunJabatan = $post["tahunJabatan"];
        $this->email = $post["email"];
        return $this->db->insert('kaprodi', $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->NIP = $post["NIP"];
        $this->namaKaprodi = $post["namaKaprodi"];
        $this->prodi = $post["prodi"];
        $this->tahunJabatan = $post["tahunJabatan"];
        $this->email = $post["email"];
        return $this->db->update('kaprodi', $this, array('NIP' => $post['NIP']));
    }

    public function delete($NIP)
    {
        return $this->db->delete('kaprodi', array("NIP" => $NIP));
    }
}
