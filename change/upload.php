<?php
var_dump($_FILES);
require_once("../yandex-master/vendor/autoload.php");
require_once("redactor.php");
$diskHandler = new Redactor($token);
$diskHandler->upload($_FILES['file']);

header('location: ../zad.php');
