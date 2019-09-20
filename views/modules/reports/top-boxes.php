<?php

$item = null;
$value = null;
$order = "id";

$TotalObjWisataBudaya = ControllerDashboard::ctrTotalDataObjekWisataBudaya();
$TotalObjWisataBahari = ControllerDashboard::ctrTotalDataObjekWisataBahari();
$TotalObjWisataCagarAlam = ControllerDashboard::ctrTotalDataObjekWisataCagarAlam();
$TotalObjWisataPertanian = ControllerDashboard::ctrTotalDataObjekWisataPertanian();
$TotalObjWisataAlam = ControllerDashboard::ctrTotalDataObjekWisataAlam();

// $categories = ControllerCategories::ctrShowCategories($item, $value);
// $totalCategories = count($categories);

// $customers = ControllerCustomers::ctrShowCustomers($item, $value);
// $totalCustomers = count($customers);

// $products = ControllerProducts::ctrShowProducts($item, $value, $order);
// $totalProducts = count($products);

?>


<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3><?php echo number_format($TotalObjWisataBudaya["total"]); ?></h3>

      <p>Total Objek Wisata Budaya</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion-earth"></i>
    
    </div>
    
    <!-- <a href="sales" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a> -->

  </div>

</div>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3><?php echo number_format($TotalObjWisataBahari["total"]); ?></h3>

      <p>Total Objek Wisata Bahari</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion-earth"></i>
    
    </div>
    
    <!-- <a href="sales" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a> -->

  </div>

</div>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3><?php echo number_format($TotalObjWisataCagarAlam["total"]); ?></h3>

      <p>Total Objek Wisata Cagar Alam</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion-earth"></i>
    
    </div>
    
    <!-- <a href="sales" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a> -->

  </div>

</div>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3><?php echo number_format($TotalObjWisataPertanian["total"]); ?></h3>

      <p>Total Objek Wisata Pertanian</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion-earth"></i>
    
    </div>
    
    <!-- <a href="sales" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a> -->

  </div>

</div>





<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3><?php echo number_format($TotalObjWisataAlam["total"]); ?></h3>

      <p>Total Objek Wisata Alam</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion-earth"></i>
    
    </div>
    
    <!-- <a href="sales" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a> -->

  </div>

</div>

