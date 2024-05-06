<?php
session_start(); 

include 'db/db.php';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['name'];
    $password = $_POST['password'];

    // Sessionya
    $_SESSION['logged_in'] = true;
    // simpan session ketika login
    $_SESSION['username'] = $username; 

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Password cocok, simpan level pengguna ke sesi
            $_SESSION['level'] = $row['level'];
            $_SESSION['username'] = $username; 
            $_SESSION['id_user'] = $row['id'];
            // Redirect sesuai level pengguna
            if ($_SESSION['level'] == 1) {
                header("Location: admin.php"); // Halaman admin
            } elseif ($_SESSION['level'] == 2) {
                header("Location: login-admin.php"); // Halaman user
            }
            exit();
        } else {
            $error = "Username atau password salah.";
                header("Location: login-admin.php"); 
        }
    } else {
                header("Location: login-admin.php"); 
        $error = "Username atau password salah.";
    }
}
?>