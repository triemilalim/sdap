<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Export Data

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <?php
        $tahun=getdate()['year'];
        $bulan = getdate()['mon']-1;   
        $lokasi = $_SESSION['kode_lokasi'];
        // $monthName = date("F", mktime(0, 0, 0, $bulan, 10));  
        // var_dump($monthName);
        // $angka=1;

        $kumpulanBulan="Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";

        $arrayBulan=explode(" " , $kumpulanBulan);

        $namaBulan = $arrayBulan[$bulan-1];

        // var_dump($x);

        ?> 

        <div class="input-group">

          <button type="button" class="btn btn-default" id="daterange-btn2">
           
            <span>
              <i class="fa fa-calendar"></i> Date range
            </span>

            <i class="fa fa-caret-down"></i>

          </button>

        </div>

        <div class="input-group">

          <textarea style="display: none" id="lokasi" rows="5" cols="50"><?php echo $lokasi ?></textarea>
        </div>

        <div class="box-tools pull-right">

          <?php
          $lokasi = $_SESSION["kode_lokasi"];
          // var_dump($lokasi);
          if(isset($_GET["initialDate"])){
            // "index.php?route=cetak-laporan&initialDate="+initialDate+"&finalDate="+finalDate;
            echo '<a href="views/modules/download-report.php?report=report&initialDate='.$_GET["initialDate"].'&lokasi='.$_GET["lokasi"].'">';

          }else{

             echo '<a href="views/modules/download-report.php?report=report&lokasi='.$lokasi.'">';

          }         

          ?>
             
             <button class="btn btn-success" style="margin-top:5px">Export to Excel</button>

            </a>

        </div>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">

          <thead>

           <tr>

             <th style="width:10px">#</th>
             <th>Nama</th>
             <th>Jumlah</th>
             <th>Satuan</th>
             <th>Status</th>
           </tr> 

         </thead>

         <tbody>

          <?php
        
            if(isset($_GET["initialDate"])){

              $bulan = $_GET["initialDate"];

            }else{
              $bulan = null;

            }

            $tahun=getdate()['year'];
            $lokasi = $_SESSION["kode_lokasi"];

              $dataPariwisata = ControllerReport::ctrShowReportDataPariwisata($tahun, $bulan,$lokasi);
              
              foreach ($dataPariwisata as $key => $value) {
                 echo '

                  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["keterangan"].'</td>
                    <td>'.$value["kuantitas"].'</td>
                    <td>'.$value["satuan"].'</td>';

                    if($value["status_persetujuan"] == 1){
                      echo '<td><button class="btn btn-success btnPersetujuan btn-xs" statusApproved="0" idDataPariwisata="'.$value["id"].'"> Disetujui</button></td>';
                    }elseif ($value["status_persetujuan"] == 0){
                      echo '<td><button class="btn btn-warning btnPersetujuan btn-xs" statusApproved="1" idDataPariwisata="'.$value["id"].'">Belum Disetujui</button></td>';
                    } else {
                      echo '<td><button class="btn btn-danger btnPersetujuan btn-xs" statusApproved="2" idDataPariwisata="'.$value["id"].'">Ditolak</button></td>';
                    }
              }
          ?>
        </tbody>

      </table>

    </div>
    
    </div>

  </section>

</div>
     
