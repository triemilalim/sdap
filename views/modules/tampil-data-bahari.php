<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Tampil Data Wisata Bahari

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">

          <thead>

           <tr>
             <th style="width:10px">#</th>
             <th>Nama</th>
             <th>Jumlah</th>
             <th>Satuan</th>
             <th>Kota/Kabupaten</th>
           </tr> 

         </thead>

         <tbody>

          <?php

              $dataPariwisata = ControllerDashboard::ctrTampilDataWisata("T12");
              
              // var_dump($dataPariwisata);die;
              
              foreach ($dataPariwisata as $key => $value) {
                 echo '
                  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["keterangan"].'</td>
                    <td>'.$value["kuantitas"].'</td>
                    <td>'.$value["satuan"].'</td>
                    <td>'.$value["kode_lokasi"].'</td>
                  </tr>';
              }
          ?>
        </tbody>

      </table>

    </div>
    
    </div>

  </section>

</div>