<?php

namespace App\Controllers;

use App\Models\ModelProduk;

class Produk extends BaseController
{
    public function index() 
    {
        $model = new ModelProduk();
        $data['produk'] = $model->getProduk()->getResultArray();
        echo view ('pengurus/v_produk',$data);
       
    }

    public function save() 
    {
        $model = new ModelProduk();
        $data = array(
            
            'namaproduk' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('des'),
            'harga' => $this->request->getPost('harga')

        );

        
        $model->insertData($data);
        return redirect()->to('/produk');

       
    }

    public function delete() 
    {
        $model = new ModelProduk();
        $id = $this->request->getPost('id');
        $model->deleteproduk($id);
        return redirect()->to('/produk/index');
        
       
    }

    public function update() 
    {
        $model = new ModelProduk();
        $id= $this->request->getPost('id');
        $data = array(
            'namaproduk' => $this->request->getPost('namaproduk'),
            'deskripsi' => $this->request->getPost('desk'),
            'harga' => $this->request->getPost('harga')
           

        );
        $model->updateData($data,$id);
        return redirect()->to('/produk/index');

       
    }

    public function updateStok() 
    {
        $model = new ModelProduk();
        $id= $this->request->getPost('id');
        $stok= $this->request->getPost('stok');
        $produk = $model->getProdukByID($id)->getResult();
        $stok= $produk[0]->stok + $stok;
        $data = array( 
            'stok' => $stok
        );
        $model->updateData($data,$id);
        return redirect()->to('/produk/index');

       
    }
    
}