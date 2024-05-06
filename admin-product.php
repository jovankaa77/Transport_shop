<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Produk</title>
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
    <h2>Daftar Produk</h2>
        <table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Tanggal</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
            // Include koneksi ke database
            include 'db/db.php';

            // Query untuk mengambil data produk dari database
            $query = "SELECT * FROM product";
            $result = mysqli_query($conn, $query);

            // Jika terdapat hasil dari query
            if (mysqli_num_rows($result) > 0) {
                // Loop untuk menampilkan data produk
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nama_produk'] . "</td>";
                    echo "<td>" . $row['harga'] . "</td>";
                    echo "<td>" . $row['kategori'] . "</td>";
                    echo "<td><img src='" . $row['gambar'] . "' alt='Produk Image' style='width: 100px;'></td>";
                    echo "<td>" . $row['tanggal'] . "</td>"; 
                    echo "<td><a href='admin_update_product.php?id=".$row['id'] . "'>Edit</a></td>";
                    echo "<td><a href='admin_delete_product.php?id=".$row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus produk ini?\")'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                // Jika tidak ada data produk
                echo "<tr><td colspan='5'>Tidak ada produk yang tersedia.</td></tr>";
            }

            // Tutup koneksi ke database
            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>
