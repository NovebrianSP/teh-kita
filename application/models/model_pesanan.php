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

    public function hapusData($nama_menu)
    {
        $this->db->delete('menu', array('nama_menu' => $nama_menu));
    }
}
