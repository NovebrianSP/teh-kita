<?php
    class Tehkita extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->model('model_login');
        }

        public function index(){
            $this->load->view('auth/login_user');
        }

        public function menu(){
            $this->load->view('karyawan/menu');
        }

        public function datajual(){
            $this->load->view('karyawan/data_jual');
        }

        public function landing(){
            $this->load->view('karyawan/landing');
        }

        public function aksi_login1() {
            $email = $this->input->post('email');
            $password = $this->input->post('pass');

            $check = $this->model_login->cek_karyawan($email, $password)->num_rows();
            if($check > 0) {
                $data_session = array(
                    'nama' => 'nama_karyawan',
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                redirect('Tehkita/landing');
            } else {
                echo "Email atau Password yang anda inputkan salah";
            }
        }

        public function aksi_login2() {
            $email = $this->input->post('email');

            $cek = $this->model_login->cek_pelanggan($email)->num_rows();
        }
    }
?>