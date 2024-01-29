<?php

namespace App\Controllers;

use App\Models\ModelUser;

class User extends BaseController
{
    public function index() 
    {
        $model = new ModelUser();
        $data['user'] = $model->getUser()->getResultArray();
        echo view ('pengurus/v_user',$data);
       
    }

    public function save() 
    {
        $model = new ModelUser();
        $data = array(
            'id_user' => $this->request->getPost('kode'),
            'nama_user' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('eml'),
            'password' =>password_hash( $this->request->getPost('pass'),PASSWORD_DEFAULT),
            'level' => $this->request->getPost('lvl')

        );

        if (!$this->validate([
            'kode' =>[
                'rules' => 'required|is_unique[tbl_user.id_user]',
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
        return redirect()->to('/user');

       
    }

    public function delete() 
    {
        $model = new ModelUser();
        $id = $this->request->getPost('id');
        $model->deleteuser($id);
        return redirect()->to('/user/index');
        
       
    }

    public function update() 
    {
        $model = new ModelUser();
        $id= $this->request->getPost('id');
        $data = array(
            'nama_user' => $this->request->getPost('namauser'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level')

        );
        $model->updateData($data,$id);
        return redirect()->to('/user/index');

       
    }
    
}
