<?php
    class model_login extends CI_Model {
        public function cek_karyawan($e, $p) {
            return $this->db->get_where('karyawan', array('email' => $e, 'pass_karyawan' => $p));
        }

        public function cek_pelanggan($e) {
            return $this->db->get_where('pelanggan', array('email_pelanggan' => $e));
        }
    }
?>