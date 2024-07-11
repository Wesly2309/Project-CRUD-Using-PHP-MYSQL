<?php
require 'config.php';

function add($data) {
    global $conn;
    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $t1 = htmlspecialchars($data['t1']);
    $t2 = htmlspecialchars($data['t2']);
    $t3 = htmlspecialchars($data['t3']);
    $kuis = htmlspecialchars($data['kuis']);
    $uts = htmlspecialchars($data['uts']);
    $uas = htmlspecialchars($data['uas']);
    
    $query = "INSERT INTO mahasiswa 
                (npm, nama, t1, t2, t3, kuis, uts, uas) 
              VALUES 
                ('$npm', '$nama', '$t1', '$t2', '$t3', '$kuis', '$uts', '$uas')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

if (isset($_POST['submit'])) {
    if (add($_POST) > 0) {
        echo "<script>
                alert('Mahasiswa berhasil ditambahkan!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Mahasiswa tidak berhasil ditambahkan!');
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
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-50">
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5 text-blue-700">Tambah Data Mahasiswa</h2>
    <form action="" method="post" class="bg-white p-5 rounded shadow">
        <div class="mb-4">
            <label for="npm" class="block">NPM</label>
            <input type="text" id="npm" name="npm" class="border rounded px-4 py-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="nama" class="block">Nama</label>
            <input type="text" id="nama" name="nama" class="border rounded px-4 py-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="t1" class="block">Tugas 1</label>
            <input type="number" id="t1" name="t1" class="border rounded px-4 py-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="t2" class="block">Tugas 2</label>
            <input type="number" id="t2" name="t2" class="border rounded px-4 py-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="t3" class="block">Tugas 3</label>
            <input type="number" id="t3" name="t3" class="border rounded px-4 py-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="kuis" class="block">Kuis</label>
            <input type="number" id="kuis" name="kuis" class="border rounded px-4 py-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="uts" class="block">UTS</label>
            <input type="number" id="uts" name="uts" class="border rounded px-4 py-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="uas" class="block">UAS</label>
            <input type="number" id="uas" name="uas" class="border rounded px-4 py-2 w-full" required>
        </div>
        <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</button>
    </form>
</div>
</body>
</html>
