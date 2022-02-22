      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                  Data Master
                  <small></small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                  <li class="active">Data Master</li>
                  <li class="active">Data Pasien</li>
              </ol>
          </section>

          <!-- Main content -->
          <section class="content">

              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Data Pasien</h3>
                  </div><!-- /.box-header -->



                  <div class="box-body">
                      <div class="row">
                          <div class="col-sm-3">
                              <a href="<?php echo site_url('pasien/addnew'); ?>" class="btn btn-success"><span class="fa fa-plus"></span> Tambah</a>
                          </div>
                          <div class="col-sm-3 text-right">
                              <a href="<?php echo site_url('pasien/cetak'); ?>" target="_blank" class="btn btn-info"><span class="fa fa-print"></span> Cetak Data</a>
                          </div>
                          <div class="col-sm-6">
                              <?php echo form_open('pasien/search') ?>
                              <div class="input-group">
                                  <input type="text" name="keyword" class="form-control" placeholder="Nama Pasien atau No. RMK...">
                                  <div class="input-group-btn">
                                      <button class="btn btn-default" name="search_submit" type="submit">
                                          <!-- <input type="submit" value="Cari"> -->
                                          <i class="glyphicon glyphicon-search"></i>
                                      </button>
                                  </div>
                              </div>
                              <?php echo form_close() ?>
                          </div>
                      </div>
                      <br>

                      <table id="tablepasien" class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>No. RMK</th>
                                  <th>NIK</th>
                                  <th>Nama Pasien</th>
                                  <th>Jenis Kelamin</th>
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
                                          <td><?php if ($r->nik != NULL) {
                                                    echo $r->nik;
                                                } else {
                                                    echo "<b>Belum Teraktivasi</b>";
                                                } ?></td>
                                          <td><?php echo $r->nama_pasien; ?></td>
                                          <td><?php echo $r->jk; ?></td>
                                          <div class="modal fade" id="id<?php echo $r->no_rmk; ?>" role="dialog">
                                              <div class="modal-dialog">
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                      <div class="modal-header text-center">
                                                          <h4 class="modal-title text-center" id="myModalLabel"><b>Proses Verifikasi</b></h4>
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4>[<?php echo $r->no_rmk; ?>] | <?php echo $r->nama_pasien ?></h4>
                                                      </div>
                                                      <div class="modal-body">
                                                          <form method="post" action="<?php echo site_url('pasien/aktivasi'); ?>">
                                                              <input type="hidden" name="no_rmk" value="<?php echo $r->no_rmk ?>">
                                                              </fieldset>
                                                              <div class="form-group row">
                                                                  <div class="col-sm-4">
                                                                      <label>NIK</label>
                                                                  </div>
                                                                  <div class="col-sm-2">
                                                                      <label for="">:</label>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                      <input type="text" name="nik" class="form-control form-control-sm" placeholder="Masukan NIK untuk Aktivasi...">
                                                                  </div>
                                                              </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <input type="submit" class="btn btn-info" value="Aktivasi" />
                                                          </form>
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                      </div>
                                                  </div>

                                              </div>
                                          </div>
                                          <td>

                                              <div class="input-group-btn">
                                                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Pilih <span class="fa fa-caret-down"></span></button>
                                                  <ul class="dropdown-menu">
                                                      <li><a href="<?php echo site_url('pasien/detail/' . $r->no_rmk . ''); ?>"><span class="fa fa-info"></span> Detail </a></li>
                                                      <li><a href="<?php echo site_url('pasien/update/' . $r->no_rmk . ''); ?>"><span class="fa fa-edit"></span> Ubah </a></li>
                                                      <li><a class="delbtn" href="javascript:;" onclick="<?php echo site_url('pasien/delete/' . $r->no_rmk . ''); ?>"><span class="fa fa-times"></span> Hapus</a></li>
                                                  </ul>
                                              </div><!-- /btn-group -->


                                          </td>
                                      </tr>
                              <?php

                                        $no++;
                                    }
                                } else {
                                    echo '<td colspan="10" class="text-center"><h3>Data Belum Ada</h3></td>';
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