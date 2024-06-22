<?php
class Model_pelanggan extends CI_Model
{
    public function get_data_pelanggan()
    {
        // Ambil data dari tabel 'pelanggan'
        $query = $this->db->get('pelanggan');
        return $query->result_array();
    }

    public function hapusPelanggan($id_pelanggan)
    {
        // Lakukan query untuk menghapus pelanggan dari database berdasarkan $id_pelanggan
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->delete('pelanggan');
    }

    public function tambahDataPelanggan($data)
    {
        $this->db->insert('pelanggan', $data);
    }

    public function getPelangganById($id)
    {
        // Mengambil satu baris data pelanggan berdasarkan kode karyawan
        $query = $this->db->get_where('pelanggan', array('id_pelanggan' => $id));
        return $query->row(); // Mengembalikan satu baris hasil kueri
    }

    public function updateDataPelanggan($id_pelanggan, $data) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan', $data);
    }
}
