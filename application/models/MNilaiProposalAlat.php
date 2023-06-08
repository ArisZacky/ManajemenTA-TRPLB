<?php
class MNilaiProposalAlat extends CI_Model
{

    public function rules()
    {
    return [
        ['field' => 'NIM',
        'label' => 'NIM',
        'rules' => 'required'],

        ['field' => 'NIP',
        'label' => 'NIP',
        'rules' => 'required'],

        ['field' => 'penampilan',
        'label' => 'penampilan',
        'rules' => 'required'],

        ['field' => 'kPengetahuan',
        'label' => 'kPengetahuan',
        'rules' => 'required'],

        ['field' => 'KSDP',
        'label' => 'KSDP',
        'rules' => 'required'],

        ['field' => 'KPTH',
        'label' => 'KPTH',
        'rules' => 'required'],

        ['field' => 'kPerencanaan',
        'label' => 'kPerencanaan',
        'rules' => 'required'],

        ['field' => 'kRancangan',
        'label' => 'kRancangan',
        'rules' => 'required'],
    ];
    }

    public function getAll()
    {
        return $this->db->get('nilaiproposalsistem')->result();
    }

    public function getByNIM($NIM)
    {
        return $this->db->get_where("nilaiproposalsistem", ["NIM" => $NIM])->row();
    }

    public function save($idUjianProposal, $NIM, $NIP, $total, $predikat)
    {
        $post = $this->input->post();
        $this->idUjianProposal = $idUjianProposal;
        $this->NIM = $NIM;
        $this->NIP = $NIP;
        $this->penampilan = $post["penampilan"];
        $this->kPengetahuan = $post["kPengetahuan"];
        $this->KSDP = $post["KSDP"];
        $this->KPTH = $post["KPTH"];
        $this->kPerencanaan = $post["kPerencanaan"];
        $this->kRancangan = $post["kRancangan"];
        $this->total = $total;
        $this->predikat = $predikat;
        return $this->db->insert('nilaiproposalalat', $this);
    }

    public function update()
    {

    }

    public function delete($idProposal)
    {

    }
}
