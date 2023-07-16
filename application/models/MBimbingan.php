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

public function rulesDosen()
{
    return [
        ['field' => 'idBimbingan',
        'label' => 'idBimbingan',
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

    public function outputIndexDosen($NIP)
    {
        $this->db->select("bimbingan.*, pengajuanta.judulProposal, pengajuanta.abstrak, pengajuanta.modelTa, mahasiswa.namaMahasiswa");
        $this->db->from("bimbingan");
        $this->db->join("pengajuanta", "bimbingan.idPengajuanTA = pengajuanta.idPengajuanTA");
        $this->db->join("mahasiswa", "pengajuanta.NIM = mahasiswa.NIM");
        $this->db->where("NIP", $NIP);
        $this->db->where("bimbingan.status", "Diproses");
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function outputIndexDosenSudahDiproses($NIP)
    {
        $this->db->select("bimbingan.*, pengajuanta.judulProposal, pengajuanta.abstrak, pengajuanta.modelTa, mahasiswa.namaMahasiswa");
        $this->db->from("bimbingan");
        $this->db->join("pengajuanta", "bimbingan.idPengajuanTA = pengajuanta.idPengajuanTA");
        $this->db->join("mahasiswa", "pengajuanta.NIM = mahasiswa.NIM");
        $this->db->where("NIP", $NIP);
        $this->db->where("bimbingan.status", "Diterima");
        $query = $this->db->get()->result();
        return $query;
    }

    public function outputProsesDosen($idBimbingan)
    {
        $this->db->select("bimbingan.*, pengajuanta.judulProposal, pengajuanta.abstrak, pengajuanta.modelTa, mahasiswa.namaMahasiswa");
        $this->db->from("bimbingan");
        $this->db->join("pengajuanta", "bimbingan.idPengajuanTA = pengajuanta.idPengajuanTA");
        $this->db->join("mahasiswa", "pengajuanta.NIM = mahasiswa.NIM");
        $this->db->where("idBimbingan", $idBimbingan);
        $query = $this->db->get()->row();
        return $query;
    }
    public function updateDosen()
    {
        $post = $this->input->post();
        $this->idBimbingan = $post["idBimbingan"];
        $this->status = $post["status"];
        return $this->db->update('bimbingan', $this, array('idBimbingan' => $post['idBimbingan']));
    }
    public function update()
    {

    }

    public function delete($NIP)
    {

    }
}
