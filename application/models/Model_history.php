<?php

class Model_history extends CI_Model
{
    public function getHistoryByCustomer()
    {
        // Misalnya, mengambil history berdasarkan ID pelanggan yang tersimpan dalam session
        $id_pelanggan = $this->session->userdata('id_pelanggan'); // Sesuaikan dengan cara penyimpanan ID pelanggan di session Anda

        // Query untuk mengambil history pemesanan berdasarkan ID pelanggan
        $this->db->where('id_pelanggan', $id_pelanggan);
        $result = $this->db->get('history_pemesanan')->result_array();

        return $result;
    }
}

?>