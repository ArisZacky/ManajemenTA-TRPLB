<?php
class MDosen extends CI_Model
{

    public function rules()
{
    return [
        ['field' => 'NIP',
        'label' => 'NIP',
        'rules' => 'required'],

        ['field' => 'namaDosen',
        'label' => 'namaDosen',
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
        return $this->db->get('dosen')->result();
    }

    public function getById($NIP)
    {
        return $this->db->get_where("dosen", ["NIP" => $NIP])->row();
    }
    
    public function save()
    {
        $post = $this->input->post();
        $this->NIP = $post["NIP"];
        $this->namaDosen = $post["namaDosen"];
        $this->prodi = $post["prodi"];
        $this->email = $post["email"];
        return $this->db->insert('dosen', $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->NIP = $post["NIP"];
        $this->namaDosen = $post["namaDosen"];
        $this->prodi = $post["prodi"];
        $this->email = $post["email"];
        return $this->db->update('dosen', $this, array('NIP' => $post['NIP']));
    }

    public function delete($NIP)
    {
        return $this->db->delete('dosen', array("NIP" => $NIP));
    }
}
