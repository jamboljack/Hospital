<?php 
$uri    = $this->uri->segment(1);

if ($uri == '') {
    $beranda        = 'active';
    $jadwal_dokter  = '';
    $registrasi     = '';
} elseif ($uri == 'jadwal_dokter') {
    $beranda        = '';
    $jadwal_dokter  = 'active';
    $registrasi     = '';
} elseif ($uri == 'registrasi_online') {
    $beranda        = '';
    $jadwal_dokter  = '';
    $registrasi     = 'active';
} elseif ($uri == 'registrasi') {
    $beranda        = '';
    $jadwal_dokter  = '';
    $registrasi     = 'active';
} else {
    $beranda        = 'active';
    $jadwal_dokter  = '';
    $registrasi     = '';
}

?>
<div class="page-header">
    <div class="page-header-top">
        <div class="container">            
            <div class="page-logo">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo-dashboard.png" alt="logo" class="logo-default"></a>
            </div>
            <a href="#" class="menu-toggler"></a>
        </div>
    </div>
    
    <div class="page-header-menu">
        <div class="container">
            <div class="hor-menu ">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="http://www.rs-elisabeth.com"><i class="fa fa-globe"></i> Homepage</a>
                    </li>
                    <li class="<?php echo $beranda; ?>">
                        <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Beranda</a>
                    </li>
                    <li class="<?php echo $jadwal_dokter; ?>">
                        <a href="<?php echo site_url('jadwal_dokter'); ?>"><i class="fa fa-list"></i> Jadwal Dokter</a>
                    </li>
                    <li class="<?php echo $registrasi; ?>">
                        <a href="<?php echo site_url('registrasi_online'); ?>"><i class="fa fa-edit"></i> Pendaftaran Online</a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
    
</div>