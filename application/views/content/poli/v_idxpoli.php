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
            <li class="active">Data poli</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data poli</h3>
              <?php if (!empty($keyword)) { ?>
                <p style="color:orange"><b>Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</b></p>
              <?php } ?>
            </div><!-- /.box-header -->



            <div class="box-body">

              <div class="row">
                <div class="col-sm-6">
                  <a href="<?php echo site_url('poli/addnew'); ?>" class="btn btn-success"><span class="fa fa-plus"></span> Tambah</a>
                </div>
                <div class="col-sm-6">
                  <?php echo form_open('poli/search') ?>
                  <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Nama Poli...">
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
              <p>

              </p>


              <table id="tableTahunAjaran" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama poli</th>
                    <th>Menu</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  // $no = $this->uri->segment('3') + 1;
                  $no = 1;
                  foreach ($results as $r) {
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $r->nama_poli; ?></td>
                      <td>
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Pilih <span class="fa fa-caret-down"></span></button>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('poli/update/' . $r->id_poli . ''); ?>"><span class="fa fa-edit"></span> Ubah </a></li>
                            <li><a class="delbtn" href="javascript:;" onclick="<?php echo site_url('poli/delete/' . $r->id_poli . ''); ?>"><span class="fa fa-times"></span> Hapus</a></li>
                          </ul>
                        </div><!-- /btn-group -->
                      </td>
                    </tr>
                  <?php
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