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
            <li class="active">Input Data</li>
            <li class="active">Data Tujuan Berobat</li>
            <li class="active">Tambah</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Horizontal Form -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('tujuan/procadd'); ?>" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id_verif" value="<?php echo uniqid('ver-'); ?>">
                  <label class="col-sm-2 control-label">No. RMK</label>
                  <label class="col-sm-1 control-label">:</label>
                  <div class="col-sm-7">
                    <select name="no_rmk" id="" class="form-control">
                      <option value="">- Pilih Pasien -</option>
                      <?php
                      foreach ($pasienrecs as $p) {
                      ?>
                        <option value="<?php echo $p->no_rmk ?>"><?php echo $p->no_rmk ?> - <?php echo $p->nama_pasien ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div style="clear: both;"></div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No. Kartu BPJS</label>
                  <label class="col-sm-1 control-label">:</label>
                  <div class="col-sm-7">
                    <input type="text" name="no_bpjs" id="no_bpjs" class="form-control" placeholder="No.Kartu BPJS...">
                  </div>
                </div>
                <div style="clear: both;"></div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Pasien</label>
                  <label class="col-sm-1 control-label">:</label>
                  <div class="col-sm-9">
                    <label class="radio-inline"> <input type="radio" name="jenis_pasien" id="bpjs" value="Peserta BPJS" checked> Peserta BPJS </label>
                    <label class="radio-inline"> <input type="radio" name="jenis_pasien" id="umum" value="Umum"> Umum </label>
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
                  <label class="col-sm-2 control-label">Bukti Rujukan</label>
                  <label class="col-sm-1 control-label">:</label>
                  <div class="col-sm-7">
                    <input type="file" name="bukti" class="form-control" required="required" />
                  </div>
                </div>
                <div style="clear: both;"></div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Ke Poli</label>
                  <label class="col-sm-1 control-label">:</label>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <input type="text" name="tgl_tujuan" class="form-control pull-right dttgl" value="<?php echo date("d-m-Y") ?>">
                      <div class="input-group-addon bttgl">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div><!-- /.input group -->
                  </div>
                </div>
                <div style="clear: both;"></div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Poli Tujuan</label>
                  <label class="col-sm-1 control-label">:</label>
                  <div class="col-sm-7">
                    <select name="id_poli" id="" class="form-control">
                      <option value="">- Pilih Poli -</option>
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