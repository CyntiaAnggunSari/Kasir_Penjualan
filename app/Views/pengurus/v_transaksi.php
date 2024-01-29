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
                        <h4 class="mt-e header-title">Data Penjualan</h4>
                    </div>
                    <form action="/penjualan/save" method="post">
                    <div class="card-body text-right">
                        <div class="row">
                            <div class="col-md-8 text-left">
                                <button type="button" class="btn btn-sm btn-success" data-target="#addModal"
                                    data-toggle="modal">Tambah Data</button>
                            </div>
                            <div class="col-md-4">
                                Tanggal : <?php echo date('d/m/Y');?>
                                <input type="hidden" name="iduser" value="<?php echo session()->get('id_user');?>" />
                                <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d');?>"/>
                            </div>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <table class="table table-sm table-striped " id="dataproduk">
                                        <thead>
                                            <tr role="row">
                                                <th>ID produk</th>
                                                <th>Nama Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Jumlah</th>
                                                <th>Sub Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="item">
                                            <tr></tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan='4'><b style="font-size:22px;">Total Bayar</b></td>
                                                <td colspan='2' ><b id="total" style="font-size:22px;">0</b></td>
                                                <input type="hidden" name="total" id="inputTotal" />
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form Tambah -->

    <?php if (!empty(session()->getFlashdata('error'))): ?>
        <div class= "alert alert-danger alert-dismissible fade show" role="alert">
            <h4> Periksa Entrian Form</h4>
            </hr/>
        <?php echo session()->getFlashdata('error'); ?>
            <button type="button" id="addModal" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button> 
    
        </div>
    <?php endif; ?>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeButton">
                <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>
                        <table id="example1" class="table table-boredered table-stripde">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($produk as $d) {
                                    $no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $d['idproduk'] ?></td>
                                        <td><?= $d['namaproduk'] ?></td>
                                        <td><?= $d['deskripsi'] ?></td>
                                        <td><?= $d['harga'] ?></td>
                                        <td><input class="form-control" type="number" placeholder="0" id="jumlah<?= $d['idproduk'] ?>" /></td>
                                        <td >
                                            <button type="button" class="btn btn-primary" onclick="pilih_produk('<?= $d['idproduk'] ?>','<?=$d['namaproduk'] ?>','<?= $d['harga'] ?>',1)">Pilih</button>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </p>
                </div>
            </div>
        </div>
    </div>
<script>
let total = 0;
   
//script datatable
$(document).ready(function() {
    $('#dataproduk').DataTable();
});

function pilih_produk(id, nama, harga) {
    let jumlah = $(`#jumlah${id}`).val();
    console.log(jumlah);
    let subtotal = harga * jumlah;
    $('#closeButton').click();
    $('#item').append(
        `<tr id="item${id}">
            <td>${id}</td>
            <td>${nama}</td>
            <td>${harga}</td>
            <td>${jumlah}</td>
            <td>${subtotal}</td>
            <td>
                <button type="button" class="btn btn-danger btn-sm btn-delete" onclick="delete_item(${id}, ${subtotal})">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <input type="hidden" name="idproduk[]" value="${id}" />
            <input type="hidden" name="harga[]" value="${harga}" />
            <input type="hidden" name="jumlah[]" value="${jumlah}" />
            <input type="hidden" name="subtotal[]" value="${subtotal}" />
        </tr>`
    );
    total += subtotal;
    let formatTotal = 'Rp ' + new Intl.NumberFormat().format(total).replace(",",".");
    $('#total').html(formatTotal);
    $('#inputTotal').val(total);
}

function delete_item(id, subtotal) {
    $(`#item${id}`).remove();
    total -= subtotal;
    $('#total').html(total);
    $('#inputTotal').val(total);
}

</script>
<?= $this->endSection('') ?>