

<?php
require 'koneksi.php';
require_once 'fungsi.php';

$fieldConfig = [
    "nim" => ["label" => "NIM:", "suffix" => ""],
    "NmLengkap" => ["label" => "Nama Lengkap:", "suffix" => " &#128526;"],
    "tempatlhr" => ["label" => "Tempat Lahir:", "suffix" => ""],
    "tanggallhr" => ["label" => "Tanggal Lahir:", "suffix" => ""],
    "hobi" => ["label" => "Hobi:", "suffix" => ""],
    "pasangan" => ["label" => "Pasangan:", "suffix" => " &hearts;"],
    "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " &copy; 2025"],
    "ortu" => ["label" => "Nama Orang Tua:", "suffix" => ""],
    "kakak" => ["label" => "Nama Kakak:", "suffix" => ""],
    "adik" => ["label" => "Nama Adik:", "suffix" => ""]
];

$sql = "SELECT * FROM tbl_biomhs ORDER BY bid DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrBiodata = [
            "nim" => $row['bnim'] ?? "",
            "NmLengkap" => $row["bnmlengkap"] ?? "",
            "tempatlhr" => $row["btmptlhr"] ?? "",
            "tanggallhr" => $row["btgllhr"] ?? "",
            "hobi" => $row["bhobi"] ?? "",
            "pasangan" => $row["bpasangan"] ?? "",
            "pekerjaan" => $row["bpekerjaan"] ?? "",
            "ortu" => $row["bnmortu"] ?? "",
            "kakak" => $row["bnmkakak"] ?? "",
            "adik" => $row["bnmadik"] ?? "",
        ];
        echo tampilkanBiodata($fieldConfig, $arrBiodata);
    }
}
?>

