<?php

error_reporting(0);

// if(isset($_GET["initialDate"])){

//     $initialDate = $_GET["initialDate"];
//     $finalDate = $_GET["finalDate"];

// }else{

$initialDate = getdate()['year'].'-1';
// var_dump($initialDate);
// $initialDate = '2019-1';
$bulanminussatu = getdate()['mon']-1;
$finalDate = getdate()['year'].'-'.$bulanminussatu;
// var_dump($finalDate);die;

// }

$answerDomestik = ControllerDashboard::ctrDashboardLamaKunjunganDomestik($initialDate, $finalDate);

// var_dump($answerDomestik);die;

$arrayDates = array();
$arrayDataDomestik = array();
$pertambahan = array();

foreach ($answerDomestik as $key => $value) {

    #We capture only year and month
	$singleDate = $value["range"];

    #Introduce dates in arrayDates
	array_push($arrayDates, $singleDate);

	#We capture the sales
	$arrayDataDomestik = array($singleDate => $value["kuantitas"]);

    #we add payments made in the same month
	foreach ($arrayDataDomestik as $key => $value) {
		
		$pertambahan[$key] += $value;
	}

}

$answerMancanegara = ControllerDashboard::ctrDashboardLamaKunjunganMancanegara($initialDate, $finalDate);

$arrayDatess = array();
$arrayDataMancanegara = array();
$pertambahan2 = array();

foreach ($answerMancanegara as $keys => $values) {

  #We capture only year and month
$singleDates = $values["range"];

  #Introduce dates in arrayDates
array_push($arrayDatess, $singleDates);

#We capture the sales
$arrayDataMancanegara = array($singleDates => $values["kuantitas"]);

  #we add payments made in the same month
foreach ($arrayDataMancanegara as $keys => $values) {
  
  $pertambahan2[$keys] += $values;
}

}


$noRepeatDates = array_unique($arrayDates);


?>

<div class="box box-solid bg-teal">
	
	<div class="box-header">
		
 		<i class="fa fa-calendar"></i>

  		<h3 class="box-title">Grafik Lama Kunjungan Wisatawan</h3>

	</div>

	<div class="box-body border-radius-none newSalesGraph">

		<div class="chart" id="grafik-lama-kunjungan" style="height: 250px;"></div>

  </div>

</div>

<script>
	
 var lines = new Morris.Line({
    element          : 'grafik-lama-kunjungan',
    resize           : true,
    data             : [

    <?php

    if($noRepeatDates != null){

	    foreach($noRepeatDates as $key){

	    	echo "{ Periode: '".$key."', domestik: ".$pertambahan[$key].", mancanegara: ".$pertambahan2[$key]." },";


	    }

	    echo "{ Periode: '".$key."', domestik: ".$pertambahan[$key].", mancanegara: ".$pertambahan2[$key]." }";

    }else{

       echo "{ Periode: '0', domestik: '0', mancanegara:'0' }";

    }

    ?>

    ],
    xkey             : 'Periode',
    ykeys            : ['domestik', 'mancanegara'],
    labels           : ['Domestik', 'Mancanegara'],
    lineColors       : ['#f9b940', '#c4fd74'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    gridTextSize     : 10
  });

</script>