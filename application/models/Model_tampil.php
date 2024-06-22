<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_tampil extends CI_Model
{
    public function getMenuById($id_menu)
    {
        // Ambil nama menu berdasarkan id_menu dari tabel menu
        $this->db->select('nama_menu');
        $this->db->where('id_menu', $id_menu);
        $query = $this->db->get('menu');

        if ($query->num_rows() > 0) {
            return $query->row()->nama_menu; // Mengembalikan nama menu jika ditemukan
        } else {
            return 'Menu tidak ditemukan'; // Mengembalikan pesan jika menu tidak ditemukan
        }
    }
}
?>