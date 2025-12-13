<?php function redirect_ke($url)
{
    header("Location: " . $url);
    exit();
}
?>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION["flash_error"] = "Akses tidak valid.";
    redirect_ke("index.php#contact");
}
require_once 'fungsi.php';
$name = bersih($_POST["txtNama"]) ?? "";
$email = bersih($_POST["txtEmail"]) ?? "";
$pesan = bersih($_POST["txtPesan"]) ?? "";

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
require 'koneksi.php';
if (!empty($error)) {
    $_SESSION["old"] = [
        "nama" => $name,
        "email" => $email,
        "pesan" => $pesan
    ];

    $_SESSION["flash_error"] = implode("<br>", $error);
    redirect_ke("index.php#contact");
}

$sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION["flash_error"] = "Terjadi kesalahan pada server (prepare gagal).";
    redirect_ke("index.php#contact");
}

mysqli_stmt_bind_param($stmt, "sss", $name, $email, $pesan);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION["old"]);
    $_SESSION["flash_sukses"] = "Terima kasih, pesan Anda telah tersimpan.";
    redirect_ke("index.php#contact");
} else {
    $_SESSION["old"] =
        [
            "nama" => $name,
            "email" => $email,
            "pesan" => $pesan
        ];
    $_SESSION["flash_error"] = "Gagal menyimpan pesan silakan coba lagi.";
    redirect_ke("index.php#contact");
}
mysqli_stmt_close($stmt);

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