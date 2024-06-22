<?php
class model_pesanan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function hapusPesanan($id_pesanan)
    {
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->delete('pesanan');
    }

    public function simpan_file($data)
    {
        $this->db->insert('menu', $data);
    }

    public function hapusData($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->delete('menu');
    }

    public function getDataId($id_menu)
    {
        return $this->db->get_where('menu', array('id_menu' => $id_menu));
    }

    public function updateMenu($id, $data)
    {
        $this->db->where('id_menu', $id);
        $this->db->update('menu', $data);
    }

    public function simpan_history_pemesanan($data)
    {
        // Simpan data pesanan ke dalam tabel history_pemesanan
        $this->db->insert('history_pemesanan', $data);
    }

    public function getPesananById($id_pesanan)
    {
        // Ambil data pesanan berdasarkan ID pesanan
        $this->db->where('id_pesanan', $id_pesanan);
        return $this->db->get('pesanan')->row_array();
    }
}
