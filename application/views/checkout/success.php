<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1><?= $title; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
      <?php if (validation_errors()) { ?>
        <div class="alert alert-warning col-lg-8 mt-3" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php } ?>
      <div class="mt-3 col-lg-6">
        <?= $this->session->flashdata('message'); ?>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            Checkout Berhasil
          </div>
          <div class="card-body">
            <?php foreach ($orders as $row) : ?>
              <h5>Nomor Invoice:<strong> #<?= $row->invoice; ?> </strong> </h5>
              <p>Order berhasil dibuat.</p>
              <p>Silahkan <a href="<?= base_url('invoice/print_invoice/' . $row->id_order) ?>">cetak</a> file invoicenya lalu kirim ke pelanggan. Pembayaran dapat dilakukan melalui:</p>
              <ol>
                <li>Mandiri <strong>1070013832946</strong> a/n Michael Hutasoit</li>
                <li>BNI <strong>425073409</strong> a/n Bidner Hutasoit</li>
                <li>BRI <strong>109501000375308</strong> a/n Bidner Hutasoit</li>
                <li>Total pembayaran: <strong>Rp <?= number_format($row->total, 0, ',', '.') ?></strong></li>
              </ol>
              <p>Jika sudah jangan lupa meminta bukti transfernya kemudian pergi ke menu invoice lalu cari order yang baru dibuat. </p>
            <?php endforeach; ?>
            <a href="<?= base_url('produk') ?>" class="btn btn-info"><i class="fas fa-angle-left"></i> Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>