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
                  <li class="active">Data Registrasi</li>
              </ol>
          </section>

          <!-- Main content -->
          <section class="content">

              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Data Registrasi</h3>
                  </div><!-- /.box-header -->



                  <div class="box-body">
                      <p>
                          <a href="<?php echo site_url('registrasi/addnew'); ?>" class="btn btn-success"><span class="fa fa-plus"></span> Tambah</a>
                      </p>

                      <table id="tableRegistrasi" class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>ID Registrasi</th>
                                  <th>Nim</th>
                                  <th>Nama Mahasiswa</th>
                                  <th>ID Tahun Semester</th>
                                  <th>Kelas</th>
                                  <th>Status Aktivitas Mahasiswa</th>
                                  <th>Menu</th>
                              </tr>
                          </thead>
                          <tbody>

                              <?php

                                $no = 1;
                                foreach ($recs as $r) {
                                ?>
                                  <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $r->registrasiid; ?></td>
                                      <td><?php echo $r->nim; ?></td>
                                      <td><?php echo $r->namamahasiswa ?></td>
                                      <td><?php echo $r->namathsms; ?></td>
                                      <td>
                                          <?php echo $r->semester ?>
                                          <?php echo $r->namakelas; ?>
                                          / <?php echo $r->namaprodi ?>
                                      </td>
                                      <td><?php echo $r->namastatusaktivitasmhs; ?></td>
                                      <td>

                                          <div class="input-group-btn">
                                              <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Pilih <span class="fa fa-caret-down"></span></button>
                                              <ul class="dropdown-menu">
                                                  <li><a href="<?php echo site_url('registrasi/detail/' . $r->registrasiid . ''); ?>"><span class="fa fa-edit"></span> Detail </a></li>
                                                  <li><a href="<?php echo site_url('registrasi/update/' . $r->registrasiid . ''); ?>"><span class="fa fa-edit"></span> Ubah </a></li>
                                                  <li><a class="delbtn" href="javascript:;" onclick="<?php echo site_url('registrasi/delete/' . $r->registrasiid . ''); ?>"><span class="fa fa-times"></span> Hapus</a></li>
                                              </ul>
                                          </div><!-- /btn-group -->


                                      </td>
                                  </tr>
                              <?php

                                    $no++;
                                }
                                ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th>No</th>
                                  <th>ID Registrasi</th>
                                  <th>Nim</th>
                                  <th>ID Tahun Semester</th>
                                  <th>ID Kelas</th>
                                  <th>Status Aktivitas Mahasiswa</th>
                                  <th>Menu</th>
                              </tr>
                          </tfoot>
                      </table>
                  </div><!-- /.box-body -->
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