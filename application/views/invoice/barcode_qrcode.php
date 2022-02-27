<div class="container">
    <div class="container-fluid">
        <div class="text-center">
        <?php 
      
        foreach ($qr_code as $row) :    
          $kodenya = base_url('invoice'); 
       ?>
        <img src="<?= base_url('invoice/QRcode/'. $kodenya) ?>" alt="" class="img-responsive mx-auto">
        
        <?php endforeach; ?>
    </div>
    </div>
</div>


<script type="text/javascript">
  window.print();
</script>