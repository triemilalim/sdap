<?php
	
require_once "controllers/template.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/periode.controller.php";

require_once "models/users.model.php";
require_once "models/periode.model.php";


$template = new ControllerTemplate();
$template -> ctrTemplate();