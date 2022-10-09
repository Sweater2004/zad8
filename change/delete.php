<?php
var_dump($_POST);
require_once("../yandex-master/vendor/autoload.php");
require_once("redactor.php");
$delit = new Redactor($token);
$delit->delete($_POST['file_path']);

header('location: ../zad.php');
