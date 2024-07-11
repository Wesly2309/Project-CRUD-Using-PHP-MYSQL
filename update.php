<?php
require 'config.php';

$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST['submit'])) {
    if (update($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                window.location.href = 'index.php';
            </script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-50">
<div class="container mx-auto mt-10">
    <h2 class="text-3xl font-bold mb-5 text-blue-800">Form Update Data Nilai Mahasiswa</h2>
    <form action="" method="post" class="bg-white p-5 rounded shadow">
        <input type="hidden" name="id" value="<?php echo $mhs['id']; ?>">
        <div class="mb-4">
            <label for="npm" class="block text-blue-800">NPM</label>
            <input type="text" id="npm" name="npm" class="border rounded px-4 py-2 w-full" value="<?php echo $mhs['npm']; ?>" required>
        </div>
        <div class="mb-4">
            <label for="nama" class="block text-blue-800">Nama</label>
            <input type="text" id="nama" name="nama" class="border rounded px-4 py-2 w-full" value="<?php echo $mhs['nama']; ?>" required>
        </div>
        <div class="mb-4">
            <label for="t1" class="block text-blue-800">Tugas 1</label>
            <input type="number" id="t1" name="t1" class="border rounded px-4 py-2 w-full" value="<?php echo $mhs['t1']; ?>" required>
        </div>
        <div class="mb-4">
            <label for="t2" class="block text-blue-800">Tugas 2</label>
            <input type="number" id="t2" name="t2" class="border rounded px-4 py-2 w-full" value="<?php echo $mhs['t2']; ?>" required>
        </div>
        <div class="mb-4">
            <label for="t3" class="block text-blue-800">Tugas 3</label>
            <input type="number" id="t3" name="t3" class="border rounded px-4 py-2 w-full" value="<?php echo $mhs['t3']; ?>" required>
        </div>
        <div class="mb-4">
            <label for="kuis" class="block text-blue-800">Kuis</label>
            <input type="number" id="kuis" name="kuis" class="border rounded px-4 py-2 w-full" value="<?php echo $mhs['kuis']; ?>" required>
        </div>
        <div class="mb-4">
            <label for="uts" class="block text-blue-800">UTS</label>
            <input type="number" id="uts" name="uts" class="border rounded px-4 py-2 w-full" value="<?php echo $mhs['uts']; ?>" required>
        </div>
        <div class="mb-4">
            <label for="uas" class="block text-blue-800">UAS</label>
            <input type="number" id="uas" name="uas" class="border rounded px-4 py-2 w-full" value="<?php echo $mhs['uas']; ?>" required>
        </div>
        <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit</button>
    </form>
</div>
</body>
</html>
