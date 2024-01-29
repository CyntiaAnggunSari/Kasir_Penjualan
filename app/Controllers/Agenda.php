<?php

namespace App\Controllers;

use App\Models\ModelAgenda;

class Agenda extends BaseController
{
    public function index() 
    {
        $model = new ModelAgenda();
        $data['agenda'] = $model->getAgenda()->getResultArray();
        echo view ('pengurus/v_agenda',$data);
       
    }

    public function save() 
    {
        $model = new ModelAgenda();
        $data = array(
            'id_agenda' => $this->request->getPost('id'),
            'nama_agenda' => $this->request->getPost('nama'),
            'tgl_agenda' => $this->request->getPost('tgl'),
            'jam' => $this->request->getPost('jam')
            

        );

        if (!$this->validate([
            'id' =>[
                'rules' => 'required|is_unique[tbl_agenda.id_agenda]',
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
        return redirect()->to('/agenda');

       
    }

    public function delete() 
    {
        $model = new ModelAgenda();
        $id = $this->request->getPost('id');
        $model->deleteagenda($id);
        return redirect()->to('/agenda/index');
        
       
    }

    public function update() 
    {
        $model = new ModelAgenda();
        $id= $this->request->getPost('id');
        $data = array(
            'nama_agenda' => $this->request->getPost('namaagenda'),
            'tgl_agenda' => $this->request->getPost('tgl'),
            'jam' => $this->request->getPost('jam')
         

        );
        $model->updateData($data,$id);
        return redirect()->to('/agenda/index');

       
    }
    
}
