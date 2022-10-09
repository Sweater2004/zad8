<?php
var_dump($_POST);
require_once("../yandex-master/vendor/autoload.php");
require_once("redactor.php");
$diskHandler = new Redactor($token);
$diskHandler->download($_POST['file_path']);

header('location: ../zad.php');
