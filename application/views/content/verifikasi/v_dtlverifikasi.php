      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                  Data Tujuan Berobat
                  <small></small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                  <li class="active">input Data</li>
                  <li class="active">Data Tujuan Berobat</li>
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
                          <label class="col-sm-2 control-label">No. RMK</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-7">
                              <?php echo $no_rmk; ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Pasien</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-7">
                              <?php echo $nama_pasien; ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Jenis Pasien</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $jenis_pasien; ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>
                      <?php
                        if ($no_bpjs != NULL) {
                        ?>
                          <div class="form-group">
                              <label class="col-sm-2 control-label">No. BPJS</label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-3">
                                  <?php echo $no_bpjs; ?>
                              </div>
                          </div>
                          <div style="clear: both;"></div>
                      <?php
                        }
                        ?>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Tanggal Pertemuan</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php if (!empty($tgl_tujuan) && ($tgl_tujuan != '1970-01-01')) echo date('d-m-Y', strtotime($tgl_tujuan)); ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Poli Tujuan</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php echo $nama_poli; ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label"><b>Kode Booking</b></label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-3">
                              <?php
                                if ($kode_booking == null) {
                                    echo "-";
                                } else {
                                    echo $kode_booking;
                                }
                                ?>
                          </div>
                      </div>
                      <div style="clear: both;"></div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Bukti Rujukan</label>
                          <label class="col-sm-1 control-label">:</label>
                          <div class="col-sm-7">
                              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                  </button> -->
                              <a href="" data-toggle="modal" data-target="#exampleModal"><?php echo $bukti; ?></a>
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

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b><?php echo $bukti; ?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-12 text-center">
                              <style>
                                  figure {
                                      margin: 16px 40px !important;
                                  }

                                  .img-fluid {
                                      max-width: 100%;
                                      height: auto;
                                  }
                              </style>
                              <img class="img-fluid" src='<?php echo base_url('bukti');
                                                            echo '/';
                                                            echo $bukti; ?>' alt="">
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a href="<?php echo site_url('verifikasi/download_foto/' . $bukti . ''); ?>" class="btn btn-info">Download</a>

                  </div>
              </div>
          </div>
      </div>