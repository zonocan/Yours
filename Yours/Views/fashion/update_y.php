<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$_POST = $_SESSION;
$user = new UsersController();
$user_info = $user->Get_user_name();
$reviw = $user->FindmyUser();

//var_dump($reviw);
//var_dump($user_info);
//var_dump($_POST);
//var_dump($_SESSION['id']);

 ?>

 <?php include 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/post.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">

<form method="post" action="update_y.complete.php?id=<?= $_GET['id']?>" enctype="multipart/form-data">
 <div id="post_cover">
   <div id="post_inner">
     <div id="will_post_photo">
        <img src="../upload/<?= $reviw[0]['review_photo']?>">
     </div>
     <div id="will_post_contents">
       <div class="contributer_info">
         <label>
           <supan class="page_btn">
             <a href="my_page.php">
               <div class="contributer_photo">
                 <img src="../profeal/<?= $user_info[0]['profeal_photo'] ?>">
              </div>
            </a>
           </supan>
         </label>
          <h1 class="user_name"><?= $user_info[0]['user_name'];?></h1>
        </div>
         <div id="comment_cover">
           <textarea name="contribute" placeholder="<?= $reviw[0]['contribute']?>" rows="30"></textarea>
         </div>
     </div>
   </div>
 </div>
  <div class="button"><input type="submit" value="変更"></div>
    <div class="button"><button>戻 る</button></div>
  </form>

  <?php //include 'footer.php' ?>
