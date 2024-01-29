<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenjualan extends Model
{
    public function getPenjualan() 
    {
        $builder = $this->db->table('tbl_pesanan');
        return $builder->get();
    }

    public function getPenjualanByID($id) {
        $builder = $this->db->table('tbl_pesanan')->where('idpesanan', $id);
        return $builder->get();
    }

    public function getPenjualanDetail($id) {
        $builder = $this->db->table('tbl_detailpesanan')->join('tbl_produk', 'tbl_produk.idproduk = tbl_detailpesanan.idproduk')->where('idpesanan', $id);
        return $builder->get();
    }

    public function insertData($data) 
    {
        $this->db->table('tbl_pesanan')->insert($data);
        $insert_id = $this->db->insertID();
        return $insert_id;
    }

    public function insertDataDetail($data)
    {
        $this->db->table('tbl_detailpesanan')->insert($data);
    }

    public function deletekasmasuk($id) 
    {
       $query= $this->db->table('tbl_kas_masjid')->delete(array('id_kas_masjid' =>$id));
       return $query;
       
    }

    public function updateData($data,$id) 
    {
       $query= $this->db->table('tbl_kas_masjid')->update($data, array('id_kas_masjid' =>$id));
       return $query;
       
    }

    public function getLaporanPenjualan()
    {
        $builder = $this->db->table('tbl_pesanan');
        return $builder->get();
    }

    public function getLaporanPenjualandetail()
    {
        $builder = $this->db->query("SELECT tbl_detailpesanan.idpesanan,tanggal,iddetailpesanan,namaproduk,qty,tbl_detailpesanan.harga,tbl_detailpesanan.total FROM tbl_detailpesanan JOIN tbl_pesanan ON tbl_detailpesanan.idpesanan= tbl_pesanan.idpesanan JOIN tbl_produk ON tbl_detailpesanan.idproduk= tbl_produk.idproduk");
        return $builder;
    }

    public function getLaporanperperiode($tgla,$tglb)
    {
        $builder = $this->db->query("Select*from tbl_pesanan where tanggal >= '$tgla' and tanggal <= '$tglb'");
        return $builder;
    }

    public function getLaporanperperiodedetail($tgla,$tglb)
    {
        $builder = $this->db->query("SELECT tbl_detailpesanan.idpesanan,tanggal,iddetailpesanan,namaproduk,qty,tbl_detailpesanan.harga,tbl_detailpesanan.total FROM tbl_detailpesanan JOIN tbl_pesanan ON tbl_detailpesanan.idpesanan= tbl_pesanan.idpesanan JOIN tbl_produk ON tbl_detailpesanan.idproduk= tbl_produk.idproduk where tanggal >= '$tgla' and tanggal <= '$tglb'");
        return $builder;
    }

    

    public function getDonatur()
    {
        $builder = $this->db->table('tbl_donatur');
        return $builder->get();
    }
}
