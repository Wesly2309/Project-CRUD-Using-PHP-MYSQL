<?php 

    require 'config.php';

    $mhs = query("SELECT * FROM mahasiswa");



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Capture Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <a href="create.php" class="btn btn-success btn-md">Tambah Data Mahasiswa</a>
    <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NPM</th>
      <th scope="col">Nama</th>
      <th scope="col">Tugas 1</th>
      <th scope="col">Tugas 2</th>
      <th scope="col">Tugas 3</th>
      <th scope="col">Kuis</th>
      <th scope="col">UTS</th>
      <th scope="col">UAS</th>
      <th scope="col">Final</th>
      <th scope="col">Mark</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($mhs as $item)  : ?>
        <?php 
                $final = ($item['t1'] * 0.10) + ($item['t2'] * 0.05) + ($item['t3'] * 0.05) + ($item['kuis'] * 0.10) + ($item['uts'] * 0.30) + ($item['uas'] * 0.40); 
                $mark = "";
                if ($final >= 85) {
                    $mark = 'A';
                } elseif ($final >= 75) {
                    $mark = 'B';
                } elseif ($final >= 65) {
                    $mark = 'C';
                } else {
                    $mark = 'D';
                }
               ?>
    <tr>
      <th scope="row"><?= $item['id'] ?></th>
      <td><?= $item['npm'] ?></td>
      <td><?= $item['nama'] ?></td>
      <td><?= $item['t1'] ?></td>
      <td><?= $item['t2'] ?></td>
      <td><?= $item['t3'] ?></td>
      <td><?= $item['kuis'] ?></td>
      <td><?= $item['uts'] ?></td>
      <td><?= $item['uas'] ?></td>
      <td><?= $final; ?></td>
      <td><?= $mark; ?></td>
      <td>
          <a href="update.php?id=<?= $item['id'] ?>" class="btn btn-warning btn-md">Edit</a>
          <a href="delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger btn-md">Hapus</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php 
    $average = $final / 20;
?>
<p>Rata - Rata : <?= $average; ?></p>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>