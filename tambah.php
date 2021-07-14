<?php
// Include konenksi database
include './koneksi.php';

//menangkap data di kirim dari form
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$hp = $_POST['hp'];
$tahun_masuk = $_POST['tahun_masuk'];

//Menginput data ke database
mysqli_query($conn, "insert into data_karyawan values('','$nama','$nik','$hp', '$tahun_masuk')");
//Mengembalikan ke halaman awal
header("location:./index.php");
