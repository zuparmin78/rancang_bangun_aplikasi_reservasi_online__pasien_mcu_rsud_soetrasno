<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Mmasuk extends CI_Model
{

    function query_validasi_username($username)
    {
        $result = $this->db->query
        ("SELECT * FROM pelanggan WHERE username='$username' LIMIT 3");
        return $result;
    }

    function query_validasi_password($username, $password)
    {
        $result = $this->db->query
        ("SELECT * FROM pelanggan WHERE username='$username' AND user_password='$password' LIMIT 3");
        return $result;
    }
    function update_password($username, $password, $tabel)
    {
        $this->db->where($username);
        $this->db->update($tabel, $password);
    }

}