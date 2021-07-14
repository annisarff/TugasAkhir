<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">Data Karyawan</a>
        </div>
        <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?id"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
    </nav>
    <div class="container data-karyawan mt-5">
        <!---Button trigger modal-->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
            Tambah Data Karyawan
        </button>
        <!-- Modal -->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
            <!--Kita membuat form dengan method post untuk memanggil file tambah.php-->
                <form method="post" action="tambah.php" name="form">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahDataLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <!--Input nama-->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Karyawan" name="nama" required>
                        </div>
                        <!--Input nomor ktp-->
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK" name="nik" required>
                        </div>
                        <!--Input nomor hp-->
                        <div class="mb-3">
                            <label for="hp" class="form-label">Nomor HP</label>
                            <textarea type="text" class="form-control" id="hp" placeholder="Masukkan Nomor HP" name="hp" required></textarea>
                        </div>
                        <!--Input tahun masuk-->
                        <div class="mb-3">
                            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                            <textarea type="text" class="form-control" id="tahun_masuk" placeholder="Tahun Masuk" name="tahun_masuk" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="SIMPAN">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!---Akhir Modal-->
    <table class="table table-striped" id="tabelKaryawan">
        <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">NIK</th>
            <th scope="col">Nomor HP</th>
            <th scope="col">Tahun Masuk</th>
            <th scope="col">Masa Kerja </th>
            <th scope="col">Fungsi </th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'koneksi.php';
            $no = 1;
            $karyawan = mysqli_query($conn, "select * from data_karyawan");

            while ($data = mysqli_fetch_array($karyawan)){

            $masuk = $data['tahun_masuk'];

            $kerja = new DateTime($masuk);
            $now = new DateTime();

            $masa = $now->diff($kerja);

            
        ?>

        <tr>
            <th scope="row"><?php echo $no++; ?></th>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['nik']; ?></td>
            <td><?php echo $data['hp']; ?></td>
            <td><?php echo date('d M Y', strtotime($data['tahun_masuk'])); ?></td>
            <td><?php echo $masa->y."&nbsp"."Tahun"?></td>
            <td>
                <a href="cetak.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm text-white">Cetak</a>
                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm text-white">EDIT</a>
                <a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm ('Anda Yakin Akan Menghapus Data Mahasiswa Ini ?')">HAPUS</a>
            </td>
        </tr>
        <?php
        }
        ?>
        
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>=
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
    <script>
        $(document).ready(function() {
            $('#tabelKaryawan').DataTable();
        } );
    </script>
</body>
</html>

