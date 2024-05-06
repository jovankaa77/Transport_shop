<?php
include 'db/db.php';
session_start();
// Periksa apakah parameter id telah dilewatkan melalui URL
if (isset($_GET['id'])) {
    // Tangkap id dari URL
    $id_product = $_GET['id'];

    // Misalnya, anggap saja pengguna yang sedang login memiliki ID 1 (harus disesuaikan dengan metode autentikasi Anda)
    $id_user = $_SESSION['id_user'];;

    // Query untuk menambahkan data ke tabel pembelian
    $query = "INSERT INTO pembelian VALUES ('',$id_user, $id_product)";

    // Jalankan query
    if (mysqli_query($conn, $query)) {
        // Jika berhasil, arahkan pengguna kembali ke halaman produk
        header("Location: halaman-user.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    // Jika parameter id tidak dilewatkan melalui URL, arahkan pengguna kembali ke halaman produk
    header("Location: halaman-user.php");
    exit();
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
