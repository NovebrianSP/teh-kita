<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_tambah extends CI_Model
{

    public function get_nama_pelanggan($id_pelanggan) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get('pelanggan');
        $result = $query->row_array();

        return ($result) ? $result['nama_pelanggan'] : '';
    }

    public function tambah_pesanan($data_pesanan) {
        $this->db->insert('pesanan', $data_pesanan);
    }
}
?>