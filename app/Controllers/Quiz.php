<?php

namespace App\Controllers;

class Quiz extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    
    
    public function entri()
    {
       return view('entriquiz');
    }


public function proses()
{
    $noBp = $this->request->getPost('nobp');
    $nama = $this->request->getPost('nama');
    $uts = $this->request->getPost('uts');
    $uas = $this->request->getPost('uas');
    echo "NoBP : $noBp<br>";
    echo "Nama : $nama<br>";
    echo "UTS : $uts<br>";
    echo "UAS : $uas<br>";
    $hasil= ($uas + $uts) / 2;
    echo $hasil;
}
public function prosesbiaya()
{
    $kode = $this->request->getPost('kode');
    $agenda = $this->request->getPost('agenda');
    $transportasi = $this->request->getPost('transportasi');
    $penginapan = $this->request->getPost('penginapan');
    $pokok = $this->request->getPost('pokok');
    
    echo "kode : $kode<br>";
    echo "agenda : $agenda<br>";
    echo "Transportasi : $transportasi<br>";
    echo "Penginapan : $penginapan<br>";
    echo "Pokok : $pokok<br>";
    $hasil= ($transportasi + $penginapan +$pokok);
    echo $hasil;
}

public function simpan()
{
    $db = \Config\Database::connect();
    $data = [
        'kodebaju' => $this -> request->getPost('kode'),
        'jenisbaju' => $this->request->getPost('jenis'),
        'hargabaju' => $this->request->getPost('harga'),
        'jumlahbaju' => $this->request->getPost('jumlah'),
        'totalbaju' => $this->request->getPost('total'),
    ];
    $simpan = $db->table('baju')->insert($data);
    if ($simpan = TRUE){
    echo "<script>
alert('data berhasil disimpan');
window.location='/quiz/tampil';
</script>";
} else {
    echo "<script>
    alert('data gagal disimpan');
    window.location='/quiz/entriquiz';
    </script>";
}
}

function tampil()
{
    $db = \Config\Database::connect();
    $builder = $db->table('baju');
    $query = $builder->get();
    $data['sppdok'] =$query->getResultArray();
    return view('tampilquiz',$data);
}

}