<?php
session_start();

include 'db/db.php';

// Ambil id user dari session
$id_user = $_SESSION['id_user'];

// Query untuk mengambil data pembelian untuk user yang login
$query = "SELECT pembelian.id, product.nama_produk, product.harga, product.gambar
          FROM pembelian
          INNER JOIN product ON pembelian.id_product = product.id
          WHERE pembelian.id_users = $id_user";
$result = mysqli_query($conn, $query);

// Simpan hasil query dalam bentuk array
$pembelian = [];
while ($row = mysqli_fetch_assoc($result)) {
    $pembelian[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container-keranjang {
            margin: 50px auto;
            width:80%;
        }
    </style>
</head>
<body>
    <?php include 'header-user.php'; ?>
    <div class="container-keranjang">
        <h2>Keranjang</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pembelian as $index => $item): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $item['nama_produk']; ?></td>
                        <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                        <td><img src="<?php echo $item['gambar']; ?>" alt="<?php echo $item['nama_produk']; ?>" style="max-width: 100px;"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Tombol Checkout -->
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
    </div>
</body>
</html>
