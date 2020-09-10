<?= $this->extend('layout/template_auth') ?>

<?= $this->section('content') ?>
<body class="hold-transition register-page">
<div class="register-box mb-4">
  <div class="register-logo mt-3 text-comprehension">
    <a href="/"><b>Sekolah</b>Ku</a>
  </div>

  <div class="card text-negotiate">
    <div class="card-body register-card-body">
      <p class="text-center">pendaftaran siswa/i untuk akun <b>sekolahku</b></p>
      <img src="/assets/image/auth/mobile_login-1.png" width="100%">
      
      <form action="/auth/proses-register" method="post">
        <?= csrf_field() ?>
        
        <div class="input-group mt-3 <?= ($v->hasError('nama') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control <?= ($v->hasError('nama') ? 'is-invalid' : '') ?>" 
          placeholder="Nama Lengkap"
          name="nama" value="<?= old('nama') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-fw fa-user"></span>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $v->getError('nama') ?></div>
        
        <div class="input-group mt-3 <?= ($v->hasError('username') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control <?= ($v->hasError('username') ? 'is-invalid' : '') ?>" 
          placeholder="Username"
          name="username" value="<?= old('username') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-fw fa-user-check"></span>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $v->getError('username') ?></div>
        
        <div class="input-group mt-3 <?= ($v->hasError('password') ? 'is-invalid' : '') ?>">
          <input type="password" class="form-control <?= ($v->hasError('password') ? 'is-invalid' : '') ?>" 
          placeholder="Password" id="password"
          name="password" value="<?= old('password') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text iconlock">
              <span class="fas fa-fw fa-eye"></span>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $v->getError('password') ?></div>
        
        <div class="input-group mt-3 <?= ($v->hasError('password1') ? 'is-invalid' : '') ?>">
          <input type="password" class="form-control <?= ($v->hasError('password1') ? 'is-invalid' : '') ?>" 
          placeholder="Konfirmasi Password" id="password1"
          name="password1" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-fw fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $v->getError('password1') ?></div>
        
        <?php
          $first = substr(rand(), 0, 3);
          $last = substr(rand(), 0, 1);
          
          $result = $first + $last;
        ?>
        <input type="hidden" name="resultCaptcha" value="<?= $result ?>">
        
        <button class="btn btn-warning btn-block mt-3" id="captcha_code" disabled>
          <?= $first.' + '.$last.' = ?' ?>
        </button>
        
        <div class="input-group <?= ($v->hasError('captcha') || session()->get('capt_error') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control <?= ($v->hasError('captcha') || session()->get('capt_error') ? 'is-invalid' : '') ?>"
          placeholder="Hasil Penjumlahan" id="captcha" name="captcha" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-fw fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1">
          <?= (session()->get('capt_error') ? session()->get('capt_error') : $v->getError('captcha')) ?>
          <?php session()->destroy('capt_error') ?>
        </div>
        
        <div class="icheck-primary mt-3">
          <input type="checkbox" id="syaratketentuan" name="syaratketentuan" value="true">
          <label for="syaratketentuan">
            <span class="font-weight-light">Saya setuju dengan <a href="#">syarat & ketentuan</a> <b>SekolahKu</b> </span>
          </label>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block my-3" disabled>Register</button>
      </form>
      
      <div class="text-center">
        <a href="/auth/login">saya sudah memiliki akun!</a>
      </div>
      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?= $this->endSection() ?>