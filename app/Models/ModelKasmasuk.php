<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasmasuk extends Model
{
    public function getKasmasuk() 
    {
        $builder = $this->db->query("select id_kas_masjid,kas_keluar,nama,tanggal,ket,kas_masuk,jenis_kas,status from tbl_kas_masjid join tbl_donatur on iddonaturmasjid=iddonatur where status='Masuk'");
        return $builder;
    }


    public function insertData($data) 
    {
        $this->db->table('tbl_kas_masjid')->insert($data);
       
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

    public function getLaporanUangmasuk()
    {
        $builder = $this->db->query("select id_kas_masjid,kas_keluar,nama,tanggal,ket,kas_masuk,jenis_kas,status from tbl_kas_masjid join tbl_donatur on iddonaturmasjid=iddonatur where status='Masuk'");
        return $builder;
    }

    public function getLaporanperperiode($tgla,$tglb)
    {
        $b=$this->db->query("select id_kas_masjid,kas_keluar,nama,tanggal,ket,kas_masuk,jenis_kas,status from tbl_kas_masjid join tbl_donatur on iddonaturmasjid=iddonatur where tanggal >= '$tgla'and tanggal <= '$tglb' and status>='Masuk'");
        return $b;
    }

    public function getLaporanperperiodeperjenis($tgla,$tglb,$jenis)
    {
        $b=$this->db->query("select id_kas_masjid,kas_keluar,nama,tanggal,ket,kas_masuk,jenis_kas,status from tbl_kas_masjid join tbl_donatur on iddonaturmasjid=iddonatur where tanggal >= '$tgla'and tanggal <= '$tglb' and jenis_kas ='$jenis' and status>='Masuk'");
        return $b;
    }

    public function getDonatur()
    {
        $builder = $this->db->table('tbl_donatur');
        return $builder->get();
    }
}
