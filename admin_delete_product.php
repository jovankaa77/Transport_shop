<?php
// Include koneksi ke database
include 'db/db.php';

// Periksa apakah parameter id_produk telah dikirim melalui URL
if (isset($_GET['id'])) {
    // Escape string untuk mencegah SQL injection
    $id_produk = mysqli_real_escape_string($conn, $_GET['id']);

    // Query untuk menghapus produk dari database berdasarkan id_produk
    $query = "DELETE FROM product WHERE id = '$id_produk'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman daftar produk
        header("Location: admin-product.php");
        exit();
    } else {
        // Jika penghapusan gagal, tampilkan pesan kesalahan
        echo "Error deleting product: " . mysqli_error($conn);
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
