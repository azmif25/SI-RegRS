      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                  Rekap
                  <small></small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                  <li class="active">Data Aktivasi</li>
              </ol>
          </section>

          <!-- Main content -->
          <section class="content">

              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Data Aktivasi</h3><br /><br>
                      <div class="container">
                          <form method="POST" action="<?php echo site_url('aktivasi/cetak'); ?>" class="form-inline row">
                              <div class="col-sm-1">
                                  <label for="">Dari </label>
                              </div>
                              <div class="col-sm-3">
                                  <div class="form-group">
                                      <!-- <label for="">Dari Tanggal</label> -->
                                      <input type="date" name="dari_tanggal" value="<?php echo date("Y-m-d") ?>" class="form-control form-control-sm">
                                  </div>
                              </div>
                              <div class="col-sm-2">
                                  <label for="">Sampai </label>
                              </div>
                              <div class="col-sm-3">
                                  <div class="form-group">
                                      <!-- <label for="">Sampai Tanggal</label> -->
                                      <input type="date" name="ke_tanggal" value="<?php echo date("Y-m-d") ?>" class="form-control form-control-sm">
                                  </div>
                              </div>&ensp;&ensp;&ensp;
                              <div class="col-sm-1">
                                  <button name="tampil" formtarget="_blank" class="btn btn-info btn-sm" style="width: 200%;"><span class="fa fa-print"></span> Cetak Data</button>
                              </div>
                          </form>
                      </div>
                      <!-- <p class="pull-right">
                          <a href="<?php echo site_url('aktivasi/cetak'); ?>" target="_blank" class="btn btn-info"><span class="fa fa-print"></span> Cetak Data</a>
                      </p> -->
                  </div><!-- /.box-header -->



                  <div class="box-body">

                      <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>No. RMK</th>
                                  <th>Nama Pasien</th>
                                  <th>No. Telepon</th>
                                  <th>E-mail</th>
                                  <th>Tanggal Aktivasi</th>
                                  <th>Status Aktivasi</th>
                                  <th>Aktivator</th>
                              </tr>
                          </thead>
                          <tbody>

                              <?php
                                if (!empty($results)) {
                                    $no = 1;
                                    foreach ($results as $r) {
                                ?>
                                      <tr>
                                          <td><?php echo $no; ?></td>
                                          <td><?php echo $r->no_rmk; ?></td>
                                          <td><?php echo $r->nama_pasien; ?></td>
                                          <td><?php echo $r->telepon; ?></td>
                                          <td><?php echo $r->email; ?></td>
                                          <td><?php echo $r->tgl_aktivasi ?></td>
                                          <td><?php echo $r->keterangan ?></td>
                                          <td><?php echo $r->nama_admin ?></td>
                                      </tr>
                              <?php

                                        $no++;
                                    }
                                } else {
                                    echo '<td colspan="7" class="text-center"><h3>Data Belum Ada</h3></td>';
                                }
                                ?>
                          </tbody>
                          <tfoot>
                          </tfoot>
                      </table>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <div class="row text-center">
                          <?php
                            if (isset($links)) {
                                echo $links;
                            }
                            ?>
                      </div>
                  </div>
              </div><!-- /.box -->

          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->