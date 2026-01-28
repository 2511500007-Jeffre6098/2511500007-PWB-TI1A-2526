<?php
require 'koneksi.php';
require_once 'fungsi.php';


$fieldConfig = [
      "kodedos" => ["label" => "Kode Dosen:", "suffix" => ""],
      "namados" => ["label" => "Nama Dosen:", "suffix" => " &#128526;"],
      "alamat" => ["label" => "Alamat Rumah:", "suffix" => ""],
      "tglajar" => ["label" => "Tanggal Jadi Dosen:", "suffix" => ""],
      "jja" => ["label" => "JJA Dosen:", "suffix" => " &#127926;"],
      "prodi" => ["label" => "Homebase Prodi:", "suffix" => " &hearts;"],
      "nohp" => ["label" => "Nomor HP:", "suffix" => " &copy; 2025"],
      "pasangan" => ["label" => "Nama Pasangan:", "suffix" => ""],
      "anak" => ["label" => "Nama Anak:", "suffix" => ""],
      "ilmu" => ["label" => "Bidang Ilmu Dosen:", "suffix" => ""],
    ];

$sql = "SELECT * FROM biodata_dosen ORDER BY kd_dosen DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
  echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
  echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
  while ($row = mysqli_fetch_assoc($q)) {
    $arrBiodata = [
      "kodedos"  => $row["kd_dosen"]  ?? "",
      "namados" => $row["nm_dosen"] ?? "",
      "alamat" => $row["almt"] ?? "",
      "tglajar" => $row["tgl_dosen"] ?? "",
      "jja" => $row["jja_dosen"] ?? "",
      "prodi" => $row["homebase_prodi"] ?? "",
      "nohp" => $row["No_hp"] ?? "",
      "pasangan" => $row["nm_pasangan"] ?? "",
      "anak" => $row["nm_anak"] ?? "",
      "ilmu" => $row["bidang_ilmu"] ?? "",
    ];
    echo tampilkanBiodata($fieldConfig, $arrBiodata);
  }
}
?>
