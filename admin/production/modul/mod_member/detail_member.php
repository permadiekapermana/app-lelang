<?php
$post = "modul/mod_admin/action.php?act=update";

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id_user = '$id'";
$execute = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($execute);
$query2 = "SELECT * FROM rekening WHERE id_user = '$id'";
$execute2 = mysqli_query($koneksi,$query2);
$data2 = mysqli_fetch_array($execute2);
?>
<div class="card card-info">
<div class="card-header">
    <h3 class="card-title">Info Data Member</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
<div class="card-body">
    <h3>A. Data Pribadi</h3>
    <table class='table table-striped'>
        <tr>
            <th width="20%">Nama</th>
            <td width="1%">:</td>
            <td><?= $data['nama'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td>:</td>
            <td><?= $data['email'] ?></td>
        </tr>
        <tr>
            <th>Nomor HP</th>
            <td>:</td>
            <td><?= $data['no_hp'] ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>:</td>
            <td><?= $data['alamat'] ?></td>
        </tr>
    </table>
    <h3 class="mt-3">B. Data Rekening</h3>
    <table class='table table-striped'>
        <tr>
            <th width="20%">Bank</th>
            <td width="1%">:</td>
            <td><?= $data2['bank'] ?></td>
        </tr>
        <tr>
            <th>Nomor Rekening</th>
            <td>:</td>
            <td><?= $data2['norek'] ?></td>
        </tr>
    </table>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button class='btn btn-secondary' type='button' onclick=self.history.back()>Kembali</button>
</div>
</div>
<!-- /.card-body -->
</div>