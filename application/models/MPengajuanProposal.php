<?php
class MPengajuanProposal extends CI_Model
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

        ['field' => 'fileProposal',
        'label' => 'fileProposal'],

        ['field' => 'pembimbing1',
        'label' => 'pembimbing1',
        'rules' => 'required'],

        ['field' => 'suratKetersediaanPembimbing1',
        'label' => 'suratKetersediaanPembimbing1'],

        ['field' => 'modelProposal',
        'label' => 'modelProposal',
        'rules' => 'required'],

        ['field' => 'status',
        'label' => 'status',
        'rules' => 'required'],

    ];
}

public function rulesKaprodi()
{
    return [
        ['field' => 'idProposal',
        'label' => 'idProposal',
        'rules' => 'required'],

        ['field' => 'status',
        'label' => 'status',
        'rules' => 'required'],

    ];
}
    public function getAll()
    {
        return $this->db->get('pengajuanProposal')->result();
    }

    public function getByNIM($NIM)
    {
        return $this->db->get_where("pengajuanProposal", ["NIM" => $NIM])->row();
    }
    
    public function outputIndex1($NIM, $NIP1)
    {
        $this->db->select("idProposal, pengajuanProposal.NIM, judulProposal, fileProposal, suratKetersediaanPembimbing1, modelProposal status, 
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'");
        $this->db->from('pengajuanProposal');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanProposal.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanProposal.pembimbing1 = dosen1.NIP');
        $this->db->where('pengajuanProposal.NIM', $NIM);
        $this->db->where('dosen1.NIP', $NIP1);    
        // SINTAKS DIATAS AKAN MENGHASILKAN QUERY SEPERTI
        // "SELECT idProposal, pengajuanProposal.NIM, judulProposal, fileProposal, suratKetersediaanPembimbing1, modelProposal status, 
        // mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        // dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'
        // FROM pengajuanProposal
        // INNER JOIN mahasiswa as mahasiswa1 ON pengajuanProposal.NIM = mahasiswa1.NIM
        // INNER JOIN dosen as dosen1  ON pengajuanProposal.pembimbing1= dosen1.NIP

        // WHERE pengajuanProposal.NIM = '".$NIM."' AND dosen1.NIP = '".$NIP1."';

        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            foreach($query->result() as $data)
            {
                $hasil[]=$data;	
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function save($fileProposal, $suratPembimbing1)
    {
        $post = $this->input->post();
        $this->NIM = $post["NIM"];
        $this->judulProposal = $post["judulProposal"];
        $this->fileProposal = $fileProposal;
        $this->pembimbing1 = $post["pembimbing1"];
        $this->suratKetersediaanPembimbing1 = $suratPembimbing1;
        $this->modelProposal = $post["modelProposal"];
        $this->status = $post["status"];
        return $this->db->insert('pengajuanProposal', $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idProposal = $post["idProposal"];
        // $this->NIM = $post["NIM"];
        // $this->judulProposal = $post["judulProposal"];
        // $this->prodi = $post["abstrak"];
        // $this->pembimbing1 = $post["pembimbing1"];
        // $this->pembimbing2 = $post["pembimbing2"];
        // $this->berkasProposal = $post["berkasProposal"];
        $this->status = $post["status"];
        return $this->db->update('pengajuanProposal', $this, array('idProposal' => $post['idProposal']));
    }

    public function delete($idProposal)
    {
        return $this->db->delete('pengajuanProposal', array("idProposal" => $idProposal));
    }
}
