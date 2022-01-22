<?php
session_start();
$_SESSION['from']=$_GET['id'];
//var_dump($_SESSION);
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users_controller= new UsersController();
$messages = $users_controller->Find_dm();
$dm_user = $users_controller->Dm_user_name();
$my_profeal = $users_controller->Get_user_name();
//DMのユーザーのものをとってくる
//var_dump($my_profeal);
$i=0;
 ?>

 <?php include 'header.php'?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/DM_contents.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<body>
 <div class="to_DM_user">
   <div class="inner">
    <label>
      <supan class="DM_btn">
         <a href="user_page.php?id=<?= $dm_user['user_form_id'] ?>">
         <div class="DM_profeal">
           <img src="../profeal/<?= $dm_user['profeal_photo'] ?>">
         </div>
       </a>
      </supan>
     </label>
    <h1 class="contuct_user"><?= $dm_user['user_name']?></h1>
   </div>
 </div>
 <?php foreach ($messages as $message):
   echo $i;
   $i++;
   if ($message['to_user_id'] == $_SESSION['from']):
  ?>
  <div class="content_DM">
    <div class="send_to">
      <label>
        <supan class="DM_btn">
          <a href="my_page.php">
            <div class="DM_profeal">
              <img src="../profeal/<?= $dm_user['profeal_photo'] ?>">
            </div>
          </a>
        </supan>
      </label>
    </div>
    <div class="TO_cover">
     <div class="TO_">
       <p><?= $message['message'] ?></p>
     </div>
   </div>
        <?php else: ?>
      <div class="MY_dm">
        <div class="sent_my_message">
          <p><?=$message['message']?></p>
        </div>
      </div>
  </div>
</body>
<?php endif; ?>
<?php endforeach; ?>
<footer class="message_covre">
  <form method="post" action="DM_complete.php?id=<?=$_SESSION['from']?>">
    <label>
      <supan class="DM_btn">
        <a href="my_page.php">
          <div class="DM_profeal">
            <img src="../profeal/<?= $my_profeal[0]['profeal_photo'] ?>">
          </div>
        </a>
      </supan>
    </label>
    <input type="text" name="message" value="" class="write_to"></input>
      <label>
        <supan class="DM_btn" title="送信">
          <img src="../img/DM_button.gif">
        </supan>
        <input type="submit" name="send_DM" id="mail_dm" multiple>
      </label>
  </form>
</footer>
</html>
