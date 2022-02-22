      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                  Data Kelas
                  <small></small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                  <li class="active">Data Master</li>
                  <li class="active">Data Absensi</li>
                  <li class="active">Ubah</li>
              </ol>
          </section>

          <!-- Main content -->
          <section class="content">

              <!-- Horizontal Form -->
              <div class="box box-warning">
                  <div class="box-header with-border">
                      <h3 class="box-title">Ubah Data</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form method="post" action="<?php echo site_url('absensi/procupd'); ?>" class="form-horizontal">

                      <input type="hidden" name="pertemuanid" class="form-control" value="<?php echo $pertemuanid; ?>" />

                      <div class="box-body">
                          <div class="form-group">
                              <label class="col-sm-2 control-label">ID Pertemuan</label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <input type="number" name="pertemuanid" class="form-control" value="<?php echo $pertemuanid; ?>" readonly="yes" required="required" />
                              </div>
                          </div>
                          <div style="clear: both;"></div>
                          <div class="form-group">
                              <label class="col-sm-2 control-label">ID Registrasi</label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <input type="number" name="registrasiid" class="form-control" required="required" value="<?php echo $registrasiid; ?>" />
                              </div>
                          </div>
                          <div style="clear: both;"></div>
                          <div class="form-group">
                              <label class="col-sm-2 control-label">Kode Absensi</label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <input type="text " name="kdabsensi" class="form-control" required="required" value="<?php echo $kdabsensi; ?>" />
                              </div>
                          </div>
                          <div style="clear: both;"></div>

                      </div><!-- /.box-body -->
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

              </div><!-- /.box -->

          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->