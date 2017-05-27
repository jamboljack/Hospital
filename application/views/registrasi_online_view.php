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

<!-- Pilih Dokter -->
<script type="text/javascript">
    $(function() {
        $(document).on("click",'.pilih_button', function(e) {
            var pasien_id       = $(this).data('pasien_id');
            var dokter_id       = $(this).data('dokter_id');
            var jadwal_id       = $(this).data('jadwal_id');
            var dokter_name     = $(this).data('dokter_name');
            var tipe            = $(this).data('tipe');
            var tanggal         = $(this).data('tanggal');
            var hari            = $(this).data('hari');
            var jam             = $(this).data('jam');
            var ruang           = $(this).data('ruang');
            var jam_layanan     = $(this).data('jam_layanan');

            var Waktu           = hari+', '+tanggal;
            var Ruangan         = ruang+' | '+jam;

            $(".pasien_id").val(pasien_id);
            $(".dokter_id").val(dokter_id);
            $(".jadwal_id").val(jadwal_id);
            $(".dokter_name").val(dokter_name);
            $(".tipe").val(tipe);
            $(".waktu").val(Waktu);
            $(".ruang").val(Ruangan);
            $(".tanggal").val(tanggal);
            $(".jam_layanan").val(jam_layanan);
        })
    });
</script>

<!-- Forgto Password Modal -->
<div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('registrasi_online/forgotpassword'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        
            <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-email"></i> Masukkan Email Anda :</h4>
            </div>
            <div class="modal-body">                
                <div class="form-group form-md-line-input">                    
                    <label class="col-md-3 control-label">Email :</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control"  name="email" autocomplete="off" required>
                        <div class="form-control-focus"></div>
                        <span class="help-block">Masukkan Email Anda yang sudah terdaftar.</span>
                    </div>
                </div>                
            </div>
                        
            <div class="modal-footer">
                <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Kirim</button>
                <button type="button" class="btn yellow" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
            </form>
        </div>        
    </div>    
</div>


<!-- Pilih Dokter Modal Form -->
<div class="modal fade" id="pilih" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('registrasi/step_three/saveantrian/'.$this->uri->segment(4).'/'.$this->uri->segment(5)); ?>" class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <input type="hidden" class="form-control pasien_id" name="pasien_id">
            <input type="hidden" class="form-control dokter_id" name="dokter_id">
            <input type="hidden" class="form-control jadwal_id" name="jadwal_id">
            <input type="hidden" class="form-control tanggal" name="tanggal">
            <input type="hidden" class="form-control jam_layanan" name="jam_layanan">
                        
            <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" align="center"><i class="fa fa-warning"></i> <b>Konfirmasi Pendaftaran Pasien</b></h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <p align="center">Apakah Anda ingin melakukan Pendaftaran Pemeriksaan :</p>
                </div>
                <div class="row">
                    <div class="col-md-7">
                    <h4>Data Dokter</h4>
                        <div class="form-group form-md-line-input">
                            <div class="col-md-12">
                                <input type="text" class="form-control dokter_name" readonly>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <div class="col-md-12">
                                <input type="text" class="form-control tipe" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                    <h4>Data Pemeriksaan</h4>
                        <div class="form-group form-md-line-input">
                            <div class="col-md-12">
                                <input type="text" class="form-control waktu" readonly>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <div class="col-md-12">
                                <input type="text" class="form-control ruang" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        
            <div class="modal-footer">
                <button type="submit" class="btn blue"><i class="fa fa-check-circle"></i> Ya</button>
                <button type="button" class="btn red" data-dismiss="modal"><i class="fa fa-times-circle"></i> Tidak</button>
            </div>
            </form>
        </div>        
    </div>    
</div>


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
                                <?php
                                if (empty($this->uri->segment(2)) || $this->uri->segment(2) == '' || $this->uri->segment(2) == 'register' || $this->uri->segment(2) == 'login' || $this->uri->segment(2) == 'forgotpassword') {
                                    $angka = 1;
                                } elseif ($this->uri->segment(2) == 'step_two') {
                                    $angka = 2;
                                } elseif ($this->uri->segment(2) == 'step_three') {
                                    $angka = 3;
                                } elseif ($this->uri->segment(2) == 'step_four') {
                                    $angka = 4;
                                }
                                ?>
                                <span class="caption-subject font-green-sharp bold uppercase">
                                <i class="fa fa-edit"></i> Proses Pendaftaran Online - <span class="step-title">Langkah <?php echo $angka; ?> dari 4 </span>
                                </span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-wizard" >
                                <div class="form-body">
                                    <ul class="nav nav-pills nav-justified steps">
                                        <?php 
                                        // Kondisi Tab Aktif
                                        if (empty($this->uri->segment(2)) || $this->uri->segment(2) == '' || $this->uri->segment(2) == 'register' || $this->uri->segment(2) == 'login' || $this->uri->segment(2) == 'forgotpassword') { 
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
                                    if (empty($this->uri->segment(2)) || $this->uri->segment(2) == '' || $this->uri->segment(2) == 'register' || $this->uri->segment(2) == 'login' || $this->uri->segment(2) == 'forgotpassword') { 
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

                                        <?php if (empty($this->uri->segment(2)) || $this->uri->segment(2) == '' || $this->uri->segment(2) == 'register' || $this->uri->segment(2) == 'login' || $this->uri->segment(2) == 'forgotpassword') {  ?>
                                        <div class="tab-pane <?php echo $tab1; ?>" id="tab1">
                                            <div class="row">                                                
                                                <div class="col-md-12">
                                                    <div class="portlet light">
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
                                                                <a data-toggle="modal" href="#forgotpassword"> Lupa Password ?</a>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h3 class="block" align="center">Register</h3>
                                                                <p class="block" align="center">Register dilakukan jika Anda belum mempunyai Akun. Proses Register hanya sekali saja dan digunakan untuk membuat Akun yang nantinya berfungsi untuk LOGIN. Dengan melakukan Register, Anda bisa melakukan Pendaftaran Online bagi diri Anda sendiri dan keluarga Anda.</p>
                                                                <form role="form" class="form-horizontal" action="<?php echo site_url('registrasi_online/register'); ?>" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                                <div class="form-body"> 
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-4 control-label">Nama Akun<span class="required" aria-required="true"> * </span> :</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Jangan Pakai SPASI" autocomplete="off" required autofocus>
                                                                            <div class="form-control-focus"></div>
                                                                            <span class="help-block">Isi Nama Akun Anda, berisi 5-20 Karakter tanpa Spasi</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-4 control-label">Nama Lengkap <span class="required" aria-required="true"> * </span> :</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" required>
                                                                            <div class="form-control-focus"></div>
                                                                            <span class="help-block">Isi Nama Lengkap Anda</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-4 control-label">Email <span class="required" aria-required="true"> * </span> :</label>
                                                                        <div class="col-md-8">
                                                                            <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" autocomplete="off" required>
                                                                            <div class="form-control-focus"></div>
                                                                            <span class="help-block">Isi EMAIL VALID, ex. xxx@gmail.com</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-4 control-label">No. Handphone <span class="required" aria-required="true"> * </span> :</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" pattern="^[0-9]{1,12}$" title="Hanya Angka, maksimal 12 Digit" autocomplete="off" maxlength="12" required>
                                                                            <div class="form-control-focus"></div>
                                                                            <span class="help-block">Isi No. Handphone Anda, Hanya ANGKA</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-4 control-label">Password <span class="required" aria-required="true"> * </span> :</label>
                                                                        <div class="col-md-8">
                                                                            <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" autocomplete="off" required>
                                                                            <div class="form-control-focus"></div>
                                                                            <span class="help-block">Isi Password Akun Anda, minimal 3 Karakter</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-4 control-label">
                                                                            <img id="imgCaptcha" src="<?php echo site_url('registrasi_online/create_image'); ?>" />
                                                                        </label>
                                                                        <div class="col-md-8">
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
                                        </div>
                                        <?php } ?>
                                        
                                        <?php if ($this->uri->segment(2) == 'step_two') { ?>
                                        <div class="tab-pane <?php echo $tab2; ?>" id="tab2">
                                            <div class="row margin-top-10">
                                                <div class="col-md-12">
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
                                                            if (empty($uritab) || $uritab == '' || $uritab == 'history' || $uritab == 'tambah_anggota' && $uritab <> 'ubahpassword' && $uritab <> 'ubahprofil') {
                                                                $tabprofil1 = 'class="active"';
                                                                $tabprofil2 = '';
                                                                $tabprofil3 = '';
                                                            } elseif ($uritab == 'ubahpassword' || $uritab == 'updatepassword') {
                                                                $tabprofil1 = '';
                                                                $tabprofil2 = 'class="active"';
                                                                $tabprofil3 = '';
                                                            } elseif ($uritab == 'ubahprofil' || $uritab == 'updateprofil') {
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
                                                    <?php 
                                                    if (empty($uritab) || $uritab == '') {
                                                        if (count($listAnggota) == 0) {
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
                                                                                        <form role="form" action="<?php echo site_url('registrasi_online/carinorm'); ?>" method="post" enctype="multipart/form-data">
                                                                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                                                        <div class="form-body">
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="no_rekam_medik" required>
                                                                                                <span class="help-block">Masukkan No. REKAM MEDIK</span>
                                                                                                <label>NO. REKAM MEDIK</label>
                                                                                            </div>

                                                                                            <div class="margiv-top-10">
                                                                                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>
                                                                                                Cari Data </button>
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
                                                                                                <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" autocomplete="off" required>
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
                                                                                                <input type="text" class="form-control" name="no_identitas" value="<?php echo set_value('no_identitas'); ?>" pattern="^[0-9]{1,16}$" maxlength="16" title="Hanya Angka, maksimal 16 Digit" autocomplete="off" required>
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
                                                                                                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" autocomplete="off" required>
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
                                                                                                <input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat'); ?>" autocomplete="off" required>
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
                                                                                                <input type="text" class="form-control" name="namakeluarga" value="<?php echo set_value('namakeluarga'); ?>" autocomplete="off" required>
                                                                                                <label>Nama Keluarga / Penjamin</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namaayah" value="<?php echo set_value('namaayah'); ?>" autocomplete="off" required>
                                                                                                <label>Nama Ayah</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namaibu" value="<?php echo set_value('namaibu'); ?>" autocomplete="off" required>
                                                                                                <label>Nama Ibu</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namapasangan" value="<?php echo set_value('namapasangan'); ?>" autocomplete="off">
                                                                                                <label>Nama Suami / Istri</label>
                                                                                            </div>

                                                                                            <h4 class="block">Informasi Kontak</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="telp" value="<?php echo set_value('telp'); ?>" pattern="^[0-9]{1,12}$" title="Hanya Angka, maksimal 12 Digit" maxlength="12" autocomplete="off" required>
                                                                                                <label>No. Handphone</label>
                                                                                            </div>

                                                                                            <h4 class="block">Asuransi</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstPelanggan" required>
                                                                                                    <option value="">- Pilih Asuransi -</option>
                                                                                                    <?php 
                                                                                                    foreach($listPelanggan as $l) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $l->pelanggan_id; ?>" <?php echo set_select('lstPelanggan', $l->pelanggan_id); ?>><?php echo $l->pelanggan_name; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <label>Asuransi</label>
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
                                                    <?php 
                                                    // Jika sudah Ada Data Anggota, Tampilkan Datanya
                                                    } elseif (count($listAnggota) > 0) { ?>
                                                    <div class="profile-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="portlet light">
                                                                    <h4 class="block" align="center"><b>Daftar Anggota Keluarga</b></h4>
                                                                    <p class="block">
                                                                        <ul>
                                                                            <li>
                                                                            Untuk menambah Anggota Keluarga lainnya, silahkan klik <b>Tambah Anggota Keluarga</b> dan pilih Hubungan dengan Akun Utama.
                                                                            </li>
                                                                            <li>
                                                                            Klik <b>History</b> untuk melihat History pendaftaran Online yang telah dilakukan. Opsi ini juga digunakan untuk memunculkan <b>Kode Pendaftaran/Bukti Pendaftaran Online</b> yang digunakan untuk mendaftar di Loket Pendaftaran untuk di periksa.
                                                                            </li>
                                                                            <li>
                                                                            Klik <b>Pilih</b> untuk melakukan Pendaftaran Rawat Jalan Online kembali.
                                                                            </li>
                                                                        </ul>
                                                                    </p>
                                                                    <br><br>
                                                                    <div class="actions">
                                                                        <div class="btn-group dropup">
                                                                            <a class="btn btn-sm blue dropdown-toggle" href="#" data-toggle="dropdown">
                                                                            <i class="fa fa-plus-square"></i> Tambah Anggota Keluarga <i class="fa fa-angle-down"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu pull-right">
                                                                                <li>
                                                                                    <a href="<?php echo site_url('registrasi/step_two/tambah_anggota/2'); ?>"> Suami </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="<?php echo site_url('registrasi/step_two/tambah_anggota/3'); ?>"> Istri </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="<?php echo site_url('registrasi/step_two/tambah_anggota/4'); ?>"> Anak </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="<?php echo site_url('registrasi/step_two/tambah_anggota/5'); ?>"> Orang Tua </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="<?php echo site_url('registrasi/step_two/tambah_anggota/6'); ?>"> Saudara Lainnya </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="portlet-body">                        
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th width="5%">No</th>
                                                                                <th width="15%">No. RM</th>
                                                                                <th>Nama Pasien</th>
                                                                                <th width="15%">Jenis Kelamin</th>
                                                                                <th width="20%">Asuransi</th>
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
                                                                                    <a href="<?php echo site_url('registrasi/step_two/history/'.$r->pasien_id.'/'.$r->pasien_nama_seo); ?>"><button class="btn btn-success btn-xs" title="Riwayat Pendaftaran"><i class="fa fa-search"></i> History</button></a>
                                                                                    <a href="<?php echo site_url('registrasi/step_three/id/'.$r->pasien_id.'/'.$r->pasien_nama_seo); ?>"><button class="btn btn-danger btn-xs" title="Pilih Pasien"><i class="fa fa-check"></i> Pilih</button></a>
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
                                                    </div>
                                                    <?php
                                                        }
                                                    // Jika Tambah Anggota 
                                                    } elseif ($uritab == 'tambah_anggota' && !empty($this->uri->segment(4))) {
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
                                                                            <?php 
                                                                            $uri4 = $this->uri->segment(4);
                                                                            ?>
                                                                            <div class="tab-pane" id="tab_1_2">
                                                                                <div class="row">
                                                                                    <form role="form" action="<?php echo site_url('registrasi/step_two/savedatakeluarga'); ?>" method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-body">
                                                                                            <h4 class="block">Informasi Biodata</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstHubungan" required readonly>
                                                                                                    <option value="">- Pilih Status -</option>
                                                                                                    <option value="1" <?php if ($uri4 == 1) { echo 'selected'; } ?>>Diri Sendiri</option>
                                                                                                    <option value="2" <?php if ($uri4 == 2) { echo 'selected'; } ?>>Suami</option>
                                                                                                    <option value="3" <?php if ($uri4 == 3) { echo 'selected'; } ?>>Istri</option>
                                                                                                    <option value="4" <?php if ($uri4 == 4) { echo 'selected'; } ?>>Anak</option>
                                                                                                    <option value="5" <?php if ($uri4 == 5) { echo 'selected'; } ?>>Orang Tua</option>
                                                                                                    <option value="6" <?php if ($uri4 == 6) { echo 'selected'; } ?>>Saudara Lainnya</option>
                                                                                                </select>
                                                                                                <label>Hubungan dengan Pemilik Akun ?</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" autocomplete="off" required>
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
                                                                                                <input type="text" class="form-control" name="no_identitas" value="<?php echo set_value('no_identitas'); ?>" pattern="^[0-9]{1,16}$" maxlength="16" title="Hanya Angka, maksimal 16 Digit" autocomplete="off" required>
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
                                                                                                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" autocomplete="off" required>
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
                                                                                                <input type="text" class="form-control" name="alamat" value="<?php echo $detail->pasien_alamat; ?>" autocomplete="off" required>
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
                                                                                                <input type="text" class="form-control" name="kodepos" value="<?php echo $detail->pasien_kodepos; ?>" pattern="^[0-9]{1,5}$" title="Hanya Angka, maksimal 5 Digit" maxlength="5">
                                                                                                <span class="help-block">5 digit Kode Pos</span>
                                                                                                <label>Kode Pos</label>
                                                                                            </div>

                                                                                            <h4 class="block">Data Keluarga</h4>
                                                                                            <?php 
                                                                                            if ($uri4 <> 5 && $uri4 <> 6) {
                                                                                                $namakeluarga = $detail->pasien_nama;
                                                                                                $namapasangan = $detail->pasien_nama;
                                                                                            } else {
                                                                                                $namakeluarga = '';
                                                                                                $namapasangan = '';
                                                                                            }
                                                                                            ?>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namakeluarga" value="<?php echo $namakeluarga; ?>" autocomplete="off" required>
                                                                                                <label>Nama Keluarga</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namaayah" value="<?php echo set_value('namaayah'); ?>" autocomplete="off" required>
                                                                                                <label>Nama Ayah</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namaibu" value="<?php echo set_value('namaibu'); ?>" autocomplete="off" required>
                                                                                                <label>Nama Ibu</label>
                                                                                            </div>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="namapasangan" value="<?php echo $namapasangan; ?>" autocomplete="off">
                                                                                                <label>Nama Suami / Istri</label>
                                                                                            </div>

                                                                                            <h4 class="block">Informasi Kontak</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <input type="text" class="form-control" name="telp" value="<?php echo set_value('telp'); ?>" pattern="^[0-9]{1,12}$" title="Hanya Angka, maksimal 12 Digit" maxlength="12" autocomplete="off" required>
                                                                                                <label>No. Handphone</label>
                                                                                            </div>

                                                                                            <h4 class="block">Asuransi</h4>
                                                                                            <div class="form-group form-md-line-input">
                                                                                                <select class="form-control" name="lstPelanggan" required>
                                                                                                    <option value="">- Pilih Asuransi -</option>
                                                                                                    <?php 
                                                                                                    foreach($listPelanggan as $l) {
                                                                                                        if ($detail->pelanggan_id == $l->pelanggan_id) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $l->pelanggan_id; ?>" selected><?php echo $l->pelanggan_name; ?></option>
                                                                                                    <?php } else { ?>
                                                                                                    <option value="<?php echo $l->pelanggan_id; ?>"><?php echo $l->pelanggan_name; ?></option>
                                                                                                    <?php } } ?>
                                                                                                </select>
                                                                                                <label>Asuransi</label>
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
                                                    <!-- END TAMBAH DAFTAR ANGGOTA KELUARGA --> 
                                                    <?php 
                                                    // History Pendaftaran Pasien
                                                    } elseif ($uritab == 'history') {
                                                    ?>
                                                    <div class="profile-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="portlet light">
                                                                <h4 class="block" align="center"><b>Riwayat Pendaftaran Online</b></h4>
                                                                    <div class="portlet-body">                        
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th width="5%">No</th>
                                                                                <th width="20%">Tgl. Pendaftaran</th>
                                                                                <th>Dokter</th>
                                                                                <th width="20%">Tgl. Pemeriksaan</th>
                                                                                <th width="10%">Aksi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                            $no = 1;
                                                                            foreach($listDaftar as $r) {
                                                                                $antrian_id     = $r->antrian_id;
                                                                                
                                                                                $TglDaftar      = $r->antrian_date_update;
                                                                                $DateDaftar     = date("d-m-Y", strtotime($TglDaftar));

                                                                                $TglPeriksa     = $r->antrian_tanggal;
                                                                                $DatePeriksa    = date("d-m-Y", strtotime($TglPeriksa));
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $no; ?></td>
                                                                                <td><?php echo $DateDaftar.' '.$r->antrian_time_update; ?></td>
                                                                                <td><?php echo $r->dokter_name; ?></td>
                                                                                <td><?php echo $DatePeriksa.' '.$r->antrian_jam_layani; ?></td>
                                                                                <td align="center">
                                                                                    <a href="<?php echo site_url('registrasi/step_four/id/'.$r->antrian_id.'/'.$this->uri->segment(5)); ?>"><button class="btn btn-success btn-xs" title="Riwayat Pendaftaran"><i class="fa fa-list"></i> Detail</button></a>
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
                                                            <div class="col-md-12">
                                                                <a href="<?php echo site_url('registrasi/step_two'); ?>" class="btn red"><i class="fa fa-chevron-left"></i> Batal</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    // Ubah Password
                                                    } elseif ($uritab == 'ubahpassword' || $uritab == 'updatepassword') {
                                                    ?>
                                                    <div class="profile-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="portlet light">
                                                                    <h4 class="block" align="center"><b>Ubah Password</b></h4>
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <form role="form" action="<?php echo site_url('registrasi/step_two/updatepassword'); ?>" method="post" enctype="multipart/form-data">
                                                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                                            <input type="hidden" name="password" value="<?php echo $detail->user_password; ?>" />

                                                                                <div class="form-body">
                                                                                    <div class="form-group form-md-line-input">
                                                                                        <input type="password" class="form-control" name="passwordlama" autocomplete="off" required>
                                                                                        <span class="help-block">Masukkan Password Lama Anda.</span>
                                                                                        <label>Password Lama Anda</label>
                                                                                    </div>
                                                                                    <div class="form-group form-md-line-input">
                                                                                        <input type="password" class="form-control" name="passwordbaru" autocomplete="off" required>
                                                                                        <span class="help-block">Masukkan Password Baru Anda.</span>
                                                                                        <label>Password Baru Anda</label>
                                                                                    </div>
                                                                                    <div class="form-group form-md-line-input">
                                                                                        <input type="password" class="form-control" name="passwordkonfirm" autocomplete="off" required>
                                                                                        <span class="help-block">Masukkan Konfirmasi Password Baru Anda.</span>
                                                                                        <label>Konfirmasi Password Baru</label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-actions">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12" align="center">
                                                                                            <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    // Ubah Profil
                                                    } elseif ($uritab == 'ubahprofil' || $uritab == 'updateprofil') {
                                                    ?>
                                                    <div class="profile-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="portlet light">
                                                                    <h4 class="block" align="center"><b>Data Profil Akun</b></h4>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <form role="form" action="<?php echo site_url('registrasi/step_two/updateprofil'); ?>" method="post" enctype="multipart/form-data">
                                                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                                                <div class="form-body"> 
                                                                                    <div class="form-group form-md-line-input">
                                                                                        <input type="text" class="form-control" name="username" value="<?php echo $detail->user_username; ?>" autocomplete="off" readonly>
                                                                                        <label>Username</label>
                                                                                    </div>
                                                                                    <div class="form-group form-md-line-input">
                                                                                        <input type="text" class="form-control" name="nama" value="<?php echo $detail->user_name; ?>" autocomplete="off" required>
                                                                                        <span class="help-block">Masukkan Nama Lengkap Anda.</span>
                                                                                        <label>Nama Lengkap</label>
                                                                                    </div>
                                                                                    <div class="form-group form-md-line-input">
                                                                                        <input type="text" class="form-control" name="phone" value="<?php echo $detail->user_phone; ?>" pattern="^[0-9]{1,12}$" title="Hanya Angka, maksimal 12 Digit" autocomplete="off" maxlength="12" required>
                                                                                        <span class="help-block">Masukkan No. Handphone Anda, harus ANGKA.</span>
                                                                                        <label>No. Handphone</label>
                                                                                    </div>
                                                                                    <div class="form-group form-md-line-input">
                                                                                        <input type="email" class="form-control" name="email" value="<?php echo $detail->user_email; ?>" required>
                                                                                        <span class="help-block">Masukkan Email yang VALID.</span>
                                                                                        <label>Alamat Email</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-actions">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12" align="center">
                                                                                            <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="note note-success note-bordered">
                                                                            <b>USERNAME</b><br>
                                                                            Username tidak bisa dirubah.<br><br>
                                                                            <b>NAMA LENGKAP</b><br>
                                                                            Isikan sesuai Data Pemilik Akun.<br><br>
                                                                            <b>NO. HANDPHONE</b><br>
                                                                            Isikan dengan No. Handphone yang VALID, dan hanya ANGKA.<br><br>
                                                                            <b>EMAIL</b><br>
                                                                            Isikan dengan EMAIL yang VALID karena informasi pendaftaran Online akan dikirim ke E-Mail.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    } // Akhir Menu Step Two
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php if ($this->uri->segment(2) == 'step_three') { ?>
                                        <!-- PILIH JADWAL -->
                                        <div class="tab-pane <?php echo $tab3; ?>" id="tab3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <form role="form"  action="<?php echo site_url('registrasi/step_three/search/'.$this->uri->segment(4).'/'.$this->uri->segment(5)); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                                    <div class="form-body"> 
                                                                        <div class="form-group form-md-line-input">
                                                                            <label class="col-md-4 control-label">Nama Pendaftar</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" name="nama" value="<?php echo $detail->pasien_nama; ?>" autocomplete="off" readonly>
                                                                                <div class="form-control-focus"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group form-md-line-input">
                                                                            <label class="col-md-4 control-label">Asuransi</label>
                                                                            <div class="col-md-8">
                                                                                <select class="form-control" name="lstPelanggan" disabled>
                                                                                    <option value="">- Pilih Asuransi -</option>
                                                                                    <?php 
                                                                                    foreach($listPelanggan as $l) {
                                                                                        if ($detail->pelanggan_id == $l->pelanggan_id) {
                                                                                    ?>
                                                                                    <option value="<?php echo $l->pelanggan_id; ?>" selected><?php echo $l->pelanggan_name; ?></option>
                                                                                    <?php } else { ?>
                                                                                    <option value="<?php echo $l->pelanggan_id; ?>" <?php echo set_select('lstPelanggan', $l->pelanggan_id); ?>><?php echo $l->pelanggan_name; ?></option>
                                                                                    <?php 
                                                                                        } 
                                                                                    } 
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group form-md-line-input">
                                                                            <label class="col-md-4 control-label">Poliklinik</label>
                                                                            <div class="col-md-8">
                                                                                <select class="form-control" name="lstPoliklinik" required autofocus>
                                                                                    <option value="all">-- SEMUA POLILINIK --</option>
                                                                                    <?php 
                                                                                    foreach($listPoliklinik as $p) {
                                                                                    ?>
                                                                                    <option value="<?php echo $p->tipe_id; ?>" <?php echo set_select('lstPoliklinik', $p->tipe_id); ?>><?php echo $p->tipe_name; ?></option>
                                                                                    <?php
                                                                                    } 
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group form-md-line-input">
                                                                            <label class="col-md-4 control-label">Tanggal Pemeriksaan</label>
                                                                            <div class="col-md-8">
                                                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" name="tgl_periksa" value="<?php echo set_value('tgl_periksa'); ?>" placeholder="DD-MM-YYYY" autocomplete="off" required />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-actions">
                                                                        <div class="row">              
                                                                            <div class="col-md-12" align="center">
                                                                                <a href="<?php echo site_url('registrasi/step_two'); ?>" class="btn green"><i class="fa fa-chevron-left"></i> Batal</a>
                                                                                <button type="submit" class="btn yellow"><i class="fa fa-search"></i> Cari Jadwal</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="note note-success note-bordered">
                                                                    <b>INFORMASI</b><br>
                                                                    <ul>
                                                                        <li><b>Nama Pendaftar</b> adalah Nama Pasien yang akan Periksa.</li>
                                                                        <li><b>Asuransi</b> adalah Jenis Penjamin Pasien.</li>
                                                                        <li><b>Pilih Poliklinik</b> yang akan dituju untuk Pemeriksaan Pasien.</li>
                                                                        <li>Silahkan Piih <b>Tanggal Pemeriksaan</b> Pasien.</li>
                                                                        <li>Klik <b>Cari Jadwal</b> untuk mencari jadwal Dokter.</li>
                                                                        <li><b>Batal</b> jika ingin kembali ke Tahap 2.</li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if ($status == 'cari') { ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light">
                                                        <?php 
                                                        $tanggal    = $info['Tanggal']; // Tgl Pemeriksaan
                                                        $Tgl        = $tanggal;
                                                        $Hari       = getDay($Tgl);
                                                        ?>
                                                        <h4 class="block" align="center"><b>Data Pencarian Jadwal Praktek</b></h4>
                                                        <div class="alert alert-warning alert-dismissable" align="center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <b><?php echo $Hari,', '.tgl_indo($tanggal); ?></b>
                                                        </div>
                                                        <div class="portlet-body">                        
                                                            <table class="table table-striped table-bordered table-hover">
                                                               <?php
                                                                // Perulangan by Tipe Spesialis
                                                                foreach($listTipe as $t) {
                                                                    $Dari       = $info['Tanggal']; // Tgl Pemeriksaan
                                                                    $tipe_id    = $t->tipe_id; 
                                                                    $tgl        = $Dari;
                                                                    $hari       = getDay($tgl);
                                                                    // Cari by Hari dan Tipe Spesialis Dokter
                                                                    $listJadwal  = $this->step_three_model->select_jadwal($hari, $tipe_id)->result();
                                                                ?>
                                                                <thead>
                                                                    <tr class="danger">
                                                                        <th colspan="7"><i class="fa fa-user-md"></i> <?php echo $t->tipe_name; ?></th>
                                                                    </tr>
                                                                    <tr class="success">
                                                                        <th width="5%">No</th>                                
                                                                        <th>Nama Dokter</th>
                                                                        <th width="8%">Hari</th>
                                                                        <th width="10%">Jam Praktek</th>
                                                                        <th width="15%">Ruangan</th>
                                                                        <th width="25%">Keterangan</th>
                                                                        <th width="10%">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if (count($listJadwal) > 0) {  
                                                                        $no = 1;
                                                                        foreach($listJadwal as $r) {
                                                                            $jam = substr($r->jadwal_mulai,0,5).' - '.substr($r->jadwal_selesai,0,5);
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $no; ?></td>
                                                                        <td><?php echo $r->dokter_name; ?></td>
                                                                        <td><?php echo $r->jadwal_hari; ?></td>
                                                                        <td><?php echo $jam; ?></td>
                                                                        <td><?php echo $r->ruangan_name; ?></td>
                                                                        <td class="<?php if (!empty($r->jadwal_keterangan)) { echo 'danger'; } ?>"><b><?php echo $r->jadwal_keterangan; ?></b></td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-primary btn-xs pilih_button" data-toggle="modal" data-target="#pilih" data-pasien_id="<?php echo $this->uri->segment(4); ?>" data-dokter_id="<?php echo $r->dokter_id; ?>" data-jadwal_id="<?php echo $r->jadwal_id; ?>" data-dokter_name="<?php echo $r->dokter_name; ?>" data-tipe="<?php echo $r->tipe_name; ?>" data-tanggal="<?php echo $Dari; ?>" data-hari="<?php echo $hari; ?>" data-jam="<?php echo $jam; ?>" data-ruang="<?php echo $r->ruangan_name; ?>" data-jam_layanan="<?php echo $r->jadwal_mulai; ?>" title="Pilih Dokter"><i class="fa fa-check"></i> Pilih
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                        $no++;
                                                                        }
                                                                    } else {
                                                                    ?>
                                                                    <tr>
                                                                        <td colspan="7" align="center"><em>Tidak Ada Jadwal Praktek Dokter Hari Ini.</em></td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>

                                        <?php if ($this->uri->segment(2) == 'step_four') { ?>
                                        <!-- SELESAI -->
                                        <div class="tab-pane <?php echo $tab4; ?>" id="tab4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="block" align="center"><b>Pendaftaran Selesai</b></h4>
                                                    <div class="portlet box green">
                                                        <div class="portlet-title">
                                                            <div class="caption">Data Pendaftaran Online</div>
                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div class="form-body">
                                                                <div class="col-md-4">
                                                                    <h4 class="form-section"><b>Bukti Pendaftaran Online</b></h4>
                                                                    <p class="block" align="center">
                                                                    Tunjukkan Bukti Pendaftaran Berikut ke Petugas Loket <br><b>Pendaftaran RS St. Elisabeth Semarang.</b></p>
                                                                    <h2 align="center"><b>No. Antrian<br>
                                                                    <?php echo $detail->antrian_kode; ?></b></h2>
                                                                    <p class="block" align="center">
                                                                    Akan dilayani pada Tanggal : <b><?php echo tgl_indo($detail->antrian_tanggal); ?></b>, Perkiraan pelayanan pada Jam : <b><?php echo substr($detail->antrian_jam_layani,0,5); ?> WIB</b>. Dimohon datang sebelumnya, antrian tidak dapat digunakan apabila Anda datang lebih dari 15 menit dari perkiraan waktu pelayanan. Terima Kasih.
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <h4 class="form-section"><b>Data Pendaftar</b></h4>    
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">No. Rekam Medik :</div>
                                                                        <?php
                                                                        // Kondisi Jika RM kosong maka -
                                                                        $noRM     = !empty($detail->pasien_no_rm)?$detail->pasien_no_rm:'-';
                                                                        ?>
                                                                        <div class="col-md-7"><?php echo $noRM; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Nama :</div>
                                                                        <div class="col-md-7"><?php echo $detail->pasien_nama; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">TTL :</div>
                                                                        <div class="col-md-7"><?php echo $detail->pasien_tmpt_lhr.', '.tgl_indo($detail->pasien_tgl_lhr); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Jenis Kelamin :</div>
                                                                        <div class="col-md-7"><?php echo $detail->pasien_jk; ?></div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">No. Identitas :</div>
                                                                        <div class="col-md-7"><?php echo $detail->pasien_no_identitas; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Nama Ibu :</div>
                                                                        <div class="col-md-7"><?php echo $detail->pasien_nama_ibu; ?></div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Alamat :</div>
                                                                        <div class="col-md-7"><?php echo $detail->pasien_alamat; ?></div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Provinsi :</div>
                                                                        <div class="col-md-7"><?php echo $detail->provinsi_nama; ?></div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Kab. / Kota :</div>
                                                                        <div class="col-md-7"><?php echo ucwords(strtolower($detail->kabupaten_nama)); ?></div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Kecamatan :</div>
                                                                        <div class="col-md-7"><?php echo ucwords(strtolower($detail->kecamatan_nama)); ?></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <h4 class="form-section"><b>Data Pemeriksaan</b></h4>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Dokter Tujuan :</div>
                                                                        <div class="col-md-7"><?php echo $detail->dokter_name; ?></div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Spesialis :</div>
                                                                        <div class="col-md-7"><?php echo $detail->tipe_name; ?></div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Tgl. Pemeriksaan :</div>
                                                                        <div class="col-md-7"><b><?php echo tgl_indo($detail->antrian_tanggal); ?></b></div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Penjamin :</div>
                                                                        <div class="col-md-7"><?php echo $detail->pelanggan_name; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-5 name">Ruangan :</div>
                                                                        <div class="col-md-7"><?php echo $detail->ruangan_name; ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-actions"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" align="center">
                                                    <a href="<?php echo site_url('registrasi/step_two'); ?>" class="btn green">Kembali ke Biodata Pendaftar</a>
                                                    <a href="<?php echo site_url('registrasi/step_four/cetak/'.$this->uri->segment(4).'/'.$this->uri->segment(5)); ?>" class="btn blue"><i class="fa fa-print"></i> Cetak Bukti Pendaftaran</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

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