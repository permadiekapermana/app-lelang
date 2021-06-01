<div class="site-section">
    <div class="container">
    <div class="row">
        <form action="modul/profil_process.php" method="POST">
        <div class="col-md-9">
        <div class="row auctions-entry">

        <?php
        $query = "SELECT * FROM users INNER JOIN detail_member ON detail_member.id_user=users.id_user WHERE users.id_user='$_SESSION[id_user]'";
        $execute = mysqli_query($koneksi,$query);

        $data = mysqli_fetch_array($execute);
        ?>

        <div class="card" style="width: 60rem;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'");
        $r=mysqli_fetch_array($sql);
        ?>
        <div class="card-body">
        <div class="row">
            <div class="col-md-12 form-group">
            <label for="email">Email</label>
            <input type="text" id="email" value="<?=$r['email']?>" name="email" placeholder="Masukkan Email" class="form-control form-control-lg" disabled>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12 form-group">
            <label for="nama">Nama Lengkap</label>
            <input required type="text" id="nama" name="nama" value="<?=$r['nama']?>" placeholder="Masukkan Nama Lengkap" class="form-control form-control-lg">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
            <label for="no_hp">Nomor HP/WA</label>
            <input required type="text" id="no_hp" name="no_hp" value="<?=$r['no_hp']?>" placeholder="Masukkan Nomor HP/WA" class="form-control form-control-lg">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
            <label for="alamat">Alamat</label>
            <textarea required type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" class="form-control form-control-lg"><?=$r['alamat']?></textarea>
            </div>
        </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
        </div>
            
            
            
        </div>
        </form>
    </div>

    </div>
</div>