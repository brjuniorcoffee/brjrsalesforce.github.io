<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <a href="<?= base_url('auth') ?>" class="h1"><b>Daftar</b>Disini</a>
    </div>
    <div class="card-body">
    <?= $this->session->flashdata('message'); ?>
      <p class="login-box-msg">Sign up to start your session</p>

      <form action="<?= base_url('auth/registration') ?>" method="post" id="register">
        <div class="input-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
        
          <div class="mb-3"></div>
          <div class="input-group">
          <input type="text" class="form-control" name="fullname" placeholder="Fullname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>  
          <?= form_error('fullname', '<small class="text-danger pl-2">', '</small>'); ?>
          <div class="mb-3"></div>
        <div class="input-group">
          <input type="password" class="form-control" name="password1" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
        
        <div class="mb-3"></div>
        <div class="input-group">
          <input type="password" class="form-control" name="password2" placeholder="Repeat Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" ></span>
            </div>
          </div>
        </div>
        <?= form_error('password2', '<small class="text-danger pl-2">', '</small>'); ?>
        
        <div class="mb-3"></div>
        <div class="input-group">
          <input type="password" class="form-control" name="code" placeholder="Security Code" data-bs-toggle="tooltip" data-bs-placement="top" title="Field ini digunakan untuk validasi member asli BR Jr Coffee">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" ></span>
            </div>
          </div>
        </div>
        <?= form_error('code', '<small class="text-danger pl-2">', '</small>'); ?>
        <div class="mb-3"></div>
        <div class="row">
          <div class="col-8">
           <p class="mb-0">
        <a href="<?= base_url('auth') ?>" class="text-center">Sudah Punya Akun?</a>
      </p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<!-- 
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->