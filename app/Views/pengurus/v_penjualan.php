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
                    <div class="card-body">
                        <div class="col-md-12">
                            <a href="<?=site_url('penjualan/new')?>" class="btn btn-sm btn-success">Tambah Data</a>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="card-body">
                                <div class="col-12">
                                    <table class="table table-sm table-striped" id="datakasmasuk">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>ID Penjualan</th>
                                                <th>Tanggal</th>
                                                <th>Total Harga</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 0; $tot= 0;
                                            foreach($penjualan as $val){
                                            $no++;
                                            $tot = $tot+$val['total'];
                                            ?>
                                            <tr role="row"class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['idpesanan']?></td>
                                                <td><?= $val['tanggal']?></td>
                                                <td><?= $val['total']?></td>
                                                <td>
                                                    <a href="<?=site_url('penjualan/detail/'.$val['idpesanan'])?>" class="btn btn-sm btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                            <tr>
                                            <td colspan='3'><b style="font-size:22px;">Total Penjualan</b></td>
                                            <td colspan='2'><b style="font-size:22px;">Rp <?= number_format($tot, 0, ",", ".") ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //script untuk edit data
    $('.btn-edit').on('click',function(){
        const id = $(this).data('id_kas_masjid');
        const tanggal = $(this).data('tanggal');
        const ket = $(this).data('ket');
        const kasmasuk = $(this).data('kas_masuk');
        const jenis = $(this).data('jenis_kas');
        
        $('.id').val(id);
        $('.tgl').val(tanggal);
        $('.ket').val(ket);
        $('.kasmasuk').val(kasmasuk);
        $('.jenis').val(jenis);
        $('.ket').val(ket).trigger('change');
        $('#editModal').modal('show');
    })
//script delete
$('.btn-delete').on('click', function() {
    const id = $(this).data('id_kas_masjid');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});
//script datatable
$(document).ready(function() {
    $('#datakasmasuk').DataTable();
});

function pilih_donatur(id,nama) {
    $('#iddonatur').val(id);
    $('#nama').val(nama);
    $('#modal_donatur').modal().hide();
}

</script>
<?= $this->endSection('') ?>