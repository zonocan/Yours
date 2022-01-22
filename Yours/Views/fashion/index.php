<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users_controller = new UsersController();
$users = $users_controller->Post_user_name();

 ?>


 <?php include 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<?php foreach ($users as $user):?>
<body>
  <div id="post_cover">
   <div id="post_inner">
    <div id="post_item">
      <img src="../upload/<?= $user['review_photo'] ?>">
    </div>
     <div id="item">
      <div id="post_profeal">
       <label>
         <supan class="main_profeal_btn">
          <a href="user_page.php?id=<?= $user['user_form_id'] ?>">
            <div class="post_profeal_photo">
             <img src="../profeal/<?= $user['profeal_photo'] ?>">
            </div>
          </a>
         </supan>
       </label>
        <h1 class="user_name"><?php echo($user['user_name']);?></h1>
      </div>
      <div id="post_contets_cover">
        <div class="posting">
          <p class="date"><?php echo($user['created_at']);?></p>
          <p class="contribute"><?php echo($user['contribute']);?></p>
        </div>
      </div>
         <div id="post_buttons_inner">
           <label>
             <supan class="main_btn">
               <a href="order.php?id=<?= $user['reviw_id'] ?>" >
                 <img src="../img/purchase_white.gif">
               </a>
             </supan>
             <input type="button" name="buy" id="buy_main" onclick="location.href'./'" value="遷移">
           </label>
              <label>
                <supan class="main_btn">
                  <a href="favarite.php?id=<?= $user['reviw_id'] ?>">
                    <i class="far fa-heart fa-3x"></i>
                  </a>
                </supan>
                <input type="button" name="like" id="like_main">
              </label>
                <label>
                  <supan class="main_btn">
                    <i class="fas fa-comment-dots fa-3x"></i>
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
