<?php
//koneksi database
include 'koneksi.php';

//Menangkap data id yang di kirim dari url karena delete hanya membutuhkan id
$id = $_GET['id'];

//menghapus data dari database
mysqli_query($conn, "delete from data_karyawan where id='$id'");

//mengalihkan halaman kembali ke index.php
header("location:admin.php");
?>