<?php
session_start();
$_POST=$_SESSION;
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$user = new UsersController();
$users_id = $user->Get_reviw();
$favarite = $user->Favarite();
var_dump($_POST);
$_SESSION['reviw'] = $_GET['id'];
$_SESSION['from'] = $users_id['user_id'];

 ?>

<?php include 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/order.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<div class="contributer_name">
  <h1><?= $users_id['user_name'] ?></h1>
  <p>さんの</p>
</div>
  <div class="p_item">
    <p>いいねしますか?</p>
  </div>
<body>
 <div id="post_cover">
   <div id="post_inner">
     <div id="will_post_photo">
       <img src="../upload/<?= $users_id['review_photo'] ?>">
     </div>
     <div id="will_post_contents">
       <div class="contributer_info">
         <label>
           <supan class="page_btn">
             <a href="my_page.php">
               <div class="contributer_photo">
                 <img src="../profeal/<?=$users_id['profeal_photo'] ?>">
               </div>
             </a>
           </supan>
           <input type="button" name="post_img" id="go_to_page">
         </label>
         <h1 class="user_name"><?= $users_id['user_name'] ?></h1>
       </div>
        <div id="comment_cover">
          <div class="contribute">
            <p><?= $users_id['contribute']?></p>
          </div>
        </div>
     </div>
   </div>
 </div>
  <div class="button">
    <button onclick="location.href='./index.php'">
      <i class="far fa-heart fa"></i>
    </button>
  </div>
    <div class="button"><button><a href="index.php">戻 る</a></button></div>
</body>
