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

              <!-- Horizontal Form -->
              <div class="box box-warning">
                  <div class="box-header with-border">
                      <h3 class="box-title">Ubah Data</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form method="post" enctype="multipart/form-data" action="<?php echo site_url('tujuan/procupd'); ?>" class="form-horizontal">

                      <input type="hidden" name="id_tujuan" class="form-control" value="<?php echo $id_tujuan; ?>" />

                      <div class="box-body">
                          <div class="form-group">
                              <label class="col-sm-2 control-label">No. Kartu BPJS</label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <input type="text" class="form-control" placeholder="No.Kartu BPJS..." value="<?php echo $this->session->no_bpjs ?>" disabled>
                              </div>
                          </div>
                          <div style="clear: both;"></div>
                          <div class="form-group">
                              <label class="col-sm-2 control-label">Bukti Rujukan</label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <input type="file" name="bukti" class="form-control" required="required" />
                                  <small>*Contoh Bukti Rujukan</small>
                                  <button type=" button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bd-example-modal-lg">
                                      Lihat
                                  </button>
                              </div>
                          </div>
                          <div style="clear: both;"></div>
                          <div class="form-group">
                              <script type='text/javascript'>
                                  $(document).ready(function() {

                                      $('#datepicker').datepicker({
                                          dateFormat: "dd-mm-yy",
                                          maxDate: '+1W',
                                          minDate: '+1D'

                                      });

                                  });
                              </script>
                              <label class="col-sm-2 control-label">Tanggal Rujukan</label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <style>
                                      .ui-datepicker-calendar a {
                                          color: white !important;
                                          background-color: green !important;
                                          border-color: black;
                                      }
                                  </style>
                                  <!-- <input type="date" name="tgl_tujuan" class="form-control" value="<?php echo $tgl_tujuan; ?>" required="required" /> -->
                                  <div class="input-group">
                                      <input type='text' name="tgl_tujuan" class="form-control" id="datepicker" value="<?php echo $tgl_tujuan; ?>" required />
                                      <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div style="clear: both;"></div>
                          <div class="form-group">
                              <label class="col-sm-2 control-label">Poli Tujuan</label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <select name="id_poli" id="" class="form-control">
                                      <option value="<?php echo $id_poli ?>"><?php echo $nama_poli ?></option>
                                      <?php
                                        foreach ($polirecs as $poli) {
                                        ?>
                                          <option value="<?php echo $poli->id_poli ?>"><?php echo $poli->nama_poli ?></option>
                                      <?php
                                        }
                                        ?>
                                  </select>
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

      <!-- Modal -->
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Contoh Bukti Rujukan</b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-2"></div>
                          <div class="col-md-8">
                              <img class="img-responsive" src="<?php echo base_url('assets/img/contoh.png'); ?>" alt="">
                          </div>
                          <div class="col-md-2"></div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>