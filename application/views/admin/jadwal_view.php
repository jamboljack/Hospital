<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/sweetalert2.css">
<script src="<?php echo base_url(); ?>js/sweetalert2.min.js"></script>
<script>
    function hapusData(jadwal_id) {
        var id = jadwal_id;
        swal({
            title: 'Anda Yakin ?',
            text: 'Data ini Akan di Hapus !',type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            closeOnConfirm: true
        }, function() {
            window.location.href="<?php echo site_url('admin/dokter/deletedatajadwal'.'/'.$this->uri->segment(4)); ?>"+"/"+id
        });
    }
</script>

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
                    <a href="#">Jadwal Praktek <?php echo $detail->dokter_name; ?></a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo site_url('admin/dokter/adddatajadwal/'.$this->uri->segment(4)); ?>">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</button>
                </a>
                <a href="<?php echo site_url('admin/dokter'); ?>" class="btn red"><i class="fa fa-times"></i> Kembali</a>
                <br><br>
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Jadwal Praktek - <?php echo $detail->dokter_name; ?>
                        </div>
                        <div class="tools"></div>
                    </div>

                    <div class="portlet-body">                        
                        <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Hari</th>
                                <th width="20%">Jam Praktek</th>
                                <th>Ruangan</th>
                                <th width="30%">Keterangan</th>
                                <th width="16%">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($daftarlist as $r) {
                                $jadwal_id = $r->jadwal_id;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>                                
                                <td><?php echo $r->jadwal_hari; ?></td>
                                <td><?php echo substr($r->jadwal_mulai,0,5).' - '.substr($r->jadwal_selesai,0,5); ?></td>
                                <td><?php echo $r->ruangan_name; ?></td>
                                <td><?php echo $r->jadwal_keterangan; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/dokter/editdatajadwal/'.$this->uri->segment(4).'/'.$r->jadwal_id); ?>"><button class="btn btn-primary btn-xs" title="Edit Data"><i class="icon-pencil"></i> Edit</button></a>
                                    <a onclick="hapusData(<?php echo $jadwal_id; ?>)"><button class="btn btn-danger btn-xs" title="Hapus Data"><i class="icon-trash"></i> Hapus</button>
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