<?php

namespace App\Controllers;

use App\Models\ModelDonatur;

class Donatur extends BaseController
{
    public function index() 
    {
        $model = new ModelDonatur();
        $data['donatur'] = $model->getDonatur()->getResultArray();
        echo view ('pengurus/v_donatur',$data);
       
    }

    public function save() 
    {
        $model = new ModelDonatur();
        $data = array(
            'iddonatur' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('al'),
            'nohp' => $this->request->getPost('no')

        );

        if (!$this->validate([
            'kode' =>[
                'rules' => 'required|is_unique[tbl_donatur.iddonatur]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                        'is_unique' =>'{field} Sudah Ada'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else{
            print_r($this->request->getVar());
            
        }
        $model->insertData($data);
        return redirect()->to('/donatur');

       
    }

    public function delete() 
    {
        $model = new ModelDonatur();
        $id = $this->request->getPost('id');
        $model->deletedonatur($id);
        return redirect()->to('/donatur/index');
        
       
    }

    public function update() 
    {
        $model = new ModelDonatur();
        $id= $this->request->getPost('id');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp')

        );
        $model->updateData($data,$id);
        return redirect()->to('/donatur/index');

       
    }
    
}
