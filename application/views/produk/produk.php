<script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Produk</h1>
          </div>
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Produk</a>
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
      <section class="content" >
        <div class="container-fluid">
          <div class="row">
          <div class="row row-cols-1 row-cols-md-3" id="result">
            <?php foreach ($daftar_produk as $row) : ?>
    <div class="col mb-4">
      <div class="card">
        <img src="<?= base_url('assets/foto/produk/'.$row->image) ?>" class="card-img-top" alt="...">
          <a href="<?= base_url('produk/edit_produk/'.$row->id_produk); ?>" data-toggle="modal" data-target="#editModal<?= $row->id_produk; ?>" class="btn btn-block btn-default text-bold"><i class="fas fa-edit"></i> Edit Produk</a>
        <div class="card-body">
          <h5 class="card-title"><strong><?= $row->nama_produk ?></strong></h5>
          <p class="card-text float-right" id="harga_jual<?= $row->id_produk ?>">Harga Jual<strong> Rp
          <?php 

$pengolahan = $this->db->query("SELECT * FROM `kategori_pengolahan`")->result_array();
$packaging = $this->db->query("SELECT * FROM `packaging`")->result_array();

//kemasan
$kemasan1kg = $packaging[2]['harga'];
$kemasan500gr =  $packaging[1]['harga'];
$kemasan250gr =  $packaging[0]['harga'];

//stiker
$stiker1kg = $packaging[5]['harga']*2;
$stiker500gr = $packaging[4]['harga']*2;
$stiker250gr = $packaging[3]['harga']*2;

$plastik_clip1kg = $packaging[7]['harga'];


$green_bean = 8000;
$bubuk_roastBean = 32000;
$biaya_bubuk = 12000+$bubuk_roastBean;
$biaya_roastBean = 10000+$bubuk_roastBean;




//perhitungan modal green bean
$defect_sm_g1 = $pengolahan[0]['defect']; 
$defect_sm_g2 = $pengolahan[1]['defect']; 
$defect_sm_g3 = $pengolahan[2]['defect']; 
$defect_sm_g4 = $pengolahan[3]['defect']; 
$defect_sm_g5 = $pengolahan[16]['defect']; 
$modal_sm_g1 = $pengolahan[0]['harga_gabah']*$pengolahan[0]['tarikan']+8000;
$modal_sm_g2 = $modal_sm_g1-(($defect_sm_g2-$defect_sm_g1)*$modal_sm_g1);
$modal_sm_g3 = $modal_sm_g1-(($defect_sm_g3-$defect_sm_g1)*$modal_sm_g1);
$modal_sm_g4 = $modal_sm_g1-(($defect_sm_g4-$defect_sm_g1)*$modal_sm_g1);
$modal_sm_g5 = $modal_sm_g1-(($defect_sm_g5-$defect_sm_g1)*$modal_sm_g1);

$defect_fw_g1 = $pengolahan[4]['defect']; 
$defect_fw_g2 = $pengolahan[5]['defect']; 
$defect_fw_g3 = $pengolahan[6]['defect']; 
$defect_fw_g4 = $pengolahan[7]['defect']; 
$modal_fw_g1 = $pengolahan[4]['harga_gabah']*$pengolahan[4]['tarikan']+8000;
$modal_fw_g2 = $modal_fw_g1-(($defect_fw_g2-$defect_fw_g1)*$modal_fw_g1);
$modal_fw_g3 = $modal_fw_g1-(($defect_fw_g3-$defect_fw_g1)*$modal_fw_g1);
$modal_fw_g4 = $modal_fw_g1-(($defect_fw_g4-$defect_fw_g1)*$modal_fw_g1);

$defect_bh_g1 = $pengolahan[8]['defect']; 
$defect_bh_g2 = $pengolahan[9]['defect']; 
$defect_bh_g3 = $pengolahan[10]['defect']; 
$defect_bh_g4 = $pengolahan[11]['defect']; 
$modal_bh_g1 = $pengolahan[8]['harga_gabah']*$pengolahan[8]['tarikan']+8000;
$modal_bh_g2 = $modal_bh_g1-(($defect_bh_g2-$defect_bh_g1)*$modal_bh_g1);
$modal_bh_g3 = $modal_bh_g1-(($defect_bh_g3-$defect_bh_g1)*$modal_bh_g1);
$modal_bh_g4 = $modal_bh_g1-(($defect_bh_g4-$defect_bh_g1)*$modal_bh_g1);

$defect_n_g1 = $pengolahan[12]['defect']; 
$defect_n_g2 = $pengolahan[13]['defect']; 
$defect_n_g3 = $pengolahan[14]['defect']; 
$defect_n_g4 = $pengolahan[15]['defect']; 
$modal_n_g1 = $pengolahan[12]['harga_gabah']*$pengolahan[12]['tarikan']+8000;
$modal_n_g2 =  $modal_n_g1-(($defect_n_g2-$defect_n_g1)*$modal_n_g1);
$modal_n_g3 =  $modal_n_g1-(($defect_n_g3-$defect_n_g1)*$modal_n_g1);
$modal_n_g4 =  $modal_n_g1-(($defect_n_g4-$defect_n_g1)*$modal_n_g1);


//eksekusi
  if ($row->kategori_produk == "Green Bean") {
    if ($row->id_pengolahan == 1) {
      echo number_format($modal_sm_g1,2,'.',',');
    }elseif ($row->id_pengolahan == 2) {
      echo number_format($modal_sm_g2,2, '.',',');
    }elseif ($row->id_pengolahan == 3) {
      echo number_format($modal_sm_g3,2, '.',',');
    }elseif ($row->id_pengolahan == 4) {
      echo number_format($modal_sm_g4,2, '.',',');
    }

    elseif ($row->id_pengolahan == 5) {
      echo number_format($row->modal_greenbean,2, '.',',');
    }elseif ($row->id_pengolahan == 6) {
      echo number_format($modal_fw_g1-(($row->defect-$defect_fw_g1)*$modal_fw_g1),2, '.',',');
    }elseif ($row->id_pengolahan == 7) {
      echo number_format($modal_fw_g1-(($row->defect-$defect_fw_g1)*$modal_fw_g1),2, '.',',');
    }elseif ($row->id_pengolahan == 8) {
      echo number_format($modal_fw_g1-(($row->defect-$defect_fw_g1)*$modal_fw_g1),2, '.',',');
    }
    
    elseif ($row->id_pengolahan == 9) {
      echo number_format($row->modal_greenbean,2, '.',',');
    }elseif ($row->id_pengolahan == 10) {
      echo number_format($modal_bh_g1-(($row->defect-$defect_bh_g1)*$modal_bh_g1),2, '.',',');
    }elseif ($row->id_pengolahan == 11) {
      echo number_format($modal_bh_g1-(($row->defect-$defect_bh_g1)*$modal_bh_g1),2, '.',',');
    }elseif ($row->id_pengolahan == 12) {
      echo number_format($modal_bh_g1-(($row->defect-$defect_bh_g1)*$modal_bc_g1),2, '.',',');
    }
    
    elseif ($row->id_pengolahan == 13) {
      echo number_format($row->modal_greenbean,2, '.',',');
    }elseif ($row->id_pengolahan == 14) {
      echo number_format($modal_g_n1-(($row->defect-$defect_n_g1)*$modal_g_n1),2, '.',',');
    }elseif ($row->id_pengolahan == 15) {
      echo number_format($modal_g_n1-(($row->defect-$defect_n_g1)*$modal_g_n1),2, '.',',');
    }elseif ($row->id_pengolahan == 16) {
      echo number_format($modal_g_n1-(($row->defect-$defect_n_g1)*$modal_g_n1),2, '.',',');
    }
  }else if ($row->kategori_produk == "Bubuk") {
    if ($row->id_pengolahan == 1 && $row->id_roast == 1) {
      echo number_format($modal_sm_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 1 && $row->id_roast == 2) {
      echo number_format($modal_sm_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 1 && $row->id_roast == 3) {
      echo number_format($modal_sm_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }
    
    else if ($row->id_pengolahan == 2 && $row->id_roast == 1) {
      echo number_format($modal_sm_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 2 && $row->id_roast == 2) {
      echo number_format($modal_sm_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 2 && $row->id_roast == 3) {
      echo number_format($modal_sm_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }
    
    else if ($row->id_pengolahan == 3 && $row->id_roast == 1) {
      echo number_format($modal_sm_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 3 && $row->id_roast == 2) {
      echo number_format($modal_sm_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 3 && $row->id_roast == 3) {
      echo number_format($modal_sm_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }
    
    else if ($row->id_pengolahan == 4 && $row->id_roast == 1) {
      echo number_format($modal_sm_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 4 && $row->id_roast == 2) {
      echo number_format($modal_sm_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 4 && $row->id_roast == 3) {
      echo number_format($modal_sm_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 17 && $row->id_roast == 2) {
      echo number_format($modal_sm_g5*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }
    
    else if ($row->id_pengolahan == 5 && $row->id_roast == 1) {
      echo number_format($modal_fw_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 5 && $row->id_roast == 2) {
      echo number_format($modal_fw_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 5 && $row->id_roast == 3) {
      echo number_format($modal_fw_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 6 && $row->id_roast == 1) {
      echo number_format($modal_fw_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 6 && $row->id_roast == 2) {
      echo number_format($modal_fw_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 6 && $row->id_roast == 3) {
      echo number_format($modal_fw_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 7 && $row->id_roast == 1) {
      echo number_format($modal_fw_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 7 && $row->id_roast == 2) {
      echo number_format($modal_fw_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 7 && $row->id_roast == 3) {
      echo number_format($modal_fw_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 8 && $row->id_roast == 1) {
      echo number_format($modal_fw_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 8 && $row->id_roast == 2) {
      echo number_format($modal_fw_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 8 && $row->id_roast == 3) {
      echo number_format($modal_fw_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 9 && $row->id_roast == 1) {
      echo number_format($modal_bh_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 9 && $row->id_roast == 2) {
      echo number_format($modal_bh_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 9 && $row->id_roast == 3) {
      echo number_format($modal_bh_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 10 && $row->id_roast == 1) {
      echo number_format($modal_bh_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 10 && $row->id_roast == 2) {
      echo number_format($modal_bh_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 10 && $row->id_roast == 3) {
      echo number_format($modal_bh_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 11 && $row->id_roast == 1) {
      echo number_format($modal_bh_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 11 && $row->id_roast == 2) {
      echo number_format($modal_bh_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 11 && $row->id_roast == 3) {
      echo number_format($modal_bh_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 12 && $row->id_roast == 1) {
      echo number_format($modal_bh_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 12 && $row->id_roast == 2) {
      echo number_format($modal_bh_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 12 && $row->id_roast == 3) {
      echo number_format($modal_bh_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 13 && $row->id_roast == 1) {
      echo number_format($modal_n_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 13 && $row->id_roast == 2) {
      echo number_format($modal_n_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 13 && $row->id_roast == 3) {
      echo number_format($modal_n_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 14 && $row->id_roast == 1) {
      echo number_format($modal_n_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 14 && $row->id_roast == 2) {
      echo number_format($modal_n_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 14 && $row->id_roast == 3) {
      echo number_format($modal_n_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 15 && $row->id_roast == 1) {
      echo number_format($modal_n_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 15 && $row->id_roast == 2) {
      echo number_format($modal_n_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 15 && $row->id_roast == 3) {
      echo number_format($modal_n_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

    else if ($row->id_pengolahan == 16 && $row->id_roast == 1) {
      echo number_format($modal_n_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 16 && $row->id_roast == 2) {
      echo number_format($modal_n_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }else if ($row->id_pengolahan == 16 && $row->id_roast == 3) {
      echo number_format($modal_n_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
    }

   

  }else if ($row->kategori_produk == "Roast Bean") {
    if ($row->id_pengolahan == 1 && $row->id_roast == 1) {
      echo number_format($modal_sm_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 1 && $row->id_roast == 2) {
      echo number_format($modal_sm_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 1 && $row->id_roast == 3) {
      echo number_format($modal_sm_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }
    
    else if ($row->id_pengolahan == 2 && $row->id_roast == 1) {
      echo number_format($modal_sm_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 2 && $row->id_roast == 2) {
      echo number_format($modal_sm_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 2 && $row->id_roast == 3) {
      echo number_format($modal_sm_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }
    
    else if ($row->id_pengolahan == 3 && $row->id_roast == 1) {
      echo number_format($modal_sm_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 3 && $row->id_roast == 2) {
      echo number_format($modal_sm_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 3 && $row->id_roast == 3) {
      echo number_format($modal_sm_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }
    
    else if ($row->id_pengolahan == 4 && $row->id_roast == 1) {
      echo number_format($modal_sm_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 4 && $row->id_roast == 2) {
      echo number_format($modal_sm_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 4 && $row->id_roast == 3) {
      echo number_format($modal_sm_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }
    
    else if ($row->id_pengolahan == 5 && $row->id_roast == 1) {
      echo number_format($modal_fw_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 5 && $row->id_roast == 2) {
      echo number_format($modal_fw_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 5 && $row->id_roast == 3) {
      echo number_format($modal_fw_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 6 && $row->id_roast == 1) {
      echo number_format($modal_fw_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 6 && $row->id_roast == 2) {
      echo number_format($modal_fw_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 6 && $row->id_roast == 3) {
      echo number_format($modal_fw_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 7 && $row->id_roast == 1) {
      echo number_format($modal_fw_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 7 && $row->id_roast == 2) {
      echo number_format($modal_fw_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 7 && $row->id_roast == 3) {
      echo number_format($modal_fw_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 8 && $row->id_roast == 1) {
      echo number_format($modal_fw_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 8 && $row->id_roast == 2) {
      echo number_format($modal_fw_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 8 && $row->id_roast == 3) {
      echo number_format($modal_fw_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 9 && $row->id_roast == 1) {
      echo number_format($modal_bh_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 9 && $row->id_roast == 2) {
      echo number_format($modal_bh_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 9 && $row->id_roast == 3) {
      echo number_format($modal_bh_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 10 && $row->id_roast == 1) {
      echo number_format($modal_bh_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 10 && $row->id_roast == 2) {
      echo number_format($modal_bh_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 10 && $row->id_roast == 3) {
      echo number_format($modal_bh_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 11 && $row->id_roast == 1) {
      echo number_format($modal_bh_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 11 && $row->id_roast == 2) {
      echo number_format($modal_bh_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 11 && $row->id_roast == 3) {
      echo number_format($modal_bh_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 12 && $row->id_roast == 1) {
      echo number_format($modal_bh_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 12 && $row->id_roast == 2) {
      echo number_format($modal_bh_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 12 && $row->id_roast == 3) {
      echo number_format($modal_bh_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 13 && $row->id_roast == 1) {
      echo number_format($modal_n_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 13 && $row->id_roast == 2) {
      echo number_format($modal_n_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 13 && $row->id_roast == 3) {
      echo number_format($modal_n_g1*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 14 && $row->id_roast == 1) {
      echo number_format($modal_n_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 14 && $row->id_roast == 2) {
      echo number_format($modal_n_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 14 && $row->id_roast == 3) {
      echo number_format($modal_n_g2*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 15 && $row->id_roast == 1) {
      echo number_format($modal_n_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 15 && $row->id_roast == 2) {
      echo number_format($modal_n_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 15 && $row->id_roast == 3) {
      echo number_format($modal_n_g3*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

    else if ($row->id_pengolahan == 16 && $row->id_roast == 1) {
      echo number_format($modal_n_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 16 && $row->id_roast == 2) {
      echo number_format($modal_n_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }else if ($row->id_pengolahan == 16 && $row->id_roast == 3) {
      echo number_format($modal_n_g4*$row->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
    }

  }   

          ?></strong></p>
          <p class="card-text"><?= $row->deskripsi ?></p>
          <p class="card-text float-right">Stok Sisa: <?= $row->stok ?></p>
          <p class="card-text badge badge-info"><i class="fas fa-tags"></i> <?= $row->kategori_produk ?></p>
        </div>
        <div class="card-footer">
          <div class="input-group">
            <input type="number" class="form-control" value="1" name="jumlah_produk" id="jumlah_produk">
            <input type="hidden" value="<?= $row->id_produk ?>" name="id_produk" id="id_produk">
            <input type="hidden" value="<?= $row->nama_produk ?>" name="nama_produk" id="nama_produk">
            <input type="hidden" value="" name="harga_produk" id="harga_produk<?= $row->id_produk ?>">
            <div class="input-group-append">
              <button type="button" class="btn btn-primary" id="add_produk<?= $row->id_produk ?>" onclick="add_cart(<?= $row->id_produk ?>)" data-nama="<?= $row->nama_produk ?>" data-idproduk="<?= $row->id_produk ?>" data-hargaproduk=""><i class="fas fa-shopping-cart"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
</div>
              </div>
              <!-- /.card -->
              </div>
            <!-- /.col -->
          
          <!-- /.row -->
        
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<!-- Modal tambah data-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= base_url('produk/tambah_produk'); ?>" method="POST" enctype="multipart/form-data" id="tambahProduk">
      
        <div class="form-group">
        <label for="exampleInputEmail1">Nama Produk</label>
        <input type="text" class="form-control" id="nama_produk" name="nama_produk">
        <?= form_error('namaproduk', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Kategori Pengolahan</label>
        <select name="kategori_pengolahan" id="kategori_pengolahan" class="form-control" required>
          <option value="">Pilih Kategori</option>
          <?php foreach ($kategori_produk as $r) : ?>
          <option value="<?= $r['id_pengolahan'] ?>"><?= $r['nama_pengolahan'].' Grade '.$r['grade']; ?></option>
          <?php endforeach; ?>
        </select>
        <?= form_error('kategori_produk', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Bentuk Produk</label>
        <select name="bentuk_produk" id="bentuk_produk" class="form-control" required>
          <option value="">Pilih Kategori</option>
          <?php foreach ($kategori_bentuk as $r) : ?>
          <option value="<?= $r['id_kategori'] ?>"><?= $r['kategori_produk']; ?></option>
          <?php endforeach; ?>
        </select>
        <?= form_error('kategori_produk', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

      <div class="form-group" style="display: none;" id="roast_level">
        <label for="exampleInputEmail1">Level Roast</label>
        <select name="level_roast" id="level_roast" class="form-control" required>
          <option value="">Pilih Kategori</option>
          <?php foreach ($level_roast as $r) : ?>
          <option value="<?= $r['id_level'] ?>"><?= $r['level_roast']; ?></option>
          <?php endforeach; ?>
        </select>
        <?= form_error('kategori_produk', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Deskripsi Produk</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

      <label for="exampleInputEmail1">Upload Gambar</label>
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
            <img src="" class="img-thumbnail" id="image">
          </div>
        </div>
      </div>
</div>
<?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>

<div class="form-group">
        <label for="exampleInputEmail1">Status Produk: </label>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_available" id="inlineRadio1" value="1">
        <label class="form-check-label" for="inlineRadio1">Aktif</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_available" id="inlineRadio2" value="0">
        <label class="form-check-label" for="inlineRadio2">Tidak</label>
      </div>
    </div>
    <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Tambah</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
  $no= 0;
  foreach ($daftar_produk as $row) : ?>
<div class="modal fade" id="editModal<?= $row->id_produk ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit - <?= $row->nama_produk ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('produk/update_produk/'.$row->id_produk); ?>" method="POST" enctype="multipart/form-data" id="updateProduk">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Produk</label>
        <input type="hidden" value="<?= $row->id_produk ?>">
        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $row->nama_produk ?>">
        <?= form_error('namaproduk', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Jumlah Stok</label>
        <div class="input-group mb-2 mr-sm-2">
        <input type="number" class="form-control" name="jumlah_stok" id="exampleInputEmail1" value="<?= $row->stok ?>"> 
        <div class="input-group-prepend">
          <div class="input-group-text">Kg</div>
        </div>
        </div>
        <?= form_error('jumlahstok', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <label for="exampleInputEmail1">Upload Gambar</label>
      <div class="form-group row">
      <div class="col sm-10">
        <div class="row">
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="gambar" id="updategambar">
            <label class="custom-file-label" for="gambar">Choose file</label>
        </div>
          </div>
          <div class="col-sm-6">
            <img src="" class="img-thumbnail" id="updateimage">
          </div>
        </div>
      </div>
</div>
<?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
<!-- <div class="form-group">
        <label for="exampleInputEmail1">Status Produk: </label>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_available" id="inlineRadio1" value="1">
        <label class="form-check-label" for="inlineRadio1">Aktif</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_available" id="inlineRadio2" value="0">
        <label class="form-check-label" for="inlineRadio2">Tidak</label>
      </div>
    </div>
    <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Tambah</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<script>
			function add_cart($id_produk) {
					let jumlah_produk = 1;
					let id_produk = $id_produk;
					let harga_produk = 87000;
					if (id_produk == "") {
					}
					else if (jumlah_produk < 1) {
					  alert("Stok Produk Tidak Kurang dari 1");
					}else{
					$.ajax({
					 type: "POST",
					  url: "<?= base_url("produk/tambah_keranjang") ?>",
					  data: {
						jumlah_produk : jumlah_produk,
						id_produk:id_produk,
						harga_produk:harga_produk
					  },
					  success:function(respond){
						if (respond >= 1) {
              $(".total-cart").html(respond);
              Swal.fire(
            'Berhasil!',
            'Total item di keranjang ada '+respond,
            'success'
              );
            
						}else if(respond==="available"){
              Swal.fire(
            'Oopss!',
            'Produk Sudah Ada Dalam Keranjang',
            'warning'
          );
						}
					  }
					})
				  }
        }
				</script>

<script>
$(document).ready(function (params) {
  $("#bentuk_produk").change(function() {
    let bentuk_produk = $(this).val();
    if (bentuk_produk == 2 || bentuk_produk == 3) {
      $("#roast_level").show(500);
    }else{
      $("#roast_level").hide(500);
      $("#level_roast").removeAttr('required', ''); 
    }
  })
})
</script>

<script> 
    CKEDITOR.replace('deskripsi');
</script>