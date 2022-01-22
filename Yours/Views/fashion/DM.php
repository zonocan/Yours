<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users_controller = new UsersController();
$users=$users_controller->Dm_room();
//var_dump($users);

 ?>
 <?php include 'header.php'?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/DM.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">

<body>
  <?php foreach ($users as $user):?>
 <div class="to_DM_user">
   <label>
     <supan class="DM_btn">
       <a href="my_page.php">
         <div class="DM_profeal">
           <img src="../profeal/<?= $user['profeal_photo'] ?>">
         </div>
       </a>
     </supan>
   </label>
    <h1 class="contct_user"><?= $user['user_name'] ?></h1>
    <label>
      <supan class="DM_btn">
        <a href="DM_contents.php?id=<?=$user['from_user']?>">
          <img src="../img/DM_button.gif">
        </a>
      </supan>
      <input type="button" name="mail" id="mail_dm" onclick="location.href'./'" value="遷移">
    </label>
 </div>
<?php endforeach; ?>
</body>
<?php include 'footer.php' ?>
