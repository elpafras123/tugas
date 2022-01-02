<?php
$c = mysqli_connect("localhost", "root", "", "pkti");

function query($query){
    global $c;

    $hasil = mysqli_query($c, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($hasil)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($new){
    global $c;

    $merk = htmlspecialchars($new['merk']);
    $jumlah = htmlspecialchars($new['jumlah']);
    $distributor = htmlspecialchars($new['distributor']);
    $deadline = date('y-m-d', strtotime($new["deadline"]));

    $query = "INSERT INTO jadwal VALUES ('', '$merk', '$jumlah', '$distributor', '$deadline')";
    mysqli_query($c, $query);
    return mysqli_affected_rows($c);
}

function hapus($id){
    global $c;
    mysqli_query($c, "DELETE FROM jadwal WHERE id = $id");
    return mysqli_affected_rows($c);
}

function update($new){
    global $c;

    $id = $new['id'];
    $merk = htmlspecialchars($new['merk']);
    $jumlah = htmlspecialchars($new['jumlah']);
    $distributor = htmlspecialchars($new['distributor']);
    $deadline = date('y-m-d', strtotime($new["deadline"]));

    $query = "UPDATE jadwal SET merk = '$merk', jumlah = '$jumlah', distributor = '$distributor', deadline = '$deadline' WHERE id = $id";
    mysqli_query($c, $query);
    return mysqli_affected_rows($c);
}

function duplicate($new){
    global $c;

    $id = $_GET['id'];

    $q1 = "INSERT INTO report SELECT * FROM jadwal WHERE id = $id";
    $q2 = "DELETE FROM jadwal WHERE id = $id";
    mysqli_query($c, $q1);
    mysqli_query($c, $q2);
    return mysqli_affected_rows($c);
}

function reg($data){
    global $c;

    $username = strtolower(stripslashes($data['pengguna']));
    $pw = mysqli_real_escape_string($c, $data['password']);
    

   

    mysqli_query($connect, "INSERT INTO akun VALUES('', '$username', '$pw')");
    
    return mysqli_affected_rows($c);
}

?>