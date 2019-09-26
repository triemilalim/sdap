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
  <!-- 
<form name="form" action ="cetak-laporan-provinsi" method="POST">   -->
  <section>
      <div class="box">
        <div class="box-header with-border">
          <!--   <div class="box box-danger"> -->
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group col-md-4">
                    <label>Pilih Bulan</label>
                    <select class="form-control namaBulan" name="namaBulan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                      <option value="" disabled selected>Pilih Bulan</option> 
                      <option value="13">Pilih Semua</option>                   
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group col-md-4">
                    <label>Pilih Satuan Kerja</label>
                    <select class="form-control satuanKerja" style="width: 100%;" tabindex="-1" aria-hidden="true">
                     <option value="" disabled selected>Pilih Satuan Kerja</option>  
                     <?php

                     $item = null;
                     $value1 = null;
                     $lokasi = $_SESSION["kode_lokasi"];
                    //  var_dump($lokasi);

                     $users = ControllerUsers::ctrShowUsersLokasi($item, $value,$lokasi);

                     foreach ($users as $key => $value) {
                      if($value["kode_lokasi"] == 99) {
                          echo '<option value="'.$value["kode_lokasi"].'">Pilih Semua</option>';
                      }else {
                          echo '<option value="'.$value["kode_lokasi"].'">'.$value["keterangan"].'</option>';
                      }
                      
                    }

                    ?> 
                    </select>
                  </div>     
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group pull-right" >         
                     <button class="btn btn-warning showDataProvinsi" style="margin-top:5px;margin-left: 10px">Lihat Data</button>   
                 </div>
                 <div class="input-group">

                  <textarea style="display: none" id="lokasi" rows="5" cols="50"><?php echo $lokasi ?></textarea>
                </div>
                <div class="form-group pull-right" >

                  <button class="btn btn-success" id="exportProvinisi" style="margin-top:5px"></a>Export to Excel</button>

                </div>
                </div>
              </div>      
         </div>
       </div>
     </div>

     <!-- </div> -->
   </div>
  </section>
<!-- </form> -->

<section class="content">

  <div class="box">

    <div class="box-header with-border">

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" id="records_table" width="100%">

          <thead>
          
           <tr>

             <th style="width:10px">#</th>
             <th>Nama</th>
             <th>Jumlah</th>
             <th>Satuan</th>
           </tr> 

         </thead>

        <tbody>

          
        </tbody>

    </table>

  </div>

</div>

</section>

</div>

