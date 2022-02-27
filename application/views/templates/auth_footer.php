

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- jquery-validation -->
<script src="<?= base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  // $.validator.setDefaults({
  //   submitHandler: function () {
  //     alert( "Form successful submitted!" );
  //   } 
  // });
  $('#login').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
    },
    messages: {
      email: {
        required: "Wajib Input Alamat Email",
        email: "Sertakan @ Pada Email Anda!"
      },
      password: {
        required: "Wajib Input Password",
        minlength: "Panjang Password Minimal 5 Karakter"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
<script>
$(function () {
//   $.validator.setDefaults({
//     submitHandler: function () {
//       alert( "Form successful submitted!" );
//     } 
//   });
  $('#register').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      fullname: {
        required: true,
        minlength: 5
      },
      password1: {
        required: true,
        minlength: 5
      },
       password2: {
        required: true,
        minlength: 5,
      },
      code: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Wajib Input Alamat Email",
        email: "Sertakan @ Pada Email Anda!"
      },
       fullname: {
        required: "Wajib Input Nama Lengkap",
        minlength: "Panjang Password Minimal 5 Karakter"
      },
      password1: {
        required: "Wajib Input Password",
        minlength: "Panjang Password Minimal 5 Karakter"
      },
       password2: {
        required: "Ketik Ulang Password",
        minlength: "Panjang Password Minimal 5 Karakter"
      },
       },
       code: {
        required: "Wajib Input Kode",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
</script>
<script>
$(function () {
//   $.validator.setDefaults({
//     submitHandler: function () {
//       alert( "Form successful submitted!" );
//     } 
//   });
  $('#reset_password').validate({
    rules: {
      password {
        required: true,
        minlength: 5,
        maxlength:20
      },
      password2 {
        required: true,
        matches: password
      },
    },
    messages: {
      password: {
        required: "Wajib Input Alamat Email",
        minlength: "Password Terlalu Pendek Minimal 5 Karakter"
        maxlength: "Password Telalu Panjang Maksimal 20 Karakter"
    },
     password2: {
        required: "Wajib Input Ulang Password",
        matches: "Password Tidak Cocok"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.function() {}orm-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
</script>
<script>
$(function () {
//   $.validator.setDefaults({
//     submitHandler: function () {
//       alert( "Form successful submitted!" );
//     } 
//   });
  $('#lupa_password').validate({
    rules: {
      email: {
        required: true,
        valid_email: true
      },
    },
    messages: {
      email: {
        required: "Wajib Input Alamat Email",
        valid_email: "Sertakan @ Pada Alamat Email Anda"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.function() {}orm-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
</script>
</body>
</html>