<?php

class M_periksa extends CI_Model
{
  
  
  function lihat_data()
  {
    return $this->db->get('periksa');
  }

  function lihat_paket1()
  {
    return $this->db->query('SELECT * FROM periksa WHERE kodepaket= "MCU01"');
  }

  function lihat_paket2()
  {
    return $this->db->query('SELECT * FROM periksa WHERE kodepaket= "MCU02"');
  }

  function lihat_paket3()
  {
    return $this->db->query('SELECT * FROM periksa WHERE kodepaket= "MCU03"');
  }

  function lihat_paket4()
  {
    return $this->db->query('SELECT * FROM periksa WHERE kodepaket= "MCU04"');
  }

  function lihat_paketparu()
  {
    return $this->db->query('SELECT * FROM periksa WHERE kodepaket= "MCU05"');
  }

  function lihat_paketjantung()
  {
    return $this->db->query('SELECT * FROM periksa WHERE kodepaket= "MCU06"');
  }

  function lihat_paketjiwa()
  {
    return $this->db->query('SELECT * FROM periksa WHERE kodepaket= "MCU07"');
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
