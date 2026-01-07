<?php function redirect_ke($url)
{
    header("Location: " . $url);
    exit();
}
?>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION["flash_gagal"] = "Akses tidak valid.";
    redirect_ke("index.php#contact");
}
require_once 'fungsi.php';
$nim = bersih($_POST["txtNim"]) ?? "";
$NmLengkap = bersih($_POST["txtNmLengkap"]) ?? "";
$tempatlhr = bersih($_POST["txtTempatLhr"]) ?? "";
$tanggallhr = bersih($_POST["txtTglLhr"]) ?? "";
$hobi = bersih($_POST["txtHobi"]) ?? "";
$pasangan = bersih($_POST["txtPasangan"]) ?? "";
$pekerjaan = bersih($_POST["txtKerja"]) ?? "";
$ortu = bersih($_POST["txtNmOrtu"]) ?? "";
$kakak = bersih($_POST["txtNmKakak"]) ?? "";
$adik = bersih($_POST["txtNmAdik"]) ?? "";



$error = [];

if ($nim === "") {
    $error[] = "NIM wajib diisi.";
} elseif (mb_strlen($nim) > 10) {
    $error[] = "NIM maksimal 10 karakter.";
}

if ($NmLengkap === "") {
    $error[] = "Nama wajib diisi.";
} elseif (mb_strlen($NmLengkap) < 2) {
    $error[] = "Nama minimal 2 karakter.";
}

if ($tempatlhr === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($tanggallhr === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($hobi === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($pasangan === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($pekerjaan === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($ortu === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($kakak === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($adik === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}


require 'koneksi.php';
if (!empty($error)) {
    $_SESSION["outdated"] = [
        "nim" => $nim,
        "NmLengkap" => $NmLengkap,
        "tempatlhr" => $tempatlhr,
        "tanggallhr" => $tanggallhr,
        "hobi" => $hobi,
        "pasangan" => $pasangan,
        "pekerjaan" => $pekerjaan,
        "ortu" => $ortu,
        "kakak" => $kakak,
        "adik" => $adik

    ];

    $_SESSION["flash_gagal"] = implode("<br>", $error);
    redirect_ke("index.php#contact");
}

$sql = "INSERT INTO `tbl_biomhs` (bnim, bNmLengkap, btmptlhr, btgllhr, bhobi, bpasangan, bpekerjaan, bnmortu, bnmkakak, bnmadik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);


if (!$stmt) {
    $_SESSION["flash_gagal"] = "Terjadi kesalahan pada server (prepare gagal).";
    redirect_ke("index.php#contact");
}

mysqli_stmt_bind_param($stmt, "ssssssssss", $nim, $NmLengkap, $tempatlhr, $tanggallhr, $hobi, $pasangan, $pekerjaan, $ortu, $kakak, $adik);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION["outdated"]);
    $_SESSION["flash_berhasil"] = "Terima kasih, pesan Anda telah tersimpan.";
    redirect_ke("index.php#biodata");
} else {
    $_SESSION["outdated"] =
        [
        "nim" => $nim,
        "NmLengkap" => $NmLengkap,
        "tempatlhr" => $tempatlhr,
        "tanggallhr" => $tanggallhr,
        "hobi" => $hobi,
        "pasangan" => $pasangan,
        "pekerjaan" => $pekerjaan,
        "ortu" => $ortu,
        "kakak" => $kakak,
        "adik" => $adik
        ];
    $_SESSION["flash_gagal"] = "Gagal menyimpan pesan silakan coba lagi.";
    redirect_ke("index.php#contact");
}
mysqli_stmt_close($stmt);



?>