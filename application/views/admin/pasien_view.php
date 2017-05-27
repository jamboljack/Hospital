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

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Dashboard <small>Pasien</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Pasien</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Pasien
                        </div>
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">                        
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th width="5%">No</th>                                
                                <th width="15%">No. Rekam Medik</th>
                                <th>Nama Pasien</th>
                                <th width="10%">Tgl. Lahir</th>
                                <th width="10%">Jenis Kelamin</th>
                                <th width="30%">Alamat</th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($daftarlist as $r) {
                                $pasien_id  = $r->pasien_id;

                                // Kondisi Jika RM kosong maka -
                                $noRM       = !empty($r->pasien_no_rm)?$detail->pasien_no_rm:'-';
                                $TglLahir   = $r->pasien_tgl_lhr;
                                $Tanggal    = date("d-m-Y", strtotime($TglLahir));
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>                                
                                <td><?php echo $noRM; ?></td>
                                <td><?php echo $r->pasien_nama; ?></td>
                                <td><?php echo $Tanggal; ?></td>
                                <td><?php echo $r->pasien_jk; ?></td>
                                <td><?php echo $r->pasien_alamat; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/pasien/editdata/'.$pasien_id); ?>"><button class="btn btn-primary btn-xs" title="Edit Data"><i class="icon-pencil"></i> Edit</button></a>
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