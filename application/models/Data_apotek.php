<?php

use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_apotek extends CI_Model
{
    // model ambil semua data table dari database
    public function getDataApotek($table){
        return $this->db->get($table)->result();
    }

        // method tambah obat
    public function tambah_obat(){

        $data = [
            'nama_obat' => $this->input->post('nama_obat', true),
            'penyimpanan' => $this->input->post('penyimpanan', true),
            'stok' => $this->input->post('stok', true),
            'nama_kat' => $this->input->post('nama_kat', true),
            'kedaluwarsa' => $this->input->post('kedaluwarsa', true),
            'h_jual' => $this->input->post('harga_jual', true),
            'h_beli' => $this->input->post('harga_beli', true),
            'nama_pemasok' => $this->input->post('nama_pemasok', true),
           

        ];

        $this->db->insert('tb_obat', $data);
    }
    
    // method tambah kategori
    public function tambah_kategori(){

        $data = [
            'nama_kat' => $this->input->post('nama_kategori', true),
            'desk_kat' => $this->input->post('deskripsi', true),
        ];

        $this->db->insert('tb_kategori', $data);
    }

    // method tambah pemasok
    public function tambah_pemasok(){

        $data = [
            'nama_pemasok' => $this->input->post('nama_pemasok', true),
            'alamat_pemasok' => $this->input->post('alamat', true),
            'telepon_pemasok' => $this->input->post('telepon', true),
        ];

        $this->db->insert('tb_pemasok', $data);
    }


    // GET HIDDEN ID untuk ubah data
    public function getObat($id){
        return $this->db->get_where('tb_obat', ['id' => $id])->row_array();
    }
    public function getKategori($id_kat){
        return $this->db->get_where('tb_kategori', ['id_kat' => $id_kat])->row_array();
    }
    public function getPemasok($id_pemasok){
        return $this->db->get_where('tb_pemasok', ['id_pemasok' => $id_pemasok])->row_array();
    }

    // KEDALUWARSA DAN STOK
    
    // sudah kedaluwarsa
    public function expired()
    {
        return $this->db->query('SELECT * FROM tb_obat WHERE kedaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 40 YEAR) AND NOW()');
    }

    // hampir kedaluwarsa
        public function almostexp()
    {
        return $this->db->query('SELECT * FROM tb_obat WHERE kedaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 15 DAY)');
    }

    // Stok obat hampir habis 
    public function almoststok()
    {
         return $this->db->query('SELECT * FROM tb_obat WHERE stok BETWEEN 1 AND 9');
    }

    // stok obat sudah habis 
    public function habis_stok()
    {
         return $this->db->query('SELECT * FROM tb_obat WHERE stok BETWEEN 0 AND 0');
    }

    // hitung total obat
    public function total_obat(){       
        $to =  $this->db->query('SELECT *, SUM(tb_obat.stok) as sumObat FROM tb_obat'); 
            if ($to->num_rows() > 0) {
                foreach ($to->result() as $get) {
                    return $get->sumObat;
                }
            }
            else {
                return FALSE;
            }   
    }

    // notif kadaluwarsa
    function countstock(){       
        $cs =  $this->db->query('SELECT * FROM tb_obat WHERE stok BETWEEN 0 AND 0'); 
        $habis = $cs->num_rows();
        return $habis;    
    }

    function hampir_habis(){       
        $cs =  $this->db->query('SELECT * FROM tb_obat WHERE stok BETWEEN 1 AND 9'); 
        $hampirHabis = $cs->num_rows();
        return $hampirHabis;    
    }

    function countexp(){       
        $ce = $this->db->query('SELECT * FROM tb_obat WHERE kedaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 100 YEAR) AND NOW()');
        $expired = $ce->num_rows();
        return $expired;     
    }

    function hampir_kadal(){       
        $ce =  $this->db->query('SELECT * FROM tb_obat WHERE kedaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 15 DAY)'); 
        $hampirKadal = $ce->num_rows();
        return $hampirKadal;    
    }

    // total kategori
    public function total_kategori(){       
      $tk =  $this->db->query('SELECT * FROM tb_kategori'); 
        $totKat = $tk->num_rows();
        return $totKat;    
    }
 
    // total pemasok
    public function total_pemasok(){       
      $tp =  $this->db->query('SELECT * FROM tb_pemasok'); 
        $sup = $tp->num_rows();
        return $sup;    
    }

    // total pembelian
    function total_beli(){       
       $q = "SELECT *, SUM(tb_pembelian.subtotal) as 'totalAll' FROM tb_pembelian ";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            foreach ($run_q->result() as $get) {
                return $get->totalAll;
            }
        }
        else {
            return FALSE;
        }  
    }

    // total penjualan 
    function total_jual(){       
       $q = "SELECT *, SUM(tb_penjualan.subtotal) as 'totalAll' FROM tb_penjualan";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            foreach ($run_q->result() as $get) {
                return $get->totalAll;
            }
        }
        else {
            return FALSE;
        }  
    }

    // JOIN TABEL

    // ambil kategori muncul di form obat
    public function get_kategori()
    {
        $data = array();
        $query = $this->db->get('tb_kategori')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
            foreach ($query as $row ) 
        {
            $data[$row['nama_kat']] = $row['nama_kat'];
        }
        }
        asort($data);
        return $data;
    }  

    function get_pemasok()
    {
        $data = array();
        $query = $this->db->get('tb_pemasok')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
        foreach ($query as $row ) 
        {
          $data[$row['nama_pemasok']] = $row['nama_pemasok'];
        }
        }
        asort($data);
        return $data;
    }


    // edit data obat biar bisa muncul pemasok kategori
    public function edit_data_obat($table){      
        return $this->db->get($table)->result();
    }


    // WILAYAH MODEL EDIT DATA

        // method ubah obat
    public function edit_obatan(){

        $data = [
            'nama_obat' => $this->input->post('nama_obat', true),
            'penyimpanan' => $this->input->post('penyimpanan', true),
            'stok' => $this->input->post('stok', true),
            'nama_kat' => $this->input->post('nama_kat', true),
            'kedaluwarsa' => $this->input->post('kedaluwarsa', true),
            'h_jual' => $this->input->post('h_jual', true),
            'h_beli' => $this->input->post('h_beli', true),
            'nama_pemasok' => $this->input->post('nama_pemasok', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_obat', $data);
    }

        // method ubah kategori
    public function edit_kat(){

        $data = [
            'nama_kat' => $this->input->post('nama_kategori', true),
            'desk_kat' => $this->input->post('deskripsi', true),
        ];

        $this->db->where('id_kat', $this->input->post('id_kat'));
        $this->db->update('tb_kategori', $data);
    }

        // method ubah pemasok
    public function edit_pmasok(){

        $data = [
            'nama_pemasok' => $this->input->post('nama_pemasok', true),
            'alamat_pemasok' => $this->input->post('alamat', true),
            'telepon_pemasok' => $this->input->post('telepon', true),
        ];

        $this->db->where('id_pemasok', $this->input->post('id_pemasok'));
        $this->db->update('tb_pemasok', $data);
    }


    // WILAYAH MODEL HAPUS DATA

        // hapus obat
    public function hapus_obat($id){
        $this->db->delete('tb_obat', ['id' => $id]);
    }

        // hapus kategori
    public function hapus_kat($id_kat){
        $this->db->delete('tb_kategori', ['id_kat' => $id_kat]);
    }

        // hapus pemasok
    public function hapus_pmasok($id_pemasok){
        $this->db->delete('tb_pemasok', ['id_pemasok' => $id_pemasok]);
    }

        // method hapus penjualan
    public function hapus_penjualan($id){
        $this->db->where('id_jual', $id);
        $this->db->delete('tb_penjualan');
    }

            // method hapus penjualan
    public function hapus_pembelian($id){
        $this->db->where('id_beli', $id);
        $this->db->delete('tb_penjualan');
    }

    // TRASAKSI
    function getmedbysupplier($nama_pemasok){
        $hasil=$this->db->query("SELECT * FROM tb_obat WHERE nama_pemasok='$nama_pemasok'");
        return $hasil->result();
    }

    
    function get_product($nama_obat)
    {   $hasil = array();
        $hsl=$this->db->query("SELECT * FROM tb_obat WHERE nama_obat='$nama_obat'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'nama_obat' => $data->nama_obat,
                    'stok' => $data->stok,
                    'nama_kat' => $data->nama_kat,
                    'h_jual' => $data->h_jual,
                    'h_beli' => $data->h_beli,
                    
                    );
            }
        }
        return $hasil;
    }

    function get_medicine()
    {
        $data = array();
        $query = $this->db->get('tb_obat')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
        foreach ($query as $row ) 
        {
          $data[$row['nama_obat']] = $row['nama_obat'];
        }
        }
        asort($data);
        return $data;
    }

    
    // TAMBAH PENJUALAN
    function tambah_penjualan(){
		 
			$nama_pembeli = $this->input->post('nama_pembeli');
			$tgl_beli = date("Y-m-d",strtotime($this->input->post('tgl_beli')));
			$grandtotal = $this->input->post('grandtotal');
			$ref = generateRandomString();
			$nama_obat = $this->input->post('nama_obat');
			$h_beli = $this->input->post('h_beli');
			$banyak = $this->input->post('banyak');
			$subtotal = $this->input->post('subtotal');

		foreach($nama_obat as $key=>$val){
		   
		$data[] = array(
            
				'nama_pembeli' => $nama_pembeli,
				'tgl_beli' => $tgl_beli,
				'grandtotal' => $grandtotal,
				'ref' => $ref,
				'nama_obat' => $val,
				'h_beli' => $h_beli[$key],
				'banyak' => $banyak[$key],
				'subtotal' => $subtotal[$key],
				
				);

		$this->db->set('stok', 'stok-'.$banyak[$key], FALSE);
	    $this->db->where('nama_obat', $val);
	    $updated = $this->db->update('tb_obat');
		
		}
		
		$this->db->insert_batch('tb_penjualan', $data);
	}

}