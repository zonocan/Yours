<?php
 session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users = new UsersController();
$params = $users->Create_acount();


//var_dump($params_goal);
//var_dump($params);
 ?>
 <?php include 'first_header.php'?>
<!DOCTYPE html>
<html>
<body>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/complerte.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <h1 class="complete">ご登録ありがとうございます</h1>
    <div class="button"><button onclick="location.href='./first_log_in.php'">メイン</button></div>
</body>
