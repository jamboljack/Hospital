<script type="text/javascript">
    function TampilKabupaten() {
        provinsi_id = document.getElementById("provinsi_id").value;
        $.ajax({
            url:"<?php echo base_url();?>admin/pasien/pilih_kabupaten/"+provinsi_id+"",
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
            url:"<?php echo base_url();?>admin/pasien/pilih_kecamatan/"+kabupaten_id+"",
            success: function(response) {
                $("#kecamatan_id").html(response);
            },
            dataType:"html"
        });
        return false;
    }
</script>

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
                    <a href="<?php echo site_url('admin/pasien'); ?>">Pasien</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Edit Pasien</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <div class="col-md-12">

                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-edit"></i> Form Edit Pasien
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" action="<?php echo site_url('admin/pasien/updatedata'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="id" value="<?php echo $detail->pasien_id; ?>" />

                            <div class="form-body">
                                <h4 class="form-section">Data Personal Pasien</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">No. RM</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="no_rm" value="<?php echo $detail->pasien_no_rm; ?>" autocomplete="off" required required autofocus>
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">Masukkan No. Rekam Medis Pasien</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Nama Pasien</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="nama" value="<?php echo $detail->pasien_nama; ?>" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">Masukkan Nama Lengkap Pasien</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Tempat Lahir</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="tmpt_lahir" value="<?php echo $detail->pasien_tmpt_lhr; ?>" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">Masukkan Tempat Lahir Pasien</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Tgl. Lahir</label>
                                            <?php 
                                            $TglLahir   = $detail->pasien_tgl_lhr;
                                            $Tanggal    = date("d-m-Y", strtotime($TglLahir));
                                            ?>
                                            <div class="col-md-6">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" name="tgl_lahir" value="<?php echo $Tanggal; ?>" placeholder="DD-MM-YYYY" autocomplete="off" required />
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Jenis Kelamin</label>
                                            <div class="col-md-9">
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" id="rdJK1" name="rdJK" class="md-radiobtn" value="Laki-Laki" <?php if ($detail->pasien_jk=='Laki-Laki') { echo 'checked'; } ?>>
                                                        <label for="rdJK1">
                                                        <span></span><span class="check"></span><span class="box"></span>
                                                        Laki-Laki </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="rdJK2" name="rdJK" class="md-radiobtn" value="Perempuan" <?php if ($detail->pasien_jk=='Perempuan') { echo 'checked'; } ?>>
                                                        <label for="rdJK2">
                                                        <span></span><span class="check"></span><span class="box"></span>
                                                        Perempuan </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Alamat</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="alamat" value="<?php echo $detail->pasien_alamat; ?>" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">Masukkan Alamat Lengkap sesuai KTP</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Provinsi</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="lstProvinsi" id="provinsi_id" onchange="TampilKabupaten()" required>
                                                <option value="">- Provinsi -</option>
                                                <?php 
                                                foreach($listProvinsi as $p) {
                                                    if ($detail->provinsi_id == $p->provinsi_id) {
                                                ?>
                                                <option value="<?php echo $p->provinsi_id; ?>" selected><?php echo $p->provinsi_nama; ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $p->provinsi_id; ?>"><?php echo $p->provinsi_nama; ?></option>
                                                <?php 
                                                    } 
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Kab. / Kota</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="lstKabupaten" id="kabupaten_id" onChange="TampilKecamatan()" required>
                                                <option value="">- Kabupaten -</option>
                                                <?php 
                                                foreach($listKabupaten as $k) {
                                                    if ($detail->kabupaten_id == $k->kabupaten_id) {
                                                ?>
                                                <option value="<?php echo $k->kabupaten_id; ?>" selected><?php echo $k->kabupaten_nama; ?></option>
                                                <?php 
                                                    } 
                                                } 
                                                ?>
                                                </select>
                                                <?php
                                                /*
                                                $style_kabupaten = 'class="form-control" id="kabupaten_id" onChange="TampilKecamatan()"';
                                                echo form_dropdown("lstKabupaten", array('' => '- Kabupaten -'), '',$style_kabupaten);
                                                */
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Kecamatan</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="lstKecamatan" id="kecamatan_id" required>
                                                <option value="">- Kecamatan -</option>
                                                <?php 
                                                foreach($listKecamatan as $c) {
                                                    if ($detail->kecamatan_id == $c->kecamatan_id) {
                                                ?>
                                                <option value="<?php echo $c->kecamatan_id; ?>" selected><?php echo $c->kecamatan_nama; ?></option>
                                                <?php 
                                                    } 
                                                } 
                                                ?>
                                                </select>
                                                <?php
                                                /*
                                                $style_kecamatan = 'class="form-control" id="kecamatan_id"';
                                                echo form_dropdown("lstKecamatan", array('' => '- Kecamatan -'), '',$style_kecamatan);
                                                */
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Kode Pos</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="kodepos" value="<?php echo $detail->pasien_kodepos; ?>" pattern="^[0-9]{1,5}$" title="Hanya Angka, maksimal 5 Digit" maxlength="5">
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">5 digit Kode Pos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">WNI ?</label>
                                            <div class="col-md-9">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="check1" value="1" name="chkWNI" class="md-check" <?php if ($detail->pasien_wni == 1) { echo 'checked'; } ?>>
                                                        <label for="check1">
                                                        <span></span><span class="check"></span><span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">No. Handphone</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="telp" value="<?php echo $detail->pasien_telp; ?>" pattern="^[0-9]{1,12}$" title="Hanya Angka, maksimal 12 Digit" maxlength="12" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">Masukkan No. Handphone Anda, harus ANGKA.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section">Data Identitas</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Identitas</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="lstIdentitas" required>
                                                    <option value="">- Pilih Identitas -</option>
                                                    <?php 
                                                    foreach($listIdentitas as $i) {
                                                        if ($detail->identitas_id == $i->identitas_id) {
                                                    ?>
                                                    <option value="<?php echo $i->identitas_id; ?>" selected><?php echo $i->identitas_name; ?></option>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $i->identitas_id; ?>"><?php echo $i->identitas_name; ?></option>
                                                    <?php } 
                                                    } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">No. Identitas</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="no_identitas" value="<?php echo $detail->pasien_no_identitas; ?>" pattern="^[0-9]{1,16}$" maxlength="16" title="Hanya Angka, maksimal 16 Digit" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">Masukkan No. Identitas, hanya ANGKA max. 16 Angka</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section">Data Pendukung</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Agama</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="lstAgama" required>
                                                    <option value="">- Pilih Agama -</option>
                                                    <?php
                                                    foreach($listAgama as $a) {
                                                        if ($detail->agama_id == $a->agama_id) {
                                                    ?>
                                                    <option value="<?php echo $a->agama_id; ?>" selected><?php echo $a->agama_name; ?></option>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $a->agama_id; ?>"><?php echo $a->agama_name; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-4 control-label">Status</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="lstStatus" required>
                                                    <option value="">- Pilih Status -</option>
                                                    <?php
                                                    foreach($listStatus as $s) {
                                                        if ($detail->status_id == $s->status_id) {
                                                    ?>
                                                    <option value="<?php echo $s->status_id; ?>" selected><?php echo $s->status_name; ?></option>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $s->status_id; ?>"><?php echo $s->status_name; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Pendidikan</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="lstPendidikan" required>
                                                    <option value="">- Pilih Pendidikan -</option>
                                                    <?php
                                                    foreach($listDidik as $d) {
                                                        if ($detail->pendidikan_id == $d->pendidikan_id) {
                                                    ?>
                                                    <option value="<?php echo $d->pendidikan_id; ?>" selected><?php echo $d->pendidikan_name; ?></option>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $d->pendidikan_id; ?>"><?php echo $d->pendidikan_name; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Pekerjaan</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="lstKerja" required>
                                                    <option value="">- Pilih Pekerjaan -</option>
                                                    <?php
                                                    foreach($listKerja as $k) {
                                                        if ($detail->pekerjaan_id == $k->pekerjaan_id) {
                                                    ?>
                                                    <option value="<?php echo $k->pekerjaan_id; ?>" selected><?php echo $k->pekerjaan_name; ?></option>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $k->pekerjaan_id; ?>"><?php echo $k->pekerjaan_name; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-4 control-label">Gol. Darah</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="lstDarah" required>
                                                    <option value="">- Pilih Gol. Darah -</option>
                                                    <?php
                                                    foreach($listDarah as $d) {
                                                        if ($detail->darah_id == $d->darah_id) {
                                                    ?>
                                                    <option value="<?php echo $d->darah_id; ?>" selected><?php echo $d->darah_name; ?></option>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $d->darah_id; ?>"><?php echo $d->darah_name; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section">Data Keluarga</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Nama Keluarga</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="namakeluarga" value="<?php echo $detail->pasien_nama_keluarga; ?>" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Nama Ayah</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="namaayah" value="<?php echo $detail->pasien_nama_ayah; ?>" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Nama Ibu</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="namaibu" value="<?php echo $detail->pasien_nama_ibu; ?>" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Suami/Istri</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="namapasangan" value="<?php echo $detail->pasien_nama_pasangan; ?>" autocomplete="off" required>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section">Data Asuransi</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Nama Asuransi</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="lstPelanggan" required>
                                                    <option value="">- Pilih Asuransi -</option>
                                                    <?php 
                                                    foreach($listPelanggan as $l) {
                                                        if ($detail->pelanggan_id == $l->pelanggan_id) {
                                                    ?>
                                                    <option value="<?php echo $l->pelanggan_id; ?>" selected><?php echo $l->pelanggan_name; ?></option>
                                                    <?php } else { ?>
                                                    <option value="<?php echo $l->pelanggan_id; ?>"><?php echo $l->pelanggan_name; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">No. Asuransi</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="no_asuransi" value="<?php echo $detail->pasien_no_asuransi; ?>" autocomplete="off">
                                                <div class="form-control-focus"></div>
                                                <span class="help-block">Masukkan No. Asuransi, Jika Ada.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                                        <a href="<?php echo site_url('admin/pasien'); ?>" class="btn yellow"><i class="fa fa-times"></i> Batal
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