<?php

namespace App\Controllers;

use App\Models\ModelPelanggan;

class Pelanggan extends BaseController
{
    public function index() 
    {
        $model = new ModelPelanggan();
        $data['pelanggan'] = $model->getPelanggan()->getResultArray();
        echo view ('pengurus/v_pelanggan',$data);
       
    }

    public function save() 
    {
        $model = new ModelPelanggan();
        $data = array(
            
            'namapelanggan' => $this->request->getPost('nama'),
            'notelp' => $this->request->getPost('no'),
            'alamat' => $this->request->getPost('alamat')
            

        );
        $model->insertData($data);
        return redirect()->to('/pelanggan');

       
    }

    public function delete() 
    {
        $model = new ModelPelanggan();
        $id = $this->request->getPost('id');
        $model->deletepelanggan($id);
        return redirect()->to('/pelanggan/index');
        
       
    }

    public function update() 
    {
        $model = new ModelPelanggan();
        $id= $this->request->getPost('id');
        $data = array(
            'namapelanggan' => $this->request->getPost('nama'),
            'notelp' => $this->request->getPost('no'),
            'alamat' => $this->request->getPost('alamat')
          

        );
        $model->updateData($data,$id);
        return redirect()->to('/pelanggan/index');

       
    }
    
}
