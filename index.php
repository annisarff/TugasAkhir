<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">Data Karyawan</a>
        </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?id">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php?id"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
    </nav>
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
        </tr>
        <?php
        }
        ?>
        
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#tabelKaryawan').DataTable();
        } );
    </script>
</body>
</html>


