<?php

class M_profile extends CI_Model
{

    function tampil_data()
    {
        return $this->db->get('pelanggan');
    }
    function tampil_data_profil($id)
    {
        return $this->db->select('*')
            ->from('pelanggan')
            ->where('id', $id)
            ->get();
    }

    function tampil_tamu($id)
    {
        return $this->db->select('*')
            ->from('profiletamu t')
            ->join('pelanggan p', 't.id_pelanggan=p.id')
            ->where('t.id_pelanggan', $id)
            ->get();
    }

    function tampildata()
    {
        return $this->db->select('*')
            ->from('profiletamu t')
            ->join('pelanggan p', 't.id_pelanggan=p.id')
            ->get();
    }

    function cek_profil($id_profil)
    {
        return $this->db->select('id_pelanggan')->where('id_pelanggan', $id_profil)->get('profiletamu')->num_rows();
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




}
