<?php function redirect_ke($url) {
    header("Location: " . $url);
    exit();
}
?>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION["error_txt"] = "Akses tidak valid.";
    redirect_ke("index.php#contact");
}

    $name = bersihkan($_POST["txtNama"]) ?? "";
    $email = bersihkan($_POST["txtEmail"]) ?? "";
    $pesan = bersihkan($_POST["txtPesan"]) ?? "";

    $error = [];

    if ($name === "") {
        $error[] = "Nama wajib diisi.";
    } 

    if ($email === "") {
        $error[] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    if ($pesan === "") {
        $error[] = "Pesan wajib diisi.";
    }

    if (!empty($error)) {
        $_SESSION["old"] = [
            "nama" => $name,
            "email" => $email,
            "pesan" => $pesan
        ];

        $_SESSION["error_txt"] = implode("<br>", $error);
        redirect_ke("index.php#contact");
    }

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