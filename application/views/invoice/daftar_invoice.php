<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Invoice</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Invoice</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="table-responsive">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Invoice</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No.Invoice</th>
                    <th>Pelanggan</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <th>Pembuat</th>
                    <th>Status Order</th>
                    <th>Status Pembayaran</th>
                    <th>Ekspedisi</th>
                    <th>No Resi/Mobil</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  
                  $no = 1;
                  foreach ($daftar_invoice as $row) : 
                    $kodenya = base_url('invoice/invoice_detail/'.$row->id_order);?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row->invoice; ?></td>
                      <td><?= $row->nama_pelanggan; ?></td>
                      <td>Rp <?= number_format($row->total, 0, ',', '.'); ?></td>
                      <td><?= $row->date; ?></td>
                      <td><?= $row->email; ?></td>
                      <td><?php
                          if ($row->status_order == 'diproses') {
                            echo '<span class="badge badge-warning">Diproses</span>';
                          } else if ($row->status_order == 'dikirim') {
                            echo '<span class="badge badge-secondary">Dikirim</span>';
                          } else {
                            echo '<span class="badge badge-danger">Batal</span>';
                          }
                          ?></td>
                      <td><?php
                          if ($row->status_pembayaran == 'waiting') {
                            echo '<span class="badge badge-warning">Menunggu Pembayaran</span>';
                          } else if ($row->status_pembayaran == 'paid') {
                            echo '<span class="badge badge-secondary">Lunas</span>';
                          } else if ($row->status_pembayaran == 'down_payment') {
                            echo '<span class="badge badge-success">Down Payment</span>';
                          } else {
                            echo '<span class="badge badge-danger">Batal</span>';
                          }
                          ?></td>
                            <td><?= $row->ekspedisi ?></td>
                            <td><?= $row->no_resi ?></td>
                      <td>
                        <a href="<?= base_url('invoice/invoice_detail/' . $row->id_order); ?>" class="badge badge-info"><i class="fas fa-eye"></i> Lihat</a>
                        <a href="<?= base_url('invoice/print_invoice/' . $row->id_order); ?>" class="badge badge-primary"><i class="fas fa-print"></i> Print Invoice - PDF</a>
                        <a href="<?= base_url('invoice/print_label/' . $row->id_order); ?>" class="badge badge-success"><i class="fas fa-print"></i> Print Label</a>
                        <a href="<?= base_url('invoice/print_qrcode/' . $row->id_order); ?>" class="badge badge-success"><i class="fas fa-print"></i> Print QR Code</a>
                        <a href="<?= base_url('invoice/print_suratJalan/' . $row->id_order); ?>" class="badge badge-dark"><i class="fas fa-print"></i> Print Surat Jalan - PDF</a>
                      </td>
                    </tr>
                  <?php $no++;
                  endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                  <th>No</th>
                    <th>No.Invoice</th>
                    <th>Pelanggan</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <th>Pembuat</th>
                    <th>Status Order</th>
                    <th>Status</th>
                    <th>Ekspedisi</th>
                    <th>No Resi/Mobil</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>

            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>