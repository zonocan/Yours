<?php
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$user = new UsersController();
$params = $user->index();


//var_dump($params_goal);
//var_dump($params);
 ?>

 <?php include 'header.php'?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/purchase_fun.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<div  class="confirm_p_f"><h1>この項目は必須です<h1></div>
<div  class="atention"><p>#販売機能をつける際はログインが必要です</p></div>
 <div id="p_f_cover">
  <select class="which_need">
　  <option value="1">販売機能をつける</option>
　  <option value="2">販売機能をつけない</option>
　</select>
 </div>
   <div class="p_f_c_btn">
    <div class="sent"><input type="submit" value="次の画面へ"></div>
   </div>
