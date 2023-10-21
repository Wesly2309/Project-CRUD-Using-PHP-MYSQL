<?php
require 'config.php';

$id = $_GET['id'];

if (delete($id) > 0) {
    echo "<script>
        alert('Data Mahasiswa berhasil dihapus');
        window.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Data Mahasiswa gagal dihapus');
        window.location.href = 'admin.php';
    </script>";
}

// Define the delete function
function delete($id)
{
    global $conn;

    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
