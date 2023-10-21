<?php

require 'config.php';

$mhs = query('SELECT * FROM mahasiswa');

if (isset($_POST['submit'])) {
    if (add($_POST) > 0) {
        echo "<script>
                alert('Data Mahasiswa berhasil ditambahkan!')
                window.location.href = 'index.php'
            </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa gagal ditambahkan!')
                window.location.href = 'index.php'
            </script>";
    }
}

?>

<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Capture Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h2>Form Mahasiswa
                <a href="index.php" class="btn btn-danger float-end">Back</a>
              </h2>
            </div>
            <div class="card-body">
            <form action="" method="post">

          <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control" id="npm" name="npm">
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="mb-3">
            <label for="t1" class="form-label">Tugas 1</label>
            <input type="text" class="form-control" id="t1" name="t1">
          </div>
          <div class="mb-3">
            <label for="t2" class="form-label">Tugas 2</label>
            <input type="text" class="form-control" id="t2" name="t2">
          </div>
          <div class="mb-3">
            <label for="t3" class="form-label">Tugas 3</label>
            <input type="text" class="form-control" id="t3" name="t3">
          </div>
          <div class="mb-3">
            <label for="kuis" class="form-label">Kuis</label>
            <input type="text" class="form-control" id="kuis" name="kuis">
          </div>
          <div class="mb-3">
            <label for="uts" class="form-label">UTS</label>
            <input type="text" class="form-control" id="uts" name="uts">
          </div>
          <div class="mb-3">
            <label for="uas" class="form-label">UAS</label>
            <input type="text" class="form-control" id="uas" name="uas">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </div>

          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>