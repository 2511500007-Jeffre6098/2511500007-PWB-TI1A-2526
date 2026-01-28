
<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_gagal'] = 'Akses tidak valid.';
  redirect_ke('index.php#biodata');
}

#ambil dan bersihkan nilai dari form
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



#Validasi sederhana
$errors = []; #ini array untuk menampung semua error yang ada

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

if (mb_strlen($nama) < 3) {
  $errors[] = 'Nama minimal 3 karakter.';
}



/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors)) {
  $_SESSION['outdated'] = [
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

  $_SESSION['flash_gagal'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO biodata_dosen (kd_dosen, nm_dosen, almt, tgl_dosen, jja_dosen, homebase_prodi, nm_pasangan, nm_anak, bidang_ilmu, No_hp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_gagal'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#biodata');
}
#bind parameter dan eksekusi (s = string)
mysqli_stmt_bind_param($stmt, "ssssssssss", $kodedos, $namados, $alamat, $tglajar, $jja, $prodi, $nohp, $pasangan, $anak, $ilmu);

if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan outdated value, beri pesan sukses
  unset($_SESSION['outdated']);
  $_SESSION['flash_berhasil'] = 'Terima kasih, data Anda sudah tersimpan.';
  redirect_ke('index.php#biodata'); #pola PRG: kembali ke form / halaman home
} else { #jika gagal, simpan kembali outdated value dan tampilkan error umum
  $_SESSION['outdated'] = [
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
  $_SESSION['flash_gagal'] = 'Data gagal disimpan. Silakan coba lagi.';
  redirect_ke('index.php#biodata');
}
#tutup statement
mysqli_stmt_close($stmt);


