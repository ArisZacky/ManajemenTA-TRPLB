<?php
class MSK extends CI_Model
{

    public function rules()
    {
        return [
            ['field' => 'judulSK',
            'label' => 'judulSK',
            'rules' => 'required'],

            ['field' => 'jenisSK',
            'label' => 'jenisSK',
            'rules' => 'required'],
            
            ['field' => 'fileSK',
            'label' => 'fileSK',
            ]
        ];
    }

    public function rulesEdit()
    {
        return [
            ['field' => 'idSK',
            'label' => 'idSK',],

            ['field' => 'judulSK',
            'label' => 'judulSK',
            'rules' => 'required'],

            ['field' => 'jenisSK',
            'label' => 'jenisSK',
            'rules' => 'required'],
            
            ['field' => 'fileSK',
            'label' => 'fileSK',
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get('skDosen')->result();
    }

    public function getById($idSK)
    {
        return $this->db->get_where("skDosen", ["idSK" => $idSK])->row();
    }
    
    public function save($fileSK)
    {
        $post = $this->input->post();
        $this->judulSK = $post["judulSK"];
        $this->jenisSK = $post["jenisSK"];
        $this->fileSK = $fileSK;
        return $this->db->insert('skDosen', $this);
    }

    public function update($fileSK)
    {
        $post = $this->input->post();
        $this->idSK = $post["idSK"];
        $this->judulSK = $post["judulSK"];
        $this->jenisSK = $post["jenisSK"];
        $this->fileSK = $fileSK;

        return $this->db->update('skDosen', $this, array('idSK' => $post['idSK']));
    }

    public function updateNoFile()
    {
        $post = $this->input->post();
        $this->idSK = $post["idSK"];
        $this->judulSK = $post["judulSK"];
        $this->jenisSK = $post["jenisSK"];

        return $this->db->update('skDosen', $this, array('idSK' => $post['idSK']));
    }

    public function delete($idSK)
    {
        return $this->db->delete('skDosen', array("idSK" => $idSK));
    }
}
