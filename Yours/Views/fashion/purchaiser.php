<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$user = new UsersController();
$purchased_user = $user->Dm_room();
//var_dump($_SESSION);

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
       <a href="my_page.php">
         <div class="DM_profeal">
           <img src="../profeal/<?= $purchased_user[0]['profeal_photo'] ?>">
         </div>
       </a>
     </supan>
   </label>
    <h1 class="purchase_user">
      <?php echo $purchased_user[0]['user_name']?>さんがあなたの商品を購入しました
    </h1>
    <label>
      <supan class="DM_btn">
        <a href="DM_contents.php">
          <div class="DM_profeal">
            <img src="../upload/<?= $purchase_item['review_photo']?>">
          </div>
        </a>
      </supan>
      <input type="button" name="mail" id="mail_dm" onclick="location.href'./'" value="遷移">
    </label>
 </div>
</body>
