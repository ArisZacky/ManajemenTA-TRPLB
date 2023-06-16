<?php
class MBimbingan extends CI_Model
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
        return $this->db->get('bimbingan')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where("bimbingan", ["idBimbingan" => $id])->row();
    }

    public function getByPembimbing1($idPengajuanTA, $NIP)
    {
        return $this->db->get_where("bimbingan", ["idPengajuanTA" => $idPengajuanTA, "NIP" => $NIP])->row();
    }
    public function getByPembimbing2($idPengajuanTA, $NIP)
    {
        return $this->db->get_where("bimbingan", ["idPengajuanTA" => $idPengajuanTA, "NIP" => $NIP])->row();
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
