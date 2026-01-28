<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sql = "SELECT * FROM biodata_dosen ORDER BY kd_dosen DESC";
  $q = mysqli_query($conn, $sql);
  if (!$q) {
    die("Query error: " . mysqli_error($conn));
  }
?>

<?php
  $flash_berhasil = $_SESSION['flash_berhasil'] ?? ''; #jika query sukses
  $flash_gagal  = $_SESSION['flash_gagal'] ?? ''; #jika ada error
  #bersihkan session ini
  unset($_SESSION['flash_berhasil'], $_SESSION['flash_gagal']); 
?>

<?php if (!empty($flash_berhasil)): ?>
        <div style="padding:10px; margin-bottom:10px; 
          background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_berhasil; ?>
        </div>
<?php endif; ?>

<?php if (!empty($flash_gagal)): ?>
        <div style="padding:10px; margin-bottom:10px; 
          background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_gagal; ?>
        </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>KD Dosen</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Tgl Mengajar</th>
    <th>JJA</th>
    <th>HomeBase Prodi</th>
    <th>No HP</th>
    <th>Nama Pasangan</th>
    <th>Nama Anak</th>
    <th>Bidang Ilmu</th>
  </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit_biodosen.php?kd_dosen=<?= (int)$row['kd_dosen']; ?>">Edit</a>
        <a onclick="return confirm('Anda yakin ingin menghapus <?= htmlspecialchars($row['nm_dosen']); ?>?')" href="dosen_proses_delete.php?cid=<?= (int)$row['kd_dosen']; ?>">Delete</a>
      </td>
      <td><?= $row['kd_dosen']; ?></td>
      <td><?= htmlspecialchars($row['nm_dosen']); ?></td>
      <td><?= htmlspecialchars($row['almt']); ?></td>
      <td><?= htmlspecialchars(string: $row['tgl_dosen']); ?></td>
      <td><?= htmlspecialchars($row['jja_dosen']); ?></td>
      <td><?= htmlspecialchars($row['homebase_prodi']); ?></td>
      <td><?= htmlspecialchars($row['No_hp']); ?></td>
      <td><?= htmlspecialchars($row['nm_pasangan']); ?></td>
      <td><?= htmlspecialchars($row['nm_anak']); ?></td>
      <td><?= htmlspecialchars($row['bidang_ilmu']); ?></td>
      
      
    </tr>
  <?php endwhile; ?>
</table>