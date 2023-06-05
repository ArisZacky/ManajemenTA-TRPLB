<?php
class MLogin extends CI_Model
{
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
}
