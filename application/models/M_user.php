<?php

class M_user extends CI_Model
{
    public function cek_login($username)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE username='$username'");
        return $hasil;
    }

    public function insert_user($id_user, $username, $email, $password, $id_user_level)
    {

        $this->db->trans_start();

        $this->db->query("INSERT INTO user(id_user, username, email, password, id_user_level) VALUES
                        ('$id_user','$username','$email','$password', '$id_user_level')");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true) {
            return true;
        } else {
            return false;
        }

    }
}
