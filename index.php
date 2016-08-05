<?php
//以外面的index為主
session_start();

date_default_timezone_set('Asia/Taipei');
require_once 'core/App.php';
require_once 'core/Controller.php';

$app = new App();

?>