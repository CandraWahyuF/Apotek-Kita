<?php

use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    // PENJUALAN
    function gettahun(){
        $query = $this->db->query("SELECT YEAR(tgl_beli) AS tahun FROM tb_penjualan GROUP BY YEAR(tgl_beli) ORDER BY YEAR(tgl_beli) ASC");

        return $query->result();
    }

    
    function filterbytanggal($tanggalawal, $tanggalakhir){
        $query = $this->db->query("SELECT * from tb_penjualan where tgl_beli BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_beli ASC ");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir){
        $query = $this->db->query("SELECT * from tb_penjualan where YEAR(tgl_beli) = '$tahun1' and MONTH(tgl_beli) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_beli ASC");

        return $query->result();
    }

    
    function filterbytahun($tahun2){
        $query = $this->db->query("SELECT * from tb_penjualan where YEAR(tgl_beli) = '$tahun2' ORDER BY tgl_beli ASC");

        return $query->result();
    }   


    // PEMBELIAN
    function gettahun_beli(){
        $query = $this->db->query("SELECT YEAR(tgl_beli) AS tahun FROM tb_pembelian GROUP BY YEAR(tgl_beli) ORDER BY YEAR(tgl_beli) ASC");

        return $query->result();
    }

    
    function filterbytanggal_beli($tanggalawal, $tanggalakhir){
        $query = $this->db->query("SELECT * from tb_pembelian where tgl_beli BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_beli ASC ");

        return $query->result();
    }

    function filterbybulan_beli($tahun1, $bulanawal, $bulanakhir){
        $query = $this->db->query("SELECT * from tb_pembelian where YEAR(tgl_beli) = '$tahun1' and MONTH(tgl_beli) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_beli ASC");

        return $query->result();
    }

    
    function filterbytahun_beli($tahun2){
        $query = $this->db->query("SELECT * from tb_pembelian where YEAR(tgl_beli) = '$tahun2' ORDER BY tgl_beli ASC");

        return $query->result();
    }  
}