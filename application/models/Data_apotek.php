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
            'kategori' => $this->input->post('kategori', true),
            'stok' => $this->input->post('stok', true),
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


    // WILAYAH MODEL EDIT DATA

        // method ubah kategori
    public function edit_obatan(){

        $data = [
            'nama_obat' => $this->input->post('nama_obat', true),
            'penyimpanan' => $this->input->post('penyimpanan', true),
            'kategori' => $this->input->post('kategori', true),
            'stok' => $this->input->post('stok', true),
            'kedaluwarsa' => $this->input->post('kedaluwarsa', true),
            'h_jual' => $this->input->post('harga_jual', true),
            'h_beli' => $this->input->post('harga_beli', true),
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

        // method ubah kategori
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

        // hapus kategori
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
}