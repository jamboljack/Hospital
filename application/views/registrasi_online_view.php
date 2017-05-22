<div class="page-container">
    <div class="page-head">
        <div class="container">
            <div class="page-title">
                <h1>Pendaftaran Online <small>Menu Pendaftaran Rawat Jalan Online</small></h1>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <ul class="page-breadcrumb breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Beranda</a><i class="fa fa-home"></i></li>
                <li class="active">Pendaftaran Online</li>
            </ul>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light" id="form_wizard_1">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-green-sharp bold uppercase">
                                <i class="fa fa-edit"></i> Proses Pendaftaran Online - <span class="step-title">Langkah 1 dari 4 </span>
                                </span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-wizard" >
                                <div class="form-body">
                                    <ul class="nav nav-pills nav-justified steps">
                                        <?php 
                                        // Kondisi Tab Aktif
                                        if (empty($this->uri->segment(2)) || $this->uri->segment(2) == '' || $this->uri->segment(2) == 'register' || $this->uri->segment(2) == 'login') { 
                                            $tab1   = 'active';
                                            $tab2   = 'disabled';
                                            $tab3   = 'disabled';
                                            $tab4   = 'disabled';
                                            $toogle1= 'data-toggle="tab"';
                                            $toogle2= '';
                                            $toogle3= '';
                                            $toogle4= '';
                                        } elseif ($this->uri->segment(2) == 'step_two') {
                                            $tab1   = 'disabled';
                                            $tab2   = 'active';
                                            $tab3   = 'disabled';
                                            $tab4   = 'disabled';
                                            $toogle1= '';
                                            $toogle2= 'data-toggle="tab"';
                                            $toogle3= '';
                                            $toogle4= '';
                                        } elseif ($this->uri->segment(2) == 'step_three') {
                                            $tab1   = 'disabled';
                                            $tab2   = 'disabled';
                                            $tab3   = 'active';
                                            $tab4   = 'disabled';
                                            $toogle1= '';
                                            $toogle2= '';
                                            $toogle3= 'data-toggle="tab"';
                                            $toogle4= '';
                                        } elseif ($this->uri->segment(2) == 'step_four') {
                                            $tab1   = 'disabled';
                                            $tab2   = 'disabled';
                                            $tab3   = 'disabled';
                                            $tab4   = 'active';
                                            $toogle1= '';
                                            $toogle2= '';
                                            $toogle3= '';
                                            $toogle4= 'data-toggle="tab"';
                                        }
                                        ?>
                                        <li class="<?php echo $tab1; ?>">
                                            <a href="#tab1" <?php echo $toogle1; ?> class="step">
                                            <span class="number">
                                            1 </span>
                                            <span class="desc">
                                            <i class="fa fa-check"></i> Login / Register </span>
                                            </a>
                                        </li>
                                        <li class="<?php echo $tab2; ?>" disabled>
                                            <a href="#tab2" <?php echo $toogle2; ?> class="step">
                                            <span class="number">
                                            2 </span>
                                            <span class="desc">
                                            <i class="fa fa-check"></i> Biodata Pendaftar </span>
                                            </a>
                                        </li>
                                        <li class="<?php echo $tab3; ?>">
                                            <a href="#tab3" <?php echo $toogle3; ?> class="step">
                                            <span class="number">
                                            3 </span>
                                            <span class="desc">
                                            <i class="fa fa-check"></i> Pemesanan Jadwal Periksa </span>
                                            </a>
                                        </li>
                                        <li class="<?php echo $tab4; ?>">
                                            <a href="#tab4" <?php echo $toogle4; ?> class="step">
                                            <span class="number">
                                            4 </span>
                                            <span class="desc">
                                            <i class="fa fa-check"></i> Selesai </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <?php 
                                    // Kondisi Persen
                                    if (empty($this->uri->segment(2)) || $this->uri->segment(2) == '' || $this->uri->segment(2) == 'register' || $this->uri->segment(2) == 'login') { 
                                        $persen   = '25';
                                    } elseif ($this->uri->segment(2) == 'step_two') {
                                        $persen   = '50';
                                    } elseif ($this->uri->segment(2) == 'step_three') {
                                        $persen   = '75';
                                    } elseif ($this->uri->segment(2) == 'step_four') {
                                        $persen   = '100';
                                    }
                                    ?>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $persen; ?>%">
                                        <span class="sr-only"></span>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <?php if ($this->session->flashdata('notificationsuccess')) { ?>
                                        <div class="alert alert-success alert-dismissable" align="center">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                            <?php echo $this->session->flashdata('notificationsuccess'); ?>
                                        </div>
                                        <?php } ?>
                                        <?php if ($this->session->flashdata('notificationerror')) { ?>
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                            <b>PERHATIAN !!</b> <br>
                                            <?php echo $this->session->flashdata('notificationerror'); ?>
                                        </div>
                                        <?php } ?>

                                        <?php if ($error == 'true') { ?>
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                            <b>PERHATIAN !!</b> <br>
                                            <?php echo validation_errors(); ?>
                                        </div>
                                        <?php } ?>

                                        <div class="tab-pane <?php echo $tab1; ?>" id="tab1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h3 class="block" align="center">Login</h3>
                                                            <p class="block" align="center">Masukkan Nama Akun dan Password Anda untuk LOGIN</p>
                                                            <form role="form"  action="<?php echo site_url('registrasi_online/login'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                            <div class="form-body"> 
                                                                <div class="form-group form-md-line-input">
                                                                    <div class="col-md-12">
                                                                        <input type="text" class="form-control" placeholder="Nama Akun Anda" name="username" placeholder="Nama Akun" value="<?php echo set_value('username'); ?>" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Jangan Pakai SPASI" autocomplete="off" required autofocus>
                                                                        <div class="form-control-focus"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-md-line-input">
                                                                    <div class="col-md-12">
                                                                        <input type="password" placeholder="Password Anda" class="form-control" name="password" value="<?php echo set_value('password'); ?>" autocomplete="off" required>
                                                                        <div class="form-control-focus"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                <div class="row">              
                                                                    <div class="col-md-12" align="center">
                                                                        <button type="submit" class="btn green"><i class="fa fa-sign-in"></i> Log In</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="">Lupa Password ?</a><br>
                                                            <a href="">Lupa Nama Akun ?</a>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h3 class="block" align="center">Register</h3>
                                                            <p class="block" align="center">Register dilakukan jika Anda belum mempunyai Akun. Proses Register hanya sekali saja dan digunakan untuk membuat Akun yang nantinya berfungsi untuk LOGIN. Dengan melakukan Register, Anda bisa melakukan Pendaftaran Online bagi diri Anda sendiri dan keluarga Anda.</p>
                                                            <form role="form" class="form-horizontal" action="<?php echo site_url('registrasi_online/register'); ?>" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                            <div class="form-body"> 
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-3 control-label">Nama Akun <span class="required" aria-required="true"> * </span></label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Jangan Pakai SPASI" autocomplete="off" required autofocus>
                                                                        <div class="form-control-focus"></div>
                                                                        <span class="help-block">Isi Nama Akun Anda, berisi 5-20 Karakter tanpa Spasi</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-3 control-label">Nama Lengkap <span class="required" aria-required="true"> * </span></label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" required>
                                                                        <div class="form-control-focus"></div>
                                                                        <span class="help-block">Isi Nama Lengkap Anda</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-3 control-label">Email <span class="required" aria-required="true"> * </span></label>
                                                                    <div class="col-md-9">
                                                                        <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" autocomplete="off" required>
                                                                        <div class="form-control-focus"></div>
                                                                        <span class="help-block">Isi EMAIL VALID, ex. xxx@gmail.com</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-3 control-label">No. Handphone <span class="required" aria-required="true"> * </span></label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" pattern="^[0-9]{1,12}$" title="Hanya Angka, maksimal 12 Digit" autocomplete="off" required>
                                                                        <div class="form-control-focus"></div>
                                                                        <span class="help-block">Isi No. Handphone Anda, Hanya ANGKA</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-3 control-label">Password <span class="required" aria-required="true"> * </span></label>
                                                                    <div class="col-md-9">
                                                                        <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" autocomplete="off" required>
                                                                        <div class="form-control-focus"></div>
                                                                        <span class="help-block">Isi Password Akun Anda, minimal 3 Karakter</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-3 control-label">
                                                                        <img id="imgCaptcha" src="<?php echo site_url('registrasi_online/create_image'); ?>" />
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                        <input type='text' name="verify" class="form-control" maxlength="5" autocomplete="off" required>
                                                                        <div class="form-control-focus"></div>
                                                                        <span class="help-block">Masukkan 5 Karakter di Samping</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-12" align="center">
                                                                        <button type="submit" class="btn green"><i class="fa fa-sign-in"></i> Register</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane <?php echo $tab2; ?>" id="tab2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- SIDEBAR -->
                                                    <div class="profile-sidebar" style="width: 250px;">
                                                        <div class="portlet light profile-sidebar-portlet">
                                                            <div class="profile-userpic">
                                                                <img src="<?php echo base_url('img/avatar-green.png'); ?>" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="profile-usertitle">
                                                                <div class="profile-usertitle-name">
                                                                    <?php echo $this->session->userdata('username'); ?>
                                                                </div>
                                                            </div>
                                                            <?php 
                                                            $uritab = $this->uri->segment(3);
                                                            if (empty($uritab) || $uritab == '' && $uritab <> 'ubahpassword' && $uritab <> 'ubahprofil') {
                                                                $tabprofil1 = 'class="active"';
                                                                $tabprofil2 = '';
                                                                $tabprofil3 = '';
                                                            } elseif ($uritab == 'ubahpassword') {
                                                                $tabprofil1 = '';
                                                                $tabprofil2 = 'class="active"';
                                                                $tabprofil3 = '';
                                                            } elseif ($uritab == 'ubahprofil') {
                                                                $tabprofil1 = '';
                                                                $tabprofil2 = '';
                                                                $tabprofil3 = 'class="active"';
                                                            }
                                                            ?>
                                                            <div class="profile-usermenu">
                                                                <ul class="nav">
                                                                    <li <?php echo $tabprofil1; ?>>
                                                                        <a href="<?php echo site_url('registrasi/step_two'); ?>">
                                                                        <i class="fa fa-list"></i>
                                                                        Daftar Anggota Keluarga </a>
                                                                    </li>
                                                                    <li <?php echo $tabprofil2; ?>>
                                                                        <a href="<?php echo site_url('registrasi/step_two/ubahpassword'); ?>">
                                                                        <i class="fa fa-key"></i>
                                                                        Ubah Password </a>
                                                                    </li>
                                                                    <li <?php echo $tabprofil3; ?>>
                                                                        <a href="<?php echo site_url('registrasi/step_two/ubahprofil'); ?>">
                                                                        <i class="fa fa-user"></i>
                                                                        Ubah Profil </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo site_url('registrasi_online/logout'); ?>" title="Keluar Pendaftaran">
                                                                        <i class="fa fa-sign-out"></i>
                                                                        Log Out </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END SIDEBAR -->

                                                    <?php 
                                                    if (empty($uritab) || $uritab == '' && $uritab <> 'ubahpassword' && $uritab <> 'ubahprofil') {
                                                    ?>
                                                    <!-- BEGIN DAFTAR ANGGOTA KELUARGA -->
                                                    <div class="profile-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="portlet light">
                                                                    <div class="portlet-title tabbable-line">
                                                                        <div class="caption caption-md">
                                                                            <i class="icon-globe theme-font hide"></i>
                                                                            <span class="caption-subject font-blue-madison bold uppercase">Daftar Anggota Keluarga</span>
                                                                        </div>
                                                                        <ul class="nav nav-tabs">
                                                                            <li class="active">
                                                                                <a href="#tab_1_1" data-toggle="tab">Pasien Lama <br> (Sudah Pernah Berkunjung)</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#tab_1_2" data-toggle="tab">Pasien Baru <br> (Belum Pernah Berkunjung)</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <div class="tab-content">
                                                                            <!-- PASIEN LAMA -->
                                                                            <div class="tab-pane active" id="tab_1_1">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <form role="form" action="<?php echo site_url('registrasi_online/register'); ?>" method="post" enctype="multipart/form-data">
                                                                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                                                        <div class="form-body">
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="no_rekam_medik">
                                                                                                <span class="help-block">Masukkan No. REKAM MEDIK</span>
                                                                                                <label>NO. REKAM MEDIK</label>
                                                                                            </div>

                                                                                            <div class="margiv-top-10">
                                                                                                <a href="" class="btn green"><i class="fa fa-search"></i>
                                                                                                Cari Data </a>
                                                                                            </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="note note-success note-bordered">
                                                                                        NO. REKAM MEDIK diisi sesuai Nomor Pasien yang tertera di Kartu Pasien RS St. Elisabeth Semarang.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- END PASIEN LAMA -->
                                                                            <!-- PASIEN BARU TAB -->
                                                                            <div class="tab-pane" id="tab_1_2">
                                                                                <div class="row">
                                                                                    <form role="form" action="<?php echo site_url('registrasi_online/register'); ?>" method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-body">
                                                                                            <h4 class="block">Informasi Biodata</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstHubungan">
                                                                                                    <option value="">- Pilih Status -</option>
                                                                                                    <option value="1">Diri Sendiri</option>
                                                                                                    <option value="2">Suami</option>
                                                                                                    <option value="3">Istri</option>
                                                                                                    <option value="4">Anak</option>
                                                                                                    <option value="4">Orang Tua</option>
                                                                                                    <option value="4">Saudara Lainnya</option>
                                                                                                </select>
                                                                                                <label>Hubungan dengan Pemilik Akun ?</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="nama">
                                                                                                <span class="help-block">Masukkan Nama sesuai KTP atau Kartu Keluarga</span>
                                                                                                <label>Nama</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="no_ktp" pattern="^[0-9]{1,12}$" title="Hanya Angka, maksimal 12 Digit">
                                                                                                <span class="help-block">Masukkan No. KTP atau KK, hanya ANGKA</span>
                                                                                                <label>No. KTP / KK</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-radios">
                                                                                                <label>Jenis Kelamin</label>
                                                                                                <div class="md-radio-inline">
                                                                                                    <div class="md-radio">
                                                                                                        <input type="radio" id="rdJK1" name="rdJK" class="md-radiobtn" value="L">
                                                                                                        <label for="rdJK1">
                                                                                                        <span></span>
                                                                                                        <span class="check"></span>
                                                                                                        <span class="box"></span>
                                                                                                        Laki-Laki </label>
                                                                                                    </div>
                                                                                                    <div class="md-radio">
                                                                                                        <input type="radio" id="rdJK2" name="rdJK" class="md-radiobtn" value="P">
                                                                                                        <label for="rdJK2">
                                                                                                        <span></span>
                                                                                                        <span class="check"></span>
                                                                                                        <span class="box"></span>
                                                                                                        Perempuan </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="tempat_lahir">
                                                                                                <span class="help-block">Tempat Lahir Pasien</span>
                                                                                                <label>Tempat Lahir</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" name="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>" placeholder="DD-MM-YYYY" autocomplete="off" required />
                                                                                                <label>Tanggal Lahir</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstAgama" required>
                                                                                                    <option value="">- Pilih Agama -</option>
                                                                                                    <?php 
                                                                                                    foreach($listAgama as $a) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $a->agama_id; ?>"><?php echo $a->agama_name; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <label>Agama</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstDarah" required>
                                                                                                    <option value="">- Pilih Golongan Darah -</option>
                                                                                                    <?php 
                                                                                                    foreach($listDarah as $d) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $d->darah_id; ?>"><?php echo $d->darah_name; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <label>Golongan Darah</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstPendidikan" required>
                                                                                                    <option value="">- Pilih Pendidikan -</option>
                                                                                                    <?php 
                                                                                                    foreach($listDidik as $p) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $p->pendidikan_id; ?>"><?php echo $p->pendidikan_name; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <label>Pendidikan</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstStatus" required>
                                                                                                    <option value="">- Pilih Status Kawin -</option>
                                                                                                    <?php 
                                                                                                    foreach($listStatus as $s) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $s->status_id; ?>"><?php echo $s->status_name; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <label>Status Kawin</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstKerja" required>
                                                                                                    <option value="">- Pilih Pekerjaan -</option>
                                                                                                    <?php 
                                                                                                    foreach($listKerja as $k) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $k->pekerjaan_id; ?>"><?php echo $k->pekerjaan_name; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <label>Pekerjaan</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-body">
                                                                                            <h4 class="block">Informasi Alamat</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="nama">
                                                                                                <span class="help-block">Masukkan Alamat sesuai KTP</span>
                                                                                                <label>Alamat</label>
                                                                                            </div>
                                                                                            


                                                                                        </div>
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            <!-- END PASIEN BARU TAB -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END DAFTAR ANGGOTA KELUARGA -->
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane <?php echo $tab3; ?>" id="tab3">
                                                
                                        </div>
                                        <div class="tab-pane <?php echo $tab4; ?>" id="tab4">
                                            <h3 class="block">Confirm your account</h3>
                                            <h4 class="form-section">Account</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Username:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="username"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="email"></p>
                                                </div>
                                            </div>
                                            <h4 class="form-section">Profile</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>