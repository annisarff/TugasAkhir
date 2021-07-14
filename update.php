<?php
    include './koneksi.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $hp = $_POST['hp'];
    $tahun_masuk = $_POST['tahun_masuk'];

    mysqli_query($conn, "update data_karyawan set nama='$nama', nik='$nik', hp='$hp', tahun_masuk='$tahun_masuk' where id='$id'");
    header("location:admin.php");
?>