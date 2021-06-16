<ul class="main-categories">
    <li class="main-nav-list"><a href="menu.php?page=profil">Profil</a>
    </li>
    <li class="main-nav-list"><a href="menu.php?page=riwayat-saldo">Riwayat Saldo</a>
    </li>
    <?php
        $qry = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN barang ON lelang.id_barang=barang.id_barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE lelang.status='terpilih' AND lelang.id_user='$_SESSION[id_user]' AND status_kirim='Menunggu Pengiriman'";
        $execute = mysqli_query($koneksi,$qry);
        $sum_lelangongoing = mysqli_num_rows($execute);
    ?>
    <li class="main-nav-list"><a href="menu.php?page=menang-lelang"><span
                class="lnr lnr-arrow-right"></span>Notifikasi Menang Lelang<span class="number">(<?= $sum_lelangongoing ?>)</span></a>
    </li>
    <?php
        $qry2 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN barang ON lelang.id_barang=barang.id_barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE lelang.status='terpilih' AND lelang.id_user='$_SESSION[id_user]' AND status_kirim='Dalam Pengiriman'";
        $execute2 = mysqli_query($koneksi,$qry2);
        $sum_pengiriman = mysqli_num_rows($execute2);
    ?>
    <li class="main-nav-list"><a href="menu.php?page=dalam-pengiriman"><span
                class="lnr lnr-arrow-right"></span>Barang Dalam Pengiriman<span class="number">(<?=$sum_pengiriman?>)</span></a>
    </li>
    <?php
        $qry3 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN barang ON lelang.id_barang=barang.id_barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE lelang.status='terpilih' AND lelang.id_user='$_SESSION[id_user]' AND status_kirim='Selesai'";
        $execute3 = mysqli_query($koneksi,$qry3);
        $sum_selesai = mysqli_num_rows($execute3);
    ?>
    <li class="main-nav-list"><a href="menu.php?page=lelang-selesai"><span
                class="lnr lnr-arrow-right"></span>Lelang Selesai<span class="number">(<?=$sum_selesai?>)</span></a>
    </li>
</ul>