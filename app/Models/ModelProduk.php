<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    public function getProduk() 
    {
        $builder = $this->db->table('tbl_produk');
       return $builder->get();
    }

 public function getProdukByID($id) {
        $builder = $this->db->table('tbl_produk')->where('idproduk', $id);
        return $builder->get();
    }

    public function insertData($data) 
    {
        $this->db->table('tbl_produk')->insert($data);
       
    }
    public function deleteproduk($id) 
    {
       $query= $this->db->table('tbl_produk')->delete(array('idproduk' =>$id));
       return $query;
       
    }

    public function updateData($data,$id) 
    {
       $query= $this->db->table('tbl_produk')->update($data, array('idproduk' =>$id));
       return $query;
       
    }
}
