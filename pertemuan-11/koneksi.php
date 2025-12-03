<?php 
$host = "localhost";
$user = "root";
$pass = ""; 
$dbnm = "db_pwd2025";

$conn = mysqli_connect($host, $user, $pass, $dbnm);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>