<?php 

    $server = "localhost";
    $username = "root";
    $password = "";
    $dbName = "universitas";

    $conn = mysqli_connect($server , $username , $password , $dbName);

    if(!$conn) {
        die('Database gagal terhubung');
    }

    function query($query) {
        global $conn;


        $result = mysqli_query($conn , $query);
        $rows = [];

        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }

    function add($data) {
        global $conn;

        $npm = $data['npm'];
        $nama = $data['nama'];
        $t1 = $data['t1'];
        $t2 = $data['t2'];
        $t3 = $data['t3'];
        $kuis = $data['kuis'];
        $uts = $data['uts'];
        $uas = $data['uas'];

        $query = "INSERT INTO mahasiswa VALUES( '' ,'$npm' , '$nama' , '$t1' ,'$t2' ,'$t3', '$kuis' , '$uts' , '$uas' )";

        mysqli_query($conn , $query);

        return mysqli_affected_rows($conn);


    }

    function delete($id) {
        global $conn;


        $query = "DELETE FROM mahasiswa WHERE id = $id";
        mysqli_query($conn , $query);

        return mysqli_affected_rows($conn);

    }


    function update($data) {
        global $conn;

        $id = $_GET['id'];
        $npm = $data['npm'];
        $nama = $data['nama'];
        $t1 = $data['t1'];
        $t2 = $data['t2'];
        $t3 = $data['t3'];
        $kuis = $data['kuis'];
        $uts = $data['uts'];
        $uas = $data['uas'];

        $query = "UPDATE mahasiswa SET npm = '$npm' , nama = '$nama' , t1 = '$t1' , t2 = '$t2' ,  t3 = '$t3', kuis = '$kuis' , uts = '$uts' , uas = '$uas' WHERE id = '$id'";

        mysqli_query($conn , $query);

        return mysqli_affected_rows($conn);

    }


?>