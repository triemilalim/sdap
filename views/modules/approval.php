<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Approval Data Pariwisata

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <!-- <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#addDataPariwisata">

          Tambah Data

        </button>

      </div>  -->

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">

          <thead>

           <tr>

             <th style="width:10px">#</th>
             <th>Keterangan</th>
             <th>Kuantitas</th>
             <th>Satuan</th>
             <th>Status</th>
           </tr> 

         </thead>

         <tbody>

            <?php 

            $approval = ControllerApproval::ctrShowData();
            foreach ($approval as $key => $value){
              echo'
                <tr>
                <td>'.($key+1).'</td>
                <td>'.$value["keterangan"].'</td>
                <td>'.$value["kuantitas"].'</td>
                <td>'.$value["satuan"].'</td>
                ';
              
                if($value["approved"] == 1){
                  echo'
                  <td><button class="btn btn-success btnApprove btn-xs" dataId="'.$value["id"].'" statusApprove="0">Disetujui</button></td>
                  ';
                }else{
                  echo'
                  <td><button class="btn btn-danger btnApprove btn-xs" dataId="'.$value["id"].'" statusApprove="1">Belum Disetujui</button></td>
                  ';
                }
                echo'
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

        <!-- <div class="modal-header" style="background: #3c8dbc; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Tambah Data</h4>

        </div> -->

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          
            <!--Input jenis data -->

            <div class="form-group">
              
                <label for="newJenis" class="col-md-2 control-label" style="font-size:medium;">Jenis</label>
                <div class="col-md-10">
                <select class="form-control input-lg"  id='firstList' name='firstList' onClick="getItem()">
                  <option value="">Pilih Jenis</option>
                  <option value="objekWisata">Objek Wisata</option>
                  <option value="penginapan">Penginapan</option>
                  <option value="pemanduWisata">Pemandu Wisata</option>
                  <option value="restoran">Restoran</option>
                  <option value="usahaMakananMinuman">Usaha Makanan/Minuman</option>
                  <option value="cendramata">Cendramata</option>
                  <option value="penerimaanDaerah">Penerimaan Daerah Dari Pariwisata</option>
                </select>
              </div>

            </div>

            <div class="form-group">
              
                <label for="newNama" class="col-md-2 control-label" style="font-size:medium;">Nama</label>
                <div class="col-md-10">
                <select class="form-control input-lg" id='secondList' name='secondList'">
                  <option value="">Pilih Jenis</option>
                </select>
              </div>

            </div>

             <div class="form-group">
              
                <label for="newJumlah" class="col-md-2 control-label" style="font-size:medium;">Jumlah</label>
                <div class="col-md-10">
                <input class="form-control input-lg" type="number" min="0" name="newJumlah" placeholder="Masukan Jumlah" required>
              </div>

            </div>

            <div class="form-group">
              
                <label for="newSatuan" class="col-md-2 control-label" style="font-size:medium;">Satuan</label>
                <div class="col-md-10">
                <input class="form-control input-lg" type="text" id="newSatuan"name="newSatuan" readonly> 
              </div>

            </div>

            <!-- input Nama Data -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg"  id='secondList' name='secondList'">
                  <option value="">Pilih Jenis</option>
                </select>

              </div>

            </div> -->

            <!-- input jumlah -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="number" min="0" name="newJumlah" placeholder="Masukan Jumlah" required>

              </div>

            </div> -->

            <!-- input Satuan -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="text" id="newSatuan"name="newSatuan" readonly> 

              </div>

            </div> -->

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Save</button>

        </div>

      </form>

    </div>

  </div>

</div>


<!--====  End of module add user  ====-->
