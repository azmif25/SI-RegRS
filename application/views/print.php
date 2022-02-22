<html>

<head>
    <title>Cetak PDF</title>
</head>

<body>
    <h1 style="text-align: center;">Data Siswa</h1>
    <?php echo "Tanggal : " . date('d-m-Y'); ?>
    <br><br>
    <table border="1" width="100%">
        <tr>
            <th>No</th>
            <th>Nama Poli</th>
        </tr>
        <?php
        if (!empty($siswa)) {
            $no = 1;
            foreach ($siswa as $data) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $data->nama_poli . "</td>";
                echo "</tr>";
                $no++;
            }
        }
        ?>
    </table>
</body>

</html>