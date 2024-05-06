<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika session tidak ada atau belum disetel, arahkan kembali ke halaman login
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container-form{
            margin: 30px auto;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h5 {
            text-align: center;
            font-size: 18px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        input[type="date"],
        select
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="8" height="5" viewBox="0 0 8 5"><path fill="%23000" fill-rule="evenodd" d="M4 4.5L0 .5h8z"/></svg>') no-repeat right 10px center/8px 5px;
            padding-right: 30px;
            background-color: #fff;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include 'header.php' ?>

    <div class="container-form">
        <h5>Tambah Data Produk</h5>
            <form action="admin-tambah-data.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="nama_produk">Nama Produk:</label>
                    <input type="text" id="nama_produk" name="nama_produk" required>
                </div>
                <div>
                    <label for="harga">Harga:</label>
                    <input type="number" id="harga" name="harga" required>
                </div>
                <div>
                    <label for="kategori">Kategori:</label>
                    <select id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="motor">Motor</option>
                        <option value="mobil">Mobil</option>
                    </select>
                </div>
                <div>
                    <label for="gambar">Gambar:</label>
                    <input type="file" id="gambar" name="gambar" required>
                </div>
                <div>
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>
                <button type="submit">Tambah Data</button>
            </form>
    </div>
</body>
</html>