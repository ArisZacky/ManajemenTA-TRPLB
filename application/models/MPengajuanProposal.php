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
        return $this->db->get('pengajuanproposal')->result();
    }

    public function getByNIM($NIM)
    {
        return $this->db->get_where("pengajuanproposal", ["NIM" => $NIM])->row();
    }
    
    public function outputIndex1($NIM, $NIP1)
    {
        $this->db->select("idProposal, pengajuanproposal.NIM, judulProposal, fileProposal, suratKetersediaanPembimbing1, modelProposal, status, 
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'");
        $this->db->from('pengajuanproposal');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanproposal.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanproposal.pembimbing1 = dosen1.NIP');
        $this->db->where('pengajuanproposal.NIM', $NIM);
        $this->db->where('dosen1.NIP', $NIP1);    
        // SINTAKS DIATAS AKAN MENGHASILKAN QUERY SEPERTI
        // "SELECT idProposal, pengajuanproposal.NIM, judulProposal, fileProposal, suratKetersediaanPembimbing1, modelProposal status, 
        // mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        // dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'
        // FROM pengajuanproposal
        // INNER JOIN mahasiswa as mahasiswa1 ON pengajuanproposal.NIM = mahasiswa1.NIM
        // INNER JOIN dosen as dosen1  ON pengajuanproposal.pembimbing1= dosen1.NIP

        // WHERE pengajuanproposal.NIM = '".$NIM."' AND dosen1.NIP = '".$NIP1."';

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

    public function outputIndexKaprodiBelumDiterima()
    {
        $this->db->select("idProposal, pengajuanproposal.NIM, judulProposal, fileProposal, pembimbing1, suratKetersediaanPembimbing1, modelProposal, status, 
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'");
        $this->db->from('pengajuanproposal');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanproposal.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanproposal.pembimbing1 = dosen1.NIP');
        $this->db->where('pengajuanproposal.status', 'Diproses');
        // $this->db->where('dosen1.NIP', $NIP1);    
        // SINTAKS DIATAS AKAN MENGHASILKAN QUERY SEPERTI
        // "SELECT idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, berkasProposal, status, mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        // dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'
        // FROM pengajuanta
        // INNER JOIN mahasiswa as mahasiswa1 ON pengajuanta.NIM = mahasiswa1.NIM
        // INNER JOIN dosen as dosen1  ON pengajuanta.pembimbing1= dosen1.NIP

        // WHERE pengajuanta.NIM = '".$NIM."' AND dosen1.NIP = '".$NIP1."';

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

    public function outputIndexKaprodiSudahDiterima()
    {
        $this->db->select("idProposal, pengajuanproposal.NIM, judulProposal, fileProposal, pembimbing1, suratKetersediaanPembimbing1, modelProposal, status, 
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'");
        $this->db->from('pengajuanproposal');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanproposal.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanproposal.pembimbing1 = dosen1.NIP');
        $this->db->where('pengajuanproposal.status', 'Diterima');
        // $this->db->where('dosen1.NIP', $NIP1);    
        // SINTAKS DIATAS AKAN MENGHASILKAN QUERY SEPERTI
        // "SELECT idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, berkasProposal, status, mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        // dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'
        // FROM pengajuanta
        // INNER JOIN mahasiswa as mahasiswa1 ON pengajuanta.NIM = mahasiswa1.NIM
        // INNER JOIN dosen as dosen1  ON pengajuanta.pembimbing1= dosen1.NIP

        // WHERE pengajuanta.NIM = '".$NIM."' AND dosen1.NIP = '".$NIP1."';

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

    public function outputProsesKaprodi($idProposal)
    {
        $this->db->select("idProposal, pengajuanproposal.NIM, judulProposal, fileProposal, pembimbing1, suratKetersediaanPembimbing1, modelProposal, status, 
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'");
        $this->db->from('pengajuanproposal');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanproposal.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanproposal.pembimbing1 = dosen1.NIP');
        $this->db->where('idProposal', $idProposal);
        // $this->db->where('dosen1.NIP', $NIP1);    
        // SINTAKS DIATAS AKAN MENGHASILKAN QUERY SEPERTI
        // "SELECT idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, berkasProposal, status, mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        // dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'
        // FROM pengajuanta
        // INNER JOIN mahasiswa as mahasiswa1 ON pengajuanta.NIM = mahasiswa1.NIM
        // INNER JOIN dosen as dosen1  ON pengajuanta.pembimbing1= dosen1.NIP

        // WHERE pengajuanta.idPengajuanTA = '".$idPengajuanTA."'";

        $query = $this->db->get()->row();
        // var_dump($query);
        // die();
        // if($query->num_rows()>0)
        // {
        //     foreach($query->result() as $data)
        //     {
        //         $hasil[]=$data;	
        //     }
        // }else{
        //     $hasil = '';
        // }
        return $query;
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
        return $this->db->insert('pengajuanproposal', $this);
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
        return $this->db->update('pengajuanproposal', $this, array('idProposal' => $post['idProposal']));
    }

    public function delete($idProposal)
    {
        return $this->db->delete('pengajuanproposal', array("idProposal" => $idProposal));
    }
}
