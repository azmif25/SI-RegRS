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
                  <li class="active">Data Rujukan</li>
              </ol>
          </section>

          <!-- Main content -->
          <section class="content">

              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Registrasi Rujukan Pasien</h3><br><br>
                      <div class="container">
                          <form method="POST" action="<?php echo site_url('tujuan/cetak'); ?>" class="form-inline row">
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
                      <p class="pull-right">
                          <!-- <a href="<?php echo site_url('tujuan/addnew'); ?>" class="btn btn-success btn-xs"><span class="fa fa-plus"></span> Tambah</a> -->
                          <!-- <a href="<?php echo site_url('tujuan/cetak'); ?>" target="_blank" class="btn btn-info"><span class="fa fa-print"></span> Cetak Data</a> -->
                      </p>
                  </div><!-- /.box-header -->



                  <div class="box-body">

                      <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>No. RMK</th>
                                  <th>Nama Pasien</th>
                                  <th>Tanggal Tujuan</th>
                                  <th>Poli Tujuan</th>
                                  <th>Menu</th>
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
                                          <td><?php echo date('d-m-Y', strtotime($r->tgl_tujuan)); ?></td>
                                          <td><?php echo $r->nama_poli; ?></td>
                                          <td>
                                              <div class="input-group-btn">
                                                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Pilih <span class="fa fa-caret-down"></span></button>
                                                  <ul class="dropdown-menu">
                                                      <li><a href="<?php echo site_url('tujuan/detail/' . $r->id_tujuan . ''); ?>"><span class="fa fa-book"></span> Detail</a></li>
                                                      <li><a href="<?php echo site_url('tujuan/update/' . $r->id_tujuan . ''); ?>"><span class="fa fa-edit"></span> Ubah </a></li>
                                                      <li><a class="delbtn" href="javascript:;" onclick="<?php echo site_url('tujuan/delete/' . $r->id_tujuan . ''); ?>"><span class="fa fa-times"></span> Hapus</a></li>
                                                  </ul>
                                              </div>
                                          </td>
                                      </tr>
                              <?php

                                        $no++;
                                    }
                                } else {
                                    echo '<td colspan="6" class="text-center"><h3>Data Belum Ada</h3></td>';
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



      <div class="modal fade" id="myModal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                      <p></p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                      <button id="delt" type="button" class="btn btn-primary">Hapus</button>
                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->