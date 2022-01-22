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
  <link rel="stylesheet" type="text/css" href="../css/footer_button.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">

<body>
 <div class="to_DM_user">
   <label>
     <supan class="DM_btn">
       <a href="my_page.php"><div class="DM_profeal"></div></a>
     </supan>
   </label>
    <h1 class="contct_user">@testさんが購入しました</h1>
    <label>
      <supan class="DM_btn">
        <a href="DM_contents.php"><div class="DM_profeal"></a>
      </supan>
      <input type="button" name="mail" id="mail_dm" onclick="location.href'./'" value="遷移">
    </label>
 </div>
</body>
