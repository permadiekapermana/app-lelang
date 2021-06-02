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

        <div class="card" style="width: 60rem;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">          
            <h5 class="card-title">Riwayat Saldo</h5>
            <table class='table'>
                <thead>
                    <th>No.</th>
                    <th>Jenis</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Bukti Transfer</th>
                </thead>
                <tbody>
                <?php
                    $qry = "SELECT * FROM riwayat_saldo WHERE id_user='$_SESSION[id_user]' ORDER BY id_riwayatsaldo DESC";
                    $execute = mysqli_query($koneksi,$qry); 
                    $no = 1;
                    while($list = mysqli_fetch_array($execute)){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$list['jenis']?></td>
                        <td><?=$list['nominal']?></td>
                        <td><?=$list['status']?></td>
                        <?php
                            if($list['bukti_transfer']!=NULL) {
                        ?>
                        <td><?=$list['bukti_transfer']?></td>
                        <?php
                            } else {
                        ?>
                        <td>Belum Ada</td>
                        <?php
                            }
                        ?>
                    </tr>  
                    <?php

                    }
                ?>
                </tbody>
            </table>
        </div>
        </div>
            
            
            
        </div>
    </div>

    </div>
</div>