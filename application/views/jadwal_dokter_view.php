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
                <h1>Jadwal Dokter</h1>
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
                            <div class="caption">
                                <i class="fa fa-list"></i> Jadwal Dokter
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
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
                                            echo form_dropdown('lstTipe', $listTipe,'',$style_poliklinik);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Dokter</label>
                                    <div class="col-md-9">
                                        <?php
                                        $style_dokter = 'class="select2_category form-control" id="dokter_id"';
                                        echo form_dropdown("lstDokter", array(''=>'- PILIH DOKTER -'),'',$style_dokter);
                                        ?>
                                    </div>
                                </div>
                                <?php 
                                $tgl            = date('Y-m-d'); // Hari Ini
                                $xtgl           = explode("-", $tgl);
                                $thn            = $xtgl[0];
                                $bln            = $xtgl[1];
                                $tgl            = $xtgl[2];
                                $tanggalhariini = $tgl.'-'.$bln.'-'.$thn;

                                $tambah_tanggal = mktime(0,0,0,date('m'),date('d')+7,date('Y')); // Hari ini ditambah 7 Hari
                                $tambah         = date('Y-m-d', $tambah_tanggal);
                                $xtgl2          = explode("-", $tambah);
                                $thnx           = $xtgl2[0];
                                $blnx           = $xtgl2[1];
                                $tglx           = $xtgl2[2];
                                $tanggalseminggu= $tglx.'-'.$blnx.'-'.$thnx;
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Periksa</label>
                                    <div class="col-md-4">
                                        <div class="input-group input-large" data-date="<? echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                                            <input type="text" class="form-control default-date-picker" name="tgl1" placeholder="DD-MM-YYYY" value="<?php echo $tanggalhariini; ?>" required>
                                            <span class="input-group-addon">s/d</span>
                                            <input type="text" class="form-control default-date-picker" name="tgl2" placeholder="DD-MM-YYYY" value="<?php echo $tanggalseminggu; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($show == 'true') { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-list"></i> Jadwal Dokter
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>

                        <div class="portlet-body">
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>
</div>