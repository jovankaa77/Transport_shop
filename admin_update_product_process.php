<?php
// Sertakan file koneksi ke database
include 'db/db.php';

// Periksa apakah parameter id telah dilewatkan melalui POST
if (isset($_POST['id'])) {
    // Tangkap id dari POST
    $id = $_POST['id'];

    // Tangkap data produk dari formulir pembaruan produk
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    // Inisialisasi variabel $gambar
    $gambar = '';

    // Periksa apakah ada file gambar yang diunggah
    if ($_FILES["gambar"]["name"] != '') {
        // Tangkap informasi file gambar yang diunggah
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_path = 'uploads/' . $gambar;

        // Pindahkan file gambar yang diunggah ke lokasi yang ditentukan
        move_uploaded_file($gambar_tmp, $gambar_path);
    } else {
        // Jika tidak ada file gambar yang diunggah, gunakan gambar yang ada sebelumnya
        $query_select_gambar = "SELECT gambar FROM product WHERE id=$id";
        $result = mysqli_query($conn, $query_select_gambar);
        $row = mysqli_fetch_assoc($result);
        $gambar = $row['gambar'];
    }

    // Query untuk memperbarui data produk di database
    $query = "UPDATE product SET nama_produk='$nama_produk', harga='$harga', kategori='$kategori', gambar='$gambar_path', tanggal='$tanggal' WHERE id=$id";

    // Jalankan query untuk memperbarui data produk
    if (mysqli_query($conn, $query)) {
        // Jika pembaruan berhasil, arahkan pengguna kembali ke halaman daftar produk
        header("Location: admin-product.php");
        exit();
    } else {
        // Jika pembaruan gagal, tampilkan pesan kesalahan
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    // Jika parameter id tidak dilewatkan melalui POST, arahkan pengguna kembali ke halaman daftar produk
    header("Location: admin-product.php");
    exit();
}
?>
