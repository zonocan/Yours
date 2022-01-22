<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users_controller = new UsersController();
$purchase_item = $users_controller->Get_reviw();
$_SESSION['reviw'] = $_GET['id'];
$_SESSION['from'] = $purchase_item['user_id'];
//var_dump($purchase_item);


 ?>

<?php include 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/order.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">

<body>
  <div class="margin"></div>
 <div id="post_cover">
   <div id="post_inner">
     <div id="will_post_photo">
        <img src="../upload/<?= $purchase_item['review_photo'] ?>">
     </div>
     <div id="will_post_contents">
       <div class="contributer_info">
         <label>
           <supan class="page_btn">
             <a href="user_page.php">
               <div class="contributer_photo">
                 <img src="../profeal/<?=$purchase_item['profeal_photo'] ?>">
               </div>
             </a>
           </supan>
           <input type="button" name="post_img" id="go_to_page">
         </label>
         <h1 class="user_name"><?= $purchase_item['user_name']?></h1>
       </div>
        <div id="comment_cover">
            <div class="contribute" rows="20">
              <p><?= $purchase_item['contribute']?></p>
            </div>
        </div>
     </div>
   </div>
 </div>
    <div class="button"><button><a href="index.php">戻 る</a></button></div>
</body>
