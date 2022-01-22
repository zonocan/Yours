<?php
session_start();
$_POST=$_SESSION;
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users_controller = new UsersController();
$users_controller->Purchase();
$users_controller->Create_dm_room();
$tmp = $_POST['id'];
$_POST['id']=$_POST['from'];
$_POST['from']=$tmp;
$users_controller = new UsersController();
$users_controller->Create_dm_room();

include 'first_header.php';
 ?>

<!DOCTYPE html>
<html>
<body>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/complerte.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <h1 class="complete">ご購入ありがとうございます</h1>
  　<div class="button"><button onclick="location.href='./index.php'">メイン</button></div>
</body>
