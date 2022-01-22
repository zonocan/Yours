<?php
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$user = new UsersController();

$params = $user->index();

//var_dump($params_goal);
//var_dump($params);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/f_header.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<header>
    <div id="logo">
     <img src="../img/yours.logo_.png">
    </div>
     <div id="welcome">
       <h1 class="welcome">〜ようこそYour'sへ〜</h1>
     </div>
</header>
