<?php

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function add($data)
{
    global $conn;

    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $t1 = htmlspecialchars($data['t1']);
    $t2 = htmlspecialchars($data['t2']);
    $t3 = htmlspecialchars($data['t3']);
    $kuis = htmlspecialchars($data['kuis']);
    $uts = htmlspecialchars($data['uts']);
    $uas = htmlspecialchars($data['uas']);

    $query = "INSERT INTO mahasiswa (npm, nama, t1, t2, t3, kuis, uts, uas) VALUES('$npm', '$nama', '$t1', '$t2', '$t3', '$kuis', '$uts', '$uas')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;

    $id = htmlspecialchars($id);
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update($data)
{
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

    $query = "UPDATE mahasiswa SET npm = '$npm', nama = '$nama', t1 = '$t1', t2 = '$t2', t3 = '$t3', kuis = '$kuis', uts = '$uts', uas = '$uas' WHERE id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
