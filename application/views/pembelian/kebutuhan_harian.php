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
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
               
                <h3>Rp <?= number_format(array_sum(array_column($pembelian, 'total_harga')),0, ' ', ',') ?></h3>
                
                <p>Total Pengeluaran Tahun <?= date('Y') ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->

    </section>

    <section class="content">
      <button type="button" class="btn btn-primary mb-3 tambahPembelian" data-toggle="modal" data-target="#pelangganbaru"><i class="fas fa-plus"></i> Pengeluaran Baru</button>
      <div class="table-responsive">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Pengeluaran</h3>
            </div>  
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-responsive table-bordered table-striped table-container">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori Pengeluaran</th>
                    <th>Barang Dibeli</th>
                    <th>Jumlah</th>
                    <th>Total harga</th>
                    <th>Tanggal Beli</th>
                    <th>Status</th>
                    <th>Dibuat Oleh</th>
                    <th>Aksi</th>     
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; foreach ($pembelian as $data) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data->kat_pengeluaran; ?></td>
                    <td><?= $data->barang_dibeli; ?></td>
                    <td><?= $data->qty.' '.$data->satuan; ?></td>
                    <td>Rp <?= number_format($data->total_harga,0,",", "."); ?></td>
                    <td><?= $data->tanggal_pembelian; ?></td>
                    <!-- <td><?= $data->catatan; ?></td> -->
                    <td>
                      <?php 
                      if($data->status == "lunas"){
                        echo '<span class="badge bg-success">Lunas</span>';
                      }else{
                        echo '<span class="badge bg-warning">Belum Lunas</span>';
                      }
                      ?></td>
                    <td><?= $data->dibuat_oleh; ?></td>
                     <td>
                     <a id="detail_pembelian" href="" class="badge badge-info detailPembelian" data-toggle="modal" data-target="#detail_pembeliannonGabah<?= $data->id_pembelian; ?>" data-id="<?= $data->id_pembelian; ?>" data-namabarang="<?= $data->barang_dibeli ?>" data-bukti_beli="<?= $data->bukti_beli ?>"><i class="fas fa-user-edit"></i> Detail</a>
                    </td>
                  </tr>
                  <?php $no++; endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kategori Pengeluaran</th>
                    <th>Barang Dibeli</th>
                    <th>Jumlah</th>
                    <th>Total harga</th>
                    <th>Tanggal Beli</th>
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
 <?php foreach ($pembelian as $data) : ?>
<div class="modal fade" id="detail_pembeliannonGabah<?= $data->id_pembelian; ?>" tabindex="-1" aria-labelledby="detail_pembeliannonGabah<?= $data->id_pembelian; ?>Label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detail_pembeliannonGabah<?= $data->id_pembelian; ?>Label">Bukti Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
        <embed src="<?= base_url("assets/foto/pembelian/$data->bukti_beli") ?>" type="application/pdf" id="nama_barang" width="100%" height="800px"></embed>
      </div>
    </div>
  </div>
</div>
</div>
<?php endforeach; ?>

<!-- Modal -->
<div class="modal fade" id="pelangganbaru" tabindex="-1" aria-labelledby="pelangganbaruLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pelangganbaruLabel">Pembelian Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('pembelian/pembelian_baru'); ?>" method="POST" id="pembelian" enctype="multipart/form-data">
          <div class="form-group">
          <label for="exampleDataList" class="form-label">Nama Barang</label>
<input type="text" class="form-control" list="pembelian_barang" name="nama_barang" id="exampleDataList" placeholder="Type to search...">
<datalist id="pembelian_barang">
  <option value="Stiker Kemasan">
  <option value="Kemasan">
  <option value="Plastik Ziplock">
  <option value="Pulsa & Paket Data">
  <option value="Indihome">
</datalist>
          </div>
          <div class="form-group">
            <label for="exampleDataList" class="form-label">Kategori Pengeluaran</label>
<input class="form-control" list="kategori_pengeluaran" id="exampleDataList" placeholder="Type to search..." name="kategori_pengeluaran" id="kategori_pengeluaran">
<datalist id="kategori_pengeluaran">
  <?php foreach ($kategori_pengeluaran as $data) : ?>
  <option value="<?= $data->kategori_pengeluaran; ?>">
    <?php endforeach; ?>
</datalist>
            </div>
          <div class="form-group row">
            <div class="form group col-sm-6">
            <label>Qty</label>
            <input type="number" name="qty" id="qty" class="form-control">
            </div>
            <div class="form group col-sm-6">
            <label for="exampleDataList" class="form-label">Pilih Satuan</label>
<input class="form-control" list="kategori_satuan" id="exampleDataList" placeholder="Type to search..." name="satuan" id="satuan">
<datalist id="kategori_satuan">
  <option value="pcs">
  <option value="Kg">
  <option value="gram">
  <option value="liter">
  <option value="orang">
</datalist>
            </div>
          </div>
          <div class="form-group">
            <label>Total Harga</label>
            <div class="input-group mb-2 mr-sm-2">
             <div class="input-group-prepend">
          <div class="input-group-text">Rp</div>
        </div>
            <input type="number" name="total_harga" id="total_harga" class="form-control">
          </div>
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
          </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Pembelian</button>
      </div>
        </form>
    </div>
  </div>
</div>
