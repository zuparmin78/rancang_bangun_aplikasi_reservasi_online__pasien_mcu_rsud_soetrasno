<?php

class M_dokter extends CI_Model
{

    function tampil_data()
    {
        return $this->db->get('dokter');
    }
    function tampil_keutama()
    {
        return $this->db->select('*')->from('dokter')->where('dokter_active', 1)->get();
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

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


}
