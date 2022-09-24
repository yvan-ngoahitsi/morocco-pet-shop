<h1>Welcome to <?php echo $_settings->info('name') ?></h1>
<hr>
<div class="container">
  <?php 
    $files = array();
    $products = $conn->query("SELECT * FROM `products` order by rand() ");
    while($row = $products->fetch_assoc()){
      if(!is_dir(base_app.'uploads/product_'.$row['id']))
      continue;
      $fopen = scandir(base_app.'uploads/product_'.$row['id']);
      foreach($fopen as $fname){
        if(in_array($fname,array('.','..')))
          continue;
        $files[]= validate_image('uploads/product_'.$row['id'].'/'.$fname);
      }
    }
  ?>
  <div id="tourCarousel"  class="carousel slide" data-ride="carousel" data-interval="3000">
  <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <div class="carousel-inner h-100">
          <?php foreach($files as $k => $img): ?>
          <div class="carousel-item  h-100 <?php echo $k == 0? 'active': '' ?>">
              <img class="d-block w-100 h100" src="<?php echo $img ?>" alt="">
          </div>
          <?php endforeach; ?>
      </div>
      
      <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
</div>
