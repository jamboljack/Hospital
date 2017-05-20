<?php 
$uri = $this->uri->segment(1);

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
            
            <?php if($this->session->userdata('logged_in_pasien')) { ?>
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">                                       
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-mobile"><?php echo $this->session->userdata('nama'); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="<?php echo site_url('dashboard/profil'); ?>">
                                <i class="icon-user"></i> Profil </a>
                            </li>                           
                            <li class="divider">
                            </li>
                            <li>
                                <a href="<?php echo site_url('login/logout'); ?>">
                                <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php } ?>

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