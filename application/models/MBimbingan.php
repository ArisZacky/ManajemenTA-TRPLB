<?php
class MBimbingan extends CI_Model
{

    public function rules()
{
    return [
        ['field' => 'idPengajuanTA',
        'label' => 'idPengajuanTA',
        'rules' => 'required'],

        ['field' => 'NIP',
        'label' => 'NIP',
        'rules' => 'required'],

        ['field' => 'tanggal',
        'label' => 'tanggal',
        'rules' => 'required'],
        
        ['field' => 'berkasBimbingan',
        'label' => 'berkasBimbingan'],

        ['field' => 'keteranganRevisi',
        'label' => 'keteranganRevisi',
        'rules' => 'required'],

        ['field' => 'status',
        'label' => 'status',
        'rules' => 'required'],
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

    public function count($idPengajuanTA)
    {
        $this->db->select("COUNT(`bimbingan`.`idPengajuanTA`) cnt");
        $this->db->from("bimbingan");
        $this->db->where("idPengajuanTA", $idPengajuanTA);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getByPembimbing1($idPengajuanTA, $NIP)
    {
        return $this->db->get_where("bimbingan", ["idPengajuanTA" => $idPengajuanTA, "NIP" => $NIP])->result();
    }
    public function getByPembimbing2($idPengajuanTA, $NIP)
    {
        return $this->db->get_where("bimbingan", ["idPengajuanTA" => $idPengajuanTA, "NIP" => $NIP])->result();
    }
    
    public function save($berkas)
    {
        $post = $this->input->post();
        $this->idPengajuanTA = $post["idPengajuanTA"];
        $this->NIP = $post["NIP"];
        $this->tanggal = $post["tanggal"];
        $this->berkasBimbingan = $berkas;
        $this->keteranganRevisi = $post["keteranganRevisi"];
        $this->status = $post["status"];
        return $this->db->insert('bimbingan', $this);
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
