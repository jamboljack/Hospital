<?php
$uri = $this->uri->segment(2);

if ($uri == 'home') {
    $dashboard      = 'active';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'menu') {
    $dashboard      = '';
    $menu           = 'active';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'pendidikan') {
    $dashboard      = '';
    $menu           = '';
    $umum           = 'active open';
    $span_umum_1    = '<span class="selected"></span>';
    $span_umum_2    = 'open';
    $pendidikan     = 'active';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'pekerjaan') {
    $dashboard      = '';
    $menu           = '';
    $umum           = 'active open';
    $span_umum_1    = '<span class="selected"></span>';
    $span_umum_2    = 'open';
    $pendidikan     = '';
    $pekerjaan      = 'active';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'status') {
    $dashboard      = '';
    $menu           = '';
    $umum           = 'active open';
    $span_umum_1    = '<span class="selected"></span>';
    $span_umum_2    = 'open';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = 'active';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'darah') {
    $dashboard      = '';
    $menu           = '';
    $umum           = 'active open';
    $span_umum_1    = '<span class="selected"></span>';
    $span_umum_2    = 'open';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = 'active';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'agama') {
    $dashboard      = '';
    $menu           = '';
    $umum           = 'active open';
    $span_umum_1    = '<span class="selected"></span>';
    $span_umum_2    = 'open';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = 'active';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'asuransi') {
    $dashboard      = '';
    $menu           = '';
    $umum           = 'active open';
    $span_umum_1    = '<span class="selected"></span>';
    $span_umum_2    = 'open';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = 'active';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'identitas') {
    $dashboard      = '';
    $menu           = '';
    $umum           = 'active open';
    $span_umum_1    = '<span class="selected"></span>';
    $span_umum_2    = 'open';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = 'active';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'jenistarif') {
    $dashboard      = '';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = 'active open';
    $span_tarif_1   = '<span class="selected"></span>';
    $span_tarif_2   = 'open';
    $jenistarif     = 'active';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'kelompok') {
    $dashboard      = '';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = 'active open';
    $span_tarif_1   = '<span class="selected"></span>';
    $span_tarif_2   = 'open';
    $jenistarif     = '';
    $kelompok       = 'active';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'pelanggan') {
    $dashboard      = '';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = 'active open';
    $span_tarif_1   = '<span class="selected"></span>';
    $span_tarif_2   = 'open';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = 'active';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'kelompok_unit') {
    $dashboard      = '';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = 'active open';
    $span_tarif_1   = '<span class="selected"></span>';
    $span_tarif_2   = 'open';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = 'active';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'unit') {
    $dashboard      = '';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = 'active open';
    $span_tarif_1   = '<span class="selected"></span>';
    $span_tarif_2   = 'open';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = 'active';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'produk') {
    $dashboard      = '';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = 'active open';
    $span_tarif_1   = '<span class="selected"></span>';
    $span_tarif_2   = 'open';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = 'active';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'tipe_dokter') {
    $dashboard      = '';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = 'active open';
    $span_medis_1   = '<span class="selected"></span>';
    $span_medis_2   = 'open';
    $tipe_dokter    = 'active';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'dokter') {
    $dashboard      = '';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = 'active open';
    $span_medis_1   = '<span class="selected"></span>';
    $span_medis_2   = 'open';
    $tipe_dokter    = '';
    $dokter         = 'active';
    $ruangan        = '';
    $users          = '';
} elseif ($uri == 'ruangan') {
    $dashboard      = '';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = 'active open';
    $span_medis_1   = '<span class="selected"></span>';
    $span_medis_2   = 'open';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = 'active';
    $users          = '';
} elseif ($uri == 'users') {
    $dashboard      = '';
    $menu           = '';
    $umum           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = 'active';
} else {
    $dashboard      = 'active';
    $umum           = '';
    $menu           = '';
    $span_umum_1    = '';
    $span_umum_2    = '';
    $pendidikan     = '';
    $pekerjaan      = '';
    $status         = '';
    $darah          = '';
    $agama          = '';
    $asuransi       = '';
    $identitas      = '';
    $tarif          = '';
    $span_tarif_1   = '';
    $span_tarif_2   = '';
    $jenistarif     = '';
    $kelompok       = '';
    $pelanggan      = '';
    $kelompok_unit  = '';
    $unit           = '';
    $produk         = '';
    $medis          = '';
    $span_medis_1   = '';
    $span_medis_2   = '';
    $tipe_dokter    = '';
    $dokter         = '';
    $ruangan        = '';
    $users          = '';  
}

?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">         
        <ul class="page-sidebar-menu page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">            
            <li class="sidebar-toggler-wrapper">            
               <div class="sidebar-toggler">
               </div>               
            </li>
            <li class="sidebar-search-wrapper">                    
                <form class="sidebar-search">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                    </div>
                </form>                
            </li>
            <li class="tooltips <?php echo $dashboard; ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Dashboard">
                <a href="<?php echo site_url('admin/home'); ?>">
                    <i class="fa fa-home"></i>
                    <span class="title">
                    Dashboard
                    </span>
                </a>
            </li>
            <li class="tooltips <?php echo $menu; ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Master Menu">
                <a href="<?php echo site_url('admin/menu'); ?>">
                    <i class="fa fa-desktop"></i>
                    <span class="title">
                    Master Menu
                    </span>
                </a>
            </li>
            <li class="<?php echo $umum; ?>">
                <a href="javascript:;">
                    <i class="fa fa-folder"></i>
                    <span class="title">Master Umum</span>
                    <?php echo $span_umum_1; ; ?>
                    <span class="arrow <?php echo $span_umum_2; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo $pendidikan; ?>">
                        <a href="<?php echo site_url('admin/pendidikan'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Pendidikan
                        </a>
                    </li>
                    <li class="<?php echo $pekerjaan; ?>">
                        <a href="<?php echo site_url('admin/pekerjaan'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Pekerjaan
                        </a>
                    </li>
                    <li class="<?php echo $status; ?>">
                        <a href="<?php echo site_url('admin/status'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Status
                        </a>
                    </li>
                    <li class="<?php echo $darah; ?>">
                        <a href="<?php echo site_url('admin/darah'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Gol. Darah
                        </a>
                    </li>
                    <li class="<?php echo $agama; ?>">
                        <a href="<?php echo site_url('admin/agama'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Agama
                        </a>
                    </li>
                    <li class="<?php echo $asuransi; ?>">
                        <a href="<?php echo site_url('admin/asuransi'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Asuransi
                        </a>
                    </li>
                    <li class="<?php echo $identitas; ?>">
                        <a href="<?php echo site_url('admin/identitas'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Identitas
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $tarif; ?>">
                <a href="javascript:;">
                    <i class="fa fa-money"></i>
                    <span class="title">Master Tarif</span>
                    <?php echo $span_tarif_1; ; ?>
                    <span class="arrow <?php echo $span_tarif_2; ; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo $jenistarif; ?>">
                        <a href="<?php echo site_url('admin/jenistarif'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Jenis Tarif
                        </a>
                    </li>
                    <li class="<?php echo $kelompok; ?>">
                        <a href="<?php echo site_url('admin/kelompok'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Kelompok Pelanggan
                        </a>
                    </li>
                    <li class="<?php echo $pelanggan; ?>">
                        <a href="<?php echo site_url('admin/pelanggan'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Pelanggan
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $medis; ?>">
                <a href="javascript:;">
                    <i class="fa fa-h-square"></i>
                    <span class="title">Master Medis</span>
                    <?php echo $span_medis_1; ; ?>
                    <span class="arrow <?php echo $span_medis_2; ; ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo $ruangan; ?>">
                        <a href="<?php echo site_url('admin/ruangan'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Ruangan Praktek
                        </a>
                    </li>
                    <li class="<?php echo $tipe_dokter; ?>">
                        <a href="<?php echo site_url('admin/tipe_dokter'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Tipe Dokter
                        </a>
                    </li>
                    <li class="<?php echo $dokter; ?>">
                        <a href="<?php echo site_url('admin/dokter'); ?>">
                            <i class="fa fa-check-square-o"></i>
                            Dokter & Jadwal Praktek
                        </a>
                    </li>
                </ul>
            </li>            
            <li class="tooltips <?php echo $users; ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Users">
                <a href="<?php echo site_url('admin/users'); ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">
                    Users
                    </span>
                </a>
            </li>            
        </ul>        
    </div>
</div>