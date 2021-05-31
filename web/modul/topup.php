<div class="site-section">
<div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-5">
        <h2 class="mb-5 text-black"><strong>Log In</strong></h2>
        <form method="POST" action="modul/login_process.php">
        <div class="row">
            <div class="col-md-12 form-group">
            <label for="useremail">Email</label>
            <input required type="email" id="useremail" placeholder="Masukkan Email" name="useremail" class="form-control form-control-lg">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
            <label for="passlogin">Password</label>
            <input required type="password" id="passlogin" placeholder="Masukkan Password" name="password" class="form-control form-control-lg">
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
            <input type="submit" name="login" value="Login" class="btn btn-primary btn-lg px-5">
            </div>
        </div>
        </form>
    </div>
    <div class="col-lg-5">
        <h2 class="mb-5 text-black"><strong>Registrasi</strong></h2>

        <h5 class="mb-1 text-black"><strong>Data Pribadi</strong></h5>

        <form method="POST" action="modul/register_process.php">
        <div class="row">
            <div class="col-md-12 form-group">
            <label for="name">Nama Lengkap</label>
            <input required type="text" id="name" name="name" placeholder="Masukkan Nama Lengkap" class="form-control form-control-lg">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
            <label for="hp">Nomor HP/WA</label>
            <input required type="number" id="hp" name="hp" placeholder="Masukkan Nomor HP/WA" class="form-control form-control-lg">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
            <label for="femail">Email</label>
            <input required type="email" id="email" name="email" placeholder="Masukkan Email" class="form-control form-control-lg">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
            <label for="address">Alamat</label>
            <input required type="text" id="address" placeholder="Masukkan Alamat" name="alamat" class="form-control form-control-lg">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
            <label for="level">Hak Akses</label>
                <select class="form-control form-control-lg" name="level" required>
                    <option value="">-- Pilih Hak Akses</option>
                    <option value="pelelang">Pelelang</option>
                    <option value="member">Member</option>
                </select>                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
            <label for="fpass">Password</label>
            <input required type="password" placeholder="Masukkan Password" id="fpass" name="password" class="form-control form-control-lg">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
            <label for="fpass2">Re-type Password</label>
            <input required type="password" placeholder="Masukkan Ulang Password" id="fpass2" name="password2" class="form-control form-control-lg">
            </div>
        </div>

        <h5 class="mb-1 text-black"><strong>Data Rekening</strong></h5>

        <div class="row">
            <div class="col-md-12 form-group">
            <label for="bank">Bank</label>
                <select class="form-control form-control-lg" name="bank" required>
                    <option value="">-- Pilih Bank</option>
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                    <option value="BTN">BTN</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="BCA">BCA</option>
                </select>                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
            <label for="norek">Nomor Rekening</label>
            <input required type="number" id="norek" name="norek" placeholder="Masukkan Nomor Rekening" class="form-control form-control-lg">
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
            <input type="submit" value="Register" class="btn btn-primary btn-lg px-5">
            </div>
        </div>
        </form>
    </div>
    </div>
    
</div>
</div>