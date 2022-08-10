<?php

class M_produk extends CI_Model
{

    public function read_all_produk()
    {
        $hasil = $this->db->query("SELECT * FROM produk");
        return $hasil;
    }

    public function update_produk($nama_produk, $gambar_produk,
        $harga_produk, $diskon, $jumlah_produk, $tanggal_kadaluarsa, 
        $tanggal_produksi, $deskripsi, $id_produk) {


            
        $this->db->trans_start();

        $this->db->query("UPDATE produk SET nama_produk='$nama_produk', gambar_produk='$gambar_produk', harga_produk='$harga_produk', diskon='$diskon', jumlah_produk='$jumlah_produk', tanggal_kadaluarsa='$tanggal_kadaluarsa', tanggal_produksi='$tanggal_produksi', deskripsi_produk='$deskripsi' WHERE id_produk='$id_produk'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true) {
            return true;
        } else {
            return false;
        }

    }

    public function delete_produk($id_produk) {

        $this->db->trans_start();

        $this->db->query("DELETE FROM produk WHERE id_produk='$id_produk'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true) {
            return true;
        } else {
            return false;
        }

    }

    public function insert_produk($nama_produk, $gambar_produk,
        $harga_produk, $diskon, $jumlah_produk, $tanggal_kadaluarsa, 
        $tanggal_produksi, $deskripsi) {

        $this->db->trans_start();

        $this->db->query("INSERT INTO produk(nama_produk, gambar_produk, harga_produk, diskon,
       jumlah_produk, tanggal_kadaluarsa, tanggal_produksi, deskripsi_produk) VALUES 
       ('$nama_produk','$gambar_produk','$harga_produk','$diskon',
       '$jumlah_produk', '$tanggal_kadaluarsa', '$tanggal_produksi', '$deskripsi')");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true) {
            return true;
        } else {
            return false;
        }

    }

}
