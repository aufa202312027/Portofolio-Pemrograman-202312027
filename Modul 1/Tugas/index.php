<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
</head>
<body>
    <h2>Daftar Produk</h2>
    <a href="tambah.php">+ Tambah Produk Baru</a><br><br>

    <tableborder="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th><th>Nama Produk</th><th>Harga</th><th>Stok</th><th>Aksi</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM produk");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_produk']}</td>
                        <td>{$row['nama_produk']}</td>
                        <td>Rp " . number_format($row['harga']) . "</td>
                        <td>{$row['stok']}</td>
                        <td>
                            <a href='edit.php?id={$row['id_produk']}'>Edit</a> | 
                            <a href='hapus.php?id={$row['id_produk']}' onclick='return confirm(\"Yakin hapus data ini?\")'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>
