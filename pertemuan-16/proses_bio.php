
 

<?php
require 'koneksi.php';
require_once 'fungsi.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION["flash_gagal"] = "Akses tidak valid.";
    redirect_ke("index.php#biodata");
}

$kodedos  = bersihkan($_POST['txtKodeDos']  ?? '');
$namados = bersihkan($_POST['txtNmDosen'] ?? '');
$alamat = bersihkan($_POST['txtAlRmh'] ?? '');
$tglajar = bersihkan($_POST['txtTglDosen'] ?? '');
$jja = bersihkan($_POST['txtJJA'] ?? '');
$prodi = bersihkan($_POST['txtProdi'] ?? '');
$nohp = bersihkan($_POST['txtNoHP'] ?? '');
$pasangan = bersihkan($_POST['txNamaPasangan'] ?? '');
$anak = bersihkan($_POST['txtNmAnak'] ?? '');
$ilmu = bersihkan($_POST['txtBidangIlmu'] ?? '');

$errors = []; 

if ($kodedos === '') {
  $errors[] = 'Kode Dosen mohon diisi.';
}

if ($alamat === '') {
  $errors[] = 'Alamat mohon wajib diisi.';
}

if ($tglajar === '') {
  $errors[] = 'Mohon isi tanggal bertugas.';
}

if ($jja === '') {
  $errors[] = 'JJa kosong mohon diisi.';
}

if ($prodi === '') {
  $errors[] = 'Mohon isi asal prodi.';
}

if ($nohp === '') {
  $errors[] = 'Mohon isi Nomor Hp agar dapat dihubungi.';
}

if ($pasangan === '') {
  $errors[] = 'Mohon isi dengan "-" jika tidak ada.';
}

if ($anak === '') {
  $errors[] = 'Mohon isi dengan "-" jika tidak ada.';
}

if ($ilmu === '') {
  $errors[] = 'Mohon harap untuk diisi.';
}

if (mb_strlen($namados) < 3) {
  $errors[] = 'Nama minimal 3 karakter.';
}

if (!empty($error)) {
    $_SESSION["outdated"] = [
        'kodedos' => $kodedos,
        'namados'  => $namados,
        'alamat' => $alamat,
        'tglajar' => $tglajar,
        'jja' => $jja,
        'prodi' => $prodi,
        'nohp' => $nohp,
        'pasangan' => $pasangan,
        'anak' => $anak,
        'ilmu' => $ilmu
    ];

    $_SESSION["flash_gagal"] = implode("<br>", $error);
    redirect_ke("index.php#biodata");
}

$sql = "INSERT INTO `biodata_dosen` (kd_dosen,	nm_dosen,	almt, tgl_dosen, jja_dosen, homebase_prodi,	nm_pasangan, nm_anak, bidang_ilmu, No_hp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);


if (!$stmt) {
    $_SESSION["flash_gagal"] = "Terjadi kesalahan pada server (prepare gagal).";
    redirect_ke("index.php#biodata");
}

mysqli_stmt_bind_param($stmt, "ssssssssss", $kodedos, $namados, $alamat, $tglajar, $jja, $prodi, $nohp, $pasangan, $anak, $ilmu);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION["outdated"]);
    $_SESSION["flash_berhasil"] = "Terima kasih, pesan Anda telah tersimpan.";
    redirect_ke("index.php#biodata");
} else {
    $_SESSION["outdated"] =
        [
        'kodedos' => $kodedos,
        'namados'  => $namados,
        'alamat' => $alamat,
        'tglajar' => $tglajar,
        'jja' => $jja,
        'prodi' => $prodi,
        'nohp' => $nohp,
        'pasangan' => $pasangan,
        'anak' => $anak,
        'ilmu' => $ilmu
        ];
    $_SESSION["flash_gagal"] = "Gagal menyimpan pesan silakan coba lagi.";
    redirect_ke("index.php#biodata");
}
mysqli_stmt_close($stmt);



?>