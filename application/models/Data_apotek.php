<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_apotek extends CI_Model
{
    // model ambil data dari database
    public function getDataApotek($table){
        return $this->db->get($table);
    }

            // method tambah obat
    public function tambah_obat($data){
        $this->db->insert('tb_obat', $data);
    }

    // edit data obat
    public function edit_obat($id){
        $this->db->get_where('tb_obat', ['id' => $id])->row_array();
    }

    // method hapus obat
    public function hapus_obat($id){
        $this->db->where('id', $id);
        $this->db->delete('tb_obat');
    }

    // method tambah kategori
    public function tambah_kategori($data){
        $this->db->insert('tb_kategori', $data);
    }

        // method tambah pemasok
    public function tambah_pemasok($data){
        $this->db->insert('tb_pemasok', $data);
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
}