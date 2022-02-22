<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Registrasi
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Master</li>
            <li class="active">Data Registrasi</li>
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

            <form action="<?php echo site_url('registrasi/procupd') ?>" method="post" class="form-horizontal">
             <div class="box-body">
                <input type="hidden" name="registrasiid" class="form-control" value="<?php echo $registrasiid ?>" />

                <div class="form-group">
                    <label class="col-sm-2 control-label">ID Registrasi</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                        <input type="number" name="registrasiid" class="form-control" required="required" readonly="yes" value="<?php echo $registrasiid ?>" />
                    </div>
                </div>
                <div style="clear: both;"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nim</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                        <select class="form-control selbranch" name="nim" id="mahasiswa" required="yes">
                            <option value=""></option>
                            <!-- Menampilkan semua data dari tabel thsms ke dalam combobox / dropdown list -->
                             <?php
                                foreach($mahasiswarecs as $mhs)
                            {
                             ?>
                                     <option value="<?php echo $mhs->nim; ?>"
                                        <?php if($nim==$mhs->nim) echo "selected" ;?>
                                      >
                                        <?php echo $mhs->namamahasiswa; ?>    
                                     </option>
                             <?php
                            }
                             ?>
                          </select>
                    </div>
                </div>
                <div style="clear: both;"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">ID Tahun Semester</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                        <select class="form-control selbranch" name="thsmsid" id="ta" required="yes">
                            <option value=""></option>
                            <!-- Menampilkan semua data dari tabel thsms ke dalam combobox / dropdown list -->
                             <?php
                                foreach($thsmsrecs as $ta)
                            {
                             ?>
                                     <option value="<?php echo $ta->thsmsid; ?>"
                                        <?php if($thsmsid==$ta->thsmsid) echo "selected" ;?>
                                      >
                                        <?php echo $ta->namathsms; ?>    
                                     </option>
                             <?php
                            }
                             ?>
                          </select>
                    </div>
                </div>
                <div style="clear: both;"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">ID Kelas</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                        <select class="form-control selbranch" name="kelasid" id="kelas" required="yes">
                            <option value=""></option>
                            <!-- Menampilkan semua data dari tabel thsms ke dalam combobox / dropdown list -->
                             <?php
                                foreach($kelasrecs as $kls)
                            {
                             ?>
                                     <option value="<?php echo $kls->kelasid; ?>"
                                        <?php if($kelasid==$kls->kelasid) echo "selected" ;?>
                                      >
                                        <?php echo $kls->semester; ?> <?php echo $kls->namakelas; ?>/ <?php echo $kls->namaprodi; ?>    
                                     </option>
                             <?php
                            }
                             ?>
                          </select>
                    </div>
                </div>
                <div style="clear: both;"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Status Aktivitas</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                        <select class="form-control selbranch" name="statusaktivitasmhsid" id="statusaktivitasmhs" required="yes">
                            <option value=""></option>
                            <!-- Menampilkan semua data dari tabel thsms ke dalam combobox / dropdown list -->
                             <?php
                                foreach($statusaktivitasmhsrecs as $sa)
                            {
                             ?>
                                     <option value="<?php echo $sa->statusaktivitasmhsid; ?>"
                                        <?php if($statusaktivitasmhsid==$sa->statusaktivitasmhsid) echo "selected" ;?>
                                      >
                                        <?php echo $sa->namastatusaktivitasmhs; ?>    
                                     </option>
                             <?php
                            }
                             ?>
                          </select>
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