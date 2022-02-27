<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <a href="<?= base_url('auth') ?>" class="h1"><b>Lupa Password</b></a>
    </div>
    <div class="card-body">
    <?= $this->session->flashdata('message'); ?>
      <p class="login-box-msg">Masukkan Email!</p>

      <form action="<?= base_url('auth/forgotpassword') ?>" method="post" id="lupa_password">
        <div class="input-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="mb-3"></div>
        <div class="row">
          <div class="col-8">
             <p class="mb-1">
        <a href="<?= base_url('auth') ?>">Kembali ke Login!</a>
      </p>
      <p class="mb-0">
        <a href="<?= base_url('auth/registration') ?>" class="text-center">Daftar Member Baru!</a>
      </p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block">Masuk</button>
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