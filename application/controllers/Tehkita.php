<?php
class Tehkita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_login');
        $this->load->model('model_pesanan');
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
        $this->load->model('Model_tampil');
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

    public function admin()
    {
        $this->load->view('admin/login_admin');
    }

    public function home_admin()
    {
        $this->load->view('admin/home');
    }

    public function aksi_login1()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('pass');

        // Periksa kecocokan email dan password di dalam model
        $karyawan = $this->model_login->cek_karyawan($email, $password)->row();

        if ($karyawan) {
            $data_session = array(
                'kode_karyawan' => $karyawan->kode_karyawan,
                'nama' => $karyawan->nama_karyawan,
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

        $cek = $this->model_login->cek_pelanggan($email);
        if ($cek->num_rows() > 0) {
            $data_pelanggan = $cek->row_array();

            $data_session = array(
                'id_pelanggan' => $data_pelanggan['id_pelanggan'],
                'nama_pelanggan' => $data_pelanggan['nama_pelanggan'],
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('Tehkita/customer');
        } else {
            echo "Email atau Password yang anda inputkan salah";
        }
    }

    public function aksi_login3()
    {
        $nama = $this->input->post('nama');
        $pass = $this->input->post('pass');

        $cek = $this->model_login->cek_admin($nama, $pass);
        if ($cek->num_rows() > 0) {
            $admin = $cek->row_array();

            $data_session = array(
                'nama_admin' => $admin['nama_admin'],
                'id_admin' => $admin['id_admin'],
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('Tehkita/data_karyawan_pelanggan');
        } else {
            echo "Nama atau Password yang anda inputkan salah";
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

    public function hapusMenu($id_menu)
    {
        $this->model_pesanan->hapusData($id_menu);
        if ($this->db->affected_rows()) {
            redirect('Tehkita/menu');
        } else {
            echo "Data Gagal Dihapus";
        }
    }

    public function editMenu($id_menu)
    {
        $data['menu'] = $this->model_pesanan->getDataId($id_menu)->row_array();
        $this->load->view('karyawan/edit_menu', $data);
    }

    public function aksi_edit()
    {
        $id = $this->input->post('idMenu');
        $nama = $this->input->post('namaMenu');
        $harga = $this->input->post('hargaMenu');
        $kategori = $this->input->post('kategori');

        // Konfigurasi upload file
        $config['upload_path'] = './asset/upload/'; // Lokasi penyimpanan file
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file yang diizinkan
        $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fotoMenu')) { // Melakukan upload file
            $data = $this->upload->data(); // Mendapatkan informasi file yang diunggah
            $file_name = $data['file_name']; // Nama file yang diunggah

            // Update data menu di database
            $this->load->model('model_pesanan');
            $update_data = array(
                'nama_menu' => $nama,
                'harga_menu' => $harga,
                'kategori' => $kategori,
                'foto_menu' => $file_name // Simpan nama file foto di tabel menu
            );

            $this->model_pesanan->updateMenu($id, $update_data);

            // Redirect atau tindakan lanjutan setelah update berhasil dilakukan
            redirect('Tehkita/menu');
        } else {
            $error = array('error' => $this->upload->display_errors()); // Tangani jika terjadi kesalahan
            print_r($error); // Tampilkan pesan kesalahan
        }
    }

    public function pesan_menu($id_menu, $jumlah_pesanan)
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        if ($id_pelanggan) {
            $this->load->model('Model_tambah');

            // Get nama pelanggan
            $nama_pelanggan = $this->Model_tambah->get_nama_pelanggan($id_pelanggan);

            // Insert data pesanan ke dalam tabel pesanan
            $data_pesanan = array(
                'id_pelanggan' => $id_pelanggan,
                'nama_pelanggan' => $nama_pelanggan,
                'id_menu' => $id_menu,
                'jumlah' => $jumlah_pesanan,
                'waktu' => date('Y-m-d H:i:s')
            );

            $this->Model_tambah->tambah_pesanan($data_pesanan);

            redirect('Tehkita/customer');
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
    }

    public function terima_pesanan($id_pesanan, $kode_karyawan)
    {
        $this->load->model('model_pesanan');
        $pesanan = $this->model_pesanan->getPesananById($id_pesanan);
        $id_menu = $pesanan['id_menu'];
        $jumlah = $pesanan['jumlah'];

        // Ambil harga menu dari tabel menu berdasarkan id_menu
        $this->db->select('harga_menu');
        $this->db->where('id_menu', $id_menu);
        $harga_menu = $this->db->get('menu')->row()->harga_menu;

        // Hitung harga total berdasarkan harga menu dan jumlah pesanan
        $harga_total = $harga_menu * $jumlah;

        $data_history = array(
            'kode_karyawan' => $kode_karyawan,
            'id_pelanggan' => $pesanan['id_pelanggan'],
            'nama_pelanggan' => $pesanan['nama_pelanggan'],
            'id_menu' => $id_menu,
            'jumlah' => $jumlah,
            'tgl_pesanan' => $pesanan['waktu'],
            'harga_menu' => $harga_menu,
            'harga_total' => $harga_total
        );

        // Simpan data pesanan ke dalam tabel history pesanan
        $this->db->insert('history_pemesanan', $data_history);

        // Hapus data pesanan dari tabel pesanan
        $this->model_pesanan->hapusPesanan($id_pesanan);

        $this->load->model('Model_tampil');
        $this->load->view('karyawan/landing');
    }

    public function history_customer()
    {
        // Ambil data history pemesanan berdasarkan pelanggan
        $this->load->model('Model_history');
        $data['history'] = $this->Model_history->getHistoryByCustomer(); // Mengambil data sesuai pelanggan tertentu

        $this->load->view('cust/history_pemesanan', $data); // Ganti 'nama_file_view' dengan nama file view Anda
    }

    public function data_karyawan_pelanggan()
    {
        // Load the models
        $this->load->model('Model_karyawan');
        $this->load->model('Model_pelanggan');

        // Get data for karyawan and pelanggan
        $data['data_karyawan'] = $this->Model_karyawan->get_data_karyawan();
        $data['data_pelanggan'] = $this->Model_pelanggan->get_data_pelanggan();

        // Load the view and pass the data
        $this->load->view('admin/home', $data);
    }

    public function edit_karyawan($kode_karyawan)
    {
        $this->load->model('Model_karyawan');
        $data['karyawan'] = $this->Model_karyawan->getKaryawanById($kode_karyawan);
        $this->load->view('admin/edit_karyawan', $data);
    }

    public function edit_pelanggan($id_pelanggan)
    {
        $this->load->model('Model_pelanggan');
        $data['pelanggan'] = $this->Model_pelanggan->getPelangganById($id_pelanggan);
        $this->load->view('admin/edit_pelanggan', $data);
    }

    public function update_karyawan()
    {
        // Pastikan data telah dikirim melalui metode POST sebelum melakukan operasi update
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_karyawan = $this->input->post('kode'); // Mendapatkan kode karyawan dari form
            $nama_karyawan = $this->input->post('nama'); // Mendapatkan nama karyawan dari form
            $pass_karyawan = $this->input->post('pass'); // Mendapatkan password karyawan dari form
            $email = $this->input->post('email'); // Mendapatkan email karyawan dari form

            // Load model karyawan
            $this->load->model('Model_karyawan');

            // Data yang akan diupdate
            $data = array(
                'nama_karyawan' => $nama_karyawan,
                'pass_karyawan' => $pass_karyawan,
                'email' => $email
            );

            // Panggil fungsi update pada model untuk mengupdate data karyawan
            $this->Model_karyawan->updateKaryawan($kode_karyawan, $data);

            // Redirect ke halaman yang sesuai setelah berhasil melakukan update
            redirect('Tehkita/data_karyawan_pelanggan');
        } else {
            // Redirect ke halaman lain jika tidak ada data POST
            redirect('Tehkita/landing');
        }
    }

    public function update_pelanggan() {
        $id_pelanggan = $this->input->post('kode');
    
        $data = array(
            'nama_pelanggan' => $this->input->post('nama'),
            'email_pelanggan' => $this->input->post('email')
        );
    
        // Panggil model untuk melakukan update data ke dalam database
        $this->load->model('Model_pelanggan');
        $this->Model_pelanggan->updateDataPelanggan($id_pelanggan, $data);
    
        // Redirect ke halaman atau URL yang diinginkan setelah melakukan update data
        redirect('Tehkita/data_karyawan_pelanggan');
    }

    public function tambah_karyawan()
    {
        $this->load->view('admin/tambah_karyawan');
    }

    public function tambah_aksi()
    {
        // Pastikan data telah dikirim melalui metode POST sebelum melakukan operasi tambah
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_karyawan = $this->input->post('nama'); // Mendapatkan nama karyawan dari form
            $pass_karyawan = $this->input->post('pass'); // Mendapatkan password karyawan dari form
            $email = $this->input->post('email'); // Mendapatkan email karyawan dari form
            $id = $this->input->post('id_admin');
            $kode = $this->input->post('kode');

            // Load model karyawan
            $this->load->model('Model_karyawan');

            // Data yang akan ditambahkan
            $data = array(
                'nama_karyawan' => $nama_karyawan,
                'pass_karyawan' => $pass_karyawan,
                'email' => $email,
                'id_admin' => $id,
                'kode_karyawan' => $kode
            );

            // Panggil fungsi insert pada model untuk menambahkan data karyawan
            $this->Model_karyawan->tambahKaryawan($data);

            // Redirect ke halaman yang sesuai setelah berhasil menambahkan data karyawan
            redirect('Tehkita/data_karyawan_pelanggan');
        } else {
            // Redirect ke halaman lain jika tidak ada data POST
            redirect('Tehkita/landing');
        }
    }

    public function hapus_karyawan($kode_karyawan)
    {
        $this->load->model('Model_karyawan');
        // Panggil method model untuk hapus karyawan
        $this->Model_karyawan->hapusKaryawan($kode_karyawan);

        redirect('Tehkita/data_karyawan_pelanggan');
    }

    public function hapus_pelanggan($id_pelanggan)
    {
        $this->load->model('Model_pelanggan');
        // Panggil method model untuk hapus data pelanggan
        $this->Model_pelanggan->hapusPelanggan($id_pelanggan);

        redirect('Tehkita/data_karyawan_pelanggan');
    }

    public function tambah_pelanggan()
    {
        $this->load->view('admin/tambah_pelanggan'); // Load view form tambah pelanggan
    }

    public function tambah_aksi2()
    {
        $data = array(
            'id_admin' => $this->input->post('id_admin'),
            'nama_pelanggan' => $this->input->post('nama'),
            'email_pelanggan' => $this->input->post('email')
        );

        // Panggil model untuk menyimpan data ke dalam database
        $this->load->model('Model_pelanggan');
        $this->Model_pelanggan->tambahDataPelanggan($data);

        // Redirect ke halaman atau URL yang diinginkan setelah penyimpanan data
        redirect('Tehkita/data_karyawan_pelanggan');
    }
}