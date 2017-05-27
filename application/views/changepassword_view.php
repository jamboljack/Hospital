<div class="page-container">
    <div class="page-head">
        <div class="container">
            <div class="page-title">
                <h1>Ganti Password <small>Menu Informasi dan Pencarian Jadwal Praktek Dokter</small></h1>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <ul class="page-breadcrumb breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Beranda</a><i class="fa fa-home"></i></li>
                <li class="active">Ganti Password</li>
            </ul>

            <?php if ($error == 'true') { ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <b>PERHATIAN !!</b> <br>
                <?php echo validation_errors(); ?>
            </div>
            <?php } ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption"><i class="fa fa-edit"></i> Ganti Password</div>
                        </div>

                        <div class="portlet-body form">
                            <form action="<?php echo site_url('changepassword/updatepassword/'.$this->uri->segment(3)); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="username" value="<?php echo $detail->user_username; ?>" />
                            
                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Username :</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" value="<?php echo $detail->user_username; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Password Baru :</label>
                                    <div class="col-md-5">
                                        <input type="password" class="form-control" name="passwordbaru" autocomplete="off" required autofocus>
                                        <div class="form-control-focus"></div>
                                        <span class="help-block">Masukkan Password Baru Anda.</span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Konfirmasi Password Baru :</label>
                                    <div class="col-md-5">
                                        <input type="password" class="form-control" name="passwordkonfirm" autocomplete="off" required>
                                        <div class="form-control-focus"></div>
                                        <span class="help-block">Masukkan Konfirmasi Password Baru Anda.</span>
                                    </div>
                                </div>
                            </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12" align="center">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Update Password</button>
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
</div>