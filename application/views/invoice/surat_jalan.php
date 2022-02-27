<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?> </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('invoice'); ?>">Daftar Invoice</a></li>
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
          <div class="invoice p-3 mb-3 text">
            <div class="text-center">
              <h1><strong>Surat Jalan</strong></h3>
            </div>
            <!-- title row -->
            <div class="row">
              <div class="col-12 mb-3">
                <h4>
                  <strong>NR Jr Coffee</strong>
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
                  <strong>NR Jr Coffee</strong><br>
                  NR Jr Coffee, Jalan Sisingamangaraja<br>
                  Sigumpar, Kec. Lintong Nihuta<br>
                  Humbang Hasundutan, Sumatera Utara 22475<br>
                  No Hp: 082166344117<br>
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
                <b>No. Invoice:</b> #<?= $row->invoice; ?><br>
                <!-- <b>No. Order:</b> <?= $row->id_order; ?><br> -->
                <b>Tanggal Dikirim:</b> <?= date('d M Y'); ?>
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
                    <th>Qty</th>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($print_suratJalan as $data) : ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $data->nama_produk; ?></td>

                      <td><?= $data->qty; ?> Kg</td>

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
            <!-- <div class="col-6">
                  <p><small><strong>*Surat Jalan Ini Merupakan Bukti Resmi Penerimaan Barang</strong></small></p>
                  <ul class="nav">
                  <li><img src="<?= base_url('assets/foto/pembayaran/BRI.png'); ?>" alt="BRI" class="img-responsive product-image-thumb"></li>
                  <li><img src="<?= base_url('assets/foto/pembayaran/BNI.png'); ?>" alt="BNI" class="img-responsive product-image-thumb"></li>
                  <li class="nav-item"><img src="<?= base_url('assets/foto/pembayaran/MANDIRI.png'); ?>" alt="MANDIRI" class="img-responsive product-image-thumb" ></li>
                  </ul>
                  
                </div> -->
            <!-- /.col -->
            <div class="col-md-9">
              <p><small><strong>*Surat Jalan Ini Merupakan Bukti Resmi Penerimaan Barang</strong></small></p>
            </div>
            <div class="col-md-3">
              <div class="table-responsive">
                <table class="table">
                  <tr class="">
                    <th>Total Berat:</th>
                    <td><?= array_sum(array_column($print_suratJalan, 'qty')); ?> Kg</td>
                  </tr>
                </table>

              </div>
            </div>
            <!-- /.col -->
          </div>
          <div class="row mb-5">
            <div class="col-12">
              <p>Barang sudah diterima dalam keadaaan baik dan cukup oleh:<br>
                <i>(Tanda tangan dan cap stempel perusahaan)</i>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-6 text-center">
              <p>Penerima/Pembeli</p><br><br>
              <div class="col-12 text-center mt-5">
                <hr width="250px">
              </div>
            </div>
            <div class="col-6 text-center">
              <p>Hormat Kami</p><br><br>
              <div class="col-12 text-center mt-5">
                <hr width="250px">
              </div>
            </div>
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
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  window.print();
</script>