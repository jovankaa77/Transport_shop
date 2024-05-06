<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
include '../db/db.php';

// Inisialisasi objek mPDF
$id_user = $_SESSION['id_user'];
$mpdf = new \Mpdf\Mpdf(['orientation' => 'l', 'format' => 'A4']);

// Query untuk mengambil data dari database
$query = "SELECT pembelian.id, product.nama_produk, product.harga, product.gambar
          FROM pembelian
          INNER JOIN product ON pembelian.id_product = product.id
          WHERE pembelian.id_users = $id_user";
$result = mysqli_query($conn, $query);

// Mulai menambahkan halaman PDF
$mpdf->AddPage();

// Tambahkan konten awal PDF
$mpdf->WriteHTML('
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice Pembelian</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
            img {
                max-width: 100px;
                height: auto;
            }
        </style>
    </head>
    <body>
        <h1>Invoice Pembelian</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
');

$total_harga = 0; // Inisialisasi total harga

// Loop untuk menambahkan data ke tabel dalam PDF
while ($row = mysqli_fetch_assoc($result)) {
    $total_harga += $row['harga']; // Menambahkan harga produk ke total harga
    $mpdf->WriteHTML('
        <tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['nama_produk'] . '</td>
            <td>Rp ' . number_format($row['harga'], 0, ',', '.') . '</td>
        </tr>
    ');
}

// Tambahkan baris total harga ke tabel dalam PDF
$mpdf->WriteHTML('
        <tr>
            <td colspan="2" style="text-align: right;"><strong>Total Harga:</strong></td>
            <td>Rp ' . number_format($total_harga, 0, ',', '.') . '</td>
        </tr>
    </tbody>
</table>
</body>
</html>
');

// Output halaman PDF
$mpdf->Output();
