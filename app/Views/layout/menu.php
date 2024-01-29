<?= $this->extend('layout/main') ?>

<?= $this->section("menu")?>
<li>
                                <a href="index.html" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Beranda <span class="badge badge-pill badge-primary float-right">7</span></span>
                                </a>
                                
                            </li>
<?php if (session()->get('level') == 1) { ?>
    <li>
                                <a href="index.html" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Admin <span class="badge badge-pill badge-primary float-right">7</span></span>
                                </a>
</li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                              
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Produk')?>">CRUD Produk<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('User')?>">CRUD User<i class="fas fa-walking"></i></a></li>
                                   
                                </ul>
                                </li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Penjualan')?>">CRUD Penjualan<i class="fas fa-walking"></i></a></li>
                                    
                                </ul>
                                </li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Laporan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Penjualan/laporanPenjualan')?>">Laporan Penjualan<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Penjualan/laporanPenjualandetail')?>">Laporan Penjualan Detail<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Penjualan/LaporanPerperiode')?>">Laporan Perperiode<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Penjualan/LaporanPerperiodedetail')?>">Laporan Detail Perperiode<i class="fas fa-walking"></i></a></li>
                                    
                                </ul>
                                </li>
                            </li>
<?php } ?>

<?php if (session()->get('level') == 2) { ?>
    <li>
                                <a href="index.html" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Admin <span class="badge badge-pill badge-primary float-right">7</span></span>
                                </a>
</li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                              
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Produk')?>">CRUD Produk<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('User')?>">CRUD User<i class="fas fa-walking"></i></a></li>
                                   
                                </ul>
                                </li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Pengurus')?>">CRUD Pengurus<i class="fas fa-walking"></i></a></li>
                                    
                                </ul>
                                </li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Laporan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Pengurus')?>">CRUD Pengurus<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('User')?>">CRUD User<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">CRUD Agenda<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">Laporan Donatur<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('KasMasuk/laporankasmasuk')?>">Laporan Uang Masuk<i class="fas fa-walking"></i></a></li>
                                </ul>
                                </li>
                            </li>
                            <?php } ?>
<?php if (session()->get('level') == 3) { ?>
                             <li>
                                <a href="index.html" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Admin <span class="badge badge-pill badge-primary float-right">7</span></span>
                                </a>
</li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                              
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Pengurus')?>">CRUD Pengurus<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('User')?>">CRUD User<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">CRUD Agenda<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">Laporan Donatur<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('KasMasuk/laporankasmasuk')?>">Laporan Uang Masuk<i class="fas fa-walking"></i></a></li>
                                </ul>
                                </li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Pengurus')?>">CRUD Pengurus<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('User')?>">CRUD User<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">CRUD Agenda<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">Laporan Donatur<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('KasMasuk/laporankasmasuk')?>">Laporan Uang Masuk<i class="fas fa-walking"></i></a></li>
                                </ul>
                                </li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Laporan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Pengurus')?>">CRUD Pengurus<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('User')?>">CRUD User<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">CRUD Agenda<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">Laporan Donatur<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('KasMasuk/laporankasmasuk')?>">Laporan Uang Masuk<i class="fas fa-walking"></i></a></li>
                                </ul>
                                </li>
                            </li>
<?php } ?>
<?php if (session()->get('level') == 4) { ?>
    <li>
                                <a href="index.html" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Admin <span class="badge badge-pill badge-primary float-right">7</span></span>
                                </a>
</li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                              
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Pengurus')?>">CRUD Pengurus<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('User')?>">CRUD User<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">CRUD Agenda<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">Laporan Donatur<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('KasMasuk/laporankasmasuk')?>">Laporan Uang Masuk<i class="fas fa-walking"></i></a></li>
                                </ul>
                                </li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Pengurus')?>">CRUD Pengurus<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('User')?>">CRUD User<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">CRUD Agenda<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">Laporan Donatur<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('KasMasuk/laporankasmasuk')?>">Laporan Uang Masuk<i class="fas fa-walking"></i></a></li>
                                </ul>
                                </li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cash-register"></i> <span> Laporan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=site_url('Pengurus')?>">CRUD Pengurus<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('User')?>">CRUD User<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">CRUD Agenda<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('Agenda')?>">Laporan Donatur<i class="fas fa-walking"></i></a></li>
                                    <li><a href="<?=site_url('KasMasuk/laporankasmasuk')?>">Laporan Uang Masuk<i class="fas fa-walking"></i></a></li>
                                </ul>
                                </li>
                            </li>
<?php } ?>
<li>
                               
        
                                    
                                    <a class="dropdown-item" href="<?=site_url('Login/logout')?>"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                            
</li>
                            
                            <?= $this->endSection('')?>

