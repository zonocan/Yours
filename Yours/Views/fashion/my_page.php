<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users_controller = new UsersController();
$users = $users_controller->Get_user_name();
$reviws = $users_controller->FindmyUser();
$delete = $users_controller->Delete_review();
var_dump($_GET);
include 'header.php'

//include 'header.php'
//var_dump($params_goal);
//var_dump($params);
 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">

<body>
  <div id="page_profeal_box">
   <div class="profeal_photo">
     <img src="../profeal/<?= $users[0]['profeal_photo'] ?>">
   </div>
   <div id="edit_page">
    <h1 class="user_name"><?php echo($users[0]['user_name']);?></h1>
    <a href=""><h1 class="top_"></h1></a>
    <a href=""><h1 class="top_"><h1></a>
   </div>
  </div>
  <?php foreach ($reviws as $reviw):?>
   <div id="past_post_cover">
     <div id="past_post_inner">
       <div id="past_item_left">
         <div class="page_post_photo">
           <img src="../upload/<?= $reviw['review_photo']?>">
         </div>
         <div class="page_function">
           <label>
             <supan class="main_btn">
               <a href="order.php?id=<?= $reviw['reviw_id']?>" ><img src="../img/come_buy.gif"></a>
             </supan>
             <input type="button" name="buy" id="buy_main" onclick="location.href'./'" value="遷移">
           </label>
           <label>
             <supan class="main_btn">
               <a href="update_y.php?id=<?= $reviw['id']?>"><img src="../img/update.gif"></a>
             </supan>
             <input type="button" name="like" id="like_main">
           </label>
           <label>
             <supan class="main_btn">
               <a href="delete_y.php?id=<?= $reviw['id']?>"><img src="../img/trash_box.gif"></a>
             </supan>
             <input type="button" name="coment" id="coment_main">
           </label>
         </div>
       </div>
     </div>
   </div>
  <?php endforeach;?>
</body>

  <?php include 'footer.php' ?>
