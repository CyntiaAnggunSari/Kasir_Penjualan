<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function getUser() 
    {
        $builder = $this->db->table('tbl_user');
       return $builder->get();
    }
    public function insertData($data) 
    {
        $this->db->table('tbl_user')->insert($data);
       
    }

    public function cek_login($username) 
    {
       return $this->db->table('tbl_user')->Where(array('nama_user'=> $username))->get()->getRowArray();
       
    }
    public function deleteuser($id) 
    {
       $query= $this->db->table('tbl_user')->delete(array('id_user' =>$id));
       return $query;
       
    }

    public function updateData($data,$id) 
    {
       $query= $this->db->table('tbl_user')->update($data, array('id_user' =>$id));
       return $query;
       
    }


    
}
