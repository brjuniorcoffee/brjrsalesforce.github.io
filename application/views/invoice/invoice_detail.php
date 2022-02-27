<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('invoice') ?>">Daftar Invoice</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      <div class="mt-3 col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="container-fluid table-responsive">
	<div class="row">
		<div class="col-md-12">	
					<div class="card">
						<?php foreach ($orders as $row) : ?>
						
						<div class="card-header">
							Detail Order # <strong><?= $row->invoice; ?></strong>
							<ul class="nav nav-pills float-right" id="bill_status">
								<li class="nav-item mr-1">	
								<?php 
								 if ($row->status_pembayaran == 'waiting') {
                     echo '<span class="badge badge-warning">Menunggu Pembayaran</span>';
                    }else if ($row->status_pembayaran == 'paid') {
                     echo '<span class="badge badge-secondary">Dibayar</span>';
                    }else if($row->status_pembayaran == 'down_payment'){
					echo '<span class="badge badge-success">DP</span>';
					}else{
                      echo '<span class="badge badge-danger">Batal</span>';
                    }
					 ?>
					</li>
					<li class="nav_item" id="order_status">
					<?php 
					if ($row->status_order == 'diproses') {
						echo '<span class="badge badge-warning">Diproses</span>';
					}else if ($row->status_order == 'dikirim') {
						echo '<span class="badge badge-secondary">Dikirim</span>';
					}else{
						echo '<span class="badge badge-info">undefined</span>';
					}
							?>
					</li>	
							</ul>	
						</div>
						<div class="card-body">
						<p class="float-right"><small><i>
							 <?php 
							 $original_date = $row->update_status;
							 $new_date = date('d F Y H:i:s', $original_date);
							 if ($original_date == 0) {
								 # code...
							 }else{
							  echo 'Update Terakhir: '. $new_date; 
							 }
							 
					?>
						</small></i></p>
							<p>Tanggal: <?= $row->date ?></p>
							<p>Nama: <?= $row->nama_pelanggan ?></p>
							<p>Telepon: <?= $row->contact  ?></p>
							<p>Alamat: <?= $row->alamat ?></p>
							<p>No Resi/Mobil: <?= $row->no_resi ?></p>
							<table class="table">
								<thead>
									<tr>
										<th>Produk</th>
										<th class="text-center">Harga</th>
										<th class="text-center">Jumlah</th>
										<th class="text-center">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($orders_detail as $data) : ?>
									<tr>
										<td>
											<p><img src="<?= base_url('assets/foto/produk/'.$data->image) ?>" alt="" height="50" class="img-responsive img-rounded">  <strong><?= $data->nama_produk; ?></strong></p>
										</td>
										<td class="text-center">Rp<?= number_format($data->harga_produk, 0, ',', '.') ?>,-</td>
										<td class="text-center"><?= number_format($data->qty, 1, ',', '.') ?> <?= $data->satuan ?></td>
										<td class="text-center">Rp<?= number_format($data->subtotal, 0, ',', '.') ?>,-</td>
									</tr>
									<?php endforeach; ?>
									<tr>
									<tr>
										<td colspan="3" class="text-right"><strong>Subtotal:</strong></td>
										<td class="text-center"><strong>Rp<?= number_format(array_sum(array_column($orders_detail, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
									</tr>
									<tr>
										<td colspan="3" class="text-right"><strong>Ongkir:</strong></td>
										<td class="text-center"><strong>Rp<?= $row->ongkir ?>,-</strong></td>
									</tr>
									<tr>
										<td colspan="3" class="text-right"><strong>Grand Total:</strong></td>
										<td class="text-center"><strong>Rp <?= number_format(array_sum(array_column($orders, 'total')) + $row->ongkir, 0, ',', '.'); ?>,-</strong></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
					</div>
			<?php
			$status_bayar = $row->status_pembayaran;
			$status_barang = $row->status_order;
			if ($status_bayar == 'paid' && $status_barang == 'dikirim') {	} else{ ?>
						<div class="card-footer">
							<form action="<?= base_url('invoice/update_status/'.$row->id_order) ?>" method="POST" enctype="multipart/form-data" id="invoice_detail">
							<input type="hidden" id="no_resi" name="no_resi" value="<?= $row->no_resi ?>">
							<input type="hidden" id="bukti_transfer" name="gambar" value="<?= $row->bukti_transfer ?>">
							<div class="form-row">
								<?php if ($status_bayar == "paid" || $status_bayar == "down_payment") { ?>  
									<input type="hidden" name="status" value="<?= $row->status_bayar ?>">
								<?php }else{ ?>	
								<div class="form-group col-md-5">
								<label for="inputEmail4">Status Pembayaran</label>
									<select name="status" id="status" class="form-control">
										<option value="waiting" <?= $status_bayar == 'waiting' ? 'selected' : '' ?> >Menunggu Pembayaran</option>
										<option value="paid" <?= $status_bayar == 'paid' ? 'selected' : '' ?>>Dibayar</option>
										<option value="down_payment" <?= $status_bayar == 'down_payment' ? 'selected' : '' ?>>Down Payment</option>
										<option value="cancel" <?= $status_bayar == 'cancel' ? 'selected' : '' ?>>Batal</option>
									</select>
								</div>
								<?php } if ($status_barang == "dikirim") { ?>
									<input type="hidden" name="status_barang" value="<?= $row->status_order ?>">
								 <?php }else{ ?>
								<div class="form-group col-md-5">
								<label for="inputEmail4">Status Barang</label>
								<select name="status_barang" id="status_barang" class="form-control">
										<option value="diproses" <?= $row->status_order == 'diproses' ? 'selected' : '' ?>>Diproses</option>
										<option value="dikirim">Dikirim</option>
									</select>
								</div>
								<?php } ?>
							</div>
							</div>
						<?php  } ?>
						</div>
					</div>

					<div class="container" style="display: none;" id="no_resi">
	<div class="card col-6">
<div class="ml-3 form-group">
		  <label>No Resi/Mobil</label>
		  <input type="text" class="form-control" name="no_resi">
	  </div>
	  </div>
	 
	</div>

		<?php if ($row->status_pembayaran == 'waiting') { ?>
				<div class="col-md-12" id="form_bukti" style="display:none;">
					<div class="card">
						<div class="card-header">
							Bukti Bayar
						</div>
						<div class="card-body">
							<label for="exampleInputEmail1">Upload Gambar</label>
      <div class="form-group row">
      <div class="col-sm-12">
        <div class="row">
        <div class="col-sm-6">
        	<div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="gambar" id="gambar">
            <label class="custom-file-label" for="gambar">Choose file</label>
        </div>
          </div>
		  
        </div>
			<div class="col-sm-6">
            <img src="" class="img-thumbnail" id="image">
          </div>
        </div>
		
      </div>
	  
</div>
</div>
</div>
</div>	


<?php }else if($row->status_pembayaran == 'down_payment') { ?>
	<div class="col-sm-12" id="bukti_bayar">
	<div class="row">
  			<div class="col">
					<div class="card">
						<div class="card-header text-center">
							DP I
						</div>
						<div class="card-body">
							<label for="exampleInputEmail1"></label>
			<img src="<?= base_url('assets/foto/bukti_bayar/'.$down_payment['bukti_bayar']); ?>" class="img-responsive" width="420px">
		</div>
		</div>
		</div>
		<div class="col">
					<div class="card">
						<div class="card-header text-center">
							Pelunasan
						</div>
						<div class="card-body">
							<label for="exampleInputEmail1">Upload Bukti Bayar Final</label>
							<div class="input-group mb-3">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="gambar" id="gambar" required>
												<input type="hidden" name="pelunasan" value="paid">
												<label class="custom-file-label" for="gambar">Choose file</label>
											</div>
										</div>
										<div class="col-sm">
            <img src="" class="img-thumbnail" id="image">
          </div>
						</div>	
					</div>
		</div>
			
	</div>
	</div>		
<?php }else{ 
	$sql = $this->db->query('SELECT * FROM `down_payment` WHERE `id_order` = '.$row->id_order.'');
	if ($sql->num_rows() > 1) { ?>
	<div class="col-sm-12" id="bukti_bayar">
	<div class="row">
		<?php foreach ($sql->result_array() as $data) : ?>
  			<div class="col">
					<div class="card">
						<div class="card-header text-center">
							Bukti Pembayaran
						</div>
						<div class="card-body">
							<label for="exampleInputEmail1"></label>
			<img src="<?= base_url('assets/foto/bukti_bayar/'.$data['bukti_bayar']); ?>" class="img-responsive" width="420px">
		</div>
		</div>
		</div>
		<?php endforeach; ?>
	</div>
	</div>	

	<?php }else{?>
<div class="col-md-10 text-center" id="bukti_bayar">
					<div class="card">
						<div class="card-header text-center">
							Bukti Bayar
						</div>
						<div class="card-body">
							<label for="exampleInputEmail1"></label>
     <img src="<?= base_url('assets/foto/bukti_bayar/'. $row->bukti_transfer); ?>" class="img-responsive" width="450px">
</div>
</div>
</div>
<?php } }?>

	<?php if ($status_barang == "dikirim" && $status_bayar == "paid") {}else{ ?>
	<div class="container mb-3">
	<button type="submit" class="btn btn-primary mt-3 float-right" id="submit">Simpan</button>
	</div>
<?php } ?>
</form>
</div>
</div>
</div>















