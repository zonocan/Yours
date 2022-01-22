<?php
session_start();
$_POST = $_SESSION['post'];
$_GET = $_SESSION['get'];
require_once(ROOT_PATH . 'Controllers/FathionController.php');
$Fathion = new FathionController();
$params = $Fathion->Update();
$params_Ad = $Fathion->ALL_delFlg();
$params_Ai = $Fathion->ALL_insert();
 header("Location: ./index.php");
 ?>
