<?php

namespace App\Controllers;

use App\Models\ModelPenjualan;
use App\Models\ModelProduk;

class Penjualan extends BaseController
{
    public function index() 
    {
        $model = new ModelPenjualan();
        $data['penjualan'] = $model->getPenjualan()->getResultArray();
        echo view ('pengurus/v_penjualan',$data);
       
    }

    public function save() 
    {
        $model = new ModelPenjualan();
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'iduser' => $this->request->getPost('iduser'),
            'total' => $this->request->getPost('total'),
        );

        $idpesanan = $model->insertData($data);

        $lengthItem = count($this->request->getPost('idproduk'));
        
        for ($i = 0; $i < $lengthItem; $i++) {
            $id_produk = $this->request->getPost('idproduk')[$i];
            $qty = $this->request->getPost('jumlah')[$i];
            $data_detail = array(
                'idpesanan' => $idpesanan,
                'idproduk' => $id_produk,
                'qty' => $qty,
                'harga' => $this->request->getPost('harga')[$i],
                'total' => $this->request->getPost('subtotal')[$i]
           );
           $model->insertDataDetail($data_detail);
           $model_produk = new ModelProduk();
           $produk = $model_produk->getProdukByID($id_produk)->getResult();
           $stok= $produk[0]->stok - $qty; 
           $data_produk= Array(
            'stok' => $stok
           );
           $model_produk->updateData($data_produk,$id_produk);
        }

        return redirect()->to('/penjualan');
    }


    public function delete() 
    {
        $model = new ModelPenjualan();
        $id = $this->request->getPost('id');
        $model->deletekasmasuk($id);
        return redirect()->to('/kasmasuk/index');
        
       
    }

    public function update() 
    {
        $model = new ModelPenjualan();
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

    public function new() {
        $model = new ModelProduk();
        $data["produk"] = $model->getProduk()->getResultArray();
        echo view ('pengurus/v_transaksi', $data);
    }

    public function detail($id) {
        $model = new ModelPenjualan();
        $data['penjualan'] = $model->getPenjualanByID($id)->getResult();
        $data["detail_penjualan"] = $model->getPenjualanDetail($id)->getResultArray();
        echo view ('pengurus/v_detail_penjualan',$data);
    }

    public function laporanPenjualan()
    {
        $model = new ModelPenjualan();
        $data['data'] = $model->getLaporanpenjualan()-> getResultArray();
        echo view('pengurus/v_cetaklaporanpenjualan',$data);
    }

    public function laporanPenjualandetail()
    {
        $model = new ModelPenjualan();
        $data['data'] = $model->getLaporanpenjualandetail()-> getResultArray();
        echo view('pengurus/v_cetaklaporan',$data);
    }

    public function laporanperperiode()
    {
        echo view('pengurus/vlaporanpenjualan');
    }
    
    public function cetaklaporanperperiode()
    {
        $model = new ModelPenjualan();

        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiode($tgla,$tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query,
        ];
        echo view('pengurus/vcetaklaporanperperiode',$data);
    }

    public function laporanperperiodedetail()
    {
        echo view('pengurus/vlaporanpenjualandetail');
    }
    
    public function cetaklaporanperperiodedetail()
    {
        $model = new ModelPenjualan();

        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiodedetail($tgla,$tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query,
        ];
        echo view('pengurus/vcetaklaporanperperiodedetail',$data);
    }
}