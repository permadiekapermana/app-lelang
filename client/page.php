<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/fungsi_rupiah.php";
              
                   
 echo"  ";     
if ($_GET['page']=='dashboard'){  
    include "page/page_dashboard/dashboard.php";  
}
elseif ($_GET['page']=='login'){  
  include "page/page_login/login.php";  
}
elseif ($_GET['page']=='register'){  
  include "page/page_login/register.php";  
}
elseif ($_GET['page']=='edit-profil'){  
  include "page/page_login/edit-profil.php";  
}
elseif ($_GET['page']=='profil'){  
  include "page/page_profil/profil.php";  
}
elseif ($_GET['page']=='barang'){  
  include "page/page_barang/barang.php";  
}
elseif ($_GET['page']=='item'){  
  include "page/page_barang/item.php";  
}
elseif ($_GET['page']=='riwayat'){  
  include "page/page_riwayat/riwayat.php";  
}
elseif ($_GET['page']=='riwayat_user'){  
  include "page/page_riwayat/riwayat_user.php";  
}
elseif ($_GET['page']=='riwayat-saldo'){  
  include "page/page_profil/riwayat-saldo.php";  
}
elseif ($_GET['page']=='menang-lelang'){  
  include "page/page_profil/menang-lelang.php";  
}
elseif ($_GET['page']=='menang-lelang'){  
  include "page/page_profil/menang-lelang.php";  
}
elseif ($_GET['page']=='dalam-pengiriman'){  
  include "page/page_profil/dalam-pengiriman.php";  
}
elseif ($_GET['page']=='lelang-selesai'){  
  include "page/page_profil/lelang-selesai.php";  
}
 elseif ($_GET['page']=='topup-saldo'){  
  include "page/page_profil/topup-saldo.php";  
}
elseif ($_GET['page']=='bayar'){  
  include "page/page_profil/bayar.php";  
}
else{
  echo "<p><b>Halaman Tidak DITEMUKAN</b></p>";
}		
echo"";
?>   
