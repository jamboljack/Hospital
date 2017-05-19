<script type="text/javascript">
    $(document).ready(function () {
        $("#lstRuangan").select2({
        });
    });
</script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Master Medis <small>Jadwal Praktek</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>                
                <li>
                    <a href="#">Master Medis</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/dokter'); ?>">Dokter & Jadwal Praktek</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/dokter/jadwal/'.$this->uri->segment(4)); ?>">Jadwal Praktek</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Tambah Jadwal Praktek <?php echo $detail->dokter_name; ?></a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <div class="col-md-12">

                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-plus-square"></i> Form Tambah Jadwal Praktek - <?php echo $detail->dokter_name; ?>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" action="<?php echo site_url('admin/dokter/savedatajadwal/'.$this->uri->segment(4)); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Ruangan</label>
                                    <div class="col-md-6">
                                        <select class="select2_category form-control" data-placeholder="- Pilih Ruangan -" name="lstRuangan" id="lstRuangan" required autofocus>
                                            <option value="">- Pilih Ruangan -</option>
                                            <?php 
                                            foreach($listRuang as $r) { 
                                            ?>
                                            <option value="<?php echo $r->ruangan_id; ?>" <?php echo set_select('lstRuangan', $r->ruangan_id); ?>><?php echo $r->ruangan_name; ?></option>
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>                      
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Hari</label>
                                    <div class="col-md-4">
                                        <select class="select2_category form-control" data-placeholder="- Pilih Hari -" name="lstHari" required>
                                            <option value="">- Pilih Hari -</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jum'at">Jum'at</option>
                                            <option value="Sabtu">Sabtu</option>
                                            <option value="Minggu">Minggu</option>
                                        </select>
                                    </div>                      
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Jam Mulai</label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker timepicker-24" name="mulai" autocomplete="off" required>
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Jam Selesai</label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker timepicker-24" name="selesai" autocomplete="off" required>
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Keterangan</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Enter Keterangan" name="keterangan" value="<?php echo set_value('keterangan'); ?>" autocomplete="off">
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Simpan</button>
                                        <a href="<?php echo site_url('admin/dokter/jadwal/'.$this->uri->segment(4)); ?>" class="btn yellow"><i class="fa fa-times"></i> Batal
                                        </a>
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