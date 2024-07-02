<?php

class M_register extends CI_Model
{

    function tampil_data()
    {
        return $this->db->get('pelanggan');
    }

    function cek_username($username)
    {
        return $this->db->select('username')->where('username', $username)->get('pelanggan')->num_rows();
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }


    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function tampil_pengunjung()
    {
        return $this->db->query('SELECT * FROM pelanngan WHERE level = "pengunjung"');

    }


}
