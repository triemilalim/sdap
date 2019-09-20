<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Dashboard
      
      <small>Control panel</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

  <div class="row">

<div class="col-lg-12">

  <?php

    // if($_SESSION["profile"] =="Administrator"){

      include "reports/penerimaan.php";

    // }

  ?>
  
  </div>

  <div class="col-lg-6">

  <?php

    // if($_SESSION["profile"] =="Administrator"){

      include "reports/grafik-wisatawan.php";

    // }

  ?>
  
  </div>

  <div class="col-lg-6">
    
    <?php

      // if($_SESSION["profile"] =="Administrator"){

        include "reports/lama-kunjungan.php";

      // }

    ?>

  </div>
  

  <div class="col-lg-4">
    
    <?php

      // if($_SESSION["profile"] =="Administrator"){

        include "reports/jenis-penginapan.php";

      // }

    ?>

  </div> 

  <div class="col-lg-4">
    
    <?php

      // if($_SESSION["profile"] =="Administrator"){

        include "reports/jenis-tempat-makan.php";

      // }

    ?>

  </div> 

  <div class="col-lg-4">
    
    <?php

      // if($_SESSION["profile"] =="Administrator"){

        include "reports/kategori-restoran.php";

      // }

    ?>

  </div> 

  <div class="col-lg-4">
    
    <?php

      // if($_SESSION["profile"] =="Administrator"){

        include "reports/jasa-perjalanan-wisata.php";

      // }

    ?>

  </div> 

  <div class="col-lg-4">
    
    <?php

      // if($_SESSION["profile"] =="Administrator"){

        include "reports/sertifikasi-pemandu-wisata.php";

      // }

    ?>

  </div> 

  <div class="col-lg-4">
    
    <?php

      // if($_SESSION["profile"] =="Administrator"){

        include "reports/penjual-cinderamata.php";

      // }

    ?>

  </div> 

</div>

<div class="row">
  
  <?php

    // if($_SESSION["profile"] =="Administrator"){

      include "reports/top-boxes.php";

    // }

  ?>
    </div>

  </section>

</div>
