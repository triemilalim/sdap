<?php

require_once 'connection.php';


class ModelDashboard{

    static public function mdlTotalDataObjekWisataBudaya($table, $year){	

    $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) as total FROM $table 
            where kode_data = 'T11' and tahun = $year");

    $stmt -> execute();

    return $stmt -> fetch();

    $stmt -> close();

    $stmt = null;

    }


    static public function mdlTotalDataObjekWisataBahari($table, $year){	

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) as total FROM $table 
                where kode_data = 'T12' and tahun = $year");
    
        $stmt -> execute();
    
        return $stmt -> fetch();
    
        $stmt -> close();
    
        $stmt = null;
    
    }


    static public function mdlTotalDataObjekWisataCagarAlam($table, $year){	

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) as total FROM $table 
                where kode_data = 'T13' and tahun = $year");
    
        $stmt -> execute();
    
        return $stmt -> fetch();
    
        $stmt -> close();
    
        $stmt = null;
    
    }


    static public function mdlTotalDataObjekWisataPertanian($table, $year){	

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) as total FROM $table 
                where kode_data = 'T14' and tahun = $year");
    
        $stmt -> execute();
    
        return $stmt -> fetch();
    
        $stmt -> close();
    
        $stmt = null;
    
    }


    static public function mdlTotalDataObjekWisataAlam($table, $year){	

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) as total FROM $table 
                where kode_data = 'T15' and tahun = $year");
    
        $stmt -> execute();
    
        return $stmt -> fetch();
    
        $stmt -> close();
    
        $stmt = null;
    
    }

    //buat grafik

    static public function mdlDashboardDataGrafikDomestik($table, $initialDate, $finalDate){

			$actualDate = new DateTime();
			$actualDate ->add(new DateInterval("P1M"));
			$actualDatePlusOne = $actualDate->format("Y-m");

			$finalDate2 = new DateTime($finalDate);
			$finalDate2 ->add(new DateInterval("P1M"));
			$finalDatePlusOne = $finalDate2->format("Y-m");

			if($finalDatePlusOne == $actualDatePlusOne){

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data IN ('B11', 'B21', 'B31', 'B41', 'B51')  
                        AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne' 
                        GROUP BY tahun, bulan ORDER BY id");

			}else{

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data IN ('B11', 'B21', 'B31', 'B41', 'B51')  
                        AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate' 
                        GROUP BY tahun, bulan ORDER BY id");

			}
		
			$stmt -> execute();

            // var_dump($stmt);die;

			return $stmt -> fetchAll();

		// }

    }
    
    static public function mdlDashboardDataGrafikMancanegara($table, $initialDate, $finalDate){

        $actualDate = new DateTime();
        $actualDate ->add(new DateInterval("P1M"));
        $actualDatePlusOne = $actualDate->format("Y-m");

        $finalDate2 = new DateTime($finalDate);
        $finalDate2 ->add(new DateInterval("P1M"));
        $finalDatePlusOne = $finalDate2->format("Y-m");

        if($finalDatePlusOne == $actualDatePlusOne){

            $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data IN ('B12', 'B22', 'B32', 'B42', 'B52')  
                    AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne' 
                    GROUP BY tahun, bulan ORDER BY id");

        }else{

            $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data IN ('B12', 'B22', 'B32', 'B42', 'B52')  
                    AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate' 
                    GROUP BY tahun, bulan ORDER BY id");

        }
    
        $stmt -> execute();

        // var_dump($stmt);die;

        return $stmt -> fetchAll();

    // }

    }

    static public function mdlDashboardLamaKunjunganDomestik($table, $initialDate, $finalDate){

        // var_dump($table);die;
        $actualDate = new DateTime();
        $actualDate ->add(new DateInterval("P1M"));
        $actualDatePlusOne = $actualDate->format("Y-m");

        $finalDate2 = new DateTime($finalDate);
        $finalDate2 ->add(new DateInterval("P1M"));
        $finalDatePlusOne = $finalDate2->format("Y-m");

        if($finalDatePlusOne == $actualDatePlusOne){

        $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B61' 
                AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne' 
                GROUP BY tahun, bulan ORDER BY id");

                }else{

        $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B61'
                AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate' 
                GROUP BY tahun, bulan ORDER BY id");

                }

        $stmt -> execute();

        // var_dump($stmt);die;

        return $stmt -> fetchAll();

        // }

        }

static public function mdlDashboardLamaKunjunganMancanegara($table, $initialDate, $finalDate){

        $actualDate = new DateTime();
        $actualDate ->add(new DateInterval("P1M"));
        $actualDatePlusOne = $actualDate->format("Y-m");

        $finalDate2 = new DateTime($finalDate);
        $finalDate2 ->add(new DateInterval("P1M"));
        $finalDatePlusOne = $finalDate2->format("Y-m");

        if($finalDatePlusOne == $actualDatePlusOne){

        $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B62'
        AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne' 
        GROUP BY tahun, bulan ORDER BY id");

        }else{

        $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B62'  
        AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate' 
        GROUP BY tahun, bulan ORDER BY id");

        }

        $stmt -> execute();

        // var_dump($stmt);die;

        return $stmt -> fetchAll();

        // }

}

        static public function mdlDashboardPajak($table, $initialDate, $finalDate){

        // var_dump($table);die;
                $actualDate = new DateTime();
                $actualDate ->add(new DateInterval("P1M"));
                $actualDatePlusOne = $actualDate->format("Y-m");

                $finalDate2 = new DateTime($finalDate);
                $finalDate2 ->add(new DateInterval("P1M"));
                $finalDatePlusOne = $finalDate2->format("Y-m");

                if($finalDatePlusOne == $actualDatePlusOne){

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B71' 
                        AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne' 
                        GROUP BY tahun, bulan ORDER BY id");

                }else{

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B71'
                        AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate' 
                        GROUP BY tahun, bulan ORDER BY id");

                }

                $stmt -> execute();

                // var_dump($stmt);die;

                return $stmt -> fetchAll();

                // }

        }

        static public function mdlDashboardRestribusi($table, $initialDate, $finalDate){

                $actualDate = new DateTime();
                $actualDate ->add(new DateInterval("P1M"));
                $actualDatePlusOne = $actualDate->format("Y-m");

                $finalDate2 = new DateTime($finalDate);
                $finalDate2 ->add(new DateInterval("P1M"));
                $finalDatePlusOne = $finalDate2->format("Y-m");

                if($finalDatePlusOne == $actualDatePlusOne){

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B72'
                AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDatePlusOne' 
                GROUP BY tahun, bulan ORDER BY id");

                }else{

                $stmt = Connection::connect()->prepare("SELECT id, sum(kuantitas) `kuantitas`, concat(tahun,'-', bulan) `range`  FROM $table WHERE kode_data = 'B72'  
                AND concat(tahun,'-', bulan) BETWEEN '$initialDate' AND '$finalDate' 
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

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T2_' and a.tahun = '2019' 
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotal($table){

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T2_' and tahun = '2019'");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlJenisJasaWisata($table){

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T3_' and a.tahun = '2019' 
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotalJasaWisata($table){

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T3_' and tahun = '2019'");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlPemanduWisata($table){

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T4_' and a.tahun = '2019' 
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotalPemanduWisata($table){

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T4_' and tahun = '2019'");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlAmbilDataJenisTempatMakan($table){

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T5_' and a.tahun = '2019' 
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotalTempatMakan($table){

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T5_' and tahun = '2019'");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlKategoriRestoran($table){

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T6_' and a.tahun = '2019' 
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotalKategoriRestoran($table){

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T6_' and tahun = '2019'");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlPenjualCinderamata($table){

        $stmt = Connection::connect()->prepare("SELECT a.kode_data, b.keterangan, sum(a.kuantitas) `kuantitas` 
                                        FROM $table a JOIN ref_kode_data b ON a.kode_data = b.kode_data 
                                        WHERE a.`kode_data` like 'T7_' and a.tahun = '2019' 
                                        GROUP by a.kode_data ORDER by a.kuantitas DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    
    static public function mdlTotalPenjualCinderamata($table){

        $stmt = Connection::connect()->prepare("SELECT SUM(kuantitas) total from $table where `kode_data` like 'T7_' and tahun = '2019'");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

}