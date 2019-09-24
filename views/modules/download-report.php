<?php
require_once "../../controllers/users.controller.php";
require_once "../../controllers/report.controller.php";
require_once "../../models/report.model.php";


// $lokasi = $_SESSION['kode_lokasi'];
$report = new ControllerReport;
$report -> ctrDownloadReport();