<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Dashboard <small>Statistics</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('dashboard/home'); ?>">Dashboard</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?php echo tgl_indo(date('Y-m-d')); ?></span>
                </div>
            </div>                
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4 align="center">Informasi Pasien Online Hari Ini</h4>
            </div>
            <?php
            $no = 1; 
            foreach($listKelompok as $k) {
                $kelompok_id  = $k->kelompok_id;

                if ($no == 1) {
                    $warna = "green";
                } elseif($no == 2) {
                    $warna = "grey";
                } elseif($no == 3) {
                    $warna = "purple";
                } elseif($no == 4) {
                    $warna = "blue";
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
        </div>

        <div class="row">
            <div class="col-xs-12">
                <h4 align="center">Informasi Seputar Rumah Sakit</h4>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div class="visual">
                        <i class="fa fa-building"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        <?php 
                            $Jml_Ruangan = count($TotalRuangan);
                            echo number_format($Jml_Ruangan);
                        ?>
                        </div>
                        <div class="desc">
                        Ruangan
                        </div>
                    </div>
                    <a class="more" href="<?php echo site_url('admin/ruangan'); ?>">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <i class="fa fa-stethoscope"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        <?php 
                            $Jml_Spesialis = count($TotalSpesialis);
                            echo number_format($Jml_Spesialis);
                        ?>
                        </div>
                        <div class="desc">
                        Spesialis
                        </div>
                    </div>
                    <a class="more" href="<?php echo site_url('admin/tipe_dokter'); ?>">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green-haze">
                    <div class="visual">
                        <i class="fa fa-user-md"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        <?php 
                            $Jml_Dokter = count($TotalDokter);
                            echo number_format($Jml_Dokter);
                        ?>
                        </div>
                        <div class="desc">
                        Dokter
                        </div>
                    </div>
                    <a class="more" href="<?php echo site_url('admin/dokter'); ?>">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple-plum">
                    <div class="visual">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                        <?php 
                            $Jml_Users = count($TotalUser);
                            echo number_format($Jml_Users);
                        ?>
                        </div>
                        <div class="desc">
                        Users
                        </div>
                    </div>
                    <a class="more" href="<?php echo site_url('admin/users'); ?>">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>         
            
        <div class="clearfix"></div>
    </div>
</div>