<li><a href="?page=akun">Profil</a></li>
<li><a href="?page=riwayat-saldo">Riwayat Saldo</a></li>
<?php
$qry = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN barang ON lelang.id_barang=barang.id_barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE lelang.status='terpilih' AND lelang.id_user='$_SESSION[id_user]' AND status_kirim='Menunggu Pengiriman'";
$execute = mysqli_query($koneksi,$qry);
$sum_lelangongoing = mysqli_num_rows($execute);
?>
<li><a href="?page=menang-lelang">Notifikasi Menang Lelang (<?= $sum_lelangongoing ?>)</a></li>
<?php
$qry2 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN barang ON lelang.id_barang=barang.id_barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE lelang.status='terpilih' AND lelang.id_user='$_SESSION[id_user]' AND status_kirim='Dalam Pengiriman'";
$execute2 = mysqli_query($koneksi,$qry2);
$sum_pengiriman = mysqli_num_rows($execute2);
?>
<li><a href="?page=dalam-pengiriman">Barang Dalam Pengiriman (<?=$sum_pengiriman?>)</a></li>
<?php
$qry3 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN barang ON lelang.id_barang=barang.id_barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE lelang.status='terpilih' AND lelang.id_user='$_SESSION[id_user]' AND status_kirim='Selesai'";
$execute3 = mysqli_query($koneksi,$qry3);
$sum_selesai = mysqli_num_rows($execute3);
?>
<li><a href="?page=lelang-selesai">Lelang Selesai (<?=$sum_selesai?>)</a></li>