<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini" >
<div class="wrapper">
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h4>
                                    <img src="<?= base_url('assets/dist/img/logo.png'); ?>" class="img-responsive" width="100px" height="50px"></i> <strong>BR Jr Coffee</strong>
                                    <?php foreach ($orders as $row) : ?>

                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Dari:
                                <address>
                                    <strong>BR Jr Coffee</strong><br>
                                    BR Jr Cofee, Jalan Sisingamangaraja<br>
                                    Sigumpar, Kec. Lintong Nihuta<br>
                                    Humbang Hasundutan, Sumatera Utara 22475<br>
                                    WA: 081360203068<br>
                                    Email: brjuniorcoffee@gmail.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Kepada:
                                <address>
                                    <strong><?= $row->nama_pelanggan; ?></strong><br>
                                    <?= $row->alamat; ?><br>
                                    Contact: <?= $row->contact; ?>


                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>No. Invoice: #<?= $row->invoice; ?></b><br>
                                <!-- <b>No. Order:</b> <?= $row->id_order; ?><br> -->
                                <b>Tanggal dibuat:</b> <?= $row->date; ?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    <?php endforeach; ?>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Item</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($print_invoice as $data) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $data->nama_produk; ?></td>
                                            <td>Rp <?= number_format($data->harga_produk, 0, ',', '.'); ?></td>
                                            <td><?= number_format($data->qty, 1, ',', '.'); ?> Kg</td>
                                            <td>Rp <?= number_format($data->subtotal, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Metode Pembayaran(Transfer):</p>
                            <ul class="nav">
                                <li><img src="<?= base_url('assets/foto/pembayaran/bri.png'); ?>" alt="BRI" class="img-responsive product-image-thumb"></li>
                                <!-- <li><img src="<?= base_url('assets/foto/pembayaran/BNI.png'); ?>" alt="BNI" class="img-responsive product-image-thumb"></li>
                  <li class="nav-item"><img src="<?= base_url('assets/foto/pembayaran/MANDIRI.png'); ?>" alt="MANDIRI" class="img-responsive product-image-thumb" ></li> -->
                            </ul>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                <!-- <p>Mandiri: <strong>1070013832946</strong> a/n Michael Hutasoit</p>
                  <p>BNI: <strong>425073409</strong> a/n Bidner Hutasoit</p> -->
                            <p>BRI: <strong>109501000375308</strong> a/n Bidner Hutasoit</p>
                            <!--  <p>BCA: <strong>8525317982</strong> a/n Daniel Ticcos Breyner Hutasoit</p>
                  </p> -->
                        </div>
                        <!-- /.col -->
                        <div class="col-6">

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Total:</th>
                                        <td>Rp <?= number_format($row->total, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ongkos kirim:</th>
                                        <td>Rp <?= number_format($row->ongkir, 0, ',', '.'); ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Grand Total:</th>
                                        <td>Rp <?= number_format(array_sum(array_column($orders, 'total')) + $row->ongkir, 0, ',', '.'); ?></td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <!-- <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div> -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            <a class="btn btn-success float-right" href="<?= base_url("invoice/export_pdf/$row->id_order") ?>" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
            </a>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
</body>
</html>
