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
        <li><a href="login.php?id"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
    </nav>

    <?php
  include 'koneksi.php';
  $id = $_GET['id'];
  $data_karyawan = mysqli_query($conn, "select * from data_karyawan where id='$id'");

  while($data = mysqli_fetch_assoc($data_karyawan)){
  ?>
    <div class="container mt-5">
        <p><a href="index.php">Home</a> / Edit Data Karyawan / <?php echo $data['nama'] ?></p>
        <div class="card">
            <div class="card-header">
                <p class="fw-bold">Data Karyawan</p>
            </div>
            <div class="card-body fw-bold">
                <form  method="post" action="update.php"> 
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Karyawan" name="nama" value="<?php echo $data['nama']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK" name="nik" value="<?php echo $data['nik']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="hp" placeholder="Masukkan Nomor HP" name="hp" value="<?php echo $data['hp']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                        <input type="text" class="form-control" id="tahun_masuk" placeholder="MasukkanTahun Masuk" name="tahun_masuk" value="<?php echo $data['tahun_masuk']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" values="SIMPAN">Update</button>
                </form>
            </div>
        </div>
    </div>
  <?php
  }
  ?>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>