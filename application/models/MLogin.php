<?php
class MLogin extends CI_Model
{
    function auth_email($email)
    {
        $result = $this->db->query("SELECT * FROM login WHERE email='$email' LIMIT 1");
        return $result;
    }
    function auth_password($email, $password)
    {
        $result = $this->db->query("SELECT * FROM login WHERE email='$email' AND password='$password'LIMIT 1");
        return $result;
    }
}
