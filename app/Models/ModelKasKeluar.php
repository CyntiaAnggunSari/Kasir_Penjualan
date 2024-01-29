<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasKeluar extends Model
{
    public function getKasKeluar() 
    {
        $builder = $this->db->table('tbl_kas_masjid')
        ->where ('status="Keluar"');
       return $builder->get();
    }


    public function insertData($data) 
    {
        $this->db->table('tbl_kas_masjid')->insert($data);
       
    }
    public function deletekaskeluar($id) 
    {
       $query= $this->db->table('tbl_kas_masjid')->delete(array('id_kas_masjid' =>$id));
       return $query;
       
    }

    public function updateData($data,$id) 
    {
       $query= $this->db->table('tbl_kas_masjid')->update($data, array('id_kas_masjid' =>$id));
       return $query;
       
    }

    public function getLaporanUangkeluar()
    {
        $builder = $this->db->table('tbl_kas_masjid')->where('status="Keluar"');
        return $builder->get();
    }

    public function getLaporanperperiode($tgla,$tglb)
    {
        $b=$this->db->query("select * from tbl_kas_masjid where tanggal >= '$tgla'and tanggal <= '$tglb' and status>='Keluar'");
        return $b;
    }

    public function getLaporanperperiodeperjenis($tgla,$tglb,$jenis)
    {
        $b=$this->db->query("select * from tbl_kas_masjid where tanggal >= '$tgla'and tanggal <= '$tglb' and jenis_kas ='$jenis' and status>='Keluar'");
        return $b;
    }
}
