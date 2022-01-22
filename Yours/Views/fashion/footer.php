<?php
//session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users_controller = new UsersController();
$users = $users_controller->Post_user_name();

//var_dump($params_goal);
//var_dump($params);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<footer>
  <div id="post_buttons_cover">
    <div id="post_buttons_inner">
      <label>
        <supan class="main_btn">
          <a href="purchaiser.php?id<?= $user['reviw_id'] ?>" >
            <img src="../img/come_buy.gif">
          </a>
        </supan>
        <input type="button" name="buy" id="buy_main" onclick="location.href'./'" value="遷移">
      </label>
         <label>
           <supan class="main_btn">
             <a href="push_like.php?id<?= $user['reviw_id'] ?>" ><i class="far fa-heart fa-3x"></i></a>
           </supan>
           <input type="button" name="like" id="like_main">
         </label>
           <label>
             <supan class="main_btn">
               <a href="push_coment.php" ><i class="fas fa-comment-dots fa-3x"></i></a>
             </supan>
             <input type="button" name="coment" id="coment_main">
           </label>
           <label>
             <supan class="main_btn">
               <a href="order_confirm.php?id=<?= $user['reviw_id'] ?>" >
                 <img src="../img/SHOP.gif">
               </a>
             </supan>
             <input type="button" name="buy" id="buy_main" onclick="location.href'./'" value="遷移">
           </label>
    </div>
  </div>
</footer>
