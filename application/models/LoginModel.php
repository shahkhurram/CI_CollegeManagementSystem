<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LoginModel extends CI_Model
{
    public function Signin($email, $password)
    {
        $data = array
        (
            'email' => $email,
            'Password' => md5($password)
        );
        $query = $this->db->where($data);
        $login = $this->db->get('users');
        if ($login != NULL) {
            return $login->row();
        }
    }
}
?>