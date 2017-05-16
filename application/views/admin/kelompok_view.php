<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/sweetalert2.css">
<script src="<?php echo base_url(); ?>js/sweetalert2.min.js"></script>
<script>
    function hapusData(kelompok_id) {
        var id = kelompok_id;
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
            window.location.href="<?php echo site_url('admin/kelompok/deletedata'); ?>"+"/"+id
        });
    }
</script>

<script type="text/javascript">
    $(function() {
        $(document).on("click",'.edit_button', function(e) {
            var id      = $(this).data('id');            
            var name    = $(this).data('name');
            var jenis   = $(this).data('jenis');
            var harga   = $(this).data('harga');
            $(".kelompok_id").val(id);
            $(".kelompok_name").val(name);
            $(".jenis_id").val(jenis);
            $(".kelompok_harga").val(harga);
        })
    });
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

<!-- Add Modal Form -->
<div class="modal bs-modal-lg" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?php echo site_url('admin/kelompok/savedata'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        
            <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-plus-square"></i> Form Tambah Kelompok</h4>
            </div>
            <div class="modal-body">                
                <div class="form-group">                    
                    <label class="col-md-3 control-label">Nama Kelompok</label>
                    <div class="col-md-9 has-error">
                        <input type="text" class="form-control" placeholder="Enter Nama Kelompok" name="name" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Jenis Tarif</label>
                    <div class="col-md-9 has-error">
                        <select class="form-control" name="lstJenisTarif" required >
                            <option value="">- Pilih Jenis Tarif -</option>
                            <?php foreach($listJenisTarif as $r) { ?>
                            <option value="<?php echo $r->jenis_id; ?>"><?php echo $r->jenis_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Harga Obat</label>
                    <div class="col-md-9 has-error">
                        <select class="form-control" name="lstHargaObat" required >
                            <option value="">- Pilih Harga Obat -</option>
                            <option value="E">Eceran</option>
                            <option value="G">Grosir</option>
                        </select>
                    </div>
                </div>
            </div>
                        
            <div class="modal-footer">
                <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Simpan</button>
                <button type="button" class="btn yellow" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
            </form>
        </div>        
    </div>    
</div>

<!-- Edit Modal Form -->
<div class="modal bs-modal-lg" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?php echo site_url('admin/kelompok/updatedata'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <input type="hidden" class="form-control kelompok_id" name="id">
                        
            <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Form Edit Kelompok</h4>
            </div>
            <div class="modal-body">                
                <div class="form-group">                    
                    <label class="col-md-3 control-label">Nama Kelompok</label>
                    <div class="col-md-9 has-error">
                        <input type="text" class="form-control kelompok_name" placeholder="Enter Nama Kelompok" name="name" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Jenis Tarif</label>
                    <div class="col-md-9 has-error">
                        <select class="form-control jenis_id" name="lstJenisTarif" required >
                            <option value="">- Pilih Jenis Tarif -</option>
                            <?php foreach($listJenisTarif as $r) { ?>
                            <option value="<?php echo $r->jenis_id; ?>"><?php echo $r->jenis_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Harga Obat</label>
                    <div class="col-md-9 has-error">
                        <select class="form-control kelompok_harga" name="lstHargaObat" required >
                            <option value="">- Pilih Harga Obat -</option>
                            <option value="E">Eceran</option>
                            <option value="G">Grosir</option>
                        </select>
                    </div>
                </div>               
            </div>
                        
            <div class="modal-footer">
                <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                <button type="button" class="btn yellow" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
            </form>
        </div>        
    </div>    
</div>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Master Tarif <small>Kelompok Pasien</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Master Tarif</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Kelompok Pasien</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <div class="col-md-12">
                <a data-toggle="modal" href="#add">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</button>
                </a>
                <br><br>
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Kelompok Pasien
                        </div>
                        <div class="tools"></div>
                    </div>

                    <div class="portlet-body">                        
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th width="5%">No</th>                                
                                <th>Nama Kelompok Pasien</th>
                                <th width="20%">Jenis Tarif</th>
                                <th width="10%">Harga Obat</th>
                                <th width="16%">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($daftarlist as $r) {
                                $kelompok_id = $r->kelompok_id;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>                                
                                <td><?php echo $r->kelompok_name; ?></td>
                                <td><?php echo $r->jenis_name; ?></td>
                                <td><?php if ($r->kelompok_hrg_obat=='E') { echo 'ECERAN'; } else { echo 'GROSIR'; } ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs edit_button" data-toggle="modal" data-target="#edit" data-id="<?php echo $r->kelompok_id; ?>" data-name="<?php echo $r->kelompok_name; ?>" data-jenis="<?php echo $r->jenis_id; ?>" data-harga="<?php echo $r->kelompok_hrg_obat; ?>" title="Edit Data"><i class="icon-pencil"></i> Edit
                                    </button>
                                    <a onclick="hapusData(<?php echo $kelompok_id; ?>)"><button class="btn btn-danger btn-xs" title="Hapus Data"><i class="icon-trash"></i> Hapus</button>
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