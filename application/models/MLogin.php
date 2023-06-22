<?php
class MLogin extends CI_Model
{
    public function rulesGantiPassword()
    {
        return [    
            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required|min_length[8]']
        ];
    }

    function auth_email($email)
    {
        // $result = $this->db->query("SELECT * FROM login WHERE email='$email' LIMIT 1");
        $result = $this->db->get_where('login', ["email" => $email], 1);
        return $result;
    }
    function save($password, $level){
        $post = $this->input->post();
        $this->email = $post["email"];
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->level = $level;
        return $this->db->insert('login', $this);
    }
    function updatePassword($idLogin, $password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        return $this->db->update('login', $this, array('idLogin' => $idLogin));
    }
}
