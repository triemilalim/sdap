<?php
	
require_once "controllers/template.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/periode.controller.php";
require_once "controllers/ref-kode-data.controller.php";
require_once "controllers/data-pariwisata.controller.php";
require_once "controllers/approval.controller.php";
require_once "controllers/dashboard.controller.php";
require_once "controllers/report.controller.php";


require_once "models/users.model.php";
require_once "models/periode.model.php";
require_once "models/ref-kode-data.model.php";
require_once "models/data-pariwisata.model.php";
require_once "models/approval.model.php";
require_once "models/dashboard.model.php";
require_once "models/report.model.php";



$template = new ControllerTemplate();
$template -> ctrTemplate();