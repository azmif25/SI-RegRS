<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <title>&#10240;</title>
</head>


<style>
    th,
    td {
        text-align: center;
    }
</style>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col-md-12">
                    <table>
                        <tr>
                            <td width="300px"><img height="80px" width="90px" src="<?php echo base_url('assets/img/logo_mdc.jpg'); ?>" alt=""></td>
                            <td width="600px" height="50px"><b>RUMAH SAKIT</b><br>Prov.Kalimantan Selatan <br>
                                <p style="font-size: 8pt;">*hospital_full_address_here
                                    Banjarmasin,
                                    Kalimantan Selatan,
                                    Indonesia Telpon: *hospital_phone_number Email: *hospital_email_here</p>
                            </td>
                            <td width="300px"><img height="80px" width=110px" src="<?php echo base_url('assets/img/logo_rs.png'); ?>" alt=""></td>
                        </tr>
                    </table>
                </div>
                <hr>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <h4>
                        <b>Data Rujukan Pasien</b>
                    </h4>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 5px;">No.</th>
                        <th style="width: 20px;">No. RMK</th>
                        <th style="width: 20px;">NIK</th>
                        <th>Jenis Pasien</th>
                        <th>No. BPJS</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Tanggal Tujuan</th>
                        <th>Poli Tujuan</th>
                        <!-- <th>Kode Booking</th>
                        <th>Status Verifikasi</th>
                        <th>Alasan Tidak Layak</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    foreach ($recs as $r) {
                    ?>
                        <tr>
                            <td style="width: 5px;"><?php echo $no++; ?></td>
                            <td style="width: 20px;"><?php echo $r->no_rmk; ?></td>
                            <td><?php echo $r->nik; ?></td>
                            <td><?php echo $r->jenis_pasien; ?></td>
                            <td><?php echo $r->no_bpjs; ?></td>
                            <td><?php echo $r->nama_pasien; ?></td>
                            <td><?php echo $r->jk; ?></td>
                            <td><?php echo $r->telepon; ?></td>
                            <td><?php echo $r->tgl_tujuan; ?></td>
                            <td><?php echo $r->nama_poli; ?></td>
                            <!-- <td><?php if ($r->kode_booking == NULL) {
                                            echo "-";
                                        } else {
                                            echo $r->kode_booking;
                                        } ?></td>
                            <td><?php echo $r->status; ?></td>
                            <td><?php if ($r->status == "Tidak Layak") {
                                    echo $r->alasan_tolak;
                                } else {
                                    echo "-";
                                } ?></td> -->
                        </tr>
                    <?php
                    }
                    ?>
                    <script>
                        window.print();
                    </script>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

</html>