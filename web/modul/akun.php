<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-3">
        <div class="side-box mb-5">
            <h3 class="mb-2">Akun Saya</h3>
            <ul class="list-unstyled auction-categories">
                <?php
                include "sidebar.php";
                ?>
            </ul>
        </div>
        
        </div>
        <div class="col-md-9">
        <div class="row auctions-entry">

        <?php
        $query = "SELECT * FROM users INNER JOIN detail_member ON detail_member.id_user=users.id_user WHERE users.id_user='$_SESSION[id_user]'";
        $execute = mysqli_query($koneksi,$query);

        $data = mysqli_fetch_array($execute);
        ?>

        <div class="card" style="width: 60rem;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">            
            <h5>Saldo : Rp. <?php echo"$data[saldo]"; ?></h5> <a href="?page=topup" class="btn btn-sm btn-primary">Top Up Saldo</a> <a href="modul/withdraw_process.php" class="btn btn-sm btn-secondary">Tarik Saldo</a>
            <h5 class="card-title mt-5"><?php echo"$data[nama]"; ?></h5>
            <table class='table'>
                <tr>
                <th width='20%'>Email</th>
                <td width='1%'>:</td>
                <td><?php echo"$data[email]"; ?></td>
                </tr>
                <tr>
                <th width='20%'>Nomor HP</th>
                <td width='1%'>:</td>
                <td><?php echo"$data[no_hp]"; ?></td>
                </tr>
                <tr>
                <th>Alamat</th>
                <td>:</td>
                <td><?php echo"$data[alamat]"; ?></td>
                </tr>
                <tr>
                <th>Role</th>
                <td>:</td>
                <td><?php echo"$data[role]"; ?></td>
                </tr>
            </table>
            <a href="?page=edit-profil" class="btn btn-sm btn-success">Ubah Profil</a>
        </div>
        </div>
            
            
            
        </div>
    </div>

    </div>
</div>