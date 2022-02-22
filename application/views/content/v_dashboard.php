      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dasbor
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Dasbor</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class=" content">
          <!-- <?php echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; ?> -->
          <?php
          if ($this->session->role != 'pasien') {
            # code...
          ?>
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h4>INFORMASI</h4>
              </div><!-- /.box-header -->
              <!-- form start -->

              <div class="box-body">
                <div class="row">
                  <div class="col-lg-4 col-4">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #a1ceff;">
                      <div class="inner">
                        <h3><?php $this->db->where('status =', 'Menunggu');
                            $query = $this->db->get('verifikasi_rawat');
                            echo $query->num_rows(); ?></h3>

                        <p>Pasien Belum Verifikasi</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-plus"></i>
                      </div>
                      <a href="verifikasi" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-4 col-4">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #ffcba1;">
                      <div class="inner">
                        <h3><?php $this->db->where('keterangan =', 'Belum Teraktivasi');
                            $query = $this->db->get('aktivasi_pasien');
                            echo $query->num_rows(); ?></h3>

                        <p>Pasien Belum Aktivasi</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-plus"></i>
                      </div>
                      <a href="aktivasi" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-4 col-4">
                    <!-- small card -->
                    <div class="small-box" style="background-color: greenyellow;">
                      <div class="inner">
                        <h3><?php echo $this->db->count_all_results('tujuan_berobat'); ?></h3>

                        <p>Total Registrasi Rujukan</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-users"></i>
                      </div>
                      <a href="tujuan/rrujukan" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div><!-- /.box-body -->

            </div><!-- /.box -->

          <?php
          } else if ($this->session->role == 'pasien') {
            # code...
          ?>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">

            <style>
              p {
                font-family: "Trirong", serif;
                font-size: 18px;
              }
            </style>

            <div class="row">
              <?php
              if (!empty($status) && $status == "Layak") {
              ?>
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                  <div class="box box-solid box-success">
                    <div class="box-header text-center">
                      <b style="font-size: large;">Layak | [<?php echo $no_rmk ?>] <?php echo $nama_pasien ?></b>
                    </div>
                    <div class="box-body text-center" style="background-color: #cfffe7;">
                      <p>
                        Proses verifikasi pendaftaran anda dinyatakan<br>
                        <b>LAYAK</b><br>
                        Silahkan datang ke Rumah Sakit Ulin dan menuju<br>
                        <b><?php echo $nama_poli ?></b><br>
                        Sesuai tujuan dan tanggal layanan yang anda pilih.
                      </p>
                      <p>
                        Bagi pasien BPJS silahkan menuju poli yang dimaksud dan tunjukkan kode booking anda kepetugas poli dan bagi pasien UMUM silahkan datang langsung ke loket UMUM dan tunjukkan kode booking anda.
                      </p>
                      <p>
                        <b>Kode Booking anda adalah : <?php echo $kode_booking ?></b>
                      </p>
                      <p>
                        Jika anda sudah dilayani di Poli dan ingin mendaftar online kembali hari ini untuk pelayanan besok, silahkan lapor ke Loket 2 BPJS agar bisa mendaftar online lagi.
                      </p>

                    </div>
                    <div class="box-footer" style="background-color: #339966;">
                      <?php if (date('Y-m-d') < $tgl_tujuan) { ?>
                        <div class="row">
                          <div class="col-sm-3"><a href="tujuan/praru" class="btn btn-info pull-left">Registrasi Ulang</a></div>
                          <div class="col-sm-6"><b style="color: white;">*Pembatalan / Registrasi Ulang Hanya Bisa dilakukan Sebelum Hari H Pengajuan</b></div>
                          <div class="col-sm-3"><a href="pembatalan" class="btn btn-danger pull-right">Batalkan</a></div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">

                </div>
              <?php
              } elseif (!empty($status) && $status == "Menunggu") {
              ?>
                <div class="col-md-2">
                  <h2></h2>
                </div>
                <div class="col-md-8">
                  <div class="box box-solid box-warning text-center">
                    <div class="box-header">
                      <b style="font-size: large;"><?php echo $status ?> | [<?php echo $no_rmk ?>] <?php echo $nama_pasien ?></b>
                    </div>
                    <div class="box-body" style="background-color: #fff7e6;">
                      <p>
                        Pendaftaran online anda sedang Proses Verifikasi data oleh petugas kami.
                      </p>
                      <p>
                        Proses Verifikasi paling lambat H-1 malam hari silahkan tunggu Notifikasi atau buka kembali halaman ini.
                      </p>
                      <p>
                        <b>
                          Poli Tujuan : <?php echo $nama_poli ?><br>
                          Tanggal Layanan : <?php echo $tgl_tujuan ?>
                        </b>
                      </p>
                    </div>
                    <div class="box-footer" style="background-color: #ffe1c2;">
                      <?php if (date('Y-m-d') < $tgl_tujuan) { ?>
                        <div class="row">
                          <div class="col-sm-3"><a href="tujuan/ubah" class="btn btn-info pull-left">Ubah Jadwal</a></div>
                          <div class="col-sm-6"><b>*Pembatalan / Ubah Jadwal Hanya Bisa dilakukan Sebelum Hari H Pengajuan</b></div>
                          <div class="col-sm-3"><a href="pembatalan" class="btn btn-danger pull-right">Batalkan</a></div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-2"></div>
              <?php
              } elseif (!empty($status) && $status == "Tidak Layak") {
              ?>
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                  <div class="box box-solid box-danger">
                    <div class="box-header text-center">
                      <b style="font-size: large;">Tidak Layak | [<?php echo $no_rmk ?>] <?php echo $nama_pasien ?></b>
                    </div>
                    <div class="box-body text-center" style="background-color: #ffcfcf;">
                      <p>
                        Proses verifikasi pendaftaran anda dinyatakan<br>
                        <b>TIDAK LAYAK</b><br>
                        Untuk melakukan rujukan Anda ke Poli<br>
                        <b><?php echo $nama_poli ?></b>
                      </p>
                      <p>
                        Dikarenakan <?php echo $alasan_tolak ?>
                      </p>
                      <p>
                        Silahkan hubungi pihak Rumah Sakit untuk info lebih lanjut.
                      </p>

                    </div>
                    <div class="box-footer" style="background-color: #cc0000;">

                      <div class="row">
                        <div class="col-sm-3"><a href="tujuan/praru" class="btn btn-info pull-left">Registrasi Ulang</a></div>
                        <div class="col-sm-6"><b style="color: white;">*Pembatalan / Registrasi Ulang Hanya Bisa dilakukan Sebelum Hari H Pengajuan</b></div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-md-2">

                </div>
              <?php
              } else {
              ?>
                <div class="container">
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <div class=" box box-info">
                        <div class="box-header with-border text-center">
                          <h2>SELAMAT DATANG</h2>
                        </div>
                        <div class="box-body text-center">
                          <p>
                            Jika anda belum melakukan registrasi <br>
                            Silahkan registrasi terlebih dahulu dengan menekan tombol dibawah <br>
                            <a href="tujuan" class="btn btn-warning">Registrasi</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-1"></div>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          <?php
          } else {
          ?>
            <div class="box box-info">
              <div class="box-header with-border">
                <h6> SELAMAT DATANG</h6>
              </div>
            </div>
          <?php
          }
          ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->