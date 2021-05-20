
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Lelang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kandidat</th>
                  <th>Barang</th>
                  <th>Harga Buka</th>
                  <th>Harga Tawar</th>
                  <th>Tanggal Tutup</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $email = $_SESSION['email'];
                    $emailuser = mysqli_query($koneksi,"SELECT id FROM admin WHERE email = '$email'"); 

                    //$data = mysqli_result($emailuser);
                    $useridx = mysqli_fetch_array($emailuser);
                    $userid = $useridx['id'];

                    $qry = "SELECT * FROM barang INNER JOIN t_lelang  ON t_lelang.barang_id = barang.id  WHERE t_lelang.user_id = $userid order BY t_lelang.harga_tawar DESC";
                    $execute = mysqli_query($koneksi,$qry); 
                    $no = 1;
                    while($list = mysqli_fetch_array($execute)){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$list['kandidat']?><br><small><strong><?=$list['nope_kandidat']?></strong></small></td>
                        <td><?=$list['nama_barang']?></td>
                        <td>Rp. <?=number_format($list['harga_buka'])?></td>
                        <td>Rp. <?=number_format($list['harga_tawar'])?></td>
                        <td><?=date('d-m-Y',strtotime($list['tgl_tutup']))?></td>
                        <?php if($list['status'] == 'pending' ){$string = 'danger';} else {$string = 'success';} ?>
                        <td align="center"><span class="label label-<?=$string?>"><?=$list['status']?></span></td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="lelang/act.php?id=<?=$list['id']?>" class="btn btn-sm btn-primary">Pilih</a>
                            </div>
                        </td>
                    </tr>  
                    <?php

                    }
                ?>
                 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>