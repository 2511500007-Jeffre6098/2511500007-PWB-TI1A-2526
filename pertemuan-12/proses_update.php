<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$cid) {
    $_SESSION['flash_error'] = 'CID Tidak Valid.';
    redirect_ke('edit.php?cid=' . (int)$cid);
}

$nama = bersih($_POST['txtNamaEd'] ?? '');
$email = bersih($_POST['txtEmailEd'] ?? '');
$pesan = bersih($_POST['txtPesanEd'] ?? '');
$bot_verification = bersih($_POST["txtbot_verification"]) ?? "";
$jawaban = $_SESSION["jawaban"] ?? null;


$errors = [];

if ($name === "") {
    $error[] = "Nama wajib diisi.";
} elseif (mb_strlen($name) < 3) {
    $error[] = "Nama minimal 3 karakter.";
} // ooo jadi mb_strlen buat ngitung karakter ya, bukan byte

if ($email === "") {
    $error[] = "Email wajib diisi.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[] = "Format email tidak valid.";
}

if ($pesan === "") {
    $error[] = "Pesan wajib diisi.";
} elseif (mb_strlen($pesan) < 10) {
    $error[] = "Mohon Tulis Pesan minimal 10 karakter.";
} elseif (mb_strlen($pesan) > 200) {
    $error[] = "Mohon Maaf Pesan maksimal 200 karakter.";
}

if ($bot_verification === "") {
    $error[] = "bot_verification wajib diisi.";
} elseif (!is_numeric($bot_verification) || (int)$bot_verification !== (int)$jawaban) {
    $error[] = "Jawaban bot_verification salah.";
}
if (!empty($errors)) {
    $_SESSION['old'] = [
        'nama' => $nama,
        'email' => $email,
        'pesan' => $pesan
    ];
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit.php?cid=' . (int)$cid);
}

$stmt = mysqli_prepare($conn, "UPDATE tbl_tamu
SET cnama = ?, cemail = ?, cpesan = ?
WHERE cid = ?");
if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit.php?cid=' . (int)$cid);
}
mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $cid);
if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('read.php');
} else {
    $_SESSION['old'] = [
        'nama' => $nama,
        'email' => $email,
        'pesan' => $pesan,
    ];
    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit.php?cid=' . (int)$cid);
}
mysqli_stmt_close($stmt);
redirect_ke('edit.php?cid=' . (int)$cid);
