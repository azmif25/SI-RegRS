<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Pasien
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Master</li>
            <li class="active">Data Pasien</li>
            <li class="active">Ubah</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- horizontal form -->
        <div class="box box-waring">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data</h3>
            </div>

            <form action="<?php echo site_url('pasien/procupd') ?>" method="post" class="form-horizontal">

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No.RMK</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="no_rmk" class="form-control" value="<?php echo $no_rmk; ?>" readonly="yes" required="required" />
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">NIK</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="nik" class="form-control" value="<?php echo $nik; ?>" required="required" />
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama pasien</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama_pasien" class="form-control" required="required" value="<?php echo $nama_pasien ?>" />
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. Kartu BPJS</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="no_bpjs" id="no_bpjs" class="form-control" placeholder="No.Kartu BPJS..." value="<?php echo $no_bpjs ?>" <?php if ($jenis_pasien == "Umum") {
                                                                                                                                                                    echo "disabled";
                                                                                                                                                                } ?>>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Pasien</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline"> <input type="radio" name="jenis_pasien" id="bpjs" value="BPJS" <?php if ($jenis_pasien == "BPJS") {
                                                                                                                            echo "checked";
                                                                                                                        } ?>> Peserta BPJS </label>
                            <label class="radio-inline"> <input type="radio" name="jenis_pasien" id="umum" value="Umum" <?php if ($jenis_pasien == "Umum") {
                                                                                                                            echo "checked";
                                                                                                                        } ?>> Umum </label>
                        </div>
                        <script>
                            document.getElementById('umum').onclick = function() {
                                var disabled = document.getElementById("no_bpjs").disabled;
                                if (disabled) {
                                    document.getElementById("no_bpjs").disabled = true;
                                } else {
                                    document.getElementById("no_bpjs").disabled = true;
                                }
                            }
                            document.getElementById('bpjs').onclick = function() {
                                var disabled = document.getElementById("no_bpjs").disabled;
                                if (disabled) {
                                    document.getElementById("no_bpjs").disabled = false;
                                } else {
                                    document.getElementById("no_bpjs").disabled = false;
                                }
                            }
                        </script>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline"> <input type="radio" name="jk" value="Laki-Laki" <?php if ($jk == 'Laki-Laki') {
                                                                                                                echo "checked";
                                                                                                            } ?>> Laki-Laki </label>
                            <label class="radio-inline"> <input type="radio" name="jk" value="Perempuan" <?php if ($jk == 'Perempuan') {
                                                                                                                echo "checked";
                                                                                                            } ?>> Perempuan </label>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tempat Lahir</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $tempat_lahir; ?>" required="required" />
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Lahir</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $tanggal_lahir; ?>" required="required" />
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat Lengkap</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <textarea name="alamat" id="" class="form-control" cols="30" rows="3"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Agama</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <select name="agama" id="" class="form-control">
                                <option value="<?php echo $agama; ?>"><?php echo $agama; ?></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Kristen Katolik">Kristen Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Kong hu Chu">Kong hu Chu</option>
                            </select>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. Telepon</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="telepon" class="form-control" value="<?php echo $telepon; ?>" required="required" />
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">E - Mail</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required="required" />
                        </div>
                    </div>
                    <div style="clear: both;"></div>


                </div><!-- /.box-body -->
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                        <div class="col-sm-6">
                            <input type="submit" class="btn btn-info" value="Simpan" />
                        </div>
                        <div class="col-sm-6">
                            <input type="button" onclick="javascript:history.go(-1)" class="btn btn-default" value="Batal" />
                        </div>
                    </div>
                </div><!-- /.box-footer -->
            </form>

        </div>
    </section>
</div>