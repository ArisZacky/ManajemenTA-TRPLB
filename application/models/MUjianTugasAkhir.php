<?php
class MUjianTugasAkhir extends CI_Model
{

public function rules()
{
    return [
        ['field' => 'idPengajuanTA',
        'label' => 'idPengajuanTA',
        'rules' => 'required'],

        ['field' => 'suratSelesaiBimbingan',
        'label' => 'suratSelesaiBimbingan'],

        ['field' => 'fileLaporanTA',
        'label' => 'fileLaporanTA']
    ];
}

public function rulesKaprodi()
{
    return [
        ['field' => 'idUjianTA',
        'label' => 'idUjianTA',
        'rules' => 'required'],

        ['field' => 'waktu',
        'label' => 'waktu',
        'rules' => 'required'],

        ['field' => 'ruangan',
        'label' => 'ruangan',
        'rules' => 'required'],

        ['field' => 'status',
        'label' => 'status',
        'rules' => 'required']
    ];
}


    public function getAll()
    {
        return $this->db->get('ujianta')->result();
    }

    public function getById($idUjianTA)
    {
        return $this->db->get_where("ujianta", ["idUjianTA" => $idUjianTA])->row();
    }
    
    public function outputIndexMahasiswa($idPengajuan)
    {
        $this->db->select("ujianta.*,
        pengajuanta.NIM, pengajuanta.judulProposal, pengajuanta.abstrak, pengajuanta.pembimbing1, pengajuanta.pembimbing2,
        pengajuanta.fileTugasAkhir, pengajuanta.modelTa, pengajuanta.suratKesediaanPembimbing1,
        pengajuanta.suratKesediaanPembimbing2, pengajuanta.status as statusPengajuan, pengajuanta.statusBimbingan,
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email");
        $this->db->from('ujianta');
        $this->db->join('pengajuanta as pengajuanta', 'ujianta.idPengajuanTA = pengajuanta.idPengajuanTA');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->where('ujianta.idPengajuanTA', $idPengajuan);

        $query = $this->db->get()->row();
        return $query;
    }

    public function outputIndexKaprodiMenunggu()
    {
        $this->db->select("ujianta.*,
        pengajuanta.NIM, pengajuanta.judulProposal, pengajuanta.abstrak, pengajuanta.pembimbing1, pengajuanta.pembimbing2,
        pengajuanta.fileTugasAkhir, pengajuanta.modelTa, pengajuanta.suratKesediaanPembimbing1,
        pengajuanta.suratKesediaanPembimbing2, pengajuanta.status as statusPengajuan, pengajuanta.statusBimbingan,
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email,
        dosen1.namaDosen AS namaPem1, dosen2.namaDosen AS namaPem2");
        $this->db->from('ujianta');
        $this->db->join('pengajuanta', 'ujianta.idPengajuanTA = pengajuanta.idPengajuanTA');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanta.pembimbing1 = dosen1.NIP');
        $this->db->join('dosen as dosen2', 'pengajuanta.pembimbing2 = dosen2.NIP');
        $this->db->where('ujianta.status', "Menunggu");
 
        $query = $this->db->get()->result();
        return $query;
    }

    public function outputIndexKaprodiDijadwalkan()
    {
        $this->db->select("ujianta.*,
        pengajuanta.NIM, pengajuanta.judulProposal, pengajuanta.abstrak, pengajuanta.pembimbing1, pengajuanta.pembimbing2,
        pengajuanta.fileTugasAkhir, pengajuanta.modelTa, pengajuanta.suratKesediaanPembimbing1,
        pengajuanta.suratKesediaanPembimbing2, pengajuanta.status as statusPengajuan, pengajuanta.statusBimbingan,
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email,
        dosen1.namaDosen AS namaPem1, dosen2.namaDosen AS namaPem2");
        $this->db->from('ujianta');
        $this->db->join('pengajuanta', 'ujianta.idPengajuanTA = pengajuanta.idPengajuanTA');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanta.pembimbing1 = dosen1.NIP');
        $this->db->join('dosen as dosen2', 'pengajuanta.pembimbing2 = dosen2.NIP');
        $this->db->where('ujianta.status', "Dijadwalkan");
 
        $query = $this->db->get()->result();
        return $query;
    }

    public function outputIndexKaprodiLulus()
    {
        $this->db->select("ujianta.*,
        pengajuanta.NIM, pengajuanta.judulProposal, pengajuanta.abstrak, pengajuanta.pembimbing1, pengajuanta.pembimbing2,
        pengajuanta.fileTugasAkhir, pengajuanta.modelTa, pengajuanta.suratKesediaanPembimbing1,
        pengajuanta.suratKesediaanPembimbing2, pengajuanta.status as statusPengajuan, pengajuanta.statusBimbingan,
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email,
        dosen1.namaDosen AS namaPem1, dosen2.namaDosen AS namaPem2");
        $this->db->from('ujianta');
        $this->db->join('pengajuanta', 'ujianta.idPengajuanTA = pengajuanta.idPengajuanTA');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanta.pembimbing1 = dosen1.NIP');
        $this->db->join('dosen as dosen2', 'pengajuanta.pembimbing2 = dosen2.NIP');
        $this->db->where('ujianta.status', "Lulus");
 
        $query = $this->db->get()->result();
        return $query;
    }

    public function outputIndexKaprodiLulusRevisi()
    {
        $this->db->select("ujianta.*,
        pengajuanta.NIM, pengajuanta.judulProposal, pengajuanta.abstrak, pengajuanta.pembimbing1, pengajuanta.pembimbing2,
        pengajuanta.fileTugasAkhir, pengajuanta.modelTa, pengajuanta.suratKesediaanPembimbing1,
        pengajuanta.suratKesediaanPembimbing2, pengajuanta.status as statusPengajuan, pengajuanta.statusBimbingan,
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email,
        dosen1.namaDosen AS namaPem1, dosen2.namaDosen AS namaPem2");
        $this->db->from('ujianta');
        $this->db->join('pengajuanta', 'ujianta.idPengajuanTA = pengajuanta.idPengajuanTA');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanta.pembimbing1 = dosen1.NIP');
        $this->db->join('dosen as dosen2', 'pengajuanta.pembimbing2 = dosen2.NIP');
        $this->db->where('ujianta.status', "Lulus Revisi");
 
        $query = $this->db->get()->result();
        return $query;
    }

    public function outputIndexKaprodiProses($idUjianTA)
    {
        $this->db->select("ujianta.*,
        pengajuanta.NIM, pengajuanta.judulProposal, pengajuanta.abstrak, pengajuanta.pembimbing1, pengajuanta.pembimbing2,
        pengajuanta.fileTugasAkhir, pengajuanta.modelTa, pengajuanta.suratKesediaanPembimbing1,
        pengajuanta.suratKesediaanPembimbing2, pengajuanta.status as statusPengajuan, pengajuanta.statusBimbingan,
        mahasiswa1.namaMahasiswa, mahasiswa1.prodi, mahasiswa1.email,
        dosen1.namaDosen AS namaPem1, dosen2.namaDosen AS namaPem2");
        $this->db->from('ujianta');
        $this->db->join('pengajuanta', 'ujianta.idPengajuanTA = pengajuanta.idPengajuanTA');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanta.NIM = mahasiswa1.NIM');
        $this->db->join('dosen as dosen1', 'pengajuanta.pembimbing1 = dosen1.NIP');
        $this->db->join('dosen as dosen2', 'pengajuanta.pembimbing2 = dosen2.NIP');
        $this->db->where('ujianta.idUjianTA', $idUjianTA);
 
        $query = $this->db->get()->row();
        return $query;
    }

    public function outputIndexDosen($NIP)
    {
        $this->db->select("`ujianProposal`.`idUjianProposal` AS 'idUjianProposal1', `ujianProposal`.`waktu`, `ujianProposal`.`ruangan`, `ujianProposal`.`idProposal`, `ujianProposal`.`penguji1`, `ujianProposal`.`penguji2`, `ujianProposal`.`penguji3`, `ujianProposal`.`status`, 
        `pengajuanProposal1`.`idProposal`, `pengajuanProposal1`.`NIM` AS 'NIM1', `pengajuanProposal1`.`judulProposal`, `pengajuanProposal1`.`fileProposal`, `pengajuanProposal1`.`modelProposal`, 
        `mahasiswa1`.`namaMahasiswa`, `mahasiswa1`.`prodi`, `mahasiswa1`.`prodi`, `mahasiswa1`.`email`");
        $this->db->from('ujianProposal');
        $this->db->join('pengajuanProposal as pengajuanProposal1', 'ujianProposal.idProposal = pengajuanProposal1.idProposal');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanProposal1.NIM = mahasiswa1.NIM');
        $this->db->where('NOT EXISTS(SELECT NIP FROM nilaiproposal WHERE nilaiproposal.idUjianProposal = ujianproposal.idUjianProposal 
        AND NIP = '.$NIP.') 
        AND (`penguji1` = '.$NIP.' OR `penguji2` = '.$NIP.' OR `penguji3` = '.$NIP.')');
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

    public function outputIndexDosenSudahNilai($NIP)
    {
        $this->db->select("`ujianProposal`.`idUjianProposal` AS 'idUjianProposal1', `ujianProposal`.`waktu`, `ujianProposal`.`ruangan`, `ujianProposal`.`idProposal`, `ujianProposal`.`penguji1`, `ujianProposal`.`penguji2`, `ujianProposal`.`penguji3`, `ujianProposal`.`status`, 
        `pengajuanProposal1`.`idProposal`, `pengajuanProposal1`.`NIM` AS 'NIM1', `pengajuanProposal1`.`judulProposal`, `pengajuanProposal1`.`fileProposal`, `pengajuanProposal1`.`modelProposal`, 
        `mahasiswa1`.`namaMahasiswa`, `mahasiswa1`.`prodi`, `mahasiswa1`.`prodi`, `mahasiswa1`.`email`");
        $this->db->from('ujianProposal');
        $this->db->join('pengajuanProposal as pengajuanProposal1', 'ujianProposal.idProposal = pengajuanProposal1.idProposal');
        $this->db->join('mahasiswa as mahasiswa1', 'pengajuanProposal1.NIM = mahasiswa1.NIM');
        $this->db->where('EXISTS(SELECT NIP FROM nilaiproposal WHERE nilaiproposal.idUjianProposal = ujianproposal.idUjianProposal 
        AND NIP = '.$NIP.') 
        AND (`penguji1` = '.$NIP.' OR `penguji2` = '.$NIP.' OR `penguji3` = '.$NIP.')');
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

    
    public function save($suratSelesaiBimbingan, $fileLaporanTA)
    {
        $post = $this->input->post();
        $this->idPengajuanTA = $post["idPengajuanTA"];
        $this->fileLaporanTA = $fileLaporanTA;
        $this->suratSelesaiBimbingan = $suratSelesaiBimbingan;
        return $this->db->insert('ujianta', $this);
    }

    public function updateKaprodi()
    {
        $post = $this->input->post();
        $this->idUjianTA = $post["idUjianTA"];
        $this->waktu = $post["waktu"];
        $this->ruangan = $post["ruangan"];
        $this->status = $post["status"];
        return $this->db->update('ujianTa', $this, array('idUjianTA' => $post['idUjianTA']));
    }

    public function delete($idUjianTa)
    {
        return $this->db->delete('ujinaTa', array("idUjianTa" => $idUjianTa));
    }
}
