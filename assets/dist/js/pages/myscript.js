$(function (){

$('.tambahPembelian').on('click', function(){
	
	$('#pelangganbaruLabel').html('Tambah Data Pembelian');

});

$('.detailPembelian').on('click', function(){
	$('#pelangganbaruLabel').html('Detail Pembelian');
	$('.modal-footer button[type=submit]').hide();

	const id = $(this).data('id');

	$.ajax({
		url: 'http://localhost/brjrcoffee/pembelian/detail_pembelian',
		data: {id_pembelian:id},
		method: 'post',
		dataType: 'json',
		success: function(data) {
			$('#supplier').val(data.supplier);
			$('#qty').val(data.qty);
			$('#total_harga').val(data.total_harga);
			$('#compose-textarea').val(data.catatan);
			$('#status').val(data.status);
			$('#gambar').val(data.bukti_beli);
		}	
	});

});

});
