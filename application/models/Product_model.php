<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_model extends CI_Model{
    public function daftar_keranjang($email){
        $query = "SELECT * FROM `keranjang` k JOIN `produk` p
        ON `k`.`id_produk` = `p`.`id_produk`
        WHERE `email` = '$email' ";
        return $this->db->query($query)->result();
    }
    public function checkout($email){
        $query = "SELECT * FROM `keranjang` k JOIN `produk` p
        ON `k`.`id_produk` = `p`.`id_produk`
        WHERE `email` = '$email'
        ";
        return $this->db->query($query)->result();
    }
    public function total_order($email){
        $query = "SELECT SUM(`subtotal`) as 'sub' FROM `keranjang`
        WHERE `email` = '$email'";
        return $this->db->query($query)->row_array();
    }
    public function getID_order($email){
        $query = "SELECT MAX(`id_order`) as 'id' FROM `orders`
        WHERE `email` = '$email'";
        return $this->db->query($query)->row_array();
    }
    // public function get_order($email, $id_order){
    //     $query = "SELECT MAX(`id_order`) as 'id_order', `email`, `date`, `invoice`, `total`, `nama_pelanggan`, `alamat`, `contact` FROM `orders`
    //     WHERE `email` = '$email'
    //     AND `id_order` = $id_order";
    //     return $this->db->query($query)->result();
    // }
    public function daftar_barangdibeli($id_order){
        $query = "SELECT * FROM `orders_detail` od
        JOIN `produk` p 
        ON `od`.`id_produk` = `p`.`id_produk`
        JOIN `kategori_pengolahan` k
        ON `k`.`id_pengolahan` = `p`.`id_pengolahan`
        JOIN `kategori_bentuk` kb
        ON `p`.`id_kategori_bentuk` = `kb`.`id_kategori`
        WHERE `id_orders` = $id_order 
        ";
        return $this->db->query($query)->result();
    }
    public function list_invoice($email){
        $query = "SELECT * FROM `orders`";
        return $this->db->query($query)->result();
    }
    public function detail_order($id_order){
        $query = "SELECT * FROM `orders_detail` od
        JOIN `produk` p 
        ON `od`.`id_produk` = `p`.`id_produk`
        JOIN `kategori_pengolahan` k
        ON `k`.`id_pengolahan` = `p`.`id_pengolahan`
        JOIN `kategori_bentuk` kb
        ON `p`.`id_kategori_bentuk` = `kb`.`id_kategori`
        WHERE `id_orders` = $id_order";
        return $this->db->query($query)->result();
    }
    public function tampil_dataPembelian($id_beli){
        $query = "SELECT * FROM `pembelian`
        WHERE `id_pembelian`= $id_beli";
        return $this->db->query($query);
    }
    public function search_produk($query){
        if ($query != '') {
            $sql = "SELECT * FROM `produk`
            WHERE $query LIKE `nama_produk`, `harga`";
            return $this->db->query($sql)->result_array();

        }
    }
    public function ajaxsearch_produk($query){
        $sql = "SELECT `id_produk`, `image`, `harga`, `deskripsi`, `stok`, `id_roast`, `p`.`id_pengolahan`, `nama_produk`, `level_roast`, `nama_pengolahan`, `kategori_produk`, `tarikan`, `defect`, `tarikan_roast`, `modal_greenbean` FROM `produk` p
        LEFT JOIN `kategori_pengolahan` k
        ON `p`.`id_pengolahan` = `k`.`id_pengolahan`
         LEFT JOIN `kategori_bentuk` kb
        ON `p`.`id_kategori_bentuk` = `kb`.`id_kategori`
         LEFT JOIN `roast_level` rl
        ON `p`.`id_roast` = `rl`.`id_level`
        WHERE `nama_produk` LIKE '%$query%'";
        return $this->db->query($sql);
    }
    public function cek_produk($id_produk, $email){
        $query = "SELECT COUNT(`id_produk`) as 'jumlah_produk' FROM `keranjang` WHERE `email` = '$email' AND `id_produk` = $id_produk";
        return $this->db->query($query)->result_array();
    }
    public function update_hargaGabah($id_pengolahan, $harga_gabah){
        $query = "UPDATE `kategori_pengolahan` SET `harga_gabah` = $harga_gabah WHERE `id_pengolahan` = $id_pengolahan";
        return $this->db->query($query);
    }
    public function update_defect($id_pengolahan, $defect){
        $query = "UPDATE `kategori_pengolahan` SET `defect` = $defect WHERE `id_pengolahan` = $id_pengolahan";
        return $this->db->query($query);
    }
    public function modal_produk(){
        $query = "SELECT `id_produk`, `image`, `deskripsi`, `stok`, `id_roast`, `p`.`id_pengolahan`, `nama_produk`, `level_roast`, `nama_pengolahan`, `kategori_produk`, `tarikan`, `defect`, `tarikan_roast`, `modal_greenbean` FROM `produk` p
        LEFT JOIN `kategori_pengolahan` k
        ON `p`.`id_pengolahan` = `k`.`id_pengolahan`
         LEFT JOIN `kategori_bentuk` kb
        ON `p`.`id_kategori_bentuk` = `kb`.`id_kategori`
         LEFT JOIN `roast_level` rl
        ON `p`.`id_roast` = `rl`.`id_level`";
        return $this->db->query($query)->result();
    }
}   