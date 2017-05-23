<script type="text/javascript">
    function TampilKabupaten() {
        provinsi_id = document.getElementById("provinsi_id").value;
        $.ajax({
            url:"<?php echo base_url();?>registrasi/step_two/pilih_kabupaten/"+provinsi_id+"",
            success: function(response) {
                $("#kabupaten_id").html(response);
            },
            dataType:"html"
        });
        return false;
    }
</script>

<script type="text/javascript">
    function TampilKecamatan() {
        kabupaten_id = document.getElementById("kabupaten_id").value;
        $.ajax({
            url:"<?php echo base_url();?>registrasi/step_two/pilih_kecamatan/"+kabupaten_id+"",
            success: function(response) {
                $("#kecamatan_id").html(response);
            },
            dataType:"html"
        });
        return false;
    }
</script>

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
                                                        if (count($listAnggota) == 0 || $this->uri->segment(3) == 'tambah_anggota') {
                                                    ?>
                                                    <!-- BEGIN MENU DAFTAR ANGGOTA KELUARGA -->
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
                                                                                    <form role="form" action="<?php echo site_url('registrasi/step_two/savedatakeluarga'); ?>" method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-body">
                                                                                            <h4 class="block">Informasi Biodata</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstHubungan" required>
                                                                                                    <option value="">- Pilih Status -</option>
                                                                                                    <option value="1" <?php echo set_select('lstHubungan', '1'); ?>>Diri Sendiri</option>
                                                                                                    <option value="2" <?php echo set_select('lstHubungan', '2'); ?>>Suami</option>
                                                                                                    <option value="3" <?php echo set_select('lstHubungan', '3'); ?>>Istri</option>
                                                                                                    <option value="4" <?php echo set_select('lstHubungan', '4'); ?>>Anak</option>
                                                                                                    <option value="5" <?php echo set_select('lstHubungan', '5'); ?>>Orang Tua</option>
                                                                                                    <option value="6" <?php echo set_select('lstHubungan', '6'); ?>>Saudara Lainnya</option>
                                                                                                </select>
                                                                                                <label>Hubungan dengan Pemilik Akun ?</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" required>
                                                                                                <span class="help-block">Masukkan Nama sesuai KTP atau Kartu Keluarga</span>
                                                                                                <label>Nama</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstIdentitas" required>
                                                                                                    <option value="">- Pilih Identitas -</option>
                                                                                                    <?php 
                                                                                                    foreach($listIdentitas as $i) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $i->identitas_id; ?>" <?php echo set_select('lstIdentitas', $i->identitas_id); ?>><?php echo $i->identitas_name; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <label>Identitas</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="no_identitas" value="<?php echo set_value('no_identitas'); ?>" pattern="^[0-9]{1,16}$" title="Hanya Angka, maksimal 16 Digit" required>
                                                                                                <span class="help-block">Masukkan No. Identitas, hanya ANGKA max. 16 Angka</span>
                                                                                                <label>No. Identitas</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-radios">
                                                                                                <label>Jenis Kelamin</label>
                                                                                                <div class="md-radio-inline">
                                                                                                    <div class="md-radio">
                                                                                                        <input type="radio" id="rdJK1" name="rdJK" class="md-radiobtn" value="Laki-Laki" <?php echo set_checkbox('rdJK', 'Laki-Laki'); ?>>
                                                                                                        <label for="rdJK1">
                                                                                                        <span></span>
                                                                                                        <span class="check"></span>
                                                                                                        <span class="box"></span>
                                                                                                        Laki-Laki </label>
                                                                                                    </div>
                                                                                                    <div class="md-radio">
                                                                                                        <input type="radio" id="rdJK2" name="rdJK" class="md-radiobtn" value="Perempuan" <?php echo set_checkbox('rdJK', 'Perempuan'); ?>>
                                                                                                        <label for="rdJK2">
                                                                                                        <span></span>
                                                                                                        <span class="check"></span>
                                                                                                        <span class="box"></span>
                                                                                                        Perempuan </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" required>
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
                                                                                                    <option value="<?php echo $a->agama_id; ?>" <?php echo set_select('lstAgama', $a->agama_id); ?>><?php echo $a->agama_name; ?></option>
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
                                                                                                    <option value="<?php echo $d->darah_id; ?>" <?php echo set_select('lstDarah', $d->darah_id); ?>><?php echo $d->darah_name; ?></option>
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
                                                                                                    <option value="<?php echo $p->pendidikan_id; ?>" <?php echo set_select('lstPendidikan', $p->pendidikan_id); ?>><?php echo $p->pendidikan_name; ?></option>
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
                                                                                                    <option value="<?php echo $s->status_id; ?>" <?php echo set_select('lstStatus', $s->status_id); ?>><?php echo $s->status_name; ?></option>
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
                                                                                                    <option value="<?php echo $k->pekerjaan_id; ?>" <?php echo set_select('lstKerja', $k->pekerjaan_id); ?>><?php echo $k->pekerjaan_name; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <label>Pekerjaan</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-checkboxes">
                                                                                                <label>WNI</label>
                                                                                                <div class="md-checkbox-inline">
                                                                                                    <div class="md-checkbox">
                                                                                                        <input type="checkbox" id="check1" value="1" name="chkWNI" class="md-check" <?php echo set_checkbox('chkWNI', 1); ?>>
                                                                                                        <label for="check1">
                                                                                                        <span></span>
                                                                                                        <span class="check"></span>
                                                                                                        <span class="box"></span>
                                                                                                        Ya </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-body">
                                                                                            <h4 class="block">Informasi Alamat</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat'); ?>" required>
                                                                                                <span class="help-block">Masukkan Alamat sesuai KTP</span>
                                                                                                <label>Alamat</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstProvinsi" id="provinsi_id" onchange="TampilKabupaten()" required>
                                                                                                    <option value="">- Provinsi -</option>
                                                                                                    <?php 
                                                                                                    foreach($listProvinsi as $p) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $p->provinsi_id; ?>" <?php echo set_select('lstProvinsi', $p->provinsi_id); ?>><?php echo $p->provinsi_nama; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <label>Provinsi</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <?php
                                                                                                $style_kabupaten = 'class="form-control" id="kabupaten_id" onChange="TampilKecamatan()"';
                                                                                                echo form_dropdown("lstKabupaten", array('' => '- Kabupaten -'), '',$style_kabupaten);
                                                                                                ?>
                                                                                                <label>Kabupaten</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <?php
                                                                                                $style_kecamatan = 'class="form-control" id="kecamatan_id"';
                                                                                                echo form_dropdown("lstKecamatan", array('' => '- Kecamatan -'), '',$style_kecamatan);
                                                                                                ?>
                                                                                                <label>Kecamatan</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="kodepos" value="<?php echo set_value('kodepos'); ?>" pattern="^[0-9]{1,5}$" title="Hanya Angka, maksimal 5 Digit" maxlength="5">
                                                                                                <span class="help-block">5 digit Kode Pos</span>
                                                                                                <label>Kode Pos</label>
                                                                                            </div>

                                                                                            <h4 class="block">Data Keluarga</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namakeluarga" value="<?php echo set_value('namakeluarga'); ?>" required>
                                                                                                <label>Nama Keluarga</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namaayah" value="<?php echo set_value('namaayah'); ?>" required>
                                                                                                <label>Nama Ayah</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namaibu" value="<?php echo set_value('namaibu'); ?>" required>
                                                                                                <label>Nama Ibu</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namapasangan" value="<?php echo set_value('namapasangan'); ?>">
                                                                                                <label>Nama Suami / Istri</label>
                                                                                            </div>

                                                                                            <h4 class="block">Informasi Kontak</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="telp" value="<?php echo set_value('telp'); ?>" pattern="^[0-9]{1,12}$" title="Hanya Angka, maksimal 12 Digit" autocomplete="off" required>
                                                                                                <label>No. Handphone</label>
                                                                                            </div>

                                                                                            <h4 class="block">Penjamin</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstPelanggan" required>
                                                                                                    <option value="">- Pilih Penjamin -</option>
                                                                                                    <?php 
                                                                                                    foreach($listPelanggan as $l) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $l->pelanggan_id; ?>" <?php echo set_select('lstPelanggan', $l->pelanggan_id); ?>><?php echo $l->pelanggan_name; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <label>Penjamin</label>
                                                                                            </div>

                                                                                            <div class="form-actions">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12" align="right">
                                                                                                        <p class="block alert-danger">Mohon diisi sesuai dengan LENGKAP.</p>
                                                                                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Simpan Data</button>
                                                                                                    </div>
                                                                                                </div>
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
                                                    <?php } else { // Jika sudah Ada Data Anggota, Tampilkan Datanya ?>
                                                    <div class="profile-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4 class="block" align="center">Daftar Anggota Keluarga</h4>
                                                                <p class="block">
                                                                    <ul>
                                                                        <li>
                                                                        Untuk menambah Anggota Keluarga lainnya, silahkan klik <b>Tambah Anggota Keluarga</b> dan pilih Hubungan dengan Akun Utama.
                                                                        </li>
                                                                        <li>
                                                                        Klik <b>Riwayat</b> untuk melihat riwayat pendaftaran Online yang telah dilakukan. Opsi ini juga digunakan untuk memunculkan <b>Kode Pendaftaran/Bukti Pendaftaran Online</b> yang digunakan untuk mendaftar di Loket Pendaftaran untuk di periksa.
                                                                        </li>
                                                                        <li>
                                                                        Klik <b>Pilih</b> untuk melakukan Pendaftaran Rawat Jalan Online kembali.
                                                                        </li>
                                                                    </ul>
                                                                </p>
                                                                <br>
                                                                <a href="<?php echo site_url('registrasi/step_two/tambah_anggota'); ?>">
                                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Anggota Keluarga</button>
                                                                </a>
                                                                <br><br>
                                                                <div class="portlet-body">                        
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                    <thead>
                                                                        <tr class="success">
                                                                            <th width="5%">No</th>
                                                                            <th width="15%">No. RM</th>
                                                                            <th>Nama Pasien</th>
                                                                            <th width="15%">Jenis Kelamin</th>
                                                                            <th width="20%">Penjamin</th>
                                                                            <th width="10%">Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php 
                                                                        $no = 1;
                                                                        foreach($listAnggota as $r) {
                                                                            $pasien_id = $r->pasien_id;
                                                                            if (empty($r->pasien_no_rm)) {
                                                                                $no_rm = 'Pasien Baru';
                                                                            } else {
                                                                                $no_rm = $r->pasien_no_rm;
                                                                            }
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $no; ?></td>
                                                                            <td><?php echo $no_rm; ?></td>
                                                                            <td><?php echo $r->pasien_nama; ?></td>
                                                                            <td><?php echo $r->pasien_jk; ?></td>
                                                                            <td><?php echo $r->pelanggan_name; ?></td>
                                                                            <td align="center">
                                                                                <a href="<?php echo site_url('registrasi/step_two/riwayatperiksa/'.'/'.$r->pasien_id); ?>"><button class="btn btn-warning btn-xs" title="Riwayat Pemeriksaan"><i class="fa fa-search"></i> History</button></a>
                                                                                <a href="<?php echo site_url('registrasi/step_three/id/'.'/'.$r->pasien_id); ?>"><button class="btn btn-danger btn-xs" title="Pilih Pasien"><i class="fa fa-check"></i> Pilih</button></a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                            $no++;
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        } 
                                                    } // Akhir Tab Menu Daftar Anggota
                                                    ?>

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