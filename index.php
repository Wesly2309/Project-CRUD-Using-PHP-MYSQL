<?php
require 'config.php';
$mahasiswa = query('SELECT * FROM mahasiswa');
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Daftar Mahasiswa</h3>
                        <a href="create.php" class="btn btn-primary">Tambah Data Mahasiswa</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
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
                                <?php
                                $average = 0;
$rowNumber = 1;
$totalRecords = count($mahasiswa);
if ($totalRecords > 0) {
    foreach ($mahasiswa as $item) {
        $final = ($item['t1'] * 0.10) + ($item['t2'] * 0.05) + ($item['t3'] * 0.05) + ($item['kuis'] * 0.10) + ($item['uts'] * 0.30) + ($item['uas'] * 0.40);
        $mark = '';
        if ($final >= 85) {
            $mark = 'A';
        } elseif ($final >= 75) {
            $mark = 'B';
        } elseif ($final >= 65) {
            $mark = 'C';
        } else {
            $mark = 'D';
        }
        $average += $final;
        ?>
                                        <tr>
                                            <th scope="row"><?php echo $rowNumber++; ?></th>
                                            <td><?php echo $item['npm']; ?></td>
                                            <td><?php echo $item['nama']; ?></td>
                                            <td><?php echo $item['t1']; ?></td>
                                            <td><?php echo $item['t2']; ?></td>
                                            <td><?php echo $item['t3']; ?></td>
                                            <td><?php echo $item['kuis']; ?></td>
                                            <td><?php echo $item['uts']; ?></td>
                                            <td><?php echo $item['uas']; ?></td>
                                            <td><?php echo $final; ?></td>
                                            <td><?php echo $mark; ?></td>
                                            <td>
                                                <a href="update.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-md">Edit</a>
                                                <a href="delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-md">Delete</a>
                                            </td>
                                        </tr>
                                    <?php }
    $average /= $totalRecords;
}
?>
                            </tbody>
                        </table>
                        <?php
                        if ($totalRecords > 0) {
                            ?>
                        <p>Rata - Rata : <?php echo $average; ?></p>
                        <?php
                        }
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
  </body>
</html>
