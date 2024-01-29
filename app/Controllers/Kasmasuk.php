<?php

namespace App\Controllers;

use App\Models\ModelKasmasuk;

class Kasmasuk extends BaseController
{
    public function index() 
    {
        $model = new ModelKasmasuk();
        $data['kasmasuk'] = $model->getKasmasuk()->getResultArray();
        $data['data_donatur'] = $model->getDonatur()->getResult();
        echo view ('pengurus/v_kasmasuk',$data);
       
    }

    public function save() 
    {
        $model = new ModelKasmasuk();
        $data = array(
            'id_kas_masjid' => $this->request->getPost('id'),
            'tanggal' => $this->request->getPost('tgl'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kasmasuk'),
            'kas_keluar' => 0,
            'jenis_kas' => $this->request->getPost('jenis'),
            'status' => 'Masuk',
            'iddonaturmasjid'=> $this->request->getPost('iddonatur')

        );
        $model->insertData($data);
        return redirect()->to('/kasmasuk');

       
    }

    public function delete() 
    {
        $model = new ModelKasmasuk();
        $id = $this->request->getPost('id');
        $model->deletekasmasuk($id);
        return redirect()->to('/kasmasuk/index');
        
       
    }

    public function update() 
    {
        $model = new ModelKasmasuk();
        $id= $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tgl'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kasmasuk'),
            'jenis_kas' => $this->request->getPost('jenis'),  
        );
        $model->updateData($data,$id);
        return redirect()->to('/kasmasuk/index');

       
    }

    public function laporankasmasuk()
    {
        $model = new ModelKasmasuk();
        $data['data'] = $model->getLaporanUangmasuk()-> getResultArray();
        echo view('pengurus/v_cetaklaporan',$data);
    }

    public function laporanperperiode()
    {
        echo view('kas/vlaporankasmasuk');
    }
    
    public function cetaklaporanperperiode()
    {
        $model = new Modelkasmasuk();

        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiode($tgla,$tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query,
        ];
        echo view('kas/vcetaklaporanperperiode',$data);
    }

    public function laporanperperiodeperjeniskas()
    {
        echo view('kas/vlaporanperjenis');
    }

    public function cetaklaporanperperiodeperjeniskas()
    {
        $model = new Modelkasmasuk();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $jenis = $this->request->getPost('jeniskas');
        $query = $model->getLaporanperperiodeperjenis($tgla,$tglb,$jenis)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'jenis'=> $jenis,
            'data' => $query,
        ];
        echo view('kas/v_cetaklaporanperperiodeperjeniskas',$data);
    }
}
