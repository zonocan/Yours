<?php
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$user = new UsersController();

$params = $user->index();

//var_dump($params_goal);
//var_dump($params);
 ?>

 <?php include 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/log_in.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <form method="post" action="check.php">
    <div class="user_id">
      <p>ユーザーID</p>
      <input type="text" name="email" class="user_id_">
    </div>
      <div class="PW">
        <p>パスワード</p>
        <input type="text" name="password" class="PW_"><br>
      </div>
     <div class="button"><button onclick="location.href='./log_in.php'">購 入</button></div>
</form>

<?php include 'footer.php' ?>
