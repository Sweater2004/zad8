<?php
var_dump($_POST);
require_once("../yandex-master/vendor/autoload.php");
require_once("redactor.php");
$download = new Redactor($token);
$download->name($_POST['file'], $_POST['file_path']);

header('location: ../zad.php');
