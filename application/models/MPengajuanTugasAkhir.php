<?php
class MPengajuanTugasAkhir extends CI_Model
{

    public function rules()
{
    return [

        ['field' => 'abstrak',
        'label' => 'abstrak',
        'rules' => 'required'],

        ['field' => 'fileTugasAkhir',
        'label' => 'fileTugasAkhir'],

        ['field' => 'modelTa',
        'label' => 'modelTa',
        'rules' => 'required'],

        ['field' => 'status',
        'label' => 'status',
        'rules' => 'required'],

    ];
}

public function rulesKaprodi()
{
    return [
        ['field' => 'NIM',
        'label' => 'NIM',
        'rules' => 'required'],

        ['field' => 'judulProposal',
        'label' => 'judulProposal',
        'rules' => 'required'],

        ['field' => 'pembimbing1',
        'label' => 'pembimbing1',
        'rules' => 'required'],

        ['field' => 'pembimbing2',
        'label' => 'pembimbing2',
        'rules' => 'required'],
    ];
}

public function rulesValidasi()
{
    return [
        ['field' => 'status',
        'label' => 'status',
        'rules' => 'required']
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

    public function outputIndex($NIM, $NIP1, $NIP2)
    {
        $this->db->select("idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, fileTugasAkhir, status, mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1', 
        dosen2.NIP as 'NIP2', dosen2.namaDosen as 'namaDosen2', dosen2.email as 'emailDosen2'");
        $this->db->from('pengajuanta');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanta.pembimbing1= dosen1.NIP');
        $this->db->join('dosen as dosen2', 'pengajuanta.pembimbing2 = dosen2.NIP');
        $this->db->where('pengajuanta.NIM', $NIM);
        $this->db->where('dosen1.NIP', $NIP1);
        $this->db->where('dosen2.NIP', $NIP2);        
        // SINTAKS DIATAS AKAN MENGHASILKAN QUERY SEPERTI
        // "SELECT idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, fileTugasAkhir, status, mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        // dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1', 
        // dosen2.NIP as 'NIP2', dosen2.namaDosen as 'namaDosen2', dosen2.email as 'emailDosen2'
        // FROM pengajuanta
        // INNER JOIN mahasiswa as mahasiswa1 ON pengajuanta.NIM = mahasiswa1.NIM
        // INNER JOIN dosen as dosen1  ON pengajuanta.pembimbing1= dosen1.NIP
        // INNER JOIN dosen as dosen2  ON pengajuanta.pembimbing2 = dosen2.NIP
        // WHERE pengajuanta.NIM = '".$NIM."' AND dosen1.NIP = '".$NIP1."' AND dosen2.NIP = '".$NIP2."'";

        $query = $this->db->get()->row();
        return $query;
    }

    public function outputIndex1($NIM, $NIP1)
    {
        $this->db->select("idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, fileTugasAkhir, status, mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'");
        $this->db->from('pengajuanta');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanta.pembimbing1= dosen1.NIP');
        $this->db->where('pengajuanta.NIM', $NIM);
        $this->db->where('dosen1.NIP', $NIP1);    
        // SINTAKS DIATAS AKAN MENGHASILKAN QUERY SEPERTI
        // "SELECT idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, fileTugasAkhir, status, mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        // dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'
        // FROM pengajuanta
        // INNER JOIN mahasiswa as mahasiswa1 ON pengajuanta.NIM = mahasiswa1.NIM
        // INNER JOIN dosen as dosen1  ON pengajuanta.pembimbing1= dosen1.NIP

        // WHERE pengajuanta.NIM = '".$NIM."' AND dosen1.NIP = '".$NIP1."';

        $query = $this->db->get()->row();
        return $query;
    }
    
    public function outputIndexKaprodiBelumDiterima()
    {
        $this->db->select("idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, pembimbing1, pembimbing2, fileTugasAkhir, status,
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'");
        $this->db->from('pengajuanta');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanta.pembimbing1= dosen1.NIP');
        $this->db->where('pengajuanta.status', 'Diproses');
        $this->db->where('pengajuanta.fileTugasAkhir IS NOT NULL');
        // $this->db->where('dosen1.NIP', $NIP1);    
        // SINTAKS DIATAS AKAN MENGHASILKAN QUERY SEPERTI
        // "SELECT idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, fileTugasAkhir, status, mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
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
        $this->db->select("idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, pembimbing1, pembimbing2, fileTugasAkhir, status,
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1',
        dosen2.NIP as 'NIP2', dosen2.namaDosen as 'namaDosen2', dosen2.email as 'emailDosen2'");
        $this->db->from('pengajuanta');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanta.pembimbing1 = dosen1.NIP');
        $this->db->join('dosen as dosen2', 'pengajuanta.pembimbing2 = dosen2.NIP');
        $this->db->where('pengajuanta.status', 'Diterima');
        // $this->db->where('dosen1.NIP', $NIP1);    
        // SINTAKS DIATAS AKAN MENGHASILKAN QUERY SEPERTI
        // "SELECT idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, fileTugasAkhir, status, mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        // dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'
        // FROM pengajuanta
        // INNER JOIN mahasiswa as mahasiswa1 ON pengajuanta.NIM = mahasiswa1.NIM
        // INNER JOIN dosen as dosen1  ON pengajuanta.pembimbing1= dosen1.NIP
        // INNER JOIN dosen as dosen2  ON pengajuanta.pembimbing2= dosen2.NIP
        // WHERE pengajuanta.NIM = '".$NIM."' AND dosen1.NIP = '".$NIP1." AND dosen2.NIP = '".$NIP2."';

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

    public function outputProsesKaprodi($idPengajuanTA)
    {
        $this->db->select("idPengajuanTA, pengajuanta.NIM, mahasiswa1.namaMahasiswa, judulProposal, abstrak, pembimbing1, pembimbing2, fileTugasAkhir, modelTa, status,
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1',
        dosen2.NIP as 'NIP2', dosen2.namaDosen as 'namaDosen2', dosen2.email as 'emailDosen2'");
        $this->db->from('pengajuanta');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanta.pembimbing1 = dosen1.NIP');
        $this->db->join('dosen as dosen2', 'pengajuanta.pembimbing2 = dosen2.NIP');
        $this->db->where('idPengajuanTA', $idPengajuanTA);
        // $this->db->where('dosen1.NIP', $NIP1);    
        // SINTAKS DIATAS AKAN MENGHASILKAN QUERY SEPERTI
        // "SELECT idPengajuanTA, pengajuanta.NIM, judulProposal, abstrak, fileTugasAkhir, status, mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
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
    
    public function save()
    {
        $post = $this->input->post();
        $this->NIM = $post["NIM"];
        $this->judulProposal = $post["judulProposal"];
        $this->abstrak = $post["abstrak"];
        $this->pembimbing1 = $post["pembimbing1"];
        $this->fileTugasAkhir = $post["fileTugasAkhir"];
        $this->status = $post["status"];
        return $this->db->insert('pengajuanta', $this);
    }

    public function saveKaprodi()
    {
        $post = $this->input->post();
        $this->NIM = $post["NIM"];
        $this->judulProposal = $post["judulProposal"];
        $this->pembimbing1 = $post["pembimbing1"];
        $this->pembimbing2 = $post["pembimbing2"];
        return $this->db->insert('pengajuanta', $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idPengajuanTA = $post["idPengajuanTA"];
        // $this->NIM = $post["NIM"];
        // $this->judulProposal = $post["judulProposal"];
        // $this->prodi = $post["abstrak"];
        // $this->pembimbing1 = $post["pembimbing1"];
        // $this->pembimbing2 = $post["pembimbing2"];
        // $this->berkasProposal = $post["berkasProposal"];
        $this->status = $post["status"];
        return $this->db->update('pengajuanta', $this, array('idPengajuanTA' => $post['idPengajuanTA']));
    }

    public function updateMahasiswa($idPengajuanTA, $fileTugasAkhir)
    {
        $post = $this->input->post();
        // $this->idPengajuanTA = $post["idPengajuanTA"];
        // $this->NIM = $post["NIM"];
        // $this->judulProposal = $post["judulProposal"];
        $this->abstrak = $post["abstrak"];
        // $this->pembimbing1 = $post["pembimbing1"];
        // $this->pembimbing2 = $post["pembimbing2"];
        $this->fileTugasAkhir = $fileTugasAkhir;
        $this->modelTa = $post["modelTa"];
        $this->status = $post["status"];
        return $this->db->update('pengajuanta', $this, array('idPengajuanTA' => $idPengajuanTA));
    }

    // public function kaprodiTerima()
    // {
    //     $post = $this->input->post();
    //     $this->idPengajuanTA = $post["idPengajuanTA"];
    //     $this->status = "Diterima";
    //     return $this->db->update('pengajuanta', $this, array('idPengajuanTA' => $post['idPengajuanTA']));
    // }

    // public function kaprodiTolak()
    // {
    //     $post = $this->input->post();
    //     $this->idPengajuanTA = $post["idPengajuanTA"];
    //     $this->status = "Ditolak";
    //     return $this->db->update('pengajuanta', $this, array('idPengajuanTA' => $post['idPengajuanTA']));
    // }

    public function delete($idPengajuanTA)
    {
        return $this->db->delete('pengajuanta', array("idPengajuanTA" => $idPengajuanTA));
    }
}
