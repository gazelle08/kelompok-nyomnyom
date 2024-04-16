<!DOCTYPE html>
<html>
<head>
    <title>Laporan Toko Online</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px pink;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Laporan Toko Online</h2>

<table>
    <thead>
        <tr>
            <th>ID Laporan</th>
            <th>ID Pesanan</th>
            <th>Status Laporan</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Koneksi ke database
        $koneksi = mysqli_connect("localhost", "username", "password", "styleme");

        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }

        // Query untuk mengambil data laporan
        $query = "SELECT id_laporan, id_pesanan, status_laporan, keterangan FROM laporan_pelanggan";
        $result = mysqli_query($koneksi, $query);

        // Tampilkan data dalam tabel
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_laporan'] . "</td>";
            echo "<td>" . $row['id_pesanan'] . "</td>";
            echo "<td>" . $row['status_laporan'] . "</td>";
            echo "<td>" . $row['keterangan'] . "</td>";
            echo "</tr>";
        }

        // Tutup koneksi database
        mysqli_close($koneksi);
        ?>
    </tbody>
</table>

</body>
</html>
