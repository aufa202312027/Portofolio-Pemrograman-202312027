<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produk WHERE id_produk=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>
    <form method="post">
        Nama Produk: <input type="text" name="nama_produk" value="<?= $row['nama_produk'] ?>" required><br><br>
        Harga: <input type="number" name="harga" value="<?= $row['harga'] ?>" required><br><br>
        Stok: <input type="number" name="stok" value="<?= $row['stok'] ?>" required><br><br>
        <input type="submit" name="submit" value="Update">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $conn->query("UPDATE produk SET nama_produk='$nama', harga=$harga, stok=$stok WHERE id_produk=$id");
        header("Location: index.php");
    }
    ?>
</body>
</html>
