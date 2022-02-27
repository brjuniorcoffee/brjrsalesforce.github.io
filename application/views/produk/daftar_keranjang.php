
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
    <!-- Main content -->
    <main role="main" class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">   
                <div class="card-header">
                    Keranjang
                    </div>
                <div class="card-body">
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($keranjang as $row) : ?>
                            <tr>
                                <td>
                                    <p><strong><?= $row->nama_produk; ?></strong></p>
                                </td>
                                <form action="<?= base_url('produk/update_keranjang/'.$row->id); ?>" method="POST">
                                <td>
                                        <div class="input-group">
                                          <input type="hidden" name="id" value="<?= $row->id; ?>">
                                            <input type="number" class="form-control text-center" name="harga" value="<?= $row->harga_produk ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-info" type="submit"><i class="fas fa-check"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                <td>
                                        <div class="input-group">
                                            <input type="number" class="form-control text-center" name="qty" value="<?= $row->qty ?>" min="0" step=".01">
                                            <div class="input-group-append">
                                                <button class="btn btn-info" type="submit"><i class="fas fa-check"></i></button>
                                            </div>
                                        </div>
                                      </td>
                                    </form>
                                <td class="text-center">Rp <?= number_format($row->qty*$row->harga_produk, 0, ',', '.') ?></td>
                                <td>
                                    <form action="<?= base_url('checkout/hapus_produk/'.$row->id); ?>" method="POST">
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Total: </strong></td>
                                <td class="text-center"><strong>Rp <?= number_format(array_sum(array_column($keranjang, 'subtotal')), 0, ',', '.')  ?></strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('produk') ?>" class="btn btn-warning text-white">Kembali <i class="fas fa-angle-left   "></i></a>
                    <a href="<?= base_url('checkout') ?>" class="btn btn-success float-right">Checkout <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
            </div>
            <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<script> 
    CKEDITOR.replace('deskripsi');
</script>