<?php
class MUjianProposal extends CI_Model
{

    public function rules()
{
    return [
        ['field' => 'waktu',
        'label' => 'waktu',
        'rules' => 'required'],

        ['field' => 'ruangan',
        'label' => 'ruangan',
        'rules' => 'required'],

        ['field' => 'idProposal',
        'label' => 'idProposal',
        'rules' => 'required'],

        ['field' => 'penguji1',
        'label' => 'penguji1',
        'rules' => 'required'],

        ['field' => 'penguji2',
        'label' => 'penguji2',
        'rules' => 'required'],

        ['field' => 'penguji3',
        'label' => 'penguji3',
        'rules' => 'required'],

        ['field' => 'statusUjianProposal',
        'label' => 'statusUjianProposal',
        'rules' => 'required']
    ];
}

public function rulesKaprodi()
{
    return [
        ['field' => 'idUjianProposal',
        'label' => 'idUjianProposal',
        'rules' => 'required'],

        ['field' => 'status',
        'label' => 'status',
        'rules' => 'required'],

    ];
}
    public function getAll()
    {
        return $this->db->get('ujianProposal')->result();
    }

    public function getById($idProposal)
    {
        return $this->db->get_where("ujianProposal", ["idProposal" => $idProposal])->row();
    }
    
    public function outputIndexMahasiswa($NIM)
    {
        $this->db->select("idUjianProposal, waktu, ruangan, ujianProposal.status, 
        pengajuanProposal.NIM, pengajuanProposal.judulProposal, pengajuanProposal.fileProposal, 
        pengajuanProposal.pembimbing1, pengajuanProposal.suratKetersediaanPembimbing1, pengajuanProposal.modelProposal,
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1',
        dosen2.NIP as 'NIP2', dosen2.namaDosen as 'namaDosen2', dosen2.email as 'emailDosen2',
        dosen3.NIP as 'NIP3', dosen3.namaDosen as 'namaDosen3', dosen3.email as 'emailDosen3',
        dosen4.NIP as 'NIP4', dosen4.namaDosen as 'namaDosen4', dosen4.email as 'emailDosen4'");
        $this->db->from('ujianProposal');
        $this->db->join('pengajuanProposal as pengajuanProposal', 'ujianProposal.idProposal = pengajuanProposal.idProposal');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanProposal.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'ujianProposal.penguji1 = dosen1.NIP');
        $this->db->join('dosen as dosen2', 'ujianProposal.penguji2 = dosen2.NIP');
        $this->db->join('dosen as dosen3', 'ujianProposal.penguji3 = dosen3.NIP');
        $this->db->join('dosen as dosen4', 'pengajuanProposal.pembimbing1 = dosen4.NIP');
        $this->db->where('pengajuanProposal.NIM', $NIM);
        // $this->db->where('dosen1.NIP', 'ujianProposal.penguji1');  
        // $this->db->where('dosen2.NIP', 'ujianProposal.penguji2');
        // $this->db->where('dosen3.NIP', 'ujianProposal.penguji3');  

        $query = $this->db->get()->row();
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

    public function outputIndexKaprodiBelumDiterima()
    {
        $this->db->select("idProposal, ujianProposal.NIM, judulProposal, fileProposal, pembimbing1, suratKetersediaanPembimbing1, modelProposal, status, 
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'");
        $this->db->from('ujianProposal');
        $this->db->join('mahasiswa as mahasiswa1', 'ujianProposal.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'ujianProposal.pembimbing1 = dosen1.NIP');
        $this->db->where('ujianProposal.status', 'Diproses');
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
        $this->db->select("idProposal, ujianProposal.NIM, judulProposal, fileProposal, pembimbing1, suratKetersediaanPembimbing1, modelProposal, status, 
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email, 
        dosen1.NIP as 'NIP1', dosen1.namaDosen as 'namaDosen1', dosen1.email as 'emailDosen1'");
        $this->db->from('ujianProposal');
        $this->db->join('mahasiswa as mahasiswa1', 'ujianProposal.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'ujianProposal.pembimbing1 = dosen1.NIP');
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

    public function outputIndexDosen($NIP)
    {
        $this->db->select("*");
        $this->db->from('ujianProposal');
        $this->db->join('pengajuanProposal', 'ujianProposal.idProposal = pengajuanProposal.idProposal');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanProposal.NIM = mahasiswa1.NIM');
        $this->db->join('nilaiproposalsistem as nilaisistem', 'pengajuanProposal.NIM = mahasiswa1.NIM');
        // $subQuery= $this->db->query('penguji1 = ', $NIP);
        // $subQuery= $this->db->or_where('penguji2 = ', $NIP);
        // $subQuery= $this->db->or_where('penguji3 = ', $NIP);
        // $this->db->where('ujian.status', 'Dijadwalkan')->fromSubquery($subQuery);
        $this->db->where('ujianproposal.status = "Dijadwalkan" AND (penguji1 = '.$NIP.' OR penguji2 = '.$NIP.' OR penguji3 = '.$NIP.')');
        $this->db->where('nilaisistem.nim !=', 'mahasiswa1.NIM');
        $query = $this->db->get()->result();
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

    public function outputIndexDosenNilai($id)
    {
        $this->db->select("*");
        $this->db->from('ujianProposal');
        $this->db->join('pengajuanProposal', 'ujianProposal.idProposal = pengajuanProposal.idProposal');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanProposal.NIM = mahasiswa1.NIM');
        // $subQuery= $this->db->query('penguji1 = ', $NIP);
        // $subQuery= $this->db->or_where('penguji2 = ', $NIP);
        // $subQuery= $this->db->or_where('penguji3 = ', $NIP);
        // $this->db->where('ujian.status', 'Dijadwalkan')->fromSubquery($subQuery);
        $this->db->where('ujianproposal.idUjianProposal = ', $id);
        $query = $this->db->get()->row();
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
        $this->waktu = $post["waktu"];
        $this->ruangan = $post["ruangan"];
        $this->idProposal = $post["idProposal"];
        $this->penguji1 = $post["penguji1"];
        $this->penguji2 = $post["penguji2"];
        $this->penguji3 = $post["penguji3"];
        $this->status = $post["statusUjianProposal"];
        return $this->db->insert('ujianProposal', $this);
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
        return $this->db->update('ujianProposal', $this, array('idProposal' => $post['idProposal']));
    }

    public function delete($idProposal)
    {
        return $this->db->delete('ujianProposal', array("idProposal" => $idProposal));
    }
}
