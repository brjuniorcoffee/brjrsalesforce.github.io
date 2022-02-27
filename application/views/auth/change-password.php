<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <a href="<?= base_url('auth') ?>" class="h2"><b>Ganti Password <h5> <?= $this->session->userdata('reset_email'); ?>
      </h5></b></a>
    </div>
    <div class="card-body">
    <?= $this->session->flashdata('message'); ?>
      <p class="login-box-msg">Masukkan Password Baru!</p>

      <form action="<?= base_url('auth/changepassword') ?>" method="post" id="reset_password">
        <div class="input-group">
          <input type="password" class="form-control" name="password1" placeholder="Masukkan Password Baru">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
         <div class="mb-3"></div>
        <div class="input-group">
          <input type="password" class="form-control" name="password2" placeholder="Ulangi Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?= form_error('password2', '<small class="text-danger pl-2">', '</small>'); ?>
        <div class="mb-3"></div>
        <div class="row">
          <div class="col-12">
              <button type="submit" class="btn btn-dark btn-block">Ganti Password</button>
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