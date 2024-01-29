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
<div class="col-sm-12">
    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="mt-e header-title">Data Kas Keluar</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-success" data-target="#addModal"
                                data-toggle="modal">Tambah Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                        <div class="card-body">
          <div class="col-md-12">
                                    <table class="table table-sm table-responsive " id="datakaskeluar">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>ID Kas Masjid</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Kas Keluar</th>
                                                <th>Jenis Kas</th>
                                                <th>Action</th>
                                            </tr>
                                            
                                          </thead>
                                        <tbody>
                                        <?php $no = 0; $tot = 0 ;
                    foreach($kaskeluar as $val){
                      $no++;
                      $tot=$tot+$val['kas_keluar'];
                      ?>
                      <tr role="row"class="odd">
                        <td><?= $no; ?></td>
                        <td><?= $val['id_kas_masjid']?></td>
                        <td><?= $val['tanggal']?></td>
                        <td><?= $val['ket']?></td>
                        <td><?= $val['kas_keluar']?></td>
                        <td><?= $val['jenis_kas'] ?></td>
                        
                        
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm btn-edit" data-id_kas_masjid="<?= $val['id_kas_masjid'] ?>" data-tanggal="<?= $val['tanggal'] ?>" data-ket="<?=$val['ket']?>" data-kas_masuk="<?= $val['kas_masuk'] ?>" data-kas_keluar="<?= $val['kas_keluar'] ?>"data-jenis_kas="<?= $val['jenis_kas'] ?>" data-status="<?= $val['status'] ?>">
                                                        <i class=" fa fa-tags"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-id_kas_masjid="<?= $val['id_kas_masjid']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                                
                                            </tr>
                                            
                                           
                                            
                                            <?php } ?>
                                            <tr>
                                              <td colspan='4'>Total Keluaran</td>
                                              <td colspan='6'><?=$tot?></td>
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
<!-- Modal Delete -->
<form action="/kaskeluar/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kas Keluar</h5>
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
<form action="/kaskeluar/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kas Keluar</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="col-md-12">
                        
                        <input type="hidden" class="id form-control" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="tgl form-control" name="tgl">
                    </div>
                    <div class="col-md-12">
                        <label>Keterangan</label>
                        <input type="text" class="ket form-control" name="ket">
                    </div>
                    <div class="col-md-12">
                        <label>Kas Keluar</label>
                        <input type="text" class="kaskeluar form-control" name="kaskeluar">
                    </div>
                    
                    <div class="col-md-12">
                        <label>Jenis Kas</label>
                        <select name="jenis" class="jenis form-control" >
                        <option value="">Pilih Jenis Kas</option>
                        <option value="Masjid">Masjid</option>
                        <option value="Anak Yatim">Anak Yatim</option>
                        <option value="TPQ">TPQ</option>
                        <option value="Sosial">Sosial</option>
                    </select>
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

<form action="/kaskeluar/save" method="post">
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
                    <h5 class="modal-title" id="exampleModalLabel">Kas Keluar</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tgl">
                    </div>
                    <div class="col-md-12">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="ket">
                    </div>
                    <div class="col-md-12">
                        <label>Kas Keluar</label>
                        <input type="text" class="form-control" name="kaskeluar">
                    </div>
                    <div class="col-md-12">
                        <label>Jenis Kas</label>
                        <select name="jenis" class="form-control" >
                        <option value="">Pilih Jenis Kas</option>
                        <option value="Masjid">Masjid</option>
                        <option value="Anak Yatim">Anak Yatim</option>
                        <option value="TPQ">TPQ</option>
                        <option value="Sosial">Sosial</option>
                    </select>
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
        const id = $(this).data('id_kas_masjid');
        const tanggal = $(this).data('tanggal');
        const ket = $(this).data('ket');
        const kaskeluar = $(this).data('kas_keluar');
        const jenis = $(this).data('jenis_kas');
        
        $('.id').val(id);
        $('.tgl').val(tanggal);
        $('.ket').val(ket);
        $('.kaskeluar').val(kaskeluar);
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
    $('#datakaskeluar').DataTable();
});

</script>
<?= $this->endSection('') ?>