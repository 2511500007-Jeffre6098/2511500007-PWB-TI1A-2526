<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM tbl_biomhs ORDER BY bid DESC";
$q = mysqli_query($conn, $sql);
?>

<?php
$flash_berhasil = $_SESSION['flash_berhasil'] ?? '';
$flash_gagal = $_SESSION['flash_gagal'] ?? '';

unset($_SESSION['flash_berhasil'], $_SESSION['flash_gagal']);
?>

<?php if (!empty($flash_berhasil)): ?>

    <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
        <?= $flash_berhasil; ?>
    </div>
<?php endif; ?>
<?php if (!empty($flash_gagal)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
        <?= $flash_gagal; ?>
    </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>NO</th>
        <th>Action</th>
        <th>ID</th>
        <th>NIM</th>
        <th>Nama Lengkap</th>
        <th>Tanggal Lahir</th>
        <th>Tempat Lahir</th>
        <th>Hobi</th>
        <th>Pasangan</th>
        <th>Pekerjaan</th>
        <th>Nama Orang Tua</th>
        <th>Nama Kakak</th>
        <th>Nama Adik</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($q)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><a href="edit_biodata.php?bid=<?= (int)$row['bid']; ?>">Edit</a>
                <a onclick="return confirm('Apakah Anda Benar Ingin Menghapus <?= htmlspecialchars($row['bnmlengkap']); ?>?')" href="bioproses_delete.php?bid=<?= (int)$row['bid']; ?>">Delete</a>
            </td>
            <td><?= $row['bid']; ?></td>
            <td><?= htmlspecialchars($row['bnim']); ?></td>
            <td><?= htmlspecialchars($row['bnmlengkap']); ?></td>
            <td><?= htmlspecialchars($row['btmptlhr']); ?></td>
            <td><?= htmlspecialchars($row['btgllhr']); ?></td>
            <td><?= htmlspecialchars($row['bhobi']); ?></td>
            <td><?= htmlspecialchars($row['bpasangan']); ?></td>
            <td><?= htmlspecialchars($row['bpekerjaan']); ?></td>
            <td><?= htmlspecialchars($row['bnmortu']); ?></td>
            <td><?= htmlspecialchars($row['bnmkakak']); ?></td>
            <td><?= htmlspecialchars($row['bnmadik']); ?></td>
        </tr>

    <?php endwhile; ?>
</table>

<?php
if (!$q) {
    die("Query error: " . mysqli_error($conn));
}
?>