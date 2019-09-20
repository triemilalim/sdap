<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Manajemen Data Pariwisata

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
        ?> 

        <button class="btn btn-primary" id="btnAddDataPariwisata" <?php echo 'bulan='.$bulan. ' tahun='.$tahun;?> data-toggle="modal">

          Tambah Data

        </button>

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
             <th>Aksi</th>
           </tr> 

         </thead>

         <tbody>

          <?php
              $item = null;
              $value = null;
              $tahun=getdate()['year'];
              $bulan = getdate()['mon'] -1;
              // var_dump($tahun);
              // var_dump($bulan);

              if($bulan == 1){
                $tahun = $tahun - 1;
              }
              // var_dump("$bulan");

              $dataPariwisata = ControllerDataPariwisata::ctrShowDataPariwisata($item , $value ,$tahun, $bulan);
              
              foreach ($dataPariwisata as $key => $value) {
                 echo '

                  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["keterangan"].'</td>
                    <td>'.$value["kuantitas"].'</td>
                    <td>'.$value["satuan"].'</td>';

                    if($value["approved"] != 0){
                      echo '<td><button class="btn btn-success btnPersetujuan btn-xs" statusApproved="0" idDataPariwisata="'.$value["id"].'"> Disetujui</button></td>';
                    }else{
                      echo '<td><button class="btn btn-danger btnPersetujuan btn-xs" statusApproved="1" idDataPariwisata="'.$value["id"].'">Belum Disetujui</button></td>';
                    }

                     echo '

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditDataPariwisata" idDataPariwisata="'.$value["id"].'" data-toggle="modal" data-target="#editDataPariwisata"><i class="fa fa-pencil"></i>
                        </button>
                        
                        <button class="btn btn-danger btnDeleteDataPariwisata" idDataPariwisata="'.$value["id"].'"><i class="fa fa-times"></i>
                        </button>                                                                       
                      </div>  

                    </td>

                  </tr>';
              }
          ?>
        </tbody>

      </table>

    </div>
    
    </div>

  </section>

</div>


<!--=====================================
=            module add data Pariwisata            =
======================================-->

<!-- Modal -->
<div id="addDataPariwisata" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">

      <form role="form" method="POST" class="form-horizontal" enctype="multipart/formdata">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Tambah Data</h4>

        </div>
        
         <!-- <?php
            $tahun1=getdate()['year'];
            $bulan1 = getdate()['mon'] -1 ;
            var_dump($tahun1);
            var_dump($bulan1);

            if($bulan = 1){
              $tahun = $tahun - 1;
            }

            ?> -->

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!--Input jenis data -->

            <div class="form-group">

              <label for="newJenis" class="col-md-2 control-label" style="font-size:medium;">Jenis</label>
              <div class="col-md-10">
                <select class="form-control input-lg" required id='addJenisData' name='addJenisData' onClick="getJenisData()">
                  <option value="">Pilih Jenis</option>
                  <option value="T1">Objek Wisata</option>
                  <option value="T2">Penginapan</option>
                  <option value="T3">Biro dan Agent Perjalanan</option>
                  <option value="T4">Pemandu Wisata</option>
                  <option value="T5">Restoran</option>
                  <option value="T6">Usaha Makanan/Minuman</option>
                  <option value="T7">Cendramata</option>
                </select>
              </div>

            </div>

            <div class="form-group">

              <label for="newNama" class="col-md-2 control-label" style="font-size:medium;">Nama</label>
              <div class="col-md-10">
                <select class="form-control input-lg" id='addNamaData' name='addNamaData' onClick="getNamaData()">
                  <option value="">Pilih Jenis</option>
                </select>
              </div>

            </div>

            <div class="form-group">

              <label for="newJumlah" class="col-md-2 control-label" style="font-size:medium;">Jumlah</label>
              <div class="col-md-10">
                <input class="form-control input-lg" type="number" min="1" name="addKuantitas" placeholder="Masukan Jumlah" required>
              </div>

            </div>

            <div class="form-group">

              <label for="addSatuan" class="col-md-2 control-label" style="font-size:medium;">Satuan</label>
              <div class="col-md-10">
                <input class="form-control input-lg" type="text" id="addSatuan"name="addSatuan" readonly required > 
              </div>

            </div>

            <div class="form-group">
              <label for="addBulan" class="col-md-2 control-label" style="font-size:medium;">Bulan</label>
              <div class="col-md-10">
                <input class="form-control input-lg" type="text" id="addBulan"name="addBulan" readonly>
                <!-- <?php $bulan;?> -->
              </div>
            </div>

            <div class="form-group" >
              <label for="addTahun" class="col-md-2 control-label" style="font-size:medium;">Tahun</label>
              <div class="col-md-10">
                <input class="form-control input-lg" type="text" id="addTahun"name="addTahun" readonly>
                <!-- <?php $bulan;?> -->
              </div>
            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" name ="save"class="btn btn-primary">Save</button>

        </div>
        

         <?php

          if(isset($_POST["save"])){

            $createDataPariwisata = new ControllerDataPariwisata();
            $createDataPariwisata -> ctrCreateDataPariwisata();

          }
                
            
        ?> 

      </form>

    </div>

  </div>

</div>

<!--====  End of module add user  ====-->

<div id="editDataPariwisata" " class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Edit Data Pariwisata</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->
        
        <div class="modal-body">

          <div class="box-body">


            <!--Input jenis data -->
            <div class="form-group" style=" display: none;">
            <!-- <div class="form-group" style="visibility: hidden;"> -->


              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-github"></i></span>

                <input class="form-control input-lg" type="text" id="EditIdDataPariwisata" name="EditIdDataPariwisata"required>

              </div>

            </div>

            <div class="form-group">

              <label for="editJenis" class="col-md-2 control-label" style="font-size:medium;">Jenis</label>
              <div class="col-md-10">
                <select class="form-control input-lg" required id='editJenisData' name='editJenisData' onClick="getJenisDataEdit()"">
                  <option value="">Pilih Jenis</option>
                  <option value="T1">Objek Wisata</option>
                  <option value="T2">Penginapan</option>
                  <option value="T3">Biro dan Agent Perjalanan</option>
                  <option value="T4">Pemandu Wisata</option>
                  <option value="T5">Restoran</option>
                  <option value="T6">Usaha Makanan/Minuman</option>
                  <option value="T7">Cendramata</option>
                </select>
              </div>

            </div>
            <br></br>
            
            <div class="form-group">

              <label for="NamaData" class="col-md-2 control-label" style="font-size:medium;">Nama</label>
              <div class="col-md-10">
                <select class="form-control input-lg" id='editNamaData' name='editNamaData' onClick="getNamaDataEdit()">
                  <option value="" class="editNamaData"></option>
                </select>
              </div>

            </div>
            <br></br>

            <!--  <div class="form-group">

              <label for="newNama" class="col-md-2 control-label" style="font-size:medium;">Nama</label>
              <div class="col-md-10">
                <select class="form-control input-lg" id='addNamaData' name='addNamaData' onClick="getNamaData()">
                  <option value="">Pilih Jenis</option>
                </select>
              </div>

            </div> -->


            <div class="form-group">

              <label for="editJumlah" class="col-md-2 control-label" style="font-size:medium;">Jumlah</label>
              <div class="col-md-10">
                <input class="form-control input-lg" type="number" min="1" name="editKuantitas" id="editKuantitas">
              </div>

            </div>
            <br></br>

            <div class="form-group">

              <label for="satuan" class="col-md-2 control-label" style="font-size:medium;">Satuan</label>
              <div class="col-md-10">
                <input class="form-control input-lg " type="text" id="satuan" name="satuan" readonly> </input>
              </div>

            </div>
            <br></br>
          </div>
        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Edit User</button>
          
        </div>

        <?php
        $editDataPariwisata = new ControllerDataPariwisata();
        $editDataPariwisata -> ctrEditDataPariwisata();
        ?>

      </form>

    </div>

  </div>

</div>

<?php 
    $deleteDataPariwisata = new ControllerDataPariwisata();
    $deleteDataPariwisata -> ctrDeleteDataPariwisata();
?>
        
