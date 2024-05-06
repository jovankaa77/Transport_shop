<?php

include 'db/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['name'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = 2; 

    $enkripsi = password_hash($password, PASSWORD_DEFAULT);
    $result = mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$nama_lengkap', '$email', '$enkripsi', '$level')");

    header("Location: login.php");
    exit();
} else {
    header("Location: register.php");
    exit();
}

?>
