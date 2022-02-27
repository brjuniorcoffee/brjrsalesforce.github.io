    <div class="row">
<div class="card border-dark mb-3 " style="max-width:40rem;">
  <div class="card-header">
      <img src="<?= base_url('assets/foto/logo/logo.png') ?>" width="80px">
      <strong><p class="float-right">Non Tunai</p></strong>
  </div>
  <div class="card-body text-dark">
  <div class="row col-12 mb-3">
      <?php foreach ($orders as $data) : ?>
    <div class="col-6">
    <p class="card-title"><small><strong>INV# <?= $data->invoice ?></strong></small></p>
    </div>
    <div class="col-6">
    <p class="card-title float-right"><small><strong>Jasa Pengiriman: <?= $data->ekspedisi ?></strong></small></p>
    </div>
</div>
<div class="row col-12">
    <div class="col-6">
    <p class="card-text">Kepada:<br><strong><?= $data->nama_pelanggan; ?></strong><br><?= $data->alamat; ?><br><?= $data->contact;?></p>
</div>
<div class="col-6">
    <p class="card-text">Dari:<br><strong><?= $user['fullname']; ?></strong><br>BR Jr Coffee, Jalan Sisingamangaraja Desa Sigumpar Kec. Lintong Nihuta, Kab. Humbang Hasundutan<br><?= $user['no_hp'] ?></p>
</div>
</div>
    <?php endforeach; ?>
       
       <div class="col-12 mt-3">
            <div class="row">
                <i class="fas fa-cut mt-2"></i> 
                <?php $x=60; 
                while ($x > 0) { ?>
           <hr width="5px" class="bg-secondary">
        <?php $x--; } ?>
       </div>
       <!-- <img src="<?= base_url('assets/foto/paid.png'); ?>" style="height:100%;opacity:0.2;" width="125px" class="mx-auto d-block"> -->
       <div class="col-12">
                   <div class="row">
           <p class="mb-0 font-weight-bold col-10">Produk</p>
           <p class="mb-0 font-weight-bold col-2">Jumlah</p>
           </div>
           <ul class="list-group">
               <?php $no=1; foreach ($orders_detail as $data) { ?>
                <div class="row">
                  <li class="list-group col-10"> <?= $no ?>. <?= $data->nama_produk ?></li>
                  <li class="list-group col-2">  &nbsp;&nbsp;<?= $data->qty ?> Kg</li>
                </div>
            <?php $no++; } ?>
           </ul>
           </div>
           
        </div>
  </div>
</div>
    </div>
   
    <script type="text/javascript">
  window.print();
</script>