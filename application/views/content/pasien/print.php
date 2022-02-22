<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
</head>


<style>
    table {
        border-collapse: collapse;
    }

    th,
    td {
        text-align: center;
        padding: 8px;
    }

    th {
        background-color: #04AA6D;
        color: white;
    }

    body {
        text-align: center;
    }
</style>


<body>
    <script>
        window.print();
    </script>
    <h2>Data Pasien</h2>
    <table border="1px" class="text-center">
        <thead>
            <tr>
                <th style="width: 5px;">No.</th>
                <th style="width: 20px;">No. RMK</th>
                <th>Jenis Pasien</th>
                <th>No. BPJS</th>
                <th>NIK</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>E-Mail</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $no = 1;
            foreach ($results as $r) {
            ?>
                <tr>
                    <td style="width: 5px;"><?php echo $no; ?></td>
                    <td style="width: 20px;"><?php echo $r->no_rmk; ?></td>
                    <td><?php echo $r->jenis_pasien; ?></td>
                    <td><?php echo $r->no_bpjs; ?></td>
                    <td><?php if ($r->nik != NULL) {
                            echo $r->nik;
                        } else {
                            echo "<b>Belum Teraktivasi</b>";
                        } ?></td>
                    <td><?php echo $r->nama_pasien; ?></td>
                    <td><?php echo $r->jk; ?></td>
                    <td><?php echo $r->tempat_lahir; ?>, <?php echo $r->tanggal_lahir ?></td>
                    <td><?php echo $r->alamat; ?></td>
                    <td><?php echo $r->telepon; ?></td>
                    <td><?php echo $r->email; ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>