<?php
class MNilaiProposal extends CI_Model
{

    public function rules()
    {
    return [
        ['field' => 'NIP',
        'label' => 'NIP',
        'rules' => 'required'],

        ['field' => 'k1',
        'label' => 'k1',
        'rules' => 'required'],

        ['field' => 'k2',
        'label' => 'k2',
        'rules' => 'required'],

        ['field' => 'k3',
        'label' => 'k3',
        'rules' => 'required'],

        ['field' => 'k4',
        'label' => 'k4',
        'rules' => 'required'],

        ['field' => 'k5',
        'label' => 'k5',
        'rules' => 'required'],

        ['field' => 'k6',
        'label' => 'k6',
        'rules' => 'required'],
    ];
    }

    public function getAll()
    {
        return $this->db->get('nilaiproposal')->result();
    }

    public function getByidUjianProposal($idUjianProposal)
    {
        return $this->db->get_where("nilaiproposal", ["idUjianProposal" => $idUjianProposal])->result();
    }

    public function getAvg($idUjianProposal)
    {
        $this->db->select_avg('total');
        $this->db->from('nilaiProposal');
        $this->db->where('nilaiProposal.idUjianProposal', $idUjianProposal);
        $query = $this->db->get()->row();
        return $query;
    }

    public function countMahasiswa($idUjianProposal)
    {
        $this->db->select("COUNT(`nilaiProposal`.`idUjianProposal`) cnt");
        $this->db->from('nilaiProposal');
        $this->db->where('nilaiProposal.idUjianProposal', $idUjianProposal);
        $query = $this->db->get()->row();
        return $query;
    }

    public function outputIndexDosenSudahNilai($NIP)
    {
        $this->db->select("*");
        $this->db->from('nilaiProposal');
        $this->db->join('ujianProposal', 'nilaiProposal.idUjianProposal = ujianProposal.idUjianProposal');
        // $subQuery= $this->db->query('penguji1 = ', $NIP);
        // $subQuery= $this->db->or_where('penguji2 = ', $NIP);
        // $subQuery= $this->db->or_where('penguji3 = ', $NIP);
        // $this->db->where('ujian.status', 'Dijadwalkan')->fromSubquery($subQuery);
        // $this->db->where('nilaiproposal.idUjianProposal = ', $id);
        $this->db->where('nilaiproposal.NIP = ', $NIP);
        $this->db->where('nilaiproposal.idUjianProposal = ujianproposal.idUjianProposal');
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
    
    public function save($idUjianProposal, $NIP, $total)
    {
        $post = $this->input->post();
        $this->idUjianProposal = $idUjianProposal;
        $this->NIP = $NIP;
        $this->k1 = $post["k1"];
        $this->k2 = $post["k2"];
        $this->k3 = $post["k3"];
        $this->k4 = $post["k4"];
        $this->k5 = $post["k5"];
        $this->k6 = $post["k6"];
        $this->total = $total;
        return $this->db->insert('nilaiproposal', $this);
    }

    public function update()
    {

    }

    public function delete($idProposal)
    {

    }
}
