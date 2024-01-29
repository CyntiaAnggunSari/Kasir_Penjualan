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
                        <h4 class="mt-e header-title">Data Produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-primary" data-target="#addModal"
                                data-toggle="modal">Tambah Data</button>
                        </div>
                        
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped " id="dataproduk">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Nama Produk</th>
                                                <th>Deskripsi</th>
                                                <th>Stok</th>
                                                <th>Harga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($produk as $val) {
                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['idproduk'] ?></td>
                                                <td><?= $val['namaproduk'] ?></td>
                                                <td><?= $val['deskripsi'] ?></td>
                                                <td><?= $val['stok'] ?></td>
                                                <td><?= $val['harga'] ?></td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm btn-edit" data-idproduk="<?= $val['idproduk']; ?>" data-nama="<?= $val['namaproduk'] ?>" data-desk="<?=$val['deskripsi']?>" data-harga="<?= $val['harga'] ?>" >
                                                        <i class=" fa fa-tags"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-idproduk="<?= $val['idproduk']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-success btn-sm btn-add" data-idproduk="<?= $val['idproduk']; ?>" >
                                                        <i class=" fa fa-plus"></i>
                                                    </button>
                                                    
                                                </td>
                                            </tr>
                                            <?php } ?>
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
<!-- Modal Delete -->
<form action="/produk/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Apakah Yakin Menghapus Data Ini? </h3>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Edit -->
<form action="/produk/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Produk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="id form-control" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Nama Produk</label>
                        <input type="text" class="namaproduk form-control" name="namaproduk">
                    </div>
                    <div class="col-md-12">
                        <label>Deskripsi</label>
                        <input type="text" class=" desk form-control" name="desk">
                    </div>
                    <div class="col-md-12">
                        <label>Harga</label>
                        <input type="text" class=" harga form-control" name="harga">
                     </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Edit -->
<form action="/produk/updateStok" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   
                        <input type="hidden" class="id form-control" name="id">
                  
                    <div class="col-md-12">
                        <label>Stok</label>
                        <input type="number" class=" stok form-control" name="stok">
                     </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Tambah -->

<form action="/produk/save" method="post">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Produk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
            
                    <div class="col-md-12">
                        <label>Nama produk</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="col-md-12">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="des">
                    </div>
                    <div class="col-md-12">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    //script untuk edit data
    $('.btn-edit').on('click',function(){
        const id = $(this).data('idproduk');
        const namaproduk = $(this).data('nama');
        const deskripsi = $(this).data('desk');
        const harga = $(this).data('harga');

        $('.id').val(id);
        $('.namaproduk').val(namaproduk);
        $('.desk').val(deskripsi);
        $('.harga').val(harga);
        $('.desk').val(deskripsi).trigger('change');
        $('#editModal').modal('show');
    })
//script delete
$('.btn-delete').on('click', function() {
    const id = $(this).data('idproduk');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});

$('.btn-add').on('click', function() {
    const id = $(this).data('idproduk');
    $('.id').val(id);
    $('#addModal').modal('show');
});
//script datatable
$(document).ready(function() {
    $('#dataproduk').DataTable();
});

</script>
<?= $this->endSection('') ?>