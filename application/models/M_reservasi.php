<?php

class M_reservasi extends CI_Model
{

    function tampil_data($min, $max)
    {
        return $this->db->select('*')
            ->from('reservasi r')
            ->join('paket_mcu m', 'm.kodepaket=r.kode_paket', 'left')
            ->join('pembayaran p', 'p.order_id=r.id_order', 'left')
            ->join('pasien_mcu pm', 'pm.id=r.id_pasien', 'left')
            ->where('r.tgl_kedatangan >=', $min)
            ->where('r.tgl_kedatangan <=', $max)
            ->order_by('r.status_pasien', 'asc')
            ->order_by('r.tgl_kedatangan', 'desc')
            ->get();
    }
    function tampil_data_petugas()
    {
        // $waktu = date("Y-m-d");
        $bis = $this->db->select('*')
            ->from('reservasi r')
            ->join('paket_mcu m', 'm.kodepaket=r.kode_paket', 'left')
            ->join('pembayaran p', 'p.order_id=r.id_order', 'left')
            ->join('pasien_mcu pm', 'pm.id=r.id_pasien', 'left')
            // ->where('r.tgl_kedatangan', $waktu)
            ->get();
        return $bis;
    }
    function tampil_data_konfrimasi($min, $max)
    {
        return $this->db->select('*')
            ->from('reservasi r')
            ->join('paket_mcu m', 'm.kodepaket=r.kode_paket', 'left')
            ->join('pembayaran p', 'p.order_id=r.id_order', 'left')
            ->join('pasien_mcu pm', 'pm.id=r.id_pasien', 'left')
            ->where('r.status_pasien', 1)
            ->where('tgl_kedatangan >=', $min)
            ->where('tgl_kedatangan <=', $max)
            ->order_by('r.tgl_kedatangan', 'desc')
            ->get();
    }

    function search_order_idALLs()
    {
        return $this->db->select('id_order')
            ->from('reservasi')
            ->get();
    }
    function search_order_idALL($min, $max)
    {
        return $this->db->select('id_order')
            ->from('reservasi')
            ->where('tgl_kedatangan >=', $min)
            ->where('tgl_kedatangan <=', $max)
            ->get();
    }
    function search_order_id($id, $min, $max)
    {
        return $this->db->select('id_order')
            ->from('reservasi')
            ->where('id_pelanggan', $id)
            ->where('tgl_kedatangan >=', $min)
            ->where('tgl_kedatangan <=', $max)
            ->get();
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
