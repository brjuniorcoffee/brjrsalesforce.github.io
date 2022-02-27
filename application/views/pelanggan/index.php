<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Pelanggan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->

  </section>

  <section class="content">
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#pelangganbaru"><i class="fas fa-user-plus"></i> Pelanggan Baru</button>
    <div class="table-responsive">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-container">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pelanggan as $row) : ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row->nama_pelanggan; ?></td>
                      <td><?= $row->contact; ?></td>
                      <td><?= $row->alamat; ?></td>
                      <td>
                        <a href="<?= base_url(); ?>" class="badge badge-info"><i class="fas fa-user-edit"></i> Edit</a>
                      </td>
                    </tr>
                  <?php $no++;
                  endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pelangganbaruLabel">Tambah Pelanggan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('pelanggan/pelanggan_baru'); ?>" method="POST" id="pelanggan_baru">
          <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control">
          </div>
          <div class="form-group">
            <label>Kontak</label>
            <input type="text" name="kontak" id="kontak" class="form-control">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="5"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Tambah Pelanggan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#edit-pelanggan').click(function() {
      alert('ok');
      // const search = $(this).val();
      // $.ajax({
      //   url: '<?= base_url('produk/search_produk') ?>',
      //   type: 'post',
      //   data:{nilai:search},
      //   success : function(data) {
      //     // $('#result').html(data)\
      //     console.log(data);
      //   }
      // })
    })
    // load_data();
    // function load_data(query)
    // {
    //   $.ajax({
    //     url:"<?php echo base_url(); ?>produk/search_produk",
    //     method:"POST",
    //     data:{query:query},
    //     success:function(data){
    //       $('#result').html(data);
    //     }
    //   })
    // }
    // $('#kunci').keyup(function(){
    //   var search = $(this).val();
    //   if(search != ''){
    //     load_data(search);
    //   }else{
    //     load_data();
    //   }
    // });
  });
</script>