<?php
session_start();

// Menghubungkan php dengan koneksi database
include 'src/koneksi.php';

// Menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

// Query login (diperbaiki menggunakan mysqli_error)
$login = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$password'") 
         or die(mysqli_error($koneksi));

$cek = mysqli_num_rows($login);

// Mengecek apakah username dan password ditemukan pada database
if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    if($data['level'] == "admin"){ 
        // Cek jika user login sebagai admin
        $_SESSION['username'] = $username;
        $_SESSION['level']    = "admin";
        $_SESSION['id_petugas'] = $data['id_petugas'];
        // Alihkan ke halaman dashboard admin
        echo '<script language="javascript">
                alert("Anda berhasil Login Admin!");
                document.location="admin/halaman_admin.php";
              </script>';

    } else if($data['level'] == "petugas"){ 
        // Cek jika user login sebagai petugas
        $_SESSION['username'] = $username;
        $_SESSION['level']    = "petugas";
        $_SESSION['id_petugas'] = $data['id_petugas'];
        // Alihkan ke halaman dashboard petugas
        echo '<script language="javascript">
                alert("Anda berhasil Login Petugas!");
                document.location="petugas/halaman_petugas.php";
              </script>';

    } else {
        header("location:index.php?pesan=gagal");
    }

} else {
    header("location:index.php?pesan=gagal");
}
?>