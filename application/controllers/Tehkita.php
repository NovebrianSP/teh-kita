<?php
class Tehkita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_login');
    }

    public function index()
    {
        $this->load->view('auth/login_user');
    }

    public function karyawan()
    {
        $this->load->view('auth/login_karyawan');
    }

    public function menu()
    {
        $this->load->view('karyawan/menu');
    }

    public function datajual()
    {
        $this->load->view('karyawan/data_jual');
    }

    public function landing()
    {
        $this->load->view('karyawan/landing');
    }

    public function guest()
    {
        $this->load->view('guest/landing_guest');
    }

    public function customer()
    {
        $this->load->view('cust/home_cust');
    }

    public function aksi_login1()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('pass');

        $check = $this->model_login->cek_karyawan($email, $password)->num_rows();
        if ($check > 0) {
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

    public function aksi_login2()
    {
        $email = $this->input->post('email');

        $cek = $this->model_login->cek_pelanggan($email)->num_rows();
        if ($cek > 0) {
            $data_session = array(
                'nama' => 'nama_pelanggan',
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('Tehkita/customer');
        } else {
            echo "Email atau Password yang anda inputkan salah";
        }
    }

    public function login_as_guest()
    {
        $guest_data = array(
            'guest_id' => 0,
            'guest_name' => 'Guest User'
        );

        $this->session->set_userdata('user_data', $guest_data);

        redirect('Tehkita/guest');
    }

    public function tolak_pesanan($id_pesanan)
    {
        $this->load->model('model_pesanan');
        $this->model_pesanan->hapusPesanan($id_pesanan);

        redirect('Tehkita/landing');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Tehkita/index');
    }

    public function tambah_menu()
    {
        $this->load->view('karyawan/tambah_menu');
    }

    public function aksi_tambah()
    {
        $nama = $this->input->post('nama_menu');
        $harga = $this->input->post('harga_menu');
        $kategori = $this->input->post('kategori');

        $config['upload_path'] = './asset/upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);
        $this->load->model('model_pesanan');

        // Proses upload file
        if (!$this->upload->do_upload('foto')) {    
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            // Jika upload file berhasil, dapatkan data file yang diupload
            $upload_data = $this->upload->data();
            $nama_file = $upload_data['file_name'];

            // Tambahkan nama file ke dalam array $data sebelum disimpan ke database
            $data['foto_menu'] = $nama_file;
            $data['nama_menu'] = $nama;
            $data['harga_menu'] = $harga;
            $data['kategori'] = $kategori;

            // Simpan data ke dalam database
            $this->model_pesanan->simpan_file($data);

            // Redirect ke halaman setelah data berhasil disimpan
            redirect('Tehkita/menu');
        }
    }

    public function hapusMenu($nama_menu)
    {
        $this->load->model('model_pesanan');
        $this->model_pesanan->hapusData($nama_menu);
        
        redirect('Tehkita/menu');
    }
}
