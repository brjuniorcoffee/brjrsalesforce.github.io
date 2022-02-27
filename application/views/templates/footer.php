<footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y') ?> <a href="">BR Jr Coffee</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->



<script>
  $(document).ready(function() {
   $('#coba').keyup(function(){
     $.ajax({
       url: '<?= base_url('produk/search_produk') ?>',
       type: 'POST',
       data: {cari:$(this).val()},
       success:function(data){
        $('#result').html(data)
       }
     })
   })
});
</script>


<script src="<?= base_url(); ?>sweetalert/sweetalert2.all.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="//rajaongkir.com/script/widget.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->

<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
<script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>


<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery/myscript.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/pages/myscript.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->

<script>
  $(document).ready(function(){
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    $("#example4").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
    $("#example6").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example6_wrapper .col-md-6:eq(0)');
    $("#example7").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example7_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
   
  });
});
</script>

<script text="javascript">
  $(document).ready(function(){
  $('.custom-file-input').on('change', function() {
  let fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

});
</script>
<script>
  $(document).ready(function(){
   $('#gambar').on('change', function(){
      var kirim = (this).files[0];
      viewImages(kirim);
    });
  
  function viewImages(file){
    var reader = new FileReader();
    reader.onload=function(){
    $('#image').attr('src', reader.result);
    }
    reader.readAsDataURL(file);
  }
});
</script>

<script>
  $(document).ready(function(){
   $('#updategambar').on('change', function(){
      var kirim = (this).files[0];
      viewImages(kirim);
    });
  
  function viewImages(file){
    var reader = new FileReader();
    reader.onload=function(){
    $('#updateimage').attr('src', reader.result);
    }
    reader.readAsDataURL(file);
  }
});
</script>

<script text="javascript">
  $(document).ready(function(){
$(function () {
  $('#checkout').validate({
    rules: {
      name: {
        required: true,
        maxlength: 40,
        minlength: 5
      },
     contact: {
        required: true,
        minlength: 10,
        maxlength: 13
      },
      alamat: {
        required: true,
        minlength: 10,
        maxlength: 200
      },
	  ongkir: {
        required: true
      },
    ekspedisi: {
        required: true
      },
    pembayaran: {
        required: true
      },
      order: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Wajib Input Nama Pelanggan",
        minlength: "Panjang Karakter Minimal 5",
        maxlength: "Panjang Karakter Maksimal 40"
      },
     contact: {
        required: "Wajib Input No Telepon",
        minlength: "Panjang Karakter Minimal 10",
        maxlength: "Panjang Karakter Maksimal 13"
      },
      alamat: {
        required: "Wajib Input Alamat Pelanggan",
        minlength: "Panjang Karakter Minimal 200",
        maxlength: "Panjang Karakter Maksimal 200"
    },
      ekspedisi: {
        required: "Wajib Pilih Ekspedisi"
    },
    ongkir: {
        required: "Wajib Input Ongkos Kirim"
    },
    pembayaran: {
        required: "Wajib Pilih Status Pembayaran"
    },
    order: {
        required: "Wajib Pilih Status Order"
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
});
</script>

 
<script text="javascript">
  $(document).ready(function(){
$(function () {
  $('#tambahProduk').validate({
    rules: {
      nama_produk: {
        required: true,
        maxlength: 200,
        minlength: 10
      },
     kategori_produk: {
        required: true
      },
      deskripsi: {
        required: true,
        minlength: 10,
        maxlength: 300,
      },
      harga: {
        required: true,
        is_natural: true,
      },
      jumlah_stok: {
        required: true,
        is_natural_no_zero: true,
      },
      gambar: {
        required: true
      },
    },
    messages: {
      nama_produk: {
        required: "Wajib Input Nama Produk",
        minlength: "Panjang Karakter Minimal 10",
        maxlength: "Panjang Karakter Maksimal 290"
      },
      kategori_produk: {
        required: "Wajib Pilih Kategori Produk"
      },
      deskripsi: {
        required: "Wajib Input Deskripsi Produk",
        minlength: "Panjang Karakter Minimal 10",
        maxlength: "Panjang Karakter Maksimal 300"
      },
      harga: {
        required: "Wajib Input Harga Produk",
        is_natural: "Harga Tidak Merupakan Angka Desimal"
    },
     jumlah_stok: {
        required: "Wajib Input Jumlah Stok",
        is_natural_no_zero: "Stok Tidak Boleh Kurang Dari 1"
    },
     gambar: {
        required: "Wajib Input Gambar Produk",
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
});
</script>

 
<script text="javascript">
  $(document).ready(function(){
$(function () {
  $('#pembelian_kopi').validate({
    rules: {
      total_hargaGabah: {
        required: true,
        is_natural_no_zero: true,
      },
      total_kgGabah: {
        required: true,
        is_natural_no_zero: true,
      },
      total_kgAsalan: {
        is_natural_no_zero: true,
      },
      sumber_kopi:{
        required: true
      }
    },
    messages: {
      total_hargaGabah: {
        required: "Wajib Input Harga Gabah",
        is_natural_no_zero: "Harga Tidak Boleh Kosong"
      },
      total_kgGabah: {
        required: "Wajib Input Total Berat Gabah",
        is_natural_no_zero: "Qty Tidak Boleh Kosong"
      },
      total_kgAsalan: {
        is_natural_no_zero: "Qty Tidak Boleh Kosong"
      },
    sumber_kopi: {
        required: "Wajib Input Sumber Kopi"
      }
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
});
</script>

<script text="javascript">
  $(document).ready(function(){
$(function () {
  $('#updateProduk').validate({
    rules: {
      nama_produk: {
        required: true,
        maxlength: 200,
        minlength: 10
      },
     kategori_produk: {
        required: true
      },
      deskripsi: {
        required: true,
        minlength: 10,
        maxlength: 300,
      },
      harga: {
        required: true,
        is_natural: true,
      },
      jumlah_stok: {
        required: true,
        is_natural_no_zero: true,
      },
      gambar: {
        required: true
      },
    },
    messages: {
      nama_produk: {
        required: "Wajib Input Nama Produk",
        minlength: "Panjang Karakter Minimal 10",
        maxlength: "Panjang Karakter Maksimal 290"
      },
      kategori_produk: {
        required: "Wajib Pilih Kategori Produk"
      },
      deskripsi: {
        required: "Wajib Input Deskripsi Produk",
        minlength: "Panjang Karakter Minimal 10",
        maxlength: "Panjang Karakter Maksimal 300"
      },
      harga: {
        required: "Wajib Input Harga Produk",
        is_natural: "Harga Tidak Merupakan Angka Desimal"
    },
     jumlah_stok: {
        required: "Wajib Input Jumlah Stok",
        is_natural_no_zero: "Stok Tidak Boleh Kurang Dari 1"
    },
     gambar: {
        required: "Wajib Input Gambar Produk",
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
});
</script>

<script text="javascript">
  $(document).ready(function(){
$(function () {
  $('#pembelian').validate({  
    rules: {
      supplier: {
        required: true,
        maxlength: 40,
        minlength: 5
      },
      qty: {
        required: true,
        is_natural_no_zero: true
      },
      total_harga: {
        required: true,
      },
      tanggal_beli: {
        required: true,
      },
      catatan: {
        required: true,
        maxlength: 300,
        minlength: 10
      },
      status: {
        required: true
      }
    },
    messages: {
      supplier: {
        required: "Wajib Input Nama Supplier",
        minlength: "Panjang Karakter Minimal 5",
        maxlength: "Panjang Karakter Maksimal 40"
      },
      qty: {
        required: "Wajib Input Jumlah Beli",
        is_natural_no_zero: "Stok Tidak Boleh Kurang Dari 1"
      },
      total_harga: {
        required: "Wajib Input Total Harga Pembelian",
      },
      tanggal_beli: {
        required: "Wajib Input Tanggal Pembelian",
    },
     catatan: {
        required: "Wajib Input, Boleh Diisi Dengan Daftar Barang Yang Dibeli dll",
        minlength: "Panjang Karakter Minimal 10",
        maxlength: "Panjang Karakter Maksimal 300"
    },
     status: {
        required: "Wajib Input Status Pembelian"
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
});
</script>

<script text="javascript">
  $(document).ready(function(){
$(function () {
  $('#pelanggan_baru').validate({
    rules: {
      nama_pelanggan: {
        required: true
      },
     kontak: {
        required: true
      },
      alamat: {
        required: true
      }
    },
    messages: {
      nama_pelanggan: {
        required: "Wajib Input Nama Pelanggan"
      },
      kontak: {
        required: "Wajib Input Kontak Pelanggan"
      },
      alamat: {
        required: "Wajib Input Alamat Pelanggan"
      }
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
});
</script>
<script type="text/javascript">
$(document).ready(function(){
   $('#status').on('change', function() {
  var val = this.value;
  if (val == "paid") {
     $("#form_bukti").show(800);  
     $("#gambar").attr('required', ''); 
  }else{
    $("#form_bukti").hide(800);
  }
});

$('#status_barang').on('change', function() {
  var val = this.value;
  if (val == "dikirim") {
     $("#no_resi").show(800); 
  }else{
    $("#no_resi").hide(800); 
  }
});

});
</script>
<script type="text/javascript">
  $(document).ready(function(){
$('#tarikan').click(function (e) {
    e.preventDefault();
});
  });
</script>

</body>
</html>