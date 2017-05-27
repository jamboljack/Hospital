<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/sweetalert2.css">
<script src="<?php echo base_url(); ?>js/sweetalert2.min.js"></script>

<?php 
if ($this->session->flashdata('notificationsuccess')) { ?>
<script>
    swal({
        title: "Done",
        text: "<?php echo $this->session->flashdata('notificationsuccess'); ?>",
        timer: 2000,
        showConfirmButton: false,
        type: 'success'
    });
</script>
<? } ?>

<?php 
if ($this->session->flashdata('notificationerror')) { ?>
<script>
    swal({
        title: "Alert",
        text: "<?php echo $this->session->flashdata('notificationerror'); ?>",
        timer: 2000,
        showConfirmButton: false,
        type: 'warning'
    });
</script>
<? } ?>

<div class="page-container">
    <div class="page-head">
        <div class="container">
            <div class="page-title">
                <h1>Beranda</h1>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">            
            <ul class="page-breadcrumb breadcrumb">
                <li class="active">
                    <a href="<?php echo base_url(); ?>">Beranda</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Selamat Datang di Pendaftaran Rawat Jalan Online RS St. Elisabeth Semarang
                </li>                
            </ul>
            
            <div class="row margin-top-5">            
                <div class="col-md-12 col-sm-12">
                    <h1 align="center">Pendaftaran Rawat Jalan Online<br>RS St. Elisabeth Semarang</h1>
                    <br>
                    <h4 align="center">JUMLAH PENDAFTAR ONLINE HARI INI : <b><?php $tgl = date('Y-m-d'); echo strtoupper(getDay($tgl)).', '.date('d-m-Y'); ?></b></h4>
                    <br>
                    <?php
                    $no = 1; 
                    foreach($listKelompok as $k) {
                        $kelompok_id  = $k->kelompok_id;

                        if ($no == 1) {
                            $warna = "blue-madison";
                        } elseif($no == 2) {
                            $warna = "red-intense";
                        } elseif($no == 3) {
                            $warna = "green-haze";
                        } elseif($no == 4) {
                            $warna = "purple-plum";
                        }
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat <?php echo $warna; ?>">
                            <div class="visual">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <?php 
                                        // Hitung Jumlah Pasien per Hari di Sini
                                        $listPerKelompok = $this->home_model->select_total($kelompok_id)->result();
                                        echo count($listPerKelompok);
                                    ?>
                                </div>
                                <div class="desc">
                                    <?php echo $k->kelompok_name; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $no++;
                    }
                    ?>
                    <p align="center">
                        <a href="<?php echo site_url('registrasi_online'); ?>" class="btn blue"><i class="fa fa-edit"></i> Pendaftaran Online</a>
                    </p>
                    <h4 align="center">Terima Kasih atas Partisipasi & Kesediaan Masyarakat memanfaatkan Pendaftaran Online Kami.</h4>
                </div>
            </div>

            <div class="portlet light">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                <?php 
                                $no = 1;
                                foreach($listMenu as $m) {
                                    if ($no == 1) {
                                        $class = 'active';
                                    } else {
                                        $class = '';
                                    }
                                ?>
                                <li class="<?php echo $class; ?>">
                                    <a data-toggle="tab" href="#tab_<?php echo $no; ?>">
                                    <i class="<?php echo $m->menu_font; ?>"></i> <?php echo $m->menu_title; ?></a>
                                    <?php if ($no == 1) { ?>
                                    <span class="after"></span>
                                    <?php } ?>
                                </li>
                                <?php 
                                    $no++; 
                                } 
                                ?>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <?php 
                                $no = 1;
                                foreach($listMenu as $m) {
                                    if ($no == 1) {
                                        $class = 'active';
                                    } else {
                                        $class = '';
                                    }
                                ?>
                                <div id="tab_<?php echo $no; ?>" class="tab-pane <?php echo $class; ?>">
                                    <div id="accordion<?php echo $no; ?>" class="panel-group">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $no; ?>" href="#accordion<?php echo $no; ?>.'_'.<?php echo $no; ?>">
                                                <?php echo $m->menu_title; ?></a>
                                                </h4>
                                            </div>
                                            <div id="accordion<?php echo $no; ?>.'_'.<?php echo $no; ?>" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <?php echo $m->menu_desc; ?>
                                                    <br>
                                                    <?php if (!empty($m->menu_image)) { ?>
                                                    <img src="<?php echo base_url(); ?>img/Menu_image/<?php echo $m->menu_image; ?>" width="100%">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    $no++; 
                                } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MAPS -->
            <div class="portlet light">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Google Map -->
                            <div class="row">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0066570318986!2d110.41785496103684!3d-7.00849815838937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b7b0d49b475%3A0x19433114d586d50a!2sRS+ST.+Elisabeth+Semarang!5e0!3m2!1sen!2s!4v1495169777114" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <div class="row margin-bottom-20">
                                <div class="col-md-6">
                                    <div class="space20">
                                    </div>
                                    <h3 class="form-section">Hubungi Kami</h3>
                                    <div class="well">
                                        <?php echo $kontak->contact_name; ?>
                                        <h4>Alamat</h4>
                                        <address>
                                        <?php echo $kontak->contact_address; ?><br>
                                        <abbr title="Phone">P:</abbr> <?php echo $kontak->contact_phone; ?><br>
                                        <abbr title="Website">W:</abbr> <a href="http://<?php echo $kontak->contact_web; ?>"><?php echo $kontak->contact_web; ?></a></address>
                                        <address>
                                        <strong>Email</strong><br>
                                        <a href="mailto:<?php echo $kontak->contact_email; ?>">
                                        <?php echo $kontak->contact_email; ?></a>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="space20"></div>
                                    <form action="<?php echo site_url('home/sendmessage'); ?>" method="post">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <h3 class="form-section">Kritik & Saran</h3>
                                        <?php if ($error == 'true') { ?>
                                        <div class="form-group">
                                            <div class="alert alert-danger">
                                                <i class='fa fa-warning'></i> <b>ERROR !!</b>
                                                <?php echo validation_errors(); ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="fa fa-check"></i>
                                                <input type="text" class="form-control" placeholder="Subyek Anda" name="subject" value="<?php echo set_value('subject'); ?>" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" placeholder="Nama Anda" name="name" value="<?php echo set_value('name'); ?>" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="fa fa-envelope"></i>
                                                <input type="email" class="form-control" placeholder="Email Anda" name="email" value="<?php echo set_value('email'); ?>" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3=6" placeholder="Kritik & Saran Anda" name="message"><?php echo set_value('message'); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <img id="imgCaptcha" src="<?php echo site_url('home/create_image'); ?>" />
                                            <input type='text' name="verify" class="form-control" maxlength="5" placeholder="Isikan Capctha" autocomplete="off" required>
                                        </div>
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div>
</div>