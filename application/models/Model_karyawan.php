<?php
class Model_karyawan extends CI_Model
{
    public function get_data_karyawan()
    {
        // Ambil data dari tabel 'karyawan'
        $query = $this->db->get('karyawan');
        return $query->result_array();
    }

    public function getKaryawanById($kode_karyawan)
    {
        // Mengambil satu baris data karyawan berdasarkan kode karyawan
        $query = $this->db->get_where('karyawan', array('kode_karyawan' => $kode_karyawan));
        return $query->row(); // Mengembalikan satu baris hasil kueri
    }

    public function updateKaryawan($kode_karyawan, $data)
    {
        // Lakukan update berdasarkan kode karyawan
        $this->db->where('kode_karyawan', $kode_karyawan);
        $this->db->update('karyawan', $data);
    }

    public function tambahKaryawan($data)
    {
        // Insert data karyawan ke dalam tabel 'karyawan'
        $this->db->insert('karyawan', $data);
    }

    public function hapusKaryawan($kode_karyawan) {
        // Lakukan query untuk menghapus karyawan dari database berdasarkan $kode_karyawan
        $this->db->where('kode_karyawan', $kode_karyawan);
        $this->db->delete('karyawan');
    }
}
