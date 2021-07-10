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
  if ($_SESSION['role']=='pelelang'  OR $_SESSION['role']=='admin'){
   include "modul/mod_lelang/lelang.php";
 }
}
elseif ($_GET['module']=='lelang-ongoing' && $_GET['method']=='info-bidder'){
  if ($_SESSION['role']=='pelelang'  OR $_SESSION['role']=='admin'){
   include "modul/mod_lelang/info-bidder.php";
 }
}
elseif ($_GET['module']=='lelang-ongoing' && $_GET['method']=='action'){
  if ($_SESSION['role']=='pelelang'  OR $_SESSION['role']=='admin'){
   include "modul/mod_lelang/action.php";
 }
}
elseif ($_GET['module']=='pengiriman' && $_GET['method']==''){
  if ($_SESSION['role']=='pelelang'  OR $_SESSION['role']=='admin'){
   include "modul/mod_pengiriman/pengiriman.php";
 }
}
elseif ($_GET['module']=='pengiriman' && $_GET['method']=='resi'){
  if ($_SESSION['role']=='pelelang' OR $_SESSION['role']=='admin'){
   include "modul/mod_pengiriman/resi.php";
 }
}
elseif ($_GET['module']=='pengiriman-selesai' && $_GET['method']==''){
  if ($_SESSION['role']=='pelelang' OR $_SESSION['role']=='admin'){
   include "modul/mod_pengiriman/pengiriman-selesai.php";
 }
}
elseif ($_GET['module']=='invoice' && $_GET['method']==''){
  if ($_SESSION['role']=='pelelang'){
   include "modul/mod_invoice/cetak_invoice.php";
 }
}
elseif ($_GET['module']=='saldo' && $_GET['method']==''){
  if ($_SESSION['role']=='pelelang' OR $_SESSION['role']=='admin'){
   include "modul/mod_saldo/saldo.php";
 }
}
elseif ($_GET['module']=='saldo' && $_GET['method']=='add'){
  if ($_SESSION['role']=='admin'){
   include "modul/mod_saldo/add.php";
 }
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