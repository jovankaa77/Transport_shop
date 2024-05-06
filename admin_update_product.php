<?php
// Sertakan file koneksi ke database
include 'db/db.php';

// Periksa apakah parameter id telah dilewatkan melalui URL
if (isset($_GET['id'])) {
    // Tangkap id dari URL
    $id = $_GET['id'];

    // Query untuk mengambil data produk berdasarkan id
    $query = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Periksa apakah data produk ditemukan
    if (mysqli_num_rows($result) == 1) {
        // Ambil data produk
        $row = mysqli_fetch_assoc($result);

        // Variabel untuk menyimpan nilai-nilai data produk
        $nama_produk = $row['nama_produk'];
        $harga = $row['harga'];
        $kategori = $row['kategori'];
        $gambar = $row['gambar'];
        $tanggal = $row['tanggal'];
    } else {
        // Jika data produk tidak ditemukan, arahkan pengguna kembali ke halaman daftar produk
        header("Location: admin.php");
        exit();
    }
} else {
    // Jika parameter id tidak dilewatkan melalui URL, arahkan pengguna kembali ke halaman daftar produk
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Produk</title>
    <link rel="stylesheet" href="style.css">
     <style>
        .table-container{
            width:80%;
            margin: 50px auto;
        }
        table{
            width: 100%;
        }
    </style>
</head>
<body>
    
    <?php include 'header.php'; ?>
    <div class="table-container">
    <h2>Update Produk</h2>
    <div class="form-container">
    <form action="admin_update_product_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="nama_produk">Nama Produk:</label>
            <input type="text" id="nama_produk" name="nama_produk" value="<?php echo $nama_produk; ?>">
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="text" id="harga" name="harga" value="<?php echo $harga; ?>">
        </div>
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <select id="kategori" name="kategori">
                <option value="mobil" <?php if ($kategori == 'mobil') echo 'selected'; ?>>Mobil</option>
                <option value="motor" <?php if ($kategori == 'motor') echo 'selected'; ?>>Motor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>">
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>

</div>
</body>
</html>
