<?php
function redirect_ke($url)
{
  header("Location: " . $url);
  exit();
}
?>

<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$bid = filter_input(INPUT_GET, 'bid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$bid) {
  $_SESSION['flash_gagal'] = 'Akses tidak valid.';
  redirect_ke('biodata_read.php');
}

$stmt = mysqli_prepare($conn, "SELECT bid, bnim, bnmlengkap, btmptlhr, btgllhr, bhobi, bpasangan, bpekerjaan, bnmortu, bnmkakak, bnmadik 
FROM tbl_biomhs WHERE bid = ? LIMIT 1");
if (!$stmt) {
  $_SESSION['flash_gagal'] = 'Query tidak benar.';
  redirect_ke('biodata_read.php');
}

mysqli_stmt_bind_param($stmt, "i", $bid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);
if (!$row) {
  $_SESSION['flash_gagal'] = 'Record tidak ditemukan.';
  redirect_ke('biodata_read.php');
}

$nim = $row['bnim'] ?? "";
$NmLengkap = $row["bnmlengkap"] ?? "";
$tempatlhr = $row["btmptlhr"] ?? "";
$tanggallhr = $row["btgllhr"] ?? "";
$hobi = $row["bhobi"] ?? "";
$pasangan = $row["bpasangan"] ?? "";
$pekerjaan = $row["bpekerjaan"] ?? "";
$ortu = $row["bnmortu"] ?? "";
$kakak = $row["bnmkakak"] ?? "";
$adik = $row["bnmadik"] ?? "";
$flash_gagal = $_SESSION['flash_gagal'] ?? '';
$outdated = $_SESSION['outdated'] ?? [];
unset($_SESSION['flash_gagal'], $_SESSION['outdated']);

if (!empty($outdated)) {
  $nim = $outdated['nim'] ?? $nim;
  $NmLengkap = $outdated['NmLengkap'] ?? $NmLengkap;
  $tempatlhr = $outdated['tempatlhr'] ?? $tempatlhr;
  $tanggallhr = $outdated['tanggallhr'] ?? $tanggallhr;
  $hobi = $outdated['hobi'] ?? $hobi;
  $pasangan = $outdated['pasangan'] ?? $pasangan;
  $pekerjaan = $outdated['pekerjaan'] ?? $pekerjaan;
  $ortu = $outdated['ortu'] ?? $ortu;
  $kakak = $outdated['kakak'] ?? $kakak;
  $adik = $outdated['adik'] ?? $adik;
}
?>

<?php
$a = rand(1, 9);
$b = rand(1, 9);
$_SESSION["Answer"] = $a + $b;
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation" &#9776;></button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section id="biodata">
      <h2>Edit Biodata</h2>
      <?php if (!empty($flash_gagal)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_gagal; ?>
        </div>
      <?php endif; ?>
      <form action="bioproses_update.php" method="POST">
        <input type="text" name="bid" value="<?= (int)$bid ?>">

        <label for="txtNim"><span>NIM:</span>
          <input type="text" id="txtNim" name="txtNim" placeholder="Masukkan NIM"
            value="<?= !empty($nim) ? $nim : '' ?>">
        </label>

        <label for="txtNmLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNmLengkap" name="txtNmLengkap" placeholder="Masukkan Nama Lengkap"
            value="<?= !empty($NmLengkap) ? $NmLengkap : '' ?>">
        </label>

        <label for="txtTempatLhr"><span>Tempat Lahir:</span>
          <input type="text" id="txtTempatLhr" name="txtTempatLhr" placeholder="Masukkan Tempat Lahir"
            value="<?= !empty($tempatlhr) ? $tempatlhr : '' ?>">
        </label>

        <label for="txtTglLhr"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTglLhr" name="txtTglLhr" placeholder="Masukkan Tanggal Lahir"
            value="<?= !empty($tanggallhr) ? $tanggallhr : '' ?>">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi"
            value="<?= !empty($hobi) ? $hobi : '' ?>">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Pasangan"
            value="<?= !empty($pasangan) ? $pasangan : '' ?>">
        </label>

        <label for="txtKerja"><span>Pekerjaan:</span>
          <input type="text" id="txtKerja" name="txtKerja" placeholder="Masukkan Pekerjaan"
            value="<?= !empty($pekerjaan) ? $pekerjaan : '' ?>">
        </label>

        <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNmOrtu" name="txtNmOrtu" placeholder="Masukkan Nama Orang Tua"
            value="<?= !empty($ortu) ? $ortu : '' ?>">
        </label>

        <label for="txtNmKakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNmKakak" name="txtNmKakak" placeholder="Masukkan Nama Kakak"
            value="<?= !empty($kakak) ? $kakak : '' ?>">
        </label>

        <label for="txtNmAdik"><span>Nama Adik:</span>
          <input type="text" id="txtNmAdik" name="txtNmAdik" placeholder="Masukkan Nama Adik"
            value="<?= !empty($adik) ? $adik : '' ?>">
        </label>
        <label for="txtverification">
          <span>Berapa <?= $a ?> + <?= $b ?> ?</span>
          <input type="number" id="txtverification" name="txtverification" placehoutdateder="Answer">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
        <a href="read.php" class="reset">Kembali</a>
      </form>
    </section>
  </main>
  <script src="script.js"></script>
</body>

</html>