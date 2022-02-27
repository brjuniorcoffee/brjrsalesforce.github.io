<div class="content-wrapper">
    <div class="container-fluid">
<div class="callout callout-info">
<?php $row = $this->db->query('SELECT * FROM `kategori_pengolahan`')->result_array();
                 echo '<h5>Harga Gabah Semi Washed Rp <strong>'. $row[0]['harga_gabah'].'</strong></h5>';
?>
                  <p>Tahun <?= date('Y') ?></p>
                </div>
                <div class="container-fluid">
<div class="row">
<div class="col-sm-12">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengolahan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Pengolahan</th>
                    <th>Grade</th>
                    <th>Harga Gabah</th>
                    <th>Tarikan</th>
                    <th>Defect</th>
                    <th>Modal Green Bean</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; foreach ($pengolahan as $data) : ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $data->nama_pengolahan ?></td>
                    <td><?= $data->grade ?></td>
                    <td class="text-center">
                      <?php if ($data->harga_gabah == 0) { echo "-"; }else{ ?>
                                        <div class="input-group">
                                          <input type="hidden" name="id_pengolahan" id="id_pengolahan" value="<?= $data->id_pengolahan; ?>">
                                            <input type="number" class="form-control text-center" name="harga_gabah" id="harga_gabah" value="<?= $data->harga_gabah ?>">
                                            <div class="input-group-append">
                                                <a class="btn btn-info" id="new_gabah" onclick="new_gabah(<?= $data->id_pengolahan ?>)" data-idpengolahan="<?= $data->id_pengolahan; ?>" data-hargagabah="<?= $data->harga_gabah; ?>"><i class="fas fa-check"></i></a>
                                            </div>
                                        </div>
                                        <?php } ?>
                     </td>
                    <td class="text-center">
                    <?php if ($data->tarikan == 0) { echo "-"; }else{ echo $data->tarikan;} ?>
                      </td>
                      <td>   <div class="input-group">
                                          <input type="hidden" name="id_pengolahan" id="id_pengolahan" value="<?= $data->id_pengolahan; ?>">
                                            <input type="text" class="form-control text-center" name="defect" id="defect<?= $data->id_pengolahan ?>" value="<?= $data->defect ?>">
                                            <div class="input-group-append">
                                                <a class="btn btn-info" id="new_defect" onclick="new_defect(<?= $data->id_pengolahan ?>)" data-idpengolahan="<?= $data->id_pengolahan; ?>"><i class="fas fa-check"></i></a>
                                            </div>
                                        </div></td>
                        <td>Rp <?= number_format($data->modal_greenbean)?></td>
                  </tr>
                <?php $no++; endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No.</th>
                    <th>Pengolahan</th>
                    <th>Grade</th>
                    <th>Modal Green Bean</th>
                    <th>Harga Gabah</th>
                    <th>Defect</th>
                    <th>Tarikan</th>
                  </tr>
                  </tfoot>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            
            </div>
            <div class="col-sm-12">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Level Roast</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Level Roast</th>
                    <th>tarikan</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no =1; foreach ($level_roast as $data) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data->level_roast; ?></td>
                    <td><?= $data->tarikan_roast; ?> Kg</td>
                  </tr>
               <?php $no++; endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No.</th>
                    <th>Level Roast</th>
                    <th>tarikan</th>
                  </tr>
                  </tfoot>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Packaging</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no =1; foreach ($packaging as $data) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data->nama_barang; ?></td>
                    <td><?= $data->jumlah.' '.$data->satuan; ?></td>
                    <td>Rp <?= number_format($data->harga,2,','); ?></td>
                  </tr>
               <?php $no++; endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No.</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                  </tr>
                  </tfoot>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Modal Produk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example6" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Modal</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                  <?php $no = 1; 
                  foreach ($produk as $data) : ?>
                  <tr>
                  <td><?= $no; ?></td>
                  <td><?= $data->nama_produk; ?></td>
                  <td><?= $data->kategori_produk;
                  ?></td>
                  <td>Rp 
                  <?php
                  $pengolahan = $this->db->query("SELECT * FROM `kategori_pengolahan`")->result_array();
                  $packaging = $this->db->query("SELECT * FROM `packaging`")->result_array();
                    
                  //packaging
                  $kemasan1kg = $packaging[2]['harga'];
                  $kemasan500gr =  $packaging[1]['harga'];
                  $kemasan250gr =  $packaging[0]['harga']; 
                  $stiker1kg = $packaging[5]['harga']*2;
                  $stiker500gr = $packaging[4]['harga']*2;
                  $stiker250gr = $packaging[3]['harga']*2;
                  $plastik_clip1kg = $packaging[7]['harga'];

                  //biaya operasional
                  $biaya_bubuk = 12000;
                  $biaya_roastBean = 10000;
                  

                  $defect_sm_g1 = $pengolahan[0]['defect']; 
                  $defect_sm_g2 = $pengolahan[1]['defect']; 
                  $defect_sm_g3 = $pengolahan[2]['defect']; 
                  $defect_sm_g4 = $pengolahan[3]['defect']; 
                  $defect_sm_g5 = $pengolahan[16]['defect']; 
                  $modal_sm_g1 = $pengolahan[0]['harga_gabah']*$pengolahan[0]['tarikan'];
                  $modal_sm_g2 = $modal_sm_g1-(($defect_sm_g2-$defect_sm_g1)*$modal_sm_g1);
                  $modal_sm_g3 = $modal_sm_g1-(($defect_sm_g3-$defect_sm_g1)*$modal_sm_g1);
                  $modal_sm_g4 = $modal_sm_g1-(($defect_sm_g4-$defect_sm_g1)*$modal_sm_g1);
                  $modal_sm_g5 = $modal_sm_g1-(($defect_sm_g5-$defect_sm_g1)*$modal_sm_g1);

                  $defect_fw_g1 = $pengolahan[4]['defect']; 
                  $defect_fw_g2 = $pengolahan[5]['defect']; 
                  $defect_fw_g3 = $pengolahan[6]['defect']; 
                  $defect_fw_g4 = $pengolahan[7]['defect']; 
                  $modal_fw_g1 = $pengolahan[4]['harga_gabah']*$pengolahan[4]['tarikan'];
                  $modal_fw_g2 = $modal_fw_g1-(($defect_fw_g2-$defect_fw_g1)*$modal_fw_g1);
                  $modal_fw_g3 = $modal_fw_g1-(($defect_fw_g3-$defect_fw_g1)*$modal_fw_g1);
                  $modal_fw_g4 = $modal_fw_g1-(($defect_fw_g4-$defect_fw_g1)*$modal_fw_g1);

                  $defect_bh_g1 = $pengolahan[8]['defect']; 
                  $defect_bh_g2 = $pengolahan[9]['defect']; 
                  $defect_bh_g3 = $pengolahan[10]['defect']; 
                  $defect_bh_g4 = $pengolahan[11]['defect']; 
                  $modal_bh_g1 = $pengolahan[8]['harga_gabah']*$pengolahan[8]['tarikan'];
                  $modal_bh_g2 = $modal_bh_g1-(($defect_bh_g2-$defect_bh_g1)*$modal_bh_g1);
                  $modal_bh_g3 = $modal_bh_g1-(($defect_bh_g3-$defect_bh_g1)*$modal_bh_g1);
                  $modal_bh_g4 = $modal_bh_g1-(($defect_bh_g4-$defect_bh_g1)*$modal_bh_g1);

                  $defect_n_g1 = $pengolahan[12]['defect']; 
                  $defect_n_g2 = $pengolahan[13]['defect']; 
                  $defect_n_g3 = $pengolahan[14]['defect']; 
                  $defect_n_g4 = $pengolahan[15]['defect']; 
                  $modal_n_g1 = $pengolahan[12]['harga_gabah']*$pengolahan[12]['tarikan'];
                  $modal_n_g2 =  $modal_n_g1-(($defect_n_g2-$defect_n_g1)*$modal_n_g1);
                  $modal_n_g3 =  $modal_n_g1-(($defect_n_g3-$defect_n_g1)*$modal_n_g1);
                  $modal_n_g4 =  $modal_n_g1-(($defect_n_g4-$defect_n_g1)*$modal_n_g1);
                  
                
                    if ($data->kategori_produk == "Green Bean") {
                      if ($data->id_pengolahan == 1) {
                        echo number_format($data->modal_greenbean,2,'.',',');
                      }elseif ($data->id_pengolahan == 2) {
                        echo number_format($modal_sm_g2,2, '.',',');
                      }elseif ($data->id_pengolahan == 3) {
                        echo number_format($modal_sm_g3,2, '.',',');
                      }elseif ($data->id_pengolahan == 4) {
                        echo number_format($modal_sm_g4,2, '.',',');
                      }

                      elseif ($data->id_pengolahan == 5) {
                        echo number_format($data->modal_greenbean,2, '.',',');
                      }elseif ($data->id_pengolahan == 6) {
                        echo number_format($modal_fw_g1-(($data->defect-$defect_fw_g1)*$modal_fw_g1),2, '.',',');
                      }elseif ($data->id_pengolahan == 7) {
                        echo number_format($modal_fw_g1-(($data->defect-$defect_fw_g1)*$modal_fw_g1),2, '.',',');
                      }elseif ($data->id_pengolahan == 8) {
                        echo number_format($modal_fw_g1-(($data->defect-$defect_fw_g1)*$modal_fw_g1),2, '.',',');
                      }
                      
                      elseif ($data->id_pengolahan == 9) {
                        echo number_format($data->modal_greenbean,2, '.',',');
                      }elseif ($data->id_pengolahan == 10) {
                        echo number_format($modal_bh_g1-(($data->defect-$defect_bh_g1)*$modal_bh_g1),2, '.',',');
                      }elseif ($data->id_pengolahan == 11) {
                        echo number_format($modal_bh_g1-(($data->defect-$defect_bh_g1)*$modal_bh_g1),2, '.',',');
                      }elseif ($data->id_pengolahan == 12) {
                        echo number_format($modal_bh_g1-(($data->defect-$defect_bh_g1)*$modal_bc_g1),2, '.',',');
                      }
                      
                      elseif ($data->id_pengolahan == 13) {
                        echo number_format($data->modal_greenbean,2, '.',',');
                      }elseif ($data->id_pengolahan == 14) {
                        echo number_format($modal_g_n1-(($data->defect-$defect_n_g1)*$modal_g_n1),2, '.',',');
                      }elseif ($data->id_pengolahan == 15) {
                        echo number_format($modal_g_n1-(($data->defect-$defect_n_g1)*$modal_g_n1),2, '.',',');
                      }elseif ($data->id_pengolahan == 16) {
                        echo number_format($modal_g_n1-(($data->defect-$defect_n_g1)*$modal_g_n1),2, '.',',');
                      }
                    }else if ($data->kategori_produk == "Bubuk") {
                      if ($data->id_pengolahan == 1 && $data->id_roast == 1) {
                        echo number_format($modal_sm_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 1 && $data->id_roast == 2) {
                        echo number_format($modal_sm_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 1 && $data->id_roast == 3) {
                        echo number_format($modal_sm_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }
                      
                      else if ($data->id_pengolahan == 2 && $data->id_roast == 1) {
                        echo number_format($modal_sm_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 2 && $data->id_roast == 2) {
                        echo number_format($modal_sm_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 2 && $data->id_roast == 3) {
                        echo number_format($modal_sm_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }
                      
                      else if ($data->id_pengolahan == 3 && $data->id_roast == 1) {
                        echo number_format($modal_sm_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 3 && $data->id_roast == 2) {
                        echo number_format($modal_sm_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 3 && $data->id_roast == 3) {
                        echo number_format($modal_sm_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }
                      
                      else if ($data->id_pengolahan == 4 && $data->id_roast == 1) {
                        echo number_format($modal_sm_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 4 && $data->id_roast == 2) {
                        echo number_format($modal_sm_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 4 && $data->id_roast == 3) {
                        echo number_format($modal_sm_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 17 && $data->id_roast == 2) {
                        echo number_format($modal_sm_g5*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }
                      
                      else if ($data->id_pengolahan == 5 && $data->id_roast == 1) {
                        echo number_format($modal_fw_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 5 && $data->id_roast == 2) {
                        echo number_format($modal_fw_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 5 && $data->id_roast == 3) {
                        echo number_format($modal_fw_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 6 && $data->id_roast == 1) {
                        echo number_format($modal_fw_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 6 && $data->id_roast == 2) {
                        echo number_format($modal_fw_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 6 && $data->id_roast == 3) {
                        echo number_format($modal_fw_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 7 && $data->id_roast == 1) {
                        echo number_format($modal_fw_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 7 && $data->id_roast == 2) {
                        echo number_format($modal_fw_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 7 && $data->id_roast == 3) {
                        echo number_format($modal_fw_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 8 && $data->id_roast == 1) {
                        echo number_format($modal_fw_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 8 && $data->id_roast == 2) {
                        echo number_format($modal_fw_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 8 && $data->id_roast == 3) {
                        echo number_format($modal_fw_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 9 && $data->id_roast == 1) {
                        echo number_format($modal_bh_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 9 && $data->id_roast == 2) {
                        echo number_format($modal_bh_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 9 && $data->id_roast == 3) {
                        echo number_format($modal_bh_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 10 && $data->id_roast == 1) {
                        echo number_format($modal_bh_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 10 && $data->id_roast == 2) {
                        echo number_format($modal_bh_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 10 && $data->id_roast == 3) {
                        echo number_format($modal_bh_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 11 && $data->id_roast == 1) {
                        echo number_format($modal_bh_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 11 && $data->id_roast == 2) {
                        echo number_format($modal_bh_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 11 && $data->id_roast == 3) {
                        echo number_format($modal_bh_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 12 && $data->id_roast == 1) {
                        echo number_format($modal_bh_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 12 && $data->id_roast == 2) {
                        echo number_format($modal_bh_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 12 && $data->id_roast == 3) {
                        echo number_format($modal_bh_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 13 && $data->id_roast == 1) {
                        echo number_format($modal_n_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 13 && $data->id_roast == 2) {
                        echo number_format($modal_n_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 13 && $data->id_roast == 3) {
                        echo number_format($modal_n_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 14 && $data->id_roast == 1) {
                        echo number_format($modal_n_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 14 && $data->id_roast == 2) {
                        echo number_format($modal_n_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 14 && $data->id_roast == 3) {
                        echo number_format($modal_n_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 15 && $data->id_roast == 1) {
                        echo number_format($modal_n_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 15 && $data->id_roast == 2) {
                        echo number_format($modal_n_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 15 && $data->id_roast == 3) {
                        echo number_format($modal_n_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 16 && $data->id_roast == 1) {
                        echo number_format($modal_n_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 16 && $data->id_roast == 2) {
                        echo number_format($modal_n_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }else if ($data->id_pengolahan == 16 && $data->id_roast == 3) {
                        echo number_format($modal_n_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_bubuk,2, '.',',');
                      }

                    }else if ($data->kategori_produk == "Roast Bean") {
                      if ($data->id_pengolahan == 1 && $data->id_roast == 1) {
                        echo number_format($modal_sm_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 1 && $data->id_roast == 2) {
                        echo number_format($modal_sm_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 1 && $data->id_roast == 3) {
                        echo number_format($modal_sm_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }
                      
                      else if ($data->id_pengolahan == 2 && $data->id_roast == 1) {
                        echo number_format($modal_sm_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 2 && $data->id_roast == 2) {
                        echo number_format($modal_sm_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 2 && $data->id_roast == 3) {
                        echo number_format($modal_sm_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }
                      
                      else if ($data->id_pengolahan == 3 && $data->id_roast == 1) {
                        echo number_format($modal_sm_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 3 && $data->id_roast == 2) {
                        echo number_format($modal_sm_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 3 && $data->id_roast == 3) {
                        echo number_format($modal_sm_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }
                      
                      else if ($data->id_pengolahan == 4 && $data->id_roast == 1) {
                        echo number_format($modal_sm_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 4 && $data->id_roast == 2) {
                        echo number_format($modal_sm_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 4 && $data->id_roast == 3) {
                        echo number_format($modal_sm_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }
                      
                      else if ($data->id_pengolahan == 5 && $data->id_roast == 1) {
                        echo number_format($modal_fw_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 5 && $data->id_roast == 2) {
                        echo number_format($modal_fw_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 5 && $data->id_roast == 3) {
                        echo number_format($modal_fw_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 6 && $data->id_roast == 1) {
                        echo number_format($modal_fw_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 6 && $data->id_roast == 2) {
                        echo number_format($modal_fw_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 6 && $data->id_roast == 3) {
                        echo number_format($modal_fw_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 7 && $data->id_roast == 1) {
                        echo number_format($modal_fw_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 7 && $data->id_roast == 2) {
                        echo number_format($modal_fw_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 7 && $data->id_roast == 3) {
                        echo number_format($modal_fw_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 8 && $data->id_roast == 1) {
                        echo number_format($modal_fw_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 8 && $data->id_roast == 2) {
                        echo number_format($modal_fw_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 8 && $data->id_roast == 3) {
                        echo number_format($modal_fw_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 9 && $data->id_roast == 1) {
                        echo number_format($modal_bh_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 9 && $data->id_roast == 2) {
                        echo number_format($modal_bh_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 9 && $data->id_roast == 3) {
                        echo number_format($modal_bh_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 10 && $data->id_roast == 1) {
                        echo number_format($modal_bh_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 10 && $data->id_roast == 2) {
                        echo number_format($modal_bh_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 10 && $data->id_roast == 3) {
                        echo number_format($modal_bh_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 11 && $data->id_roast == 1) {
                        echo number_format($modal_bh_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 11 && $data->id_roast == 2) {
                        echo number_format($modal_bh_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 11 && $data->id_roast == 3) {
                        echo number_format($modal_bh_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 12 && $data->id_roast == 1) {
                        echo number_format($modal_bh_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 12 && $data->id_roast == 2) {
                        echo number_format($modal_bh_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 12 && $data->id_roast == 3) {
                        echo number_format($modal_bh_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 13 && $data->id_roast == 1) {
                        echo number_format($modal_n_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 13 && $data->id_roast == 2) {
                        echo number_format($modal_n_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 13 && $data->id_roast == 3) {
                        echo number_format($modal_n_g1*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 14 && $data->id_roast == 1) {
                        echo number_format($modal_n_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 14 && $data->id_roast == 2) {
                        echo number_format($modal_n_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 14 && $data->id_roast == 3) {
                        echo number_format($modal_n_g2*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 15 && $data->id_roast == 1) {
                        echo number_format($modal_n_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 15 && $data->id_roast == 2) {
                        echo number_format($modal_n_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 15 && $data->id_roast == 3) {
                        echo number_format($modal_n_g3*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                      else if ($data->id_pengolahan == 16 && $data->id_roast == 1) {
                        echo number_format($modal_n_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 16 && $data->id_roast == 2) {
                        echo number_format($modal_n_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }else if ($data->id_pengolahan == 16 && $data->id_roast == 3) {
                        echo number_format($modal_n_g4*$data->tarikan_roast+$kemasan1kg+$stiker1kg+$plastik_clip1kg+$biaya_roastBean,2, '.',',');
                      }

                    }
                  ?></td>
                  <!-- <td> <a class="badge badge-warning" data-toggle="modal" data-target="#editModal<?= $data->id_produk; ?>"><i class="fas fa-edit"></i> Edit</a> -->
                  <!-- <a class="badge badge-danger" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-trash"></i> Hapus</a> -->
                </td>
                  </tr>
                  <?php $no++; endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Modal</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
           
</div>
</div>


<!-- Modal -->
<?php foreach ($produk as $data) : ?>
<!-- Modal -->
<div class="modal fade" id="editModal<?= $data->id_produk; ?>" tabindex="-1" aria-labelledby="editModal<?= $data->id_produk; ?>Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal<?= $data->id_produk; ?>Label">Edit Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php  foreach ($variable as $key) : ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Produk</label>
    <input type="text" class="form-control" id="nama_produk" aria-describedby="emailHelp" readonly>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Modal Produk</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <?php endforeach; ?>
  <button type="button" class="btn btn-primary" id="edit_modalproduk">Submit</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<script>
  function new_gabah($id_pengolahan){
    Swal.fire({
  title: 'Sudah Pas?',
  text: "Modal Produk Akan diperbaharui semua!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#27B14C',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Perbaharui!'
}).then((result) => {
  if (result.isConfirmed) {
    let id_pengolahan = $(this).data("idpengolahan");
      let harga_gabah = $('#harga_gabah').val();
    $.ajax({
      url: "<?= base_url('modal/update_hargaGabah') ?>",
      type: "POST",
      data: {
        id_pengolahan:id_pengolahan,
        harga_gabah:harga_gabah
      },
      success:function (response) {
        if(response === 1){
          Swal.fire(
            'Oopss!',
            'terjadi kesalahan',
            'error'
          )
        }else{
          Swal.fire(
            'Berhasil!',
            'Harga Gabah Diperbaharui',
            'success'
          )
        }
      }
    })
  }
  })
  }
  
  function new_defect($id_pengolahan){
    Swal.fire({
  title: 'Sudah Pas?',
  text: "Modal Produk yang bersangkutan dengan ini akan diperbaharui semua!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#27B14C',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Perbaharui!'
}).then((result) => {
  if (result.isConfirmed) {
    let id_pengolahan = $id_pengolahan;
      let defect = $('#defect'+$id_pengolahan).val();
    $.ajax({
      url: "<?= base_url('Modal/update_defect') ?>",
      type: "POST",
      data: {
        id_pengolahan:id_pengolahan,
        defect:defect
      },
      success:function (response) {
        if(response === 1){
          Swal.fire(
            'Oopss!',
            'terjadi kesalahan',
            'error'
          )
        }else{
          Swal.fire(
            'Berhasil!',
            'Defect dan Modal Produk Berhasil Diperbaharui',
            'success'
          )
        }
      }
    })
  }
  })
  }
</script>
<script>
$(document).ready(function () {
  
});
</script>

