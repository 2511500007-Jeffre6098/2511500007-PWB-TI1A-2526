<?php
session_start();

$nim          = $_POST["txtNIM"] ?? '';
$nama         = $_POST["txtLengkap"] ?? ''; 
$tempatLahir  = $_POST["txtTempatlahir"] ?? '';
$tanggalLahir = $_POST["txtTanggallahir"] ?? '';
$hobi         = $_POST["txtHobi"] ?? '';
$pasangan     = $_POST["txtPasangan"] ?? '';
$pekerjaan    = $_POST["txtPekerjaan"] ?? '';
$orangtua     = $_POST["txtOrangtua"] ?? '';
$kakak        = $_POST["txtKakak"] ?? '';
$adik         = $_POST["txtAdik"] ?? '';

$_SESSION["daftar"] = [
  "nim" => $nim,
  "nama" => $nama,
  "tempatLahir" => $tempatLahir,
  "tanggalLahir" => $tanggalLahir,
  "hobi" => $hobi,
  "pasangan" => $pasangan,
  "pekerjaan" => $pekerjaan,
  "orangtua" => $orangtua,
  "kakak" => $kakak,
  "adik" => $adik
];

header("Location: index.php#about");
exit;
?>
