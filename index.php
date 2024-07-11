<?php
require 'config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $limit) - $limit : 0;

$total = countMahasiswa($search);
$pages = ceil($total / $limit);

$mahasiswa = query("SELECT * FROM mahasiswa WHERE nama LIKE '%$search%' OR npm LIKE '%$search%' LIMIT $start, $limit");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
</head>
<body class="bg-blue-50">
<div class="container mx-auto mt-10">
    <h2 class="text-3xl font-bold mb-5 text-blue-800 text-center">MANAGEMEN DATA NILAI MAHASISWA</h2>
    <div class="flex justify-between mb-5">
        <a href="create.php" class="bg-green-600 text-white px-4 py-2 rounded">Add Data</a>
    </div>
    <table id="dataTable" class="table-auto w-full bg-white rounded shadow">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">NPM</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Tugas 1</th>
                <th class="px-4 py-2">Tugas 2</th>
                <th class="px-4 py-2">Tugas 3</th>
                <th class="px-4 py-2">Kuis</th>
                <th class="px-4 py-2">UTS</th>
                <th class="px-4 py-2">UAS</th>
                <th class="px-4 py-2">Final</th>
                <th class="px-4 py-2">Mark</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($mahasiswa) > 0) : ?>
                <?php foreach ($mahasiswa as $index => $mhs) : ?>
                    <?php
                        $final = ($mhs['t1'] * 0.10) + ($mhs['t2'] * 0.05) + ($mhs['t3'] * 0.05) + ($mhs['kuis'] * 0.10) + ($mhs['uts'] * 0.30) + ($mhs['uas'] * 0.40);
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
                    ?>
                    <tr class="border-t">
                        <td class="border px-4 py-2 text-center"><?php echo $start + $index + 1; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $mhs['npm']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $mhs['nama']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $mhs['t1']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $mhs['t2']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $mhs['t3']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $mhs['kuis']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $mhs['uts']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $mhs['uas']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo number_format($final, 2); ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $mark; ?></td>
                        <td class="border px-4 py-2 text-center"> 
                            <a href="update.php?id=<?php echo $mhs['id']; ?>" class="bg-yellow-500 text-white px-4 py-2 rounded inline-flex items-center justify-center"><i class="fas fa-edit"></i></a>
                            <a href="delete.php?id=<?php echo $mhs['id']; ?>" class="bg-red-500 text-white px-4 py-2 rounded inline-flex items-center justify-center" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="12" class="border px-4 py-2 text-center">No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="mt-5">
        <?php for ($i = 1; $i <= $pages; $i++) : ?>
            <a href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>" class="px-3 py-2 bg-blue-600 text-white rounded <?php if($i == $page) echo 'bg-blue-800'; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });
    });
</script>
</body>
</html>
