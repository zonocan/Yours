<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$user = new UsersController();
$user_info = $user->Dm_user_name();
  //var_dump($user_info);
//var_dump($_SESSION['id']);

//var_dump($params_goal);
//var_dump($params);
 ?>

 <?php include 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/post.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<div class="please">
  <h1>写真の投稿は必須です</h1>
</div>
<form method="post" action="post_confirm.php" enctype="multipart/form-data">
</div>
 <div id="post_cover">
   <div id="post_inner">
     <div id="will_post_photo">
      <label>
       <supan class="sent_button" title="画像を選択">
         <img src="../img/post_.gif">
       </supan>
       <input type="file" name="review_photo" id="img_send" multiple>
      </label>
     </div>
     <div id="will_post_contents">
       <div class="contributer_info">
         <label>
           <supan class="page_btn">
             <a href="my_page.php">
               <div class="contributer_photo">
                 <img src="../profeal/<?= $user_info['profeal_photo'] ?>">
              </div>
            </a>
           </supan>
         </label>
          <h1 class="user_name"><?= $user_info['user_name'];?></h1>
        </div>
         <div id="comment_cover">
           <textarea type="text" name="contribute" placeholder="
           :商品の種類 (例 ジャケット)
           :￥￥円     (例 販売価格は1万円です)
           :商品の売り  (例 生地の状態がいいです)"rows="30"></textarea>
         </div>
     </div>
   </div>
 </div>
  <div class="button"><input type="submit" value="確認"></div>
  </form>
  <div class="button">
    <button onclick="location.href='./index.php'">戻 る</button>
  </div>

  <?php //include 'footer.php' ?>
