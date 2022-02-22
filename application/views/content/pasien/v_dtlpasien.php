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
                          <label class="col-sm-2 control-label">No.RMK</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-7">
                              <?php echo $no_rmk; ?>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">NIK</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-6">
                              <?php if ($nik == NULL) {
                                    echo "-";
                                }
                                echo $nik; ?>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">No. BPJS</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-6">
                              <?php if ($no_bpjs == NULL) {
                                    echo "-";
                                }
                                echo $no_bpjs; ?>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Jenis Pasien</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-6">
                              <?php if ($jenis_pasien == NULL) {
                                    echo "-";
                                }
                                echo $jenis_pasien; ?>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Pasien</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $nama_pasien; ?>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Jenis Kelamin</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $jk; ?>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Tempat, Tanggal Lahir</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $tempat_lahir; ?>, <?php echo $tanggal_lahir; ?>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Alamat</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $alamat; ?>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Agama</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $agama; ?>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">No. Telepon</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $telepon; ?>
                          </div>
                          <div style="clear: both;"></div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">E - Mail</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $email; ?>
                          </div>
                          <div style="clear: both;"></div>
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