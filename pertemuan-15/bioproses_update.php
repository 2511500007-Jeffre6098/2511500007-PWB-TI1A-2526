<?php function redirect_ke($url)
{
    header("Location: " . $url);
    exit();
}
?>

<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_gagal'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

$bid = filter_input(INPUT_POST, 'bid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$bid) {
    $_SESSION['flash_gagal'] = 'bid Tidak Valid.';
    redirect_ke('edit.php?bid=' . (int)$bid);
}

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

if (!empty($error)) {
    $_SESSION['outdated'] = [
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
    $_SESSION['flash_gagal'] = implode('<br>', $error);
    redirect_ke('edit.php?bid=' . (int)$bid);
}

$stmt = mysqli_prepare($conn, "UPDATE tbl_biomhs
SET bnim = ?, bnmlengkap = ?, btmptlhr = ?, btgllhr = ?, bhobi = ?, bpasangan =?, bpekerjaan = ?, bnmortu = ?, bnmkakak = ?, bnmadik = ?
WHERE bid = ?");
if (!$stmt) {
    $_SESSION['flash_gagal'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_biodata.php?bid=' . (int)$bid);
}
mysqli_stmt_bind_param($stmt, "ssssssssssi", $nim, $NmLengkap, $tempatlhr, $tanggallhr, $hobi, $pasangan, $pekerjaan, $ortu, $kakak, $adik, $bid);
if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_berhasil'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('biodata_read.php');
} else {
    $_SESSION['outdated'] = [
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
    $_SESSION['flash_gagal'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit.php?bid=' . (int)$bid);
}
mysqli_stmt_close($stmt);
redirect_ke('edit.php?bid=' . (int)$bid);
