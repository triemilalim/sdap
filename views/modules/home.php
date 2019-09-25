<div class="content-wrapper">

  <section class="content-header">

    <h1>
      <?php 
        $tahun=getdate()['year'];
        $bulan =getdate()['mon']-1;

        $kumpulanBulan="Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";

        $arrayBulan=explode(" " , $kumpulanBulan);

        $namaBulan = $arrayBulan[$bulan-1];
      ?>

      Dashboard
        
      <small>Data Kepariwisataan Provinsi Riau Periode Bulan <?php echo $namaBulan. ' Tahun '. $tahun ?> </small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">
    
<div class="row">
  
  <?php

    // if($_SESSION["profile"] =="Administrator"){

      include "reports/top-boxes.php";

    // }

  ?>
  </div>

  <div class="row">

<div class="col-lg-4">

  <?php

    // if($_SESSION["profile"] =="Administrator"){

      include "reports/penerimaan.php";

    // }

  ?>
  
  </div>

  <div class="col-lg-4">

  <?php

    // if($_SESSION["profile"] =="Administrator"){

      include "reports/grafik-wisatawan.php";

    // }

  ?>
  
  </div>

  <div class="col-lg-4">
    
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


  </section>

</div>
