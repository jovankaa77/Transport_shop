<?php
session_start();
include 'db/db.php';

// Query untuk mengambil data pembelian dan informasi produk
$query = "SELECT pembelian.id, product.nama_produk, product.harga, users.nama_lengkap
          FROM pembelian
          INNER JOIN product ON pembelian.id_product = product.id
          INNER JOIN users ON pembelian.id_users = users.id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Daftar Pembelian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container-order {
            margin: 50px auto;
            width: 80%;
        }
        th, td {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'header.php' ?>
    <div class="container-order">
        <h2>Daftar Pembelian</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Pembelian</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Nama Pengguna</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama_produk']; ?></td>
                        <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['nama_lengkap']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
