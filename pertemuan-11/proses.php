<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION["error_txt"] = "Akses tidak valid.";
    redirect_ke("index.php#contact");
}

    $name = ($_POST["txtNama"]) ?? "";
    $email = ($_POST["txtEmail"]) ?? "";
    $pesan = ($_POST["txtPesan"]) ?? ""


$arrBiodata = [ 
"nim" => $_POST["txtNim"] ?? "", 
"nama" => $_POST["txtNmLengkap"] ?? "", 
"tempat" => $_POST["txtT4Lhr"] ?? "", 
"tanggal" => $_POST["txtTglLhr"] ?? "", 
"hobi" => $_POST["txtHobi"] ?? "", 
"pasangan" => $_POST["txtPasangan"] ?? "",
"pekerjaan" => $_POST["txtKerja"] ?? "",
"ortu" => $_POST["txtNmOrtu"] ?? "", 
"kakak" => $_POST["txtNmKakak"] ?? "", 
"adik" => $_POST["txtNmAdik"] ?? "" 
]; 

$_SESSION["biodata"] = $arrBiodata; 
header("location: index.php#contact"); 

?>