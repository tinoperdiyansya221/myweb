<?php

include "koneksi.php";
if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($konek, "SELECT * FROM tb_user WHERE username='$username'");
    $data = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) >= 1) {
        if (password_verify($password, $data['password'])) {

            session_start();
            $_SESSION['username'] = $data['username'];
            header('location:index.php');
        } else {
            header('location:login.php?pesan=Password Salah');
        }
    } else {
        header('location:login.php?pesan=Username Salah');
    }
}
?>