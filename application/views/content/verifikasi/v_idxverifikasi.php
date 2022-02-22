    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Verifikasi
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">Input Data</li>
                <li class="active">Data Verifikasi</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                    <div class="col-sm-3">
                        <h3 class="box-title">Data Verifikasi</h3><br />
                        <p class="pull-right">
                            <!-- <a href="<?php echo site_url('tujuan/addnew'); ?>" class="btn btn-success btn-xs"><span class="fa fa-plus"></span> Tambah</a> -->
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <?php echo form_open('verifikasi/showed') ?>
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
                        <?php echo form_open('verifikasi/search') ?>
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
                                <th>Tanggal Tujuan</th>
                                <th>Poli Tujuan</th>
                                <th>Status</th>
                                <th>Verifikasi</th>
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
                                        <td><?php echo $r->status ?></td>
                                        <?php
                                        if ($r->status == 'Menunggu') {
                                            echo "<td><a href='#id";
                                            echo $r->id_verif;
                                            echo "' data-toggle='modal' class='btn btn-primary btn-sm'>Proses</a></td>";
                                        } else {
                                            echo "<td>Sudah diVerifikasi</td>";
                                        }
                                        ?>
                                        <div class="modal fade" id="id<?php echo $r->id_verif; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-center" id="myModalLabel"><b>Proses Verifikasi</b></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="text-center">[<?php echo $r->no_rmk; ?>] | <?php echo $r->nama_pasien ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="<?php echo site_url('verifikasi/procaddverif'); ?>">
                                                            <fieldset class="form-group">
                                                                <div class="row">
                                                                    <input type="hidden" name="id_verif" value="<?php echo $r->id_verif ?>">
                                                                    <input type="hidden" name="id_admin" value="<?php echo $this->session->id_admin; ?>">
                                                                    <div class="col-sm-4">
                                                                        <label>Status</label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" id="tidak" type="radio" name="status" value="Tidak Layak" checked>
                                                                            <label class="form-check-label">
                                                                                Tidak Layak
                                                                            </label>
                                                                            <input class="form-check-input" id="layak" type="radio" name="status" value="Layak">
                                                                            <label class="form-check-label">
                                                                                Layak
                                                                            </label>
                                                                        </div>
                                                                        <script>
                                                                            document.getElementById('layak').onclick = function() {
                                                                                var disabled = document.getElementById("alasan_tolak").disabled;
                                                                                var disabled = document.getElementById("kode").disabled;
                                                                                if (disabled) {
                                                                                    document.getElementById("alasan_tolak").disabled = true;
                                                                                    document.getElementById("kode").disabled = false;
                                                                                } else {
                                                                                    document.getElementById("alasan_tolak").disabled = true;
                                                                                    document.getElementById("kode").disabled = false;
                                                                                }
                                                                            }
                                                                            document.getElementById('tidak').onclick = function() {
                                                                                var disabled = document.getElementById("alasan_tolak").disabled;
                                                                                var disabled = document.getElementById("kode").disabled;
                                                                                if (disabled) {
                                                                                    document.getElementById("alasan_tolak").disabled = false;
                                                                                    document.getElementById("kode").disabled = true;
                                                                                } else {
                                                                                    document.getElementById("alasan_tolak").disabled = false;
                                                                                    document.getElementById("kode").disabled = true;
                                                                                }
                                                                            }
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <label for="">Alasan Tidak Layak <small class="form-text text-muted">*jika Tidak Layak</small></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <textarea name="alasan_tolak" class="form-control" id="alasan_tolak" cols="30" rows="4" placeholder="Masukan alasan..."></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <label>Kode Booking <small class="form-text text-muted">*jika Layak</small></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="kode_booking" id="kode" disabled="true" class="form-control form-control-sm" placeholder="Masukan Kode Booking...">
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
                                        <td>
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Pilih <span class="fa fa-caret-down"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo site_url('verifikasi/detail/' . $r->id_tujuan . ''); ?>"><span class="fa fa-book"></span> Detail</a></li>
                                                    <!-- <li><a href="<?php echo site_url('verifikasi/update/' . $r->id_tujuan . ''); ?>"><span class="fa fa-edit"></span> Ubah </a></li> -->
                                                    <?php if ($this->session->role == "super_admin") {
                                                    ?>
                                                        <li><a class="delbtn" href="javascript:;" onclick="<?php echo site_url('tujuan/delete/' . $r->id_verif . ''); ?>"><span class="fa fa-times"></span> Hapus</a></li>
                                                    <?php
                                                    }
                                                    ?>
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