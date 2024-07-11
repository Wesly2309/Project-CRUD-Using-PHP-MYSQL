<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universitas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function query($query) {
    global $conn;
    $result = $conn->query($query);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function countMahasiswa($search = '') {
    global $conn;
    $query = "SELECT COUNT(*) as count FROM mahasiswa WHERE nama LIKE '%$search%' OR npm LIKE '%$search%'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['count'];
}

function create($data) {
    global $conn;
    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $t1 = htmlspecialchars($data['t1']);
    $t2 = htmlspecialchars($data['t2']);
    $t3 = htmlspecialchars($data['t3']);
    $kuis = htmlspecialchars($data['kuis']);
    $uts = htmlspecialchars($data['uts']);
    $uas = htmlspecialchars($data['uas']);
    
    $query = "INSERT INTO mahasiswa (npm, nama, t1, t2, t3, kuis, uts, uas) VALUES ('$npm', '$nama', '$t1', '$t2', '$t3', '$kuis', '$uts', '$uas')";
    
    $conn->query($query);
    return $conn->affected_rows;
}

function update($data) {
    global $conn;
    $id = htmlspecialchars($data['id']);
    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $t1 = htmlspecialchars($data['t1']);
    $t2 = htmlspecialchars($data['t2']);
    $t3 = htmlspecialchars($data['t3']);
    $kuis = htmlspecialchars($data['kuis']);
    $uts = htmlspecialchars($data['uts']);
    $uas = htmlspecialchars($data['uas']);
    
    $query = "UPDATE mahasiswa SET npm = '$npm', nama = '$nama', t1 = '$t1', t2 = '$t2', t3 = '$t3', kuis = '$kuis', uts = '$uts', uas = '$uas' WHERE id = $id";
    
    $conn->query($query);
    return $conn->affected_rows;
}

function delete($id) {
    global $conn;
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    $conn->query($query);
    return $conn->affected_rows;
}
?>
