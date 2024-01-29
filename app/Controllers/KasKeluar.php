<?php

namespace App\Controllers;

use App\Models\ModelKasKeluar;

class KasKeluar extends BaseController
{
    public function index() 
    {
        $model = new ModelKasKeluar();
        $data['kaskeluar'] = $model->getKasKeluar()->getResultArray();
        echo view ('pengurus/v_kaskeluar',$data);
       
    }

    public function save() 
    {
        $model = new ModelKasKeluar();
        $data = array(
            'id_kas_masjid' => $this->request->getPost('id'),
            'tanggal' => $this->request->getPost('tgl'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => 0,
            'kas_keluar' =>  $this->request->getPost('kaskeluar'),
            'jenis_kas' => $this->request->getPost('jenis'),
            'status' => 'Keluar'

        );
        $model->insertData($data);
        return redirect()->to('/kaskeluar');

       
    }

    public function delete() 
    {
        $model = new ModelKasKeluar();
        $id = $this->request->getPost('id');
        $model->deletekaskeluar($id);
        return redirect()->to('/kaskeluar/index');
        
       
    }

    public function update() 
    {
        $model = new ModelKasKeluar();
        $id= $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tgl'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kaskeluar'),
            'jenis_kas' => $this->request->getPost('jenis'),  
        );
        $model->updateData($data,$id);
        return redirect()->to('/kaskeluar/index');

       
    }
    public function laporankaskeluar()
    {
        $model = new ModelKasKeluar();
        $data['data'] = $model->getLaporanUangkeluar()-> getResultArray();
        echo view('pengurus/v_cetaklaporankeluar',$data);
    }

    public function laporanperperiode()
    {
        echo view('kas/vlaporankaskeluar');
    }

    public function cetaklaporanperperiode()
    {
        $model = new ModelKasKeluar();

        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiode($tgla,$tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query,
        ];
        echo view('kas/vcetaklaporanperperiodekeluar',$data);
    }

    public function laporanperperiodeperjeniskas()
    {
        echo view('kas/vlaporanperjeniskeluar');
    }

    public function cetaklaporanperperiodeperjeniskas()
    {
        $model = new Modelkaskeluar();
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
        echo view('kas/v_cetaklaporanperperiodeperjeniskaskeluar',$data);
    }
    
}
