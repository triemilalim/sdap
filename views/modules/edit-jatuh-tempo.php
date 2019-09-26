<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Edit Tanggal Tutup Periode

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>
  <section>
    <div class="box">
      <div class="box-header with-border">
        <!--   <div class="box box-danger"> -->
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group col-md-4">
                  <label>Pilih Tahun</label>
                  <select class="form-control tahun" name="tahun" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value=""disabled selected>Pilih Tahun</option> 
                    <option value="2017">2017</option> 
                   <option value="2018">2018</option> 
                   <option value="2019">2019</option> 
                </select>
              </div>   
                <div class="form-group col-md-4">
                  <label>Pilih Bulan</label>
                  <select class="form-control namaBulan" name="namaBulan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value="" disabled selected="true">Pilih Bulan</option>                    
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
                  <label>Pilih Tanggal Baru</label>
                  <select class="form-control tanggalBaru" name="tanggalBaru" id="tanggalBaru" style="width: 100%;" tabindex="-1" aria-hidden="true">
                   <option value="" disabled selected>Pilih Tanggal</option>  
                   <?php
                   $i = 1;
                   for ($i=1; $i < 32 ; $i++) { 
                      echo '<option value="'.$i.'">'.$i.'</option>';
                    } 
                  ?> 
                </select>
              </div>  
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group pull-right" >         
                  <button class="btn btn-danger" id="editJatuhTempo" style="margin-top:5px;margin-left: 10px">Ganti Tanggal Tutup Periode</button>   
               </div>
             </div>
           </div>      
         </div>
       </div>
     </div>
   </div>
 </section>


</div>

