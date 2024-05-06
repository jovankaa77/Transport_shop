<?php
// Include koneksi ke database
include 'db/db.php';

// Pastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan data yang diterima dari form ke dalam variabel
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = 'uploads/' . $gambar;
    move_uploaded_file($gambar_tmp, $gambar_path);

    // Query untuk menyimpan data ke dalam database
    $query = "INSERT INTO product VALUES ('', '$nama_produk', '$harga', '$kategori', '$gambar_path', '$tanggal')";

    // Jalankan query
    if (mysqli_query($conn, $query)) {
        // Jika data berhasil disimpan, redirect ke halaman lain atau tampilkan pesan sukses
        header("Location: admin.php"); // Ganti dengan halaman tujuan setelah data disimpan
        exit();
    } else {
        // Jika terjadi error saat menyimpan data, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
