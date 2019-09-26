
<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Manajemen User

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#addUser" id="xxx" data-backdrop="static" data-keyboard="false"> -->
            <?php
                  $hari=getdate()['weekday'];
                  $tahun=getdate()['year'];
                  $tanggal=getdate()['mday'];
                  $getdate = getdate();
                  $bulan = getdate()['mon'];
                  // var_dump($hari);
                  // var_dump($tahun);
                  // var_dump($tanggal);
                  // var_dump($bulan);
            ?>
         <button class="btn btn-primary" data-toggle="modal" id ="btnAddUser" data-target="#addUser">

          Tambah user

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>NIP</th>
             <th>Nama</th>
             <th>Foto</th>
             <th>Role</th>
             <th>Kode Lokasi</th>
             <th>Status Aktif</th>
             <th>Aksi</th>

           </tr> 

          </thead>

          <tbody>

            <?php

              $item = null; 
              $value = null;

              $users = ControllerUsers::ctrShowUsers($item, $value);

              // var_dump($users);

              foreach ($users as $key => $value) {

                echo '

                  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["nip"].'</td>
                    <td>'.$value["nama"].'</td>';

                    if ($value["file_foto"] != ""){

                      echo '<td><img src="'.$value["file_foto"].'" class="img-thumbnail" width="40px"></td>';

                    }else{

                      echo '<td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                    
                    }

                    if($value["role"] =="opr_kab"){
                        echo '<td>Operator Kabupaten</td>';
                    } else if($value["role"] =="opr_wil"){
                        echo '<td>Operator Kanwil</td>';

                    }
                    else if($value["role"] =="apr_kab"){
                        echo '<td>Kepala Dinas</td>';

                    } else {
                        echo '<td>Administrator</td>';
                    }

                    echo '
                    <td>'.$value["keterangan"].'</td>';

                    if($value["status_aktif"] != 0){

                      echo '<td><button class="btn btn-success btnActivate btn-xs" userNip="'.$value["nip"].'" userStatusAktif="0">Activated</button></td>';

                    }else{

                      echo '<td><button class="btn btn-danger btnActivate btn-xs" userNip="'.$value["nip"].'" userStatusAktif="1">Deactivated</button></td>';
                    }
                    
                    echo '

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditUser" userNip="'.$value["nip"].'" data-toggle="modal" data-target="#editUser"><i class="fa fa-pencil"></i>
                        </button>
                        
                        <button class="btn btn-danger btnDeleteUser" userNip="'.$value["nip"].'" userNama="'.$value["nama"].'" userFoto="'.$value["file_foto"].'"><i class="fa fa-times"></i>
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
=            module add user            =
======================================-->

<!-- Modal -->
<div id="addUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST"  enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Tambah user</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            
            <!--Input name -->
             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" name="newNama" placeholder="Masukan nama" required>

              </div>

            </div>

            <!-- input NIP -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-github"></i></span>

                <input maxlength="18" class="form-control input-lg" id="newNIP" name="newNIP" placeholder="Masukan NIP" required>

              </div>

            </div>

            <!-- input password -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="password" name="newPasswd" placeholder="Masukan password" required>

              </div>

            </div>

            <!-- input Role -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="newRole">
                  
                  <option value=""> Pilih Role</option>
                  <option value="admin">Administrator</option>
                  <option value="opr_wil">Operator Kanwil</option>
                  <option value="apr_kab">Kepala Dinas</option>
                  <option value="opr_kab">Operator Kabupaten</option>  

                </select>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="newKodeLokasi" name="newKodeLokasi">

                  <option value="">Pilih Satuan Kerja</option>

                  <?php

                    $item = null;
                    $value1 = null;

                    $users = ControllerUsers::ctrShowUsersLokasi($item, $value);
                    // var_dump($users);

                    foreach ($users as $key => $value) {
                      echo '<option value="'.$value["kode_lokasi"].'">'.$value["keterangan"].'</option>';
                    }

                  ?> 

                </select>

              </div>

            </div>

            <!-- Uploading image -->
            <div class="form-group">

              <div class="panel">Upload image</div>

              <input class="newPics" type="file" name="newPhoto">

              <p class="help-block">Maximum size 2Mb</p>

              <img class="thumbnail preview" src="views/img/users/default/anonymous.png" width="100px">

            </div>
            
            

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Save</button>
          
        </div>

          <?php
            $createUser = new ControllerUsers();
            $createUser -> ctrCreateUser();
          ?>

      </form>

    </div>

  </div>

</div>
<!--====  End of module add user  ====-->

<!--=====================================
=            module edit user            =
======================================-->

<!-- Modal -->
<div id="editUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Edit user</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            
            <!--Input Id -->
            <div class="form-group" style=" display: none;">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-github"></i></span>

                <input class="form-control input-lg" type="text" id="EditId" name="EditId" placeholder="Edit Id" required>

              </div>

            </div>

            <!--Input Id -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-github"></i></span>

                <input class="form-control input-lg type="text" input-lg" id="EditNIP" name="EditNIP" placeholder="Edit NIP" required>

              </div>

            </div>

            <!--Input name -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" id="EditName" name="EditName" placeholder="Edit nama" required>

              </div>

            </div>

            <!-- input password -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="password" name="EditPasswd" placeholder="Edit Password">

                <input type="hidden" name="currentPasswd" id="currentPasswd">

              </div>

            </div>
            
            <!-- input role -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="EditRole">

                  <option value="" id="EditRole"></option>
                  <option value="admin">Administrator</option>
                  <option value="opr_wil">Operator Kanwil</option>
                  <option value="apr_kab">Kepala Dinas</option>
                  <option value="opr_kab">Operator Kabupaten</option>                 
                </select>

              </div>

            </div>

            <!-- Edit Satker -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="EditKodeLokasi" name="EditKodeLokasi">

                  <option value="">Pilih Satuan Kerja</option>

                  <?php

                    $item = null;
                    $value1 = null;

                    $users = ControllerUsers::ctrShowUsersLokasi($item, $value);
                    // var_dump($users);

                    foreach ($users as $key => $value) {
                      echo '<option value="'.$value["kode_lokasi"].'">'.$value["keterangan"].'</option>';
                    }

                  ?> 

                </select>

              </div>

            </div>

            <!-- Uploading image -->
            <div class="form-group">

              <div class="panel">Unggah Foto</div>

              <input class="newPics" type="file" name="editPhoto">

              <p class="help-block">Ukuran Maksimal 2Mb</p>

              <img class="thumbnail preview" src="views/img/users/default/anonymous.png" alt="" width="100px">

              <input type="hidden" name="currentPicture" id="currentPicture">

            </div>

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
            $editUser = new ControllerUsers();
            $editUser -> ctrEditUser();
          ?>

      </form>

    </div>

  </div>

</div>

<?php

  $deleteUser = new ControllerUsers();
  $deleteUser -> ctrDeleteUser();

?> 