<div class="content-wrapper" >
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

<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					Formulir Alamat Pengirimian	
				</div>
				<div class="card-body">
					<form action="<?= base_url("checkout/create") ?>" method="POST" enctype="multipart/form-data" id="checkout">
						<div class="form-group">
							<label for="">Nama Pelanggan</label>
							<input type="text" class="form-control" name="name" placeholder="Masukkan nama penerima" value="">
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="">Telepon</label>
							<input type="text" class="form-control" name="contact" placeholder="Masukkan nomor telepon penerima" value="">
						</div>

						<div class="form-group row" id="status_pesanan">
						<div class="form-group col-6">
						<label for="status_pembayaran">Status Pembayaran</label>
						<select name="status_pembayaran" id="status_pembayaran" class="form-control" id="status_bayar" required>
										<option value="waiting">Menunggu Pembayaran</option>
										<option value="paid">Dibayar</option>
										<option value="down_payment">Down Payment(DP)</option>
						</select>
						</div>
						<div class="form-group">
						<label for="status_order">Status Order</label>
						<select name="status_order" id="status_order" class="form-control" required>
										<option value="diproses">Diproses</option>
										<option value="dikirim">Dikirim</option>
						</select>
						</div>
						</div>

						<div class="form-group row">
						<div class="form-group col-6">
						<label for="">Ekspedisi</label>
						<input class="form-control" list="datalistOptions" name="ekspedisi" id="ekspedisi" placeholder="Pilih Ekspedisi">
							<datalist id="datalistOptions" >
								<?php foreach ($ekspedisi as $data) { ?>
							<option value="<?= $data->nama ?>">
						<?php } ?>
							</datalist>
						</div>
						<div class="form-group">
						<label for="">Ongkos Kirim</label>
							<input type="number" class="form-control" name="ongkir" placeholder="Masukkan Ongkos Kirim">
						</div>
						</div>

						<div class="form-group" id="down_payment" style="display: none;">
						<label>Jumlah DP</label>
<div class="input-group" id="down_payment">
						<div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Rp</span>
  </div>
  <input type="number" class="form-control" placeholder="Jumlah DP" id="down_payment" name="down_payment" aria-label="Down Payment" aria-describedby="basic-addon1" required>
  </div>
						</div>
						<div class="form-group" id="bukti_pembayaran" style="display: none;">
						<div class="card"><div class="card-body"><label for="exampleInputEmail1">Upload Bukti Bayar</label>
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-6">
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="bukti_bayar" id="bukti_bayar" required>
												<label class="custom-file-label" for="gambar">Choose file</label>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<img src="" class="img-thumbnail" id="gambar">
									</div>
								</div></div></div></div></div>
						</div>

						<div class="form-group" id="resi">

						</div>
						<button class="btn btn-info float-right" type="submit" id="submit">Lanjut</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-12">
					<div class="card mb-3">
						<div class="card-header">
							Cart
						</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th>Produk</th>
										<th>Qty</th>
										<th>Harga</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($keranjang as $row) : ?>
									<tr>
										<td><?= $row->nama_produk  ?></td>
										<td><?= $row->qty  ?></td>
										<td>Rp <?= number_format($row->harga_produk, 0, ',', '.')  ?></td>
									</tr>
									<?php endforeach; ?>
									<tr>
										<td colspan="2">Subtotal:</td>
										<td>Rp 	<?= number_format($row->subtotal,0, ',', '.') ?></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="2">Grand Total:</th>
										<th>Rp <?= number_format(array_sum(array_column($keranjang, 'subtotal')),0, ',', '.') ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
									</div>
	</div>
	
	</div>

	<script>
		$(document).ready(function(){
			$('#status_order').on('change', function () {
			let status_order = $('#status_order').val();
			if (status_order == "dikirim") {
				let ekspedisi = $('#ekspedisi').val();
			if (ekspedisi == "Ambil Sendiri" || ekspedisi == "Diantar") {
					$('#resi').empty();
			}else if(ekspedisi != "Ambil Sendiri" || ekspedisi != "Diantar"){
				$('#resi').append('<label for="">No Resi/Mobil</label><input type="text" class="form-control" name="no_resi" placeholder="Masukkan Nomor Resi Pengiriman/No Mobil">',);
			}else{
				$('#ekspedisi').on('change', function () {
				let ekspedisi2 = $('#ekspedisi').val();
				if (ekspedisi2 != "Ambil Sendiri" || ekspedisi2 != "Diantar") {
					$('#resi').append('<label for="">No Resi/Mobil</label><input type="text" class="form-control" name="no_resi" placeholder="Masukkan Nomor Resi Pengiriman/No Mobil">');
				}else if (ekspedisi2 == "Ambil Sendiri" || ekspedisi2 == "Diantar") {
					$('#resi').empty();
				}
			});
			}
		}else if (status_order == "diproses"){
			let ekspedisi = $('#ekspedisi').val();
			$('#resi').empty();
			// if (ekspedisi == "Ambil Sendiri" || ekspedisi == "Diantar") {
			// 		$('#resi').empty();
			// }else if(ekspedisi != "Ambil Sendiri" || ekspedisi != "Diantar"){
			// 	$('#resi').append('<label for="">No Resi/Mobil</label><input type="text" class="form-control" name="no_resi" placeholder="Masukkan Nomor Resi Pengiriman/No Mobil">');
			// }else{
			// 	$('#ekspedisi').on('change', function () {
			// 	let ekspedisi = $('#ekspedisi').val();
			// 	if (ekspedisi == "Ambil Sendiri" || ekspedisi == "Diantar") {
			// 		$('#resi').empty();
			// 	}else{
			// 	$('#resi').append('<label for="">No Resi/Mobil</label><input type="text" class="form-control" name="no_resi" placeholder="Masukkan Nomor Resi Pengiriman/No Mobil">');
			// 	}
			// });
			// }
		}
	});

	$('#status_pembayaran').on('change', function() {
  var val = this.value;
  if (val == "paid") {	
    $('#bukti_pembayaran').show(500);
	$('#down_payment').hide(500);
  }else if (val == "down_payment"){
	$('#bukti_pembayaran').show(500);
	$('#down_payment').show(1000);

  }else{
    $('#bukti_pembayaran').hide(500);
	$('#bukti_pembayaran').removeAttr('required');
	$('#down_payment').removeAttr('required');
	$('#down_payment').hide(500);
  }
});
		});
		
	</script>

	<script text="javascript">
  $(document).ready(function(){
  $('.custom-file-input').on('change', function() {
  let fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

});
</script>
	<script>
  $(document).ready(function(){
   $('#bukti_bayar').on('change', function(){
      var kirim = (this).files[0];
      viewImages(kirim);
    });
  
  function viewImages(file){
    var reader = new FileReader();
    reader.onload=function(){
    $('#gambar').attr('src', reader.result);
    }
    reader.readAsDataURL(file);
  }
});
</script>






