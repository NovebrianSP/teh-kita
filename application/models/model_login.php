<?php
class model_login extends CI_Model
{
    public function cek_karyawan($e, $p)
    {
        return $this->db->get_where('karyawan', array('email' => $e, 'pass_karyawan' => $p));
    }

    public function cek_pelanggan($e)
    {
        $this->db->select('id_pelanggan, nama_pelanggan');
        $this->db->where('email_pelanggan', $e);
        return $this->db->get('pelanggan');
    }

    public function cek_admin($n, $p)
    {
        return $this->db->get_where('admin', array('nama_admin' => $n, 'pass_admin' => $p));
    }
}
