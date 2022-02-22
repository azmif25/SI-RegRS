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
                  <form method="post" action="<?php echo site_url('registrasi/procadd'); ?>" class="form-horizontal">
                      <div class="box-body">
                          <div class="form-group">
                              <label class="col-sm-2 control-label">ID Registrasi</label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <input type="text" name="registrasiid" class="form-control" required="required" />
                              </div>
                          </div>
                          <div style="clear: both;"></div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label"> Nama Mahasiswa </label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <select class="form-control selbranch" required="yes" name="nim" id="mahasiswa">
                                      <option value=""></option>
                                      <!-- Menampilkan semua data dari tabel kd_prodi ke dalam combobox / dropdown list -->
                                      <?php
                                        foreach ($mahasiswarecs as $mhs) {
                                        ?>
                                          <option value="<?php echo $mhs->nim; ?>"> <?php echo $mhs->namamahasiswa; ?> </option>
                                      <?php
                                        }
                                        ?>
                                  </select>
                              </div>
                          </div>
                          <div style="clear: both;"></div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label"> Tahun Semester </label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <select class="form-control selbranch" required="yes" name="thsmsid" id="thsms">
                                      <option value=""></option>
                                      <!-- Menampilkan semua data dari tabel dosen ke dalam combobox / dropdown list -->
                                      <?php
                                        foreach ($thsmsrecs as $ta) {
                                        ?>
                                          <option value="<?php echo $ta->thsmsid ?>"> <?php echo $ta->namathsms ?></option>
                                      <?php
                                        }
                                        ?>
                                  </select>
                              </div>
                          </div>
                          <div style="clear: both;"></div>

                          <div style="clear: both;"></div>
                          <div class="form-group">
                              <label class="col-sm-2 control-label"> Kelas </label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <select class="form-control selbranch" required="yes" name="kelasid" id="kelas">
                                      <option value=""></option>
                                      <!-- Menampilkan semua data dari tabel dosen ke dalam combobox / dropdown list -->
                                      <?php
                                        foreach ($kelasrecs as $kls) {
                                        ?>
                                          <option value="<?php echo $kls->kelasid; ?>"> <?php echo $kls->semester; ?> <?php echo $kls->namakelas; ?> /<?php echo $kls->namaprodi; ?></option>
                                      <?php
                                        }
                                        ?>
                                  </select>
                              </div>
                          </div>
                          <div style="clear: both;"></div>

                          <div style="clear: both;"></div>
                          <div class="form-group">
                              <label class="col-sm-2 control-label"> Status Aktivitas </label>
                              <label class="col-sm-1 control-label">:</label>
                              <div class="col-sm-7">
                                  <select class="form-control selbranch" required="yes" name="statusaktivitasmhsid" id="statusaktivitasmhs">
                                      <option value=""></option>
                                      <!-- Menampilkan semua data dari tabel dosen ke dalam combobox / dropdown list -->
                                      <?php
                                        foreach ($statusaktivitasmhsrecs as $sa) {
                                        ?>
                                          <option value="<?php echo $sa->statusaktivitasmhsid; ?>"> <?php echo $sa->namastatusaktivitasmhs; ?> </option>
                                      <?php
                                        }
                                        ?>
                                  </select>
                              </div>
                          </div>
                          <div style="clear: both;"></div>


                      </div>
              </div><!-- /.box-body -->
              <div style="clear: both;"></div>
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


          </section><!-- /.content -->
      </div>