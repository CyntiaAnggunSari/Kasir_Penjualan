<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="row">
  <div class="card col-sm-12">
    <div class="card-header-12">
     <h3 class="card-title">Laporan Kas Keluar</h3>
</div>
<div class="card-body-12">
<div class="row no-gutters-5">
  <div class="col-md-12">
    <form method="POST" action="<?php echo site_url('kaskeluar/cetaklaporanperperiodeperjeniskas') ?>">
    <table>
      <tr>
        <div class="col-md-120">
          <div class="card card-solid-120">
            <div class="card-header-5" style="background-color: #ffc107">
          <div class="card-title">Laporan Kas Perperiode Perjenis Kas</div>
          </div>
          <div class="card-body">
            <div class="input-group form-group">
              <div class="input-gruop-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
              </div>
              <input type="date" name="tanggal_awal" id="datepicker" class="form-control" placeholder="Pilih Tanggal Awal"></input>

            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
              </div>
              <input type="date" name="tanggal_akhir" id="datepicker2" class="form-control" placeholder="Pilih Tanggal Awal" ></input>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
              </div>
              <select name="jeniskas" id="jeniskas" class="form-control">
                <option value="Masjid">Masjid</option>
                <option value="Anak Yatim">Anak Yatim</option>
                <option value="TPQ">TPQ</option>
                <option value="Sosial">Sosial</option>
              </select>
            </div>
            <br>
            <div class="col-xs-5">
              <button type="submit" class="btn btn-block btn-primary"><i class="fa form-control">Cetak</i></button>
            </div>
          </div>
          </div>
        </div>
        </div>
      </tr>
    </table>
</form>
</div>
  </div>
  </div>
  </div>
</div>
<?= $this->endSection('') ?>