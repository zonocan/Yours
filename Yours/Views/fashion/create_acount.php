<?php
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users = new UsersController();
var_dump($_POST);

//var_dump($params_goal);
//var_dump($params);
 ?>
 <?php include 'first_header.php'?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/new_create.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <div class="cover">
  <form method="post" action="create_acount_confirm.php" enctype="multipart/form-data">
  <div class="register_img">
   <h1>・プロフィール写真</h1>
    <label>
     <span class="sent_button" title="画像を選択">
       <img src="../img/post_.gif">
     </span>
     <input type="file" name="profeal_photo" accept="image/jpeg" id="img_send">
    </label>
  </div>
     <div class="user_id">
       <p>・名前</p>
       <input type="text" name="name" class="user_id_" placeholder="yours">
     </div>
     <div class="user_id">
       <p>・メールアドレス</p>
       <input type="text" name="email" class="user_id_" placeholder="yours">
     </div>
     <div class="user_id">
       <p>・ユーザーID</p>
       <input type="text" name="user_name" class="user_id_" placeholder="yours">
     </div>
       <div class="user_id">
         <p>・ユーザーネーム</p>
         <input type="text" name="nicke_name" class="user_id_" placeholder="登録する名前">
       </div>
       <div class="user_id">
       <p>・パスワード</p>
       <input type="text" name="password" class="user_id_" placeholder="4文字以上の数字orアルファベット">
      </div>
     <div class="sent"><input type="submit" value="確認"></div>
     <div class="sent"><button>戻 る</button></div>
</form>
</div>
