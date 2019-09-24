<?php

$item = null;
$value = null;
$order = "id";

$TotalObjWisataBudaya = ControllerDashboard::ctrTotalDataObjekWisataBudaya();
$TotalObjWisataBahari = ControllerDashboard::ctrTotalDataObjekWisataBahari();
$TotalObjWisataCagarAlam = ControllerDashboard::ctrTotalDataObjekWisataCagarAlam();
$TotalObjWisataPertanian = ControllerDashboard::ctrTotalDataObjekWisataPertanian();
$TotalObjWisataAlam = ControllerDashboard::ctrTotalDataObjekWisataAlam();

?>


<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow-gradient">
    
    <div class="inner">
      
      <h3><?php echo number_format($TotalObjWisataBudaya["total"]); ?></h3>

      <p>Total Objek Wisata Budaya</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion-earth"></i>
    
    </div>

    <?php
    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'opr_wil'){
    echo '
    <a href="tampil-data-budaya" class="small-box-footer">
      
      Tampilkan Data <i class="fa fa-arrow-circle-right"></i>
    
    </a>
    ';
    }
    ?>

  </div>

</div>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-blue-gradient">
    
    <div class="inner">
      
      <h3><?php echo number_format($TotalObjWisataBahari["total"]); ?></h3>

      <p>Total Objek Wisata Bahari</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion-ios-analytics-outline"></i>
    
    </div>
    <?php
    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'opr_wil'){
    echo '
    <a href="tampil-data-bahari" class="small-box-footer">
      
      Tampilkan Data <i class="fa fa-arrow-circle-right"></i>
    
    </a>
    ';
    }
    ?>

  </div>

</div>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green-gradient">
    
    <div class="inner">
      
      <h3><?php echo number_format($TotalObjWisataCagarAlam["total"]); ?></h3>

      <p>Total Objek Wisata Cagar Alam</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion-map"></i>
    
    </div>
    <?php
    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'opr_wil'){
    echo '
    <a href="tampil-data-cagar-alam" class="small-box-footer">
      
      Tampilkan Data <i class="fa fa-arrow-circle-right"></i>
    
    </a>
    ';
    }
    ?>

  </div>

</div>


<!--
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3><?php echo number_format($TotalObjWisataPertanian["total"]); ?></h3>

      <p>Total Objek Wisata Pertanian</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion-earth"></i>
    
    </div>
    

  </div>

</div>
-->




<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua-gradient">
    
    <div class="inner">
      
      <h3><?php echo number_format($TotalObjWisataAlam["total"]); ?></h3>

      <p>Total Objek Wisata Alam</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion-leaf"></i>
    
    </div>
    <?php
    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'opr_wil'){
    echo '
    <a href="tampil-data-alam" class="small-box-footer">
      
      Tampilkan Data <i class="fa fa-arrow-circle-right"></i>
    
    </a>
    ';
    }
    ?>

  </div>

</div>

