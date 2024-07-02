<?php

class M_pembayaran extends CI_Model
{

    function tampil_data($min, $max)
    {
        return $this->db->select('*')
            ->from('pembayaran p')
            ->join('paket_mcu m', 'm.kodepaket=p.kodepaket', 'left')
            ->where('transaction_time >=', $min . ' 00:00:01')
            ->where('transaction_time <=', $max . ' 23:59:59')
            ->order_by('p.transaction_time', 'desc')
            ->get();
    }

    function search_order_idALL($min, $max)
    {
        return $this->db->select('order_id')
            ->from('pembayaran p')
            ->where('transaction_time >=', $min . ' 00:00:01')
            ->where('transaction_time <=', $max . ' 23:59:59')
            ->order_by('transaction_time', 'desc')
            ->get();
    }
    function search_order_id($id, $min, $max)
    {
        return $this->db->select('order_id')
            ->from('pembayaran p')
            ->where('transaction_time >=', $min)
            ->where('transaction_time <=', $max)
            ->where('id_pelanggan', $id)
            ->order_by('transaction_time', 'desc')
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
