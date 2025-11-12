<?php
session_start();

$sesnama = "";
if (isset($_SESSION["sesnama"])):
  $sesnama = $_SESSION["sesnama"];
endif;

$sesemail = "";
if (isset($_SESSION["sesemail"])):
  $sesemail = $_SESSION["sesemail"];
endif;

$sespesan = "";
if (isset($_SESSION["sespesan"])):
  $sespesan = $_SESSION["sespesan"];
endif;

$nim = $nama = $tempatLahir = $tanggalLahir = $hobi = $pasangan = $pekerjaan = $orangtua = $kakak = $adik = "";

if (isset($_SESSION["daftar"])) {
  $nim          = $_SESSION["daftar"]["nim"];
  $nama         = $_SESSION["daftar"]["nama"];
  $tempatLahir  = $_SESSION["daftar"]["tempatLahir"];
  $tanggalLahir = $_SESSION["daftar"]["tanggalLahir"];
  $hobi         = $_SESSION["daftar"]["hobi"];
  $pasangan     = $_SESSION["daftar"]["pasangan"];
  $pekerjaan    = $_SESSION["daftar"]["pekerjaan"];
  $orangtua     = $_SESSION["daftar"]["orangtua"];
  $kakak        = $_SESSION["daftar"]["kakak"];
  $adik         = $_SESSION["daftar"]["adik"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#daftar">Daftar</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="daftar">
      <h2>Pendaftaran Profil Pengunjung</h2>
      <form action="proses_daftar.php" method="POST">

      <label for="txtNIM"><span>NIM anda:</span>
        <input type="txtNIM" id="txtNIM" name="txtNIM" placeholder="Masukkan NIM anda" autocomplete="nim">
      </label>

      <label for="txtLengkap"><span>Nama anda:</span>
        <input type="txtLengkap" id="txtLengkap" name="txtLengkap" placeholder="Masukkan nama lengkap anda" autocomplete="nama">
      </label>

      <label for="txtTempatlahir"><span>Tempat Lahir:</span>
        <input type="txtTempatlahir" id="txtTempatlahir" name="txtTempatlahir" placeholder="Masukkan tempat lahir anda" autocomplete="tempat">
      </label>

      <label for="txtTanggallahir"><span>Tanggal Lahir:</span>
        <input type="txtTanggallahir" id="txtTanggallahir" name="txtTanggallahir" placeholder="Masukkan tanggal lahir anda" autocomplete="lahir">
      </label>

      <label for="txtHobi"><span>Hobi anda:</span>
        <input type="txtHobi" id="txtHobi" name="txtHobi" placeholder="Masukkan hobi anda" autocomplete="hobi">
      </label>

      <label for="txtPasangan"><span>Pasangan Anda:</span>
        <input type="txtPasangan" id="txtPasangan" name="txtPasangan" placeholder="Masukkan nama pasangan anda" autocomplete="pasangan">
      </label>

      <label for="txtPekerjaan"><span>Pekerjaan anda:</span>
        <input type="txtPekerjaan" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan pekerjaan anda" autocomplete="pekerjaan">
      </label>

      <label for="txtOrangtua"><span>Nama Orangtua anda:</span>
        <input type="txtOrangtua" id="txtOrangtua" name="txtOrangtua" placeholder="Masukkan nama orang tua anda" autocomplete="orangtua">
      </label>

      <label for="txtKakak"><span>Nama Kakak anda:</span>
        <input type="txtKakak" id="txtKakak" name="txtKakak" placeholder="Masukkan nama kakak anda" autocomplete="kakak">
      </label>

      <label for="txtAdik"><span>Nama Adik anda:</span>
        <input type="txtAdik" id="txtAdik" name="txtAdik" placeholder="Masukkan nama adik anda" autocomplete="adik">
      </label>
      <br>
      <button type="submit">Kirim</button>
      <button type="reset">Batal</button>
      </form>
    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong><?php echo $nim ?></p>
      <p><strong>Nama Lengkap:</strong><?php echo $nama ?></p>
      <p><strong>Tempat Lahir:</strong><?php echo $tanggalLahir ?></p>
      <p><strong>Tanggal Lahir:</strong><?php echo $tempatLahir ?></p>
      <p><strong>Hobi:</strong><?php echo $hobi ?></p>
      <p><strong>Pasangan:</strong><?php echo $pasangan ?></p>
      <p><strong>Pekerjaan:</strong><?php echo $pekerjaan ?></p>
      <p><strong>Nama Orang Tua:</strong><?php echo $orangtua ?></p>
      <p><strong>Nama Kakak:</strong><?php echo $kakak ?></p>
      <p><strong>Nama Adik:</strong><?php echo $adik ?></p>
    </section>
  
    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses_contact.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="txt" id="txtNama" name="txtNama" placeholder="Masukkan nama"  autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email"  autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <txtarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." ></txtarea>
          <small id="charCount">0/200 karakter</small>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama . $sesemail . $sespesan)): ?>
        <br>
        <hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Jeffrey Deryata [2511500007]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>