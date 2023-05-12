<?php
class MPengajuanTugasAkhir extends CI_Model
{

    public function rules()
{
    return [
        ['field' => 'NIM',
        'label' => 'NIM',
        'rules' => 'required'],

        ['field' => 'judulProposal',
        'label' => 'judulProposal',
        'rules' => 'required'],

        ['field' => 'abstrak',
        'label' => 'abstrak',
        'rules' => 'required'],

        ['field' => 'pembimbing1',
        'label' => 'pembimbing1',
        'rules' => 'required'],

        ['field' => 'berkasProposal',
        'label' => 'berkasProposal',
        'rules' => 'required'],

        ['field' => 'status',
        'label' => 'status',
        'rules' => 'required'],

    ];
}
    public function getAll()
    {
        return $this->db->get('pengajuanta')->result();
    }

    public function getByNIM($NIM)
    {
        return $this->db->get_where("pengajuanta", ["NIM" => $NIM])->row();
    }
    
    public function save()
    {
        $post = $this->input->post();
        $this->NIM = $post["NIM"];
        $this->judulProposal = $post["judulProposal"];
        $this->prodi = $post["abstrak"];
        $this->pembimbing1 = $post["pembimbing1"];
        $this->berkasProposal = $post["berkasProposal"];
        $this->status = $post["status"];
        return $this->db->insert('pengajuanta', $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idPengajuanTA = $post["idPengajuanTA"];
        $this->NIM = $post["NIM"];
        $this->judulProposal = $post["judulProposal"];
        $this->prodi = $post["abstrak"];
        $this->pembimbing1 = $post["pembimbing1"];
        $this->berkasProposal = $post["berkasProposal"];
        $this->status = $post["status"];
        return $this->db->update('pengajuanta', $this, array('idPengajuanTA' => $post['idPengajuanTA']));
    }

    public function kaprodiTerima()
    {
        $post = $this->input->post();
        $this->idPengajuanTA = $post["idPengajuanTA"];
        $this->status = "Diterima";
        return $this->db->update('pengajuanta', $this, array('idPengajuanTA' => $post['idPengajuanTA']));
    }

    public function kaprodiTolak()
    {
        $post = $this->input->post();
        $this->idPengajuanTA = $post["idPengajuanTA"];
        $this->status = "Ditolak";
        return $this->db->update('pengajuanta', $this, array('idPengajuanTA' => $post['idPengajuanTA']));
    }

    public function delete($idPengajuanTA)
    {
        return $this->db->delete('pengajuanta', array("idPengajuanTA" => $idPengajuanTA));
    }
}
