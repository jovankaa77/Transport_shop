<?php include 'header-user.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Display</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container-user{
            margin:50px auto;
            width:80%;
        }
        .product-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .product-card img {
            max-width: 100%;
            height: auto;
        }
        .product-details {
            margin-top: 10px;
        }
        .add-to-cart-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* tambahkan untuk menghilangkan garis bawah pada tombol */
            display: inline-block; /* tambahkan untuk memastikan tombol tidak mengambil seluruh lebar */
        }
        .add-to-cart-btn:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container-user">
        <h2>Product Display</h2>
        <div class="row">
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
            ?>
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_produk']; ?>">
                            <div class="product-details">
                                <h4><?php echo $row['nama_produk']; ?></h4>
                                <p><strong>Kategori:</strong> <?php echo $row['kategori']; ?></p>
                                <p><strong>Harga:</strong> <?php echo $row['harga']; ?></p>
                                <p><strong>Tanggal:</strong> <?php echo $row['tanggal']; ?></p>
                                <!-- Perbaikan: tombol "Add to Cart" di dalam <td> tidak diperlukan -->
                                <a href='add_to_card.php?id=<?php echo $row['id']; ?>' class='add-to-cart-btn'>Add to Cart</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                // Jika tidak ada data produk
                echo "<p>Tidak ada produk yang tersedia.</p>";
            }

            // Tutup koneksi ke database
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
