      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                  Data Aktivasi
                  <small></small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                  <li class="active">Input Data</li>
                  <li class="active">Data Aktivasi</li>
              </ol>
          </section>

          <!-- Main content -->
          <section class="content">

              <div class="box">
                  <div class="box-header">
                      <div class="col-sm-3">
                          <h3 class="box-title">Data Aktivasi</h3><br />
                          <p class="pull-right">
                              <!-- <a href="<?php echo site_url('tujuan/addnew'); ?>" class="btn btn-success btn-xs"><span class="fa fa-plus"></span> Tambah</a> -->
                          </p>
                      </div>
                      <div class="col-sm-4">
                          <?php echo form_open('aktivasi/showed') ?>
                          <div class="input-group">
                              <input type="date" name="tanggal" class="form-control text-center" value="<?= set_value('tanggal') ?>">
                              <div class="input-group-btn">
                                  <button class="btn btn-success" name="search_submit" type="submit">
                                      <!-- <input type="submit" value="Cari"> -->
                                      <!-- <i class="glyphicon glyphicon-search"></i> -->
                                      Tampilkan
                                  </button>
                              </div>
                          </div>
                          <?php echo form_close() ?>
                      </div>
                      <div class="col-sm-1"></div>
                      <div class="col-sm-4">
                          <?php echo form_open('aktivasi/search') ?>
                          <div class="input-group">
                              <input type="text" name="keyword" class="form-control" placeholder="No. RMK...">
                              <div class="input-group-btn">
                                  <button class="btn btn-default" name="search_submit" type="submit">
                                      <!-- <input type="submit" value="Cari"> -->
                                      <i class="glyphicon glyphicon-search"></i>
                                  </button>
                              </div>
                          </div>
                          <?php echo form_close() ?>
                      </div>
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
                                  <th>Tanggal</th>
                                  <th>Status Aktivasi</th>
                                  <th class='text-center'>Menu</th>
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
                                          <td><?php
                                                $date = new DateTime($r->tgl_insert);
                                                $date = $date->format('d-m-Y');
                                                echo $date; ?></td>
                                          <td><b><?php echo $r->keterangan ?></b></td>
                                          <?php
                                            if ($r->keterangan == 'Belum Teraktivasi') {
                                                echo "<td class='text-center'><a href='#id";
                                                echo $r->nik;
                                                echo "' data-toggle='modal' class='btn btn-primary btn-sm'>Aktivasi</a></td>";
                                            } else {
                                                echo "<td class='text-center'>-</td>";
                                            }
                                            ?>
                                          <div class="modal fade" id="id<?php echo $r->nik; ?>" role="dialog">
                                              <div class="modal-dialog">
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h4 class="modal-title text-center" id="myModalLabel"><b>Aktivasi</b></h4>
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="text-center">[<?php echo $r->no_rmk; ?>] | <?php echo $r->nama_pasien ?></h4>
                                                      </div>
                                                      <div class="modal-body">
                                                          <form method="post" action="<?php echo site_url('aktivasi/procupd'); ?>">
                                                              <input type="hidden" name="id_admin" value="<?php echo $this->session->id_admin ?>">
                                                              <input type="hidden" name="nik" value="<?php echo $r->nik ?>">
                                                              <input type="hidden" name="id_aktivasi" value="<?php echo $r->id_aktivasi ?>">
                                                              <input type="hidden" name="tgl_aktivasi" value="<?php echo date("Y-m-d"); ?>">
                                                              <div class="form-group row">
                                                                  <div class="col-sm-4">
                                                                      <label>NIK</label>
                                                                  </div>
                                                                  <div class="col-sm-8">
                                                                      <input type="text" name="nik_confirm" class="form-control form-control-sm" placeholder="Masukan NIK Pasien...">
                                                                  </div>
                                                              </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <input type="submit" class="btn btn-info" value="Simpan" />
                                                          </form>
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                      </div>
                                                  </div>

                                              </div>
                                          </div>

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