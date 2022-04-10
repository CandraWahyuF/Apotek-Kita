<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    // menarik data db models
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_apotek');
    }


    public function index ()
    {
        // menu awal setelah login
        $data['title'] = 'Halaman Utama';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    // method lihat obat
    public function lihat_obat()
    {
        $data['title'] = 'Lihat Obat';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['obat'] = $this->Data_apotek->getDataApotek('tb_obat')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_obat', $data);
        $this->load->view('templates/footer');
    }

        // method form tambah obat
    public function form_obat()
    {
        $data['title'] = 'Tambah Obat';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        // $data['obat'] = $this->Data_apotek->getDataApotek('tb_obat')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/form_obat', $data);
        $this->load->view('templates/footer');
    }

         // method tambah Obat
    public function tambah_obat()
    {
        $nama_obat = $this->input->post('nama_obat');
        $penyimpanan = $this->input->post('penyimpanan');
        $kategori = $this->input->post('kategori');
        $stok = $this->input->post('stok');
        $kedaluwarsa = $this->input->post('kedaluwarsa');
        $h_beli = $this->input->post('harga_beli');
        $h_jual = $this->input->post('harga_jual');
        $nama_pemasok = $this->input->post('nama_pemasok');


        $arrKat = array( 
            'nama_obat' => $nama_obat,
            'penyimpanan' => $penyimpanan,
            'kategori' => $kategori,
            'stok' => $stok,
            'kedaluwarsa' => $kedaluwarsa,
            'h_jual' => $h_jual,
            'h_beli' => $h_beli,
            'nama_pemasok' => $nama_pemasok
        );

        $this->Data_apotek->tambah_obat($arrKat);
        redirect('user/lihat_obat');
    }
             // method edit Obat
    public function edit_obat($id)
    {
        // template edit obat
        $data['title'] = 'Edit Obat';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['upd_obat'] = $this->Data_apotek->edit_obat($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit_obat', $data);
        $this->load->view('templates/footer');
        
        // $nama_obat = $this->input->post('nama_obat');
        // $penyimpanan = $this->input->post('penyimpanan');
        // $kategori = $this->input->post('kategori');
        // $stok = $this->input->post('stok');
        // $kedaluwarsa = $this->input->post('kedaluwarsa');
        // $h_beli = $this->input->post('harga_beli');
        // $h_jual = $this->input->post('harga_jual');
        // $nama_pemasok = $this->input->post('nama_pemasok');


        // $arrKat = array( 
        //     'nama_obat' => $nama_obat,
        //     'penyimpanan' => $penyimpanan,
        //     'kategori' => $kategori,
        //     'stok' => $stok,
        //     'kedaluwarsa' => $kedaluwarsa,
        //     'h_jual' => $h_jual,
        //     'h_beli' => $h_beli,
        //     'nama_pemasok' => $nama_pemasok
        // );

        // $this->Data_apotek->tambah_obat($arrKat);
        // redirect('user/lihat_obat');
    }
    
    public function hapus_obat($id){
        $this->Data_apotek->hapus_obat($id);
        redirect('user/lihat_obat');
    }

        // method lihat kategori
    public function lihat_kategori()
    {
        $data['title'] = 'Lihat Kategori';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['kategori'] = $this->Data_apotek->getDataApotek('tb_kategori')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_kategori', $data);
        $this->load->view('templates/footer');
    }

            // method form kategori
    public function form_kategori()
    {
        $data['title'] = 'Tambah Kategori';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // // queri pemanggilan tabel di DB
        // $data['kategori'] = $this->Data_apotek->getDataApotek('tb_kategori')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/form_kategori', $data);
        $this->load->view('templates/footer');
    }

        // method tambah kategori
    public function tambah_kategori()
    {
        $nama_kat = $this->input->post('nama_kategori');
        $deskripsi = $this->input->post('deskripsi');

        $arrKat = array( 
            'nama_kat' => $nama_kat,
            'desk_kat' => $deskripsi
        );

        $this->Data_apotek->tambah_kategori($arrKat);
        redirect('user/lihat_kategori');
    }

            // method lihat pemasok
    public function lihat_pemasok()
    {
        $data['title'] = 'Lihat Pemasok';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['pemasok'] = $this->Data_apotek->getDataApotek('tb_pemasok')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_pemasok', $data);
        $this->load->view('templates/footer');
    }

              // method form pemasok
    public function form_pemasok()
    {
        $data['title'] = 'Tambah Pemasok';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        // $data['pemasok'] = $this->Data_apotek->getDataApotek('tb_pemasok')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/form_pemasok', $data);
        $this->load->view('templates/footer');
    }
    
     // method tambah kategori
    public function tambah_pemasok()
    {
        $nama_obat = $this->input->post('nama_obat');
        $penyimpanan = $this->input->post('penyimpanan');
        $telepon = $this->input->post('telepon');

        $arrKat = array( 
            'nama_obat' => $nama_obat,
            'alamat_pemasok' => $penyimpanan,
            'telepon_pemasok' => $telepon
        );

        $this->Data_apotek->tambah_pemasok($arrKat);
        redirect('user/lihat_pemasok');
    }

    // method tabel penjualan
        public function lihat_penjualan()
    {
        $data['title'] = 'Lihat Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
         $data['penjualan'] = $this->Data_apotek->getDataApotek('tb_penjualan')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_penjualan', $data);
        $this->load->view('templates/footer');
    }

    // hapus penjualan
    public function hapus_penjualan($id)
        {
            $this->Data_apotek->hapus_penjualan($id);
            redirect('user/lihat_penjualan');
        }

            // method tabel pembelian
    public function lihat_pembelian()
    {
        $data['title'] = 'Lihat Pembelian';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
         $data['pembelian'] = $this->Data_apotek->getDataApotek('tb_pembelian')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_pembelian', $data);
        $this->load->view('templates/footer');
    }

    // hapus pembelian
    public function hapus_pembelian($id)
        {
            $this->Data_apotek->hapus_pembelian($id);
            redirect('user/lihat_pembelian');
        }
} 