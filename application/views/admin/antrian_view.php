<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/sweetalert2.css">
<script src="<?php echo base_url(); ?>js/sweetalert2.min.js"></script>
<?php 
if ($this->session->flashdata('notification')) { ?>
<script>
    swal({
        title: "Done",
        text: "<?php echo $this->session->flashdata('notification'); ?>",
        timer: 2000,
        showConfirmButton: false,
        type: 'success'
    });
</script>
<? } ?>

<script>
    function checkData(antrian_id) {
        var id = antrian_id;
        swal({
            title: 'Pasien sudah Datang ?',
            text: 'Data Akan di Ubah menjadi Periksa !',type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            closeOnConfirm: true
        }, function() {
            window.location.href="<?php echo site_url('admin/antrian/updatedata'); ?>"+"/"+id
        });
    }
</script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Dashboard <small>Antrian Pasien</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Antrian Pasien</a>
                </li>
            </ul>                
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-search"></i> Seleksi Antrian Pasien
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" action="<?php echo site_url('admin/antrian/caridataantrian'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-4">Tanggal Pemeriksaan</label>
                                            <div class="col-md-6">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" name="tgl_periksa" value="<?php echo set_value('tgl_periksa'); ?>" placeholder="DD-MM-YYYY" autocomplete="off" required/>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-4">Spesialis</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="lstSpesialis" required>
                                                    <option value="all">- Pilih Nama Spesialis -</option>
                                                    <?php
                                                    foreach($listTipe as $t) {
                                                    ?>php
                                                    <option value="<?php echo $t->tipe_id; ?>" <?php echo set_select('lstSpesialis', $t->tipe_id); ?>><?php echo $t->tipe_name; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn green"><i class="fa fa-search"></i> Cari Data</button>
                                        <a href="<?php echo site_url('admin/antrian'); ?>" class="btn yellow"><i class="fa fa-refresh"></i> Refresh
                                        </a>
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
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Antrian Pasien
                        </div>
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">                        
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th width="5%">No</th>                                
                                <th width="10%">No. Antrian</th>
                                <th>Nama Pasien</th>
                                <th width="25%">Nama Dokter</th>
                                <th width="15%">Tempat & Ruang</th>
                                <th width="13%">Status</th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($daftarlist as $r) {
                                $antrian_id  = $r->antrian_id;

                                $tanggal            = $r->antrian_tanggal;
                                $Tgl_periksa        = date("d-m-Y", strtotime($tanggal));
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>                                
                                <td><b><?php echo $r->antrian_kode; ?></b></td>
                                <td><?php echo '<b>'.$r->pasien_nama.' - '.$r->pasien_no_rm.'</b>'.'<br>'.$r->pasien_alamat; ?></td>
                                <td><?php echo $r->dokter_name.'<br>'.$r->tipe_name; ?></td>
                                <td><?php echo $Tgl_periksa.', '.substr($r->antrian_jam_layani,0,5).' WIB <br>'.$r->ruangan_name; ?></td>
                                <td align="center"><b><?php echo $r->antrian_status.'<br>'.substr($r->antrian_jam_datang,0,5).' WIB'; ?></b></td>
                                <td align="center">
                                    <a onclick="checkData(<?php echo $antrian_id; ?>)"><button class="btn btn-primary btn-xs" title="Check Data"><i class="icon-check"></i> Check</button>
                                    </a>
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
        <div class="clearfix"></div>
    </div>
</div>