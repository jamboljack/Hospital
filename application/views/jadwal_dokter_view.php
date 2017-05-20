<script type="text/javascript">
    function tampilDokter() {
        tipe_id = document.getElementById("tipe_id").value;
        $.ajax({
            url:"<?php echo base_url();?>jadwal_dokter/pilih_dokter/"+tipe_id+"",
            success: function(response) {
                $("#dokter_id").html(response);
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
                <h1>Jadwal Dokter <small>Menu Informasi dan Pencarian Jadwal Praktek Dokter</small></h1>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <ul class="page-breadcrumb breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Beranda</a><i class="fa fa-home"></i></li>
                <li class="active">Jadwal Dokter</li>
            </ul>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <?php
                            if ($status == 'today') {
                                $InfoH      = '(Semua)';
                            } else {
                                $InfoH      = '- '.$info['Type'];
                            }
                            ?>
                            <div class="caption"><i class="fa fa-search"></i> Pencarian Jadwal Dokter <?php echo $InfoH; ?></div>
                            <div class="tools"><a href="javascript:;" class="collapse"></a></div>
                        </div>

                        <div class="portlet-body form">
                            <form action="<?php echo site_url('jadwal_dokter/search'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Poliklinik</label>
                                    <div class="col-md-9">
                                        <?php
                                        $style_poliklinik = 'class="select2_category form-control" id="tipe_id"  onChange="tampilDokter()"';
                                            echo form_dropdown('lstTipe', $listTipe, '',$style_poliklinik);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Dokter</label>
                                    <div class="col-md-9">
                                        <?php
                                        $style_dokter = 'class="select2_category form-control" id="dokter_id"';
                                        echo form_dropdown("lstDokter", array('all' => '- PILIH DOKTER -'), '',$style_dokter);
                                        ?>
                                    </div>
                                </div>
                                <?php
                                $tanggal = date('d-m-Y'); // Hari Ini
                                /*
                                $tambah_tanggal = mktime(0,0,0,date('m'),date('d')+7,date('Y')); // Hari ini ditambah 7 Hari
                                $tambah         = date('Y-m-d', $tambah_tanggal);
                                $xtgl2          = explode("-", $tambah);
                                $thnx           = $xtgl2[0];
                                $blnx           = $xtgl2[1];
                                $tglx           = $xtgl2[2];
                                $tanggalseminggu= $tglx.'-'.$blnx.'-'.$thnx;
                                */
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Periksa</label>
                                    <div class="col-md-4">
                                        <div class="input-group input-large" data-date="<? echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                                            <input type="text" class="form-control default-date-picker" name="tgl1" value="<?php echo set_value('tgl1'); ?>" required>
                                            <span class="input-group-addon">s/d</span>
                                            <input type="text" class="form-control default-date-picker" name="tgl2" value="<?php echo set_value('tgl2'); ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari Jadwal</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <?php
                                if ($status == 'today') {
                                    $tgl        = date('Y-m-d'); 
                                    $hariini    = strtoupper(getDay($tgl)).' ('.date('d-m-Y').')';
                                    $Info       = $hariini;
                                } else {
                                    $tgl1       = $info['Tanggal1'];
                                    $hari1      = strtoupper(getDay($tgl1)).' ('.$tgl1.')';
                                    $tgl2       = $info['Tanggal2'];
                                    $hari2      = strtoupper(getDay($tgl2)).' ('.$tgl2.')';
                                    $Info       = $hari1.' s/d '.$hari2;
                                }
                                ?>
                                <i class="fa fa-list"></i> Informasi Jadwal Dokter - <?php echo $Info; ?>
                            </div>
                            <div class="tools"><a href="javascript:;" class="collapse"></a></div>
                        </div>
                        <?php 
                        if ($status == 'today') { // Data Per Hari Ini
                        ?>
                        <div class="portlet-body">                        
                            <table class="table table-striped table-bordered table-hover">
                                <?php
                                // Perulangan by Tipe Spesialis
                                foreach($listTipeHead as $t) {                                    
                                    $tipe_id    = $t->tipe_id; 
                                    $tgl        = date('Y-m-d');
                                    $hari       = getDay($tgl);
                                    // Cari by Hari dan Tipe Spesialis
                                    $dokter_id   = 'all';
                                    $listJadwal  = $this->jadwal_dokter_model->select_jadwal($hari, $tipe_id, $dokter_id)->result();
                                ?>
                                <thead>
                                    <tr class="danger">
                                        <th colspan="6"><i class="fa fa-user-md"></i> <?php echo $t->tipe_name; ?></th>
                                    </tr>
                                    <tr class="success">
                                        <th width="5%">No</th>                                
                                        <th>Nama Dokter</th>
                                        <th width="8%">Hari</th>
                                        <th width="10%">Jam Praktek</th>
                                        <th width="15%">Ruangan</th>
                                        <th width="25%">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($listJadwal) > 0) {  
                                        $no = 1;
                                        foreach($listJadwal as $r) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $r->dokter_name; ?></td>
                                        <td><?php echo $r->jadwal_hari; ?></td>
                                        <td><?php echo substr($r->jadwal_mulai,0,5).' - '.substr($r->jadwal_selesai,0,5); ?></td>
                                        <td><?php echo $r->ruangan_name; ?></td>
                                        <td class="<?php if (!empty($r->jadwal_keterangan)) { echo 'danger'; } ?>"><b><?php echo $r->jadwal_keterangan; ?></b></td>
                                    </tr>
                                    <?php
                                        $no++;
                                        }
                                    } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" align="center"><em>Tidak Ada Jadwal Praktek Dokter Hari Ini.</em></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <?php 
                                }
                                ?>
                            </table>
                        </div>
                        <?php 
                        } elseif ($status == 'cari') { // Data by Pencarian                            
                            $Dari   = $info['TG1'];
                            $Ke     = $info['TG2'];
                            while(strtotime($Dari) <= strtotime($Ke)) { // Perulangan by Tanggal
                        ?>
                        <div class="portlet-body">                        
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="active">
                                        <?php
                                        // Header per Tanggal dan Hari
                                        $TGL    = $Dari;
                                        $vtgl   = explode("-",$TGL);
                                        $mthn   = $vtgl[0];
                                        $mbln   = $vtgl[1];
                                        $mtgl   = $vtgl[2];
                                        $TGLX   = $mtgl.'-'.$mbln.'-'.$mthn;
                                        ?>
                                        <td colspan="6" align="center">
                                            <b><?php echo strtoupper(getDay($Dari)).', '.$TGLX; ?></b>
                                        </td>
                                    </tr>
                                </thead>
                                <?php
                                // Perulangan by Tipe Spesialis
                                foreach($listTipeHead as $t) {                                    
                                    $tipe_id    = $t->tipe_id; 
                                    $tgl        = $Dari;
                                    $hari       = getDay($tgl);
                                    
                                    // Cari by Hari dan Tipe Spesialis
                                    if ($info['Dokter'] == 'all') {
                                        $dokter_id   = $info['Dokter'];
                                        $listJadwal  = $this->jadwal_dokter_model->select_jadwal($hari, $tipe_id, $dokter_id)->result();
                                    } else {
                                        $dokter_id   = $info['Dokter'];
                                        $listJadwal  = $this->jadwal_dokter_model->select_jadwal($hari, $tipe_id, $dokter_id)->result();
                                    }
                                ?>
                                <thead>
                                    <tr class="danger">
                                        <th colspan="6"><i class="fa fa-user-md"></i> <?php echo $t->tipe_name; ?></th>
                                    </tr>
                                    <tr class="success">
                                        <th width="5%">No</th>                                
                                        <th>Nama Dokter</th>
                                        <th width="8%">Hari</th>
                                        <th width="10%">Jam Praktek</th>
                                        <th width="15%">Ruangan</th>
                                        <th width="25%">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($listJadwal) > 0) {  
                                        $no = 1;
                                        foreach($listJadwal as $r) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $r->dokter_name; ?></td>
                                        <td><?php echo $r->jadwal_hari; ?></td>
                                        <td><?php echo substr($r->jadwal_mulai,0,5).' - '.substr($r->jadwal_selesai,0,5); ?></td>
                                        <td><?php echo $r->ruangan_name; ?></td>
                                        <td class="<?php if (!empty($r->jadwal_keterangan)) { echo 'danger'; } ?>"><b><?php echo $r->jadwal_keterangan; ?></b></td>
                                    </tr>
                                    <?php
                                        $no++;
                                        }
                                    } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" align="center"><em>Tidak Ada Jadwal Praktek Dokter Hari Ini.</em></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <?php 
                                }
                                ?>
                            </table>
                        </div>
                        <?php
                            // Tanggal Terakhir di Tambah 1
                            $Dari = date ("Y-m-d", strtotime("+1 day", strtotime($Dari)));
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>