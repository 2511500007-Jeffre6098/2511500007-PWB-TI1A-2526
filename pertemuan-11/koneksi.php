<?php 
$host = "localhost";
$user = "root";
$pass = ""; 
$db = "db_pwd2025";

$conn = mysqli_connect(hostname: $host, username: $user, password: $pass, database: $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SHOW TABLES");
while ($row = mysqli_fetch_array($result)) {
    echo $row[0] . "<br>";
}

?>

