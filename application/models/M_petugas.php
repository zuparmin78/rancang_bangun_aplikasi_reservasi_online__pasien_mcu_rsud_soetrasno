<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_petugas extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function Tsandi($where = '')
  {
    return $this->db->query("select * from pelanggan  $where;");
  }

  function Tpaket($where = '')
  {
    return $this->db->query("select * from paket_mcu $where;");
  }

  function Takun($where = '')
  {
    return $this->db->query('SELECT * FROM pelanggan WHERE level= "pengunjung"');
  }

  function Tdokter($where = '')
  {
    return $this->db->query("select * from dokter $where;");
  }


}
?>