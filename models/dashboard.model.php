<?php

require_once 'connection.php';


class ModelDashboard{

    static public function mdlTotalDataObjekWisataBudaya($table, $year){	
    
        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

    $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) as total FROM $table 
            where kode_data = 'T11'  and approved = 1 and tahun = $year $kode_lokasi");

        // var_dump($stmt);die;
    $stmt -> execute();

    return $stmt -> fetch();

    $stmt -> close();

    $stmt = null;

    }


    static public function mdlTotalDataObjekWisataBahari($table, $year){	
        
        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) as total FROM $table 
                where kode_data = 'T12' and approved = 1 and tahun = $year $kode_lokasi");
    
        $stmt -> execute();
    
        return $stmt -> fetch();
    
        $stmt -> close();
    
        $stmt = null;
    
    }


    static public function mdlTotalDataObjekWisataCagarAlam($table, $year){	

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) as total FROM $table 
                where kode_data = 'T13' and approved = 1 and tahun = $year $kode_lokasi");
    
        $stmt -> execute();
    
        return $stmt -> fetch();
    
        $stmt -> close();
    
        $stmt = null;
    
    }


    static public function mdlTotalDataObjekWisataPertanian($table, $year){	

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) as total FROM $table 
                where kode_data = 'T14' and approved = 1 and tahun = $year $kode_lokasi");
    
        $stmt -> execute();
    
        return $stmt -> fetch();
    
        $stmt -> close();
    
        $stmt = null;
    
    }


    static public function mdlTotalDataObjekWisataAlam($table, $year){	

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) as total FROM $table 
                where kode_data = 'T15' and approved = 1 and tahun = $year $kode_lokasi");
    
        $stmt -> execute();
    
        return $stmt -> fetch();
    
        $stmt -> close();
    
        $stmt = null;
    
    }

    //buat grafik

    static public function mdlDashboardDataGrafikDomestik($table, $initialDate, $finalDate){

            if ($_SESSION["kode_lokasi"] == 99){
                $kode_lokasi = "";
            } else {
                $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
            }

			$actualDate = new DateTime();
			$actualDate ->add(new DateInterval("P1M"));
			$actualDatePlusOne = $actualDate->format("Y-m");

			$finalDate2 = new DateTime($finalDate);
			$finalDate2 ->add(new DateInterval("P1M"));
			$finalDatePlusOne = $finalDate2->format("Y-m");

			if($finalDatePlusOne == $actualDatePlusOne){

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data IN ('B11', 'B21', 'B31', 'B41', 'B51')  
                        and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne'  $kode_lokasi
                        GROUP BY tahun, bulan ORDER BY id");

			}else{

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data IN ('B11', 'B21', 'B31', 'B41', 'B51')  
                        and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate'  $kode_lokasi
                        GROUP BY tahun, bulan ORDER BY id");

			}
		
			$stmt -> execute();

            // var_dump($stmt);die;

			return $stmt -> fetchAll();

		// }

    }
    
    static public function mdlDashboardDataGrafikMancanegara($table, $initialDate, $finalDate){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $actualDate = new DateTime();
        $actualDate ->add(new DateInterval("P1M"));
        $actualDatePlusOne = $actualDate->format("Y-m");

        $finalDate2 = new DateTime($finalDate);
        $finalDate2 ->add(new DateInterval("P1M"));
        $finalDatePlusOne = $finalDate2->format("Y-m");

        if($finalDatePlusOne == $actualDatePlusOne){

            $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data IN ('B12', 'B22', 'B32', 'B42', 'B52')  
                    and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne'  $kode_lokasi
                    GROUP BY tahun, bulan ORDER BY id");

        }else{

            $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data IN ('B12', 'B22', 'B32', 'B42', 'B52')  
                    and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate'  $kode_lokasi
                    GROUP BY tahun, bulan ORDER BY id");

        }
    
        $stmt -> execute();

        // var_dump($stmt);die;

        return $stmt -> fetchAll();

    // }

    }

    static public function mdlDashboardLamaKunjunganDomestik($table, $initialDate, $finalDate){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        // var_dump($table);die;
        $actualDate = new DateTime();
        $actualDate ->add(new DateInterval("P1M"));
        $actualDatePlusOne = $actualDate->format("Y-m");

        $finalDate2 = new DateTime($finalDate);
        $finalDate2 ->add(new DateInterval("P1M"));
        $finalDatePlusOne = $finalDate2->format("Y-m");

        if($finalDatePlusOne == $actualDatePlusOne){

        $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B61' 
                and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne'  $kode_lokasi
                GROUP BY tahun, bulan ORDER BY id");

                }else{

        $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B61'
                and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate'  $kode_lokasi
                GROUP BY tahun, bulan ORDER BY id");

                }

        $stmt -> execute();

        // var_dump($stmt);die;

        return $stmt -> fetchAll();

        // }

        }

static public function mdlDashboardLamaKunjunganMancanegara($table, $initialDate, $finalDate){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }
        
        $actualDate = new DateTime();
        $actualDate ->add(new DateInterval("P1M"));
        $actualDatePlusOne = $actualDate->format("Y-m");

        $finalDate2 = new DateTime($finalDate);
        $finalDate2 ->add(new DateInterval("P1M"));
        $finalDatePlusOne = $finalDate2->format("Y-m");

        if($finalDatePlusOne == $actualDatePlusOne){

        $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B62'
        and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne'  $kode_lokasi
        GROUP BY tahun, bulan ORDER BY id");

        }else{

        $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B62'  
        and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate'  $kode_lokasi
        GROUP BY tahun, bulan ORDER BY id");

        }

        $stmt -> execute();

        // var_dump($stmt);die;

        return $stmt -> fetchAll();

        // }

}

        static public function mdlDashboardPajak($table, $initialDate, $finalDate){

                if ($_SESSION["kode_lokasi"] == 99){
                    $kode_lokasi = "";
                } else {
                    $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
                }

        // var_dump($table);die;
                $actualDate = new DateTime();
                $actualDate ->add(new DateInterval("P1M"));
                $actualDatePlusOne = $actualDate->format("Y-m");

                $finalDate2 = new DateTime($finalDate);
                $finalDate2 ->add(new DateInterval("P1M"));
                $finalDatePlusOne = $finalDate2->format("Y-m");

                if($finalDatePlusOne == $actualDatePlusOne){

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B71' 
                        and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne'  $kode_lokasi
                        GROUP BY tahun, bulan ORDER BY id");

                }else{

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B71'
                        and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate'  $kode_lokasi
                        GROUP BY tahun, bulan ORDER BY id");

                }

                $stmt -> execute();

                // var_dump($stmt);die;

                return $stmt -> fetchAll();

                // }

        }

        static public function mdlDashboardRestribusi($table, $initialDate, $finalDate){

                if ($_SESSION["kode_lokasi"] == 99){
                    $kode_lokasi = "";
                } else {
                    $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
                }
                
                $actualDate = new DateTime();
                $actualDate ->add(new DateInterval("P1M"));
                $actualDatePlusOne = $actualDate->format("Y-m");

                $finalDate2 = new DateTime($finalDate);
                $finalDate2 ->add(new DateInterval("P1M"));
                $finalDatePlusOne = $finalDate2->format("Y-m");

                if($finalDatePlusOne == $actualDatePlusOne){

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B72'
                and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne'  $kode_lokasi
                GROUP BY tahun, bulan ORDER BY id");

                }else{

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B72'  
                and approved = 1 AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate'  $kode_lokasi
                GROUP BY tahun, bulan ORDER BY id");

                }

                $stmt -> execute();

                // var_dump($stmt);die;

                return $stmt -> fetchAll();

                // }

        }

    // buat data donat

    // static public function mdlShowProducts($table, $item, $value, $order){
    static public function mdlAmbilDataJenisPenginapan($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T2_' and approved = 1 and a.tahun = '2019'  $kode_lokasi
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotal($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T2_' and approved = 1 and tahun = '2019' $kode_lokasi");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlJenisJasaWisata($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T3_' and approved = 1 and a.tahun = '2019'  $kode_lokasi
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotalJasaWisata($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T3_' and approved = 1 and tahun = '2019' $kode_lokasi");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlPemanduWisata($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T4_' and approved = 1 and a.tahun = '2019'  $kode_lokasi
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotalPemanduWisata($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T4_' and approved = 1 and tahun = '2019' $kode_lokasi");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlAmbilDataJenisTempatMakan($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T5_' and approved = 1 and a.tahun = '2019'  $kode_lokasi
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotalTempatMakan($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T5_' and approved = 1 and tahun = '2019' $kode_lokasi");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlKategoriRestoran($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T6_' and approved = 1 and a.tahun = '2019'  $kode_lokasi
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotalKategoriRestoran($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T6_' and approved = 1 and tahun = '2019' $kode_lokasi");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlPenjualCinderamata($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T7_' and approved = 1 and a.tahun = '2019'  $kode_lokasi
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotalPenjualCinderamata($table){

        if ($_SESSION["kode_lokasi"] == 99){
            $kode_lokasi = "";
        } else {
            $kode_lokasi = "and kode_lokasi = ".$_SESSION["kode_lokasi"];
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T7_' and approved = 1 and tahun = '2019' $kode_lokasi");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlTampilDataWisata($tableDataPariwisata,$tableRefKodeData,$tableRefKodeLokasi,$kode_data,$year){
		
		
        $stmt = Connection::connect()->prepare("SELECT b.keterangan, sum(a.kuantitas) kuantitas, b.satuan, c.keterangan kode_lokasi

        from $tableDataPariwisata a, $tableRefKodeData b, $tableRefKodeLokasi c 
        
        where a.kode_data = b.kode_data and a.kode_lokasi = c.kode_lokasi 
        and a.approved = 1
        and a.tahun = $year
        and a.kode_data = '".$kode_data."'
        
        GROUP BY b.keterangan , b.satuan  , c.keterangan
        ");

        // var_dump($stmt);

        $stmt -> execute();

        return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
		

	 }

}