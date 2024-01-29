<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="col-md-12">
  <div calss="card card-outline">
    <div class="invoice col-sm-12 p-3 mb-3">
      <!---title row-->
      <div id="div1">
        <div class="row">
          <div clas="col-12">
            <table>
              <tr>
                <td width=200>
                  <img src="<?= base_url() ?>/image/logo.PNG" width="100" alt="">
                </td>
                <td width=580>
                  <center>
                    <p>
                      <h4> TOKOH OLEH OLEH CYNTIA </h4>
                    </p>
                    <P>
                      <H5>Jln.Raya Pasar , Surantih</H5>
                    
                    </P>
                  </center>
                </td>
                <td width=200></td>
              </tr>
            </table>
            <center>
              <b> Tanggal Keluar : <?= date('d F Y',strtotime($tgla)) ?> Sampai Dengan
         <?= date('d F Y', strtotime($tglb)) ?></b>
           
            </center>
            <hr>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr role="row">
                  <th>NO</th>
                  <th>Id Penjualan</th>
                  <th>Tanggal</th>
                  <th>Id Detail Penjualan</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Qty </th>
                  <th>Sub Total</th>
                  
                </tr>
              </thead>
</tbody>
<?php $no = 0; $tot=0;
foreach ($data as $val)  {
  $no++; 
  $tot = $tot + $val['total'];
 ?>
  <tr role="row" class="odd">
    <td><?= $no; ?></td>
    <td><?= $val['idpesanan']?></td>
    <td><?= $val['tanggal']?></td>
    <td><?= $val['iddetailpesanan']?></td>
    <td><?= $val['namaproduk']?></td>
    <td><?= $val['harga']?></td>
    <td><?= $val['qty']?></td>
    <td><?= $val['total']?></td>
    

</tr>
<?php } ?>
<tr>
  <td colspan="3">Total Penjualan</td>
  <td><?= $tot; ?></td>
</tr>
</tbody>

            </table>
            <br><br><br><br>
            Padang, <?= date('d/M/y') ?>
            <br><br><br>
            Ketua <br>
            DR.Cyntia Anggun Sari

          </div>
        </div>
      </div>
      <div class="row no-print">
        <div class="col-12">
          <button onclick="printContent('div1')" class="btn btn-primary"><i class="fa fa-print"></i>Print</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function printContent(el) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;

  }
</script>
<?= $this->endSection('') ?>