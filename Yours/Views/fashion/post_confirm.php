<?php
session_start();
$review_img = $_FILES['review_photo']['name'];
//画像を保存
$_FILES['review_photo']['name']=md5(uniqid(rand(),true));
$_FILES['review_photo']['name'].='.xml';
$_POST['review_photo'] = $_FILES['review_photo']['name'];
move_uploaded_file($_FILES['review_photo']['tmp_name'],dirname(__FILE__,3).'/public/upload/'.$_FILES['review_photo']['name']);

require_once(ROOT_PATH . 'Controllers/UsersController.php');
$user = new UsersController();
$params = $user->Post_Fashion();
$user_info = $user->Get_user_name();
//var_dump($_POST);


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

<form method="post" action="post_complete.php" enctype="multipart/form-data">
<?php //var_dump($_POST); ?>
<div class="confirm">
 <h1>この内容で投稿しますか</h1>
</div>
 <div id="post_cover">
   <div id="post_inner">
     <div id="will_post_photo">
      <img src="../upload/<?= $_POST['review_photo'] ?>">
     </div>
     <div id="will_post_contents">
       <div class="contributer_info">
         <label>
           <supan class="page_btn">
             <div class="contributer_photo">
               <img src="../profeal/<?= $user_info[0]['profeal_photo'] ?>">
             </div>
           </supan>
         </label>
          <h1 class="user_name"><?php echo $user_info[0]['user_name']; ?></h1>
        </div>
         <div id="comment_cover">
           <div class="contribute">
             <p><?php echo(htmlspecialchars($_POST['contribute'],ENT_QUOTES, 'UTF-8'));?></p>
           </div>
         </div>
     </div>
   </div>
 </div>
  <div class="button"><input type="submit" value="投稿"></div>
  </form>

  <div class="button">
    <button onclick="location.href='./post.php'">戻 る</button>
  </div>
  <?php include 'footer.php' ?>
