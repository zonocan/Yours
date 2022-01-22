<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$_POST['Reviw_id'] = $_GET['id'];
$user = new UsersController();
$user_info = $user->Get_user_name();
$reviw = $user->FindmyUser();
$update = $user->Updatemyuser();
//var_dump($_POST);
//var_dump($user_info);
//var_dump($_SESSION['id']);
include 'header.php'
//var_dump($params_goal);
//var_dump($params);
 ?>
 <body>
   <meta charset="UTF-8">
   <title></title>
   <link rel="stylesheet" type="text/css" href="../css/complerte.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
     <h1 class="complete">変更しました</h1>
     <div class="button"><button onclick="location.href='./my_page.php'">マイページ</button></div>
 </body>
