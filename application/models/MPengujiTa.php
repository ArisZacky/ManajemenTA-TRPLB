<?php
class MPengujiTa extends CI_Model
{

public function rules()
{
    return [
        ['field' => 'peran',
        'label' => 'peran',
        'rules' => 'required'],

        ['field' => 'NIP',
        'label' => 'NIP',
        'rules' => 'required'],

        ['field' => 'idUjianTA',
        'label' => 'idUjianTA',
        'rules' => 'required']
    ];
}

    public function getAll()
    {
        return $this->db->get('pengujita')->result();
    }

    public function getById($idPengujiTA)
    {
        return $this->db->get_where("pengujita", ["idPengujiTA" => $idPengujiTA])->row();
    }

    public function getByIdUjianTA($idUjianTA)
    {
        return $this->db->get_where("pengujita", ["idUjianTA" => $idUjianTA])->result();
    }

    public function save($peran, $NIP)
    {
        $post = $this->input->post();
        $this->peran = $peran;
        $this->NIP = $NIP;
        $this->idUjianTA = $post['idUjianTA'];
        return $this->db->insert('pengujita', $this);
    }

    public function update()
    {
    }

    public function delete($idUjianTa)
    {
    }
}
