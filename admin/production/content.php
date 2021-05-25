<?php

if ($_GET['module']=='dashboard'){
    include "modul/mod_dashboard/dashboard.php";
}
elseif ($_GET['module']=='admin'  && $_GET['method']==''){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_admin/admin.php";
 }
}
elseif ($_GET['module']=='admin' && $_GET['method']=='add'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_admin/add.php";
 }
}
elseif ($_GET['module']=='admin' && $_GET['method']=='edit'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_admin/edit.php";
 }
}
elseif ($_GET['module']=='pelelang'  && $_GET['method']==''){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_pelelang/pelelang.php";
 }
}
elseif ($_GET['module']=='pelelang'  && $_GET['method']=='detail'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_pelelang/detail_pelelang.php";
 }
}
elseif ($_GET['module']=='member'  && $_GET['method']==''){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_member/member.php";
 }
}
elseif ($_GET['module']=='member'  && $_GET['method']=='detail'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_member/detail_member.php";
 }
}
elseif ($_GET['module']=='kategori'  && $_GET['method']==''){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_kategori/kategori.php";
 }
}
elseif ($_GET['module']=='kategori' && $_GET['method']=='add'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_kategori/add.php";
 }
}
elseif ($_GET['module']=='kategori' && $_GET['method']=='edit'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_kategori/edit.php";
 }
}
elseif ($_GET['module']=='barang'  && $_GET['method']==''){
  if ($_SESSION['role']=='pelelang'){
   include "modul/mod_barang/barang.php";
 }
}
elseif ($_GET['module']=='barang' && $_GET['method']=='add'){
  if ($_SESSION['role']=='pelelang'){
   include "modul/mod_barang/add.php";
 }
}
elseif ($_GET['module']=='barang' && $_GET['method']=='edit'){
  if ($_SESSION['role']=='pelelang'){
   include "modul/mod_barang/edit.php";
 }
}
elseif ($_GET['module']=='lelang-ongoing' && $_GET['method']==''){
  if ($_SESSION['role']=='pelelang'){
   include "modul/mod_lelang/lelang.php";
 }
}
elseif ($_GET['module']=='lelang-ongoing' && $_GET['method']=='info-bidder'){
  if ($_SESSION['role']=='pelelang'){
   include "modul/mod_lelang/info-bidder.php";
 }
}
elseif ($_GET['module']=='lelang-ongoing' && $_GET['method']=='action'){
  if ($_SESSION['role']=='pelelang'){
   include "modul/mod_lelang/action.php";
 }
}


elseif ($_GET['module']=='pembeli'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_pembeli/pembeli.php";
 }
}
elseif ($_GET['module']=='penjual'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_penjual/penjual.php";
 }
}
elseif ($_GET['module']=='kategori'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_kategori/kategori.php";
 }
}
elseif ($_GET['module']=='kota'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_kota/kota.php";
 }
}
elseif ($_GET['module']=='data_produk'){
  if ($_SESSION['role']=='Penjual' OR $_SESSION['role']=='Pembeli'){
   include "modul/mod_produk/produk.php";
 }
}
elseif ($_GET['module']=='cart'){
  if ($_SESSION['role']=='Pembeli'){
   include "modul/mod_cart/cart.php";
 }
}
elseif ($_GET['module']=='checkout'){
  if ($_SESSION['role']=='Pembeli'){
   include "modul/mod_cart/checkout.php";
 }
}
elseif ($_GET['module']=='pembayaran'){
  if ($_SESSION['role']=='Pembeli' OR $_SESSION['role']=='admin'){
   include "modul/mod_transaksi/pembayaran.php";
 }
}
elseif ($_GET['module']=='konfirmasi_pembayaran'){
  if ($_SESSION['role']=='Pembeli' OR $_SESSION['role']=='admin'){
   include "modul/mod_transaksi/konfirmasi_pembayaran.php";
 }
}
elseif ($_GET['module']=='pesanan'){
  if ($_SESSION['role']=='Penjual'){
   include "modul/mod_transaksi/pesanan.php";
 }
}
elseif ($_GET['module']=='pengiriman'){
  if ($_SESSION['role']=='Penjual' OR $_SESSION['role']=='Pembeli' OR $_SESSION['role']=='admin'){
   include "modul/mod_transaksi/pengiriman.php";
 }
}
elseif ($_GET['module']=='komplain'){
  if ($_SESSION['role']=='Pembeli' OR $_SESSION['role']=='admin' OR $_SESSION['role']=='Penjual'){
   include "modul/mod_transaksi/komplain.php";
 }
}
elseif ($_GET['module']=='history'){
  if ($_SESSION['role']=='Penjual' OR $_SESSION['role']=='Pembeli' OR $_SESSION['role']=='admin'){
   include "modul/mod_transaksi/history.php";
 }
}
elseif ($_GET['module']=='history_komplain'){
  if ($_SESSION['role']=='Pembeli' OR $_SESSION['role']=='admin'  OR $_SESSION['role']=='Penjual'){
   include "modul/mod_transaksi/history-komplain.php";
 }
}
elseif ($_GET['module']=='barang-view'){
   include "modul/mod_produk_view/barang-view2.php";
 
}
elseif ($_GET['module']=='detail'){
  include "modul/mod_detail/detail.php";

}
elseif ($_GET['module']=='thanks'){
  include "modul/mod_cart/thanks.php";

}



// Modul Profile
elseif ($_GET['module']=='profile'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='Juri' OR $_SESSION[leveluser]=='Peserta' OR $_SESSION[leveluser]=='Visitor'){
    include "modul/mod_profile/profile.php";
  }
}
// Modul Password
elseif ($_GET['module']=='password'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='Juri' OR $_SESSION[leveluser]=='Peserta' OR $_SESSION[leveluser]=='Visitor'){
    include "modul/mod_password/password.php";
  }
}

else{
  echo "<p><b>MODUL Tidak DITEMUKAN</b></p>";
}

?>