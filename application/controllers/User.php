<?php

use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    // menarik data db models
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_apotek');
        $this->load->library('form_validation');
        $this->load->library('session');

        $data['habis'] = $this->Data_apotek->countstock();
        $data['expired'] = $this->Data_apotek->countexp();
        $data['hampir_habis'] = $this->Data_apotek->hampir_habis();
        $data['hampir_exp'] = $this->Data_apotek->hampir_kadal();
        $this->load->view('templates/topbar', $data, true);

    }


    public function index ()
    {
        // menu awal setelah login
        $data['title'] = 'Halaman Utama';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sumObat'] = $this->Data_apotek->total_obat();
        $data['sumKat'] = $this->Data_apotek->total_kategori();
        $data['sumPemasok'] = $this->Data_apotek->total_pemasok();
        $data['sumJual'] = $this->Data_apotek->total_jual();
        $data['sumBeli'] = $this->Data_apotek->total_beli();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }



    // Tabel kedaluwarsa
    public function tabel_kedaluwarsa()
    {
        $data['title'] = 'Tabel Kedaluwarsa';
        $data['title1'] = 'Tabel Obat Akan Kedaluwarsa';
        $data['title2'] = 'Tabel Obat Sudah Kedaluwarsa';

        $data['table_almostexp'] = $this->Data_apotek->almostexp()->result();
        $data['table_exp'] = $this->Data_apotek->expired()->result();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['obat'] = $this->Data_apotek->getDataApotek('tb_obat');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tabel_kedaluwarsa', $data);
        $this->load->view('templates/footer');
    }

        // Tabel stok
    public function tabel_stok()
    {
        $data['title'] = 'Tabel Stok Obat';
        $data['title1'] = 'Tabel Stok Obat Akan Habis';
        $data['title2'] = 'Tabel Stok Obat Sudah Habis';


        $data['habis_stok'] = $this->Data_apotek->habis_stok()->result();
        $data['almstok'] = $this->Data_apotek->almoststok()->result();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['obat'] = $this->Data_apotek->getDataApotek('tb_obat');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tabel_stok', $data);
        $this->load->view('templates/footer');
    }

            // Tabel kedaluwarsa
    public function tabel_laporan()
    {
        $data['title'] = 'Tabel Laporan Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        // $data['obat'] = $this->Data_apotek->getDataApotek('tb_obat');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tabel_laporan', $data);
        $this->load->view('templates/footer');
    }

    // method lihat obat
    public function lihat_obat()
    {
        $data['title'] = 'Lihat Obat';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['obat'] = $this->Data_apotek->getDataApotek('tb_obat');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_obat', $data);
        $this->load->view('templates/footer');
    }

        // method lihat pemasok
    public function lihat_pemasok()
    {
        $data['title'] = 'Lihat Pemasok';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['pemasok'] = $this->Data_apotek->getDataApotek('tb_pemasok');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_pemasok', $data);
        $this->load->view('templates/footer');
    }
 
            // method lihat kategori
    public function lihat_kategori()
    {
        $data['title'] = 'Lihat Kategori';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['kategori'] = $this->Data_apotek->getDataApotek('tb_kategori');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_kategori', $data);
        $this->load->view('templates/footer');
    }

         // method lihat penjualan
    public function lihat_penjualan()
    {
        $data['title'] = 'Tabel Penjualan Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['penjualan'] = $this->Data_apotek->getDataApotek('tb_penjualan');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_penjualan', $data);
        $this->load->view('templates/footer');
    }

    
         // method lihat pembelian
    public function lihat_pembelian()
    {
        $data['title'] = 'Tabel Pembelian Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['pembelian'] = $this->Data_apotek->getDataApotek('tb_pembelian');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_pembelian', $data);
        $this->load->view('templates/footer');
    }


    // WILAYAH INPUT INPUT DATA

        // method form pemasok
    public function form_obat()
    {
        $data['title'] = 'Tambah Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['get_kat'] = $this->Data_apotek->get_kategori();
        $data['get_pemasok'] = $this->Data_apotek->get_pemasok();

        $this->form_validation->set_rules('nama_obat', 'Nama Pemasok', 'required');
        $this->form_validation->set_rules('penyimpanan', 'Penyimpanan', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('nama_kat', 'Kategori', 'required');
        $this->form_validation->set_rules('kedaluwarsa', 'Kedaluwarsa', 'required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
        $this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required');
 
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_obat', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_obat();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_obat');
        }
    }

            // method form kategori
    public function form_kategori()
    {
        $data['title'] = 'Tambah Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_kategori', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_kategori();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_kategori');
        }
    }

            // method form pemasok
    public function form_pemasok()
    {
        $data['title'] = 'Tambah Pemasok';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_pemasok', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_pemasok();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_pemasok');
        }
    }


    // form pembelian
        public function form_pembelian()
    {
        $data['title'] = 'Tambah Pembelian dari Pemasok';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_pembelian', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_pembelian();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_pembelian');
        }
    }

        // form pembelian
        public function form_penjualan()
    {
        $data['title'] = 'Tambah Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_penjualan', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_pembelian();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_penjualan');
        }
    }


    // WILAYAH EDIT EDIT DATA //

        // edit obat 
    public function edit_obat($id)
    {
        $data['title'] = 'Ubah Data Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->Data_apotek->getObat($id);

        $data['get_kat'] = $this->Data_apotek->get_kategori();
        $data['get_pemasok'] = $this->Data_apotek->get_pemasok();
        // $data['obat_edit'] = $this->Data_apotek->edit_data_obat('tb_obat');

        $this->form_validation->set_rules('nama_obat', 'Nama Pemasok', 'required');
        $this->form_validation->set_rules('penyimpanan', 'Penyimpanan', 'required');
        $this->form_validation->set_rules('nama_kat', 'Kategori', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('kedaluwarsa', 'Kedaluwarsa', 'required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
        $this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_obat', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->edit_obatan();
            $this->session->set_flashdata('flash','diubah');
            redirect('user/lihat_obat');
        }
    }
    
    // method ubah kategori
    public function edit_kategori($id_kat)
    {
        $data['title'] = 'Ubah Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Data_apotek->getKategori($id_kat);


        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_kategori', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->edit_kat();
            $this->session->set_flashdata('flash','diubah');
            redirect('user/lihat_kategori');
        }
    }

    // method ubah pemasok
    public function edit_pemasok($id_pemasok)
    {
        $data['title'] = 'Ubah Pemasok';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemasok'] = $this->Data_apotek->getPemasok($id_pemasok);


        $this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_pemasok', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->edit_pmasok();
            $this->session->set_flashdata('flash','diubah');
            redirect('user/lihat_pemasok');
        }
    }

    

    // WILAYAH HAPUS HAPUS DATA

        // method hapus data obat
    public function hapus_obat($id)
    {
        $this->Data_apotek->hapus_obat($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('user/lihat_obat');
    }

    // method hapus data kategori
    public function hapus_kategori($id_kat)
    {
        $this->Data_apotek->hapus_kat($id_kat);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('user/lihat_kategori');
    }
    
    // method hapus data kategori
    public function hapus_pemasok($id_pemasok)
    {
        $this->Data_apotek->hapus_pmasok($id_pemasok);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('user/lihat_pemasok');
    }

    // export EXCEL
    public function excel(){

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data = $this->Data_apotek->getDataApotek('tb_obat');

        // $data = $this->Data_apotek-->getDataApotek();

        include_once APPPATH.'/third_party/xlsxwriter.class.php';
        ini_set('display_errors', 0);
        ini_set('log_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);

        $filename = "report-".date('d-m-Y-H-i-s').".xlsx";
        header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        $styles = array('widths'=>[3,20,30,40], 'font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'center', 'border'=>'left,right,top,bottom');
        $styles2 = array( ['font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'left', 'border'=>'left,right,top,bottom','fill'=>'#ffc'],['fill'=>'#fcf'],['fill'=>'#ccf'],['fill'=>'#cff'],);

        $header = array(
            'nama_obat'=>'varchar',
            'penyimpanan'=>'varchar',
            'nama_kategori'=>'varchar',
            'stok'=>'integer',
            'kedaluwarsa'=>'date',
            'h_jual'=>'integer',
            'h_beli'=>'integer',
            'nama_pemasok'=>'varchar',
        );

        $writer = new XLSXWriter();
        $writer->setAuthor('Can');

        $writer->writeSheetHeader('Sheet1', $header, $styles);
        $no = 1;
        foreach($data as $row){
            $writer->writeSheetRow('Sheet1', [
                $no, 
                $row['nama_obat'], 
                $row['penyimpanan'],
                $row['nama_kategori'],
                $row['stok'],
                $row['kedaluwarsa'],
                $row['h_jual'],
                $row['h_beli'],
                $row['nama_pemasok']
            ], $styles2);
            $no++;
        }
        $writer->writeToStdOut();

        // header("Content-type: application/vnd-ms-excel");
        // header("Content-Disposition: attachment; filename= lihat-obat.xls");
        // require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        // require(APPPATH. 'PHPExcel-1.8/ClasLastsetLastModifiedByExAdmin07.php');

        // $object = new PHPExcel();
        // // $object->getProperties()->setCreator("Can");
        // // $object->getProperties()->setLastModifiedBy("Admin");
        // // $object->getProperties()->setTitle("Laporan Lihat Obat");

        // $object->setActiveSheetIndex(0);
        // $object->getActiveSheet()->setCellValue('A1', 'No');
        // $object->getActiveSheet()->setCellValue('B1', 'Nama Obat');
        // $object->getActiveSheet()->setCellValue('C1', 'Penyimpanan');
        // $object->getActiveSheet()->setCellValue('D1', 'Kategori');
        // $object->getActiveSheet()->setCellValue('E1', 'Stok');
        // $object->getActiveSheet()->setCellValue('F1', 'Pemasok');
        // $object->getActiveSheet()->setCellValue('G1', 'Tanggal Kedaluwarsa');
        // $object->getActiveSheet()->setCellValue('H1', 'Harga Beli');
        // $object->getActiveSheet()->setCellValue('I1', 'Harga Jual');

        // $baris = 2;
        // $no = 1;

        // foreach ($data['obat'] as $ob) {
        //     $object->getActiveSheet()->setCellValue('A'. $baris, $no++);
        //     $object->getActiveSheet()->setCellValue('B'. $baris, $ob->nama_obat);
        //     $object->getActiveSheet()->setCellValue('B'. $baris, $ob->penyimpanan);
        //     $object->getActiveSheet()->setCellValue('B'. $baris, $ob->kategori);
        //     $object->getActiveSheet()->setCellValue('B'. $baris, $ob->stok);
        //     $object->getActiveSheet()->setCellValue('B'. $baris, $ob->pemasok);
        //     $object->getActiveSheet()->setCellValue('B'. $baris, $ob->kedaluwarsa);
        //     $object->getActiveSheet()->setCellValue('B'. $baris, $ob->h_beli);
        //     $object->getActiveSheet()->setCellValue('B'. $baris, $ob->h_jual);

        //     $baris++;
        // }

        // $filesname= "Lihat_obat".'.xlsx';
        // $object->getActiveSheet()->setTitle("Lihat Obat");

        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetm1.sheet');
        // header('Content-Disposition: attachment;filename="'.$filesname.'"');
        // header('Cache-Control: Max-age=0');

        // ob_end_clean();
        // $writer=PHPExcel_IOFactory::createWriter($object,'Excel2007');
        // ob_end_clean();
        // $writer->save('php://output');

        // exit;
    }
    
}