<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Pembelian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Pengeluaran</li>
            </ol>
          </div>
        </div>
        <?= $this->session->flashdata('message'); ?> 
      </div><!-- /.container-fluid -->

    </section>

    <section class="content">
      <button type="button" class="btn btn-primary mb-3 tambahPembelian" data-toggle="modal" data-target="#pelangganbaru"><i class="fas fa-plus"></i> Pembelian Baru</button>
      <div class="table-responsive">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Pembelian</h3>
            </div>  
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-responsive table-bordered table-striped table-container">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Total Harga Gabah</th>
                    <th>Total Kg Gabah</th>
                    <th>Total Kg Asalan</th>
                    <th>Sumber Pembelian</th>
                    <th>Tanggal Beli</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Dibuat Oleh</th>
                    <th>Aksi</th>     
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; foreach ($pembelian_kopi as $data) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data->total_harga_gabah; ?></td>
                    <td><?= $data->total_kg_gabah; ?></td>
                    <td><?= $data->total_kg_asalan; ?></td>
                    <td>Rp <?= $data->sumber_pembelian; ?></td>
                    <td><?= $data->tanggal_pembelian; ?></td>
                    <td><?= $data->catatan; ?></td>
                    <td><?= $data->status; ?></td>
                    <td><?= $data->dibuat_oleh; ?></td>
                     <td>
                     <a href="" class="badge badge-info detailPembelian" data-toggle="modal" data-target="#pelangganbaru" data-id="<?= $data->id_pembelian; ?>"><i class="fas fa-user-edit"></i> Detail</a>
                    </td>
                  </tr>
                  <?php $no++; endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Total Harga Gabah</th>
                    <th>Total Kg Gabah</th>
                    <th>Total Kg Asalan</th>
                    <th>Sumber Pembelian</th>
                    <th>Tanggal Beli</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Dibuat Oleh</th>
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


 
<!-- Modal -->
<div class="modal fade" id="pelangganbaru" tabindex="-1" aria-labelledby="pelangganbaruLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pelangganbaruLabel">Tambah Pembelian Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('pembelian/pembelian_baru'); ?>" method="POST" id="pembelian_kopi">
          <div class="form-group">
            <label>Total Harga Gabah</label>
            <input type="text" name="total_hargaGabah" id="total_hargaGabah" class="form-control">
          </div>
          <div class="form-group row">
            <div class="form group col-sm-6">
            <label>Total Kg Gabah</label>
            <input type="number" name="total_kgGabah" id="total_kgGabah" class="form-control">
            </div>
            <div class="form group col-sm-6">
            <label>Total Kg Asalan</label>
            <input type="number"  name="total_kgAsalan" id="total_kgAsalan" class="form-control">
            </div>
            <!-- <div class="form group col-sm-6">
            <label for="exampleDataList" class="form-label">Pilih Satuan</label>
<input class="form-control" list="kategori_satuan" id="exampleDataList" placeholder="Type to search..." name="satuan" id="satuan">
<datalist id="kategori_satuan">
  <option value="pcs">
  <option value="Kg">
  <option value="gram">
  <option value="liter">
  <option value="orang">
</datalist>
            </div> -->
          </div>
          <div class="form-group">
            <label>Sumber Pembelian</label>
            <input class="form-control" list="sumber_pembelian" id="exampleDataList" placeholder="Type to search..." name="sumber_kopi" id="sumber_kopi">
<datalist id="sumber_pembelian">
  <option value="sijaba">
  <option value="hariara">
  <option value="lobutolong">
  <option value="doloksanggul">
  <option value="sigalingging">
</datalist>
          </div>
          <div class="form-group">
            <label>Tanggal Pembelian</label>
            <input type="date" name="tanggal_beli" id="tanggal_beli" class="form-control">
          </div>
          <div class="form-group">
            <label>Catatan</label>
            <textarea class="form-control" name="catatan" id="compose-textarea" required=""></textarea>
          </div>
          <div class="form-group">
            <label>Status Pembayaran</label>
          <select class="form-control" name="status" id="status" required>
            <option value="lunas">Lunas</option>
            <option value="panjar">Proses Panjar</option>
            <option value="menunggu_dibayar">Menunggu Dibayar</option>
          </select>
          </div>
          <!-- <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" id="status" required="">
              <option value="belum_lunas">Belum Lunas</option>
              <option value="lunas">Lunas</option>
            </select>
          </div>
          <div class="form-group">
            <label>Struk Pembelian</label>
           <div class="form-group row">
      <div class="col sm-10">
        <div class="row">
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="gambar" id="gambar">
            <label class="custom-file-label" for="gambar">Choose file</label>
        </div>
          </div>
          <div class="col-sm-6">
            <img src="" class="img-responsive img-rounded img-thumbnail" id="image">
          </div>
        </div>
      </div>
</div>
          </div> -->
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Pembelian</button>
      </div>
        </form>
    </div>
  </div>
</div>