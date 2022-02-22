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
                  <li class="active">Detail</li>
              </ol>
          </section>

          <!-- Main content -->
          <section class="content">

              <!-- Horizontal Form -->
              <div class="box box-warning">
                  <div class="box-header with-border">
                      <h3 class="box-title">Detail</h3>
                  </div><!-- /.box-header -->

                  <div class="box-body">
                      <div class="form-group">
                          <label class="col-sm-2 control-label">ID Registrasi </label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-7">
                              <?php echo $registrasiid; ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nim</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-6">
                              <?php echo $nim; ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">ID tahun Semester</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $thsmsid; ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">ID Kelas</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $kelasid; ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Status Aktivitas Mahasiswa</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $statusaktivitasmhsid; ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>

                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <div class="pull-right">
                          <!--
                      <div class="col-sm-6">
                        <input type="submit" class="btn btn-info" value="Simpan" />
                      </div>
                    -->
                          <div class="col-sm-6">
                              <input type="button" onclick="javascript:history.go(-1)" class="btn btn-default" value="Kembali" />
                          </div>
                      </div>
                  </div><!-- /.box-footer -->


              </div><!-- /.box -->

          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->