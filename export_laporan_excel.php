<?php
include 'conf/conf.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_kegiatan.xls");

echo "<table border='1'>";
echo "<tr><th>No</th><th>Tanggal</th><th>Kegiatan</th></tr>";

$no = 1;
$query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan ORDER BY tanggal DESC");
while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . date('d-m-Y', strtotime($row['tanggal'])) . "</td>";
    echo "<td>" . htmlspecialchars($row['kegiatan']) . "</td>";
    echo "</tr>";
    $no++; // ✅ increment di luar echo
}
echo "</table>";