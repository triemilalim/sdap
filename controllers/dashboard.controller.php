<?php

class ControllerDashboard {

    //ngambil data buat kotak-kotak di dashboard

    public function ctrTotalDataObjekWisataBudaya(){

        $table = "data_pariwisata";
        $year = "2019";
        // $year = $_SESSION["tahun"];

        $answer = ModelDashboard::mdlTotalDataObjekWisataBudaya($table, $year);

        return $answer;

    }

    public function ctrTotalDataObjekWisataBahari(){

        $table = "data_pariwisata";
        $year = "2019";
        // $year = $_SESSION["tahun"];
    
        $answer = ModelDashboard::mdlTotalDataObjekWisataBahari($table, $year);
    
        return $answer;
    
        }

    public function ctrTotalDataObjekWisataCagarAlam(){

        $table = "data_pariwisata";
        $year = "2019";
        // $year = $_SESSION["tahun"];
    
        $answer = ModelDashboard::mdlTotalDataObjekWisataCagarAlam($table, $year);
    
        return $answer;
    
    }

    public function ctrTotalDataObjekWisataPertanian(){

        $table = "data_pariwisata";
        $year = "2019";
        // $year = $_SESSION["tahun"];
    
        $answer = ModelDashboard::mdlTotalDataObjekWisataPertanian($table, $year);
    
        return $answer;
    
    }

    public function ctrTotalDataObjekWisataAlam(){

        $table = "data_pariwisata";
        $year = "2019";
        // $year = $_SESSION["tahun"];
    
        $answer = ModelDashboard::mdlTotalDataObjekWisataAlam($table, $year);
    
        return $answer;
    
    }

    //buat grafik
    static public function ctrDashboardDataGrafikDomestik($initialDate, $finalDate){

      $table = "data_pariwisata";

      $answer = ModelDashboard::mdlDashboardDataGrafikDomestik($table, $initialDate, $finalDate);

          // var_dump($answer);die;

      return $answer;
		
    }
    
    static public function ctrDashboardDataGrafikMancanegara($initialDate, $finalDate){

      $table = "data_pariwisata";

      $answer = ModelDashboard::mdlDashboardDataGrafikMancanegara($table, $initialDate, $finalDate);

          // var_dump($answer);die;

      return $answer;
		
    }

    static public function ctrDashboardLamaKunjunganDomestik($initialDate, $finalDate){

      $table = "data_pariwisata";
          // var_dump($initialDate);die;

      $answer = ModelDashboard::mdlDashboardLamaKunjunganDomestik($table, $initialDate, $finalDate);

          // var_dump($answer);die;

      return $answer;
      
    }
    
    static public function ctrDashboardLamaKunjunganMancanegara($initialDate, $finalDate){

      $table = "data_pariwisata";

      $answer = ModelDashboard::mdlDashboardLamaKunjunganMancanegara($table, $initialDate, $finalDate);

          // var_dump($answer);die;

      return $answer;
		
    }

  static public function ctrDashboardPajak($initialDate, $finalDate){

		$table = "data_pariwisata";
        // var_dump($initialDate);die;

		$answer = ModelDashboard::mdlDashboardPajak($table, $initialDate, $finalDate);

        // var_dump($answer);die;

		return $answer;
		
  }
    
  static public function ctrDashboardRestribusi($initialDate, $finalDate){

		$table = "data_pariwisata";

		$answer = ModelDashboard::mdlDashboardRestribusi($table, $initialDate, $finalDate);

        // var_dump($answer);die;

		return $answer;
		
  }
    
  static public function ctrAmbilDataJenisPenginapan(){

		$table = "data_pariwisata";

		$answer = ModelDashboard::mdlAmbilDataJenisPenginapan($table);

        // var_dump($answer);

		return $answer;

  }
    
  static public function ctrTotal(){

		$table = "data_pariwisata";

		$answer = ModelDashboard::mdlTotal($table);

		return $answer;

  }
    
  static public function ctrJenisJasaWisata(){

		$table = "data_pariwisata";

		$answer = ModelDashboard::mdlJenisJasaWisata($table);

        // var_dump($answer);

		return $answer;

  }
    
  static public function ctrTotalJasaWisata(){

		$table = "data_pariwisata";

		$answer = ModelDashboard::mdlTotalJasaWisata($table);

		return $answer;

  }
  
  static public function ctrPemanduWisata(){

		$table = "data_pariwisata";

		$answer = ModelDashboard::mdlPemanduWisata($table);

        // var_dump($answer);

		return $answer;

  }
    
  static public function ctrTotalPemanduWisata(){

		$table = "data_pariwisata";

		$answer = ModelDashboard::mdlTotalPemanduWisata($table);

		return $answer;

  }
  
  static public function ctrAmbilDataJenisTempatMakan(){

      $table = "data_pariwisata";

      $answer = ModelDashboard::mdlAmbilDataJenisTempatMakan($table);

          // var_dump($answer);

      return $answer;

    }
    
  static public function ctrTotalTempatMakan(){

    $table = "data_pariwisata";

    $answer = ModelDashboard::mdlTotalTempatMakan($table);

    return $answer;

  }

  static public function ctrKategoriRestoran(){

    $table = "data_pariwisata";

    $answer = ModelDashboard::mdlKategoriRestoran($table);

        // var_dump($answer);

    return $answer;

  }
  
static public function ctrTotalKategoriRestoran(){

  $table = "data_pariwisata";

  $answer = ModelDashboard::mdlTotalKategoriRestoran($table);

  return $answer;

}

static public function ctrPenjualCinderamata(){

  $table = "data_pariwisata";

  $answer = ModelDashboard::mdlPenjualCinderamata($table);

      // var_dump($answer);

  return $answer;

}

static public function ctrTotalPenjualCinderamata(){

$table = "data_pariwisata";

$answer = ModelDashboard::mdlTotalPenjualCinderamata($table);

return $answer;

}
    

}