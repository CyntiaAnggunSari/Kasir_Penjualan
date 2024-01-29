<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>

<?= $this->section('isi') ?>

<head>
    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>
<div class="col-sm-12" style="margin-top:20px;">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="mt-e header-title">Data Detail Penjualan</h4>
                    </div>
                    <form action="/penjualan/save" method="post">
                    <div class="card-body text-right">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                Tanggal : <?= $penjualan[0]->tanggal ?> <br/>
                                Kode Penjualan : <?= $penjualan[0]->idpesanan ?>
                            </div>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <table class="table table-sm table-striped " id="dataproduk">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>ID produk</th>
                                                <th>Nama Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Jumlah</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="item">
                                        <?php $no = 0;
                                            foreach ($detail_penjualan as $val) {
                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['idproduk'] ?></td>
                                                <td><?= $val['namaproduk'] ?></td>
                                                <td><?= $val['harga'] ?></td>
                                                <td><?= $val['qty'] ?></td>
                                                <td><?= $val['total'] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan='4'><b style="font-size:22px;">Total Bayar</b></td>
                                                <td colspan='2' id="total"><b style="font-size:22px;">Rp <?= number_format($penjualan[0]->total, 0, ",", ".") ?></b></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('') ?>