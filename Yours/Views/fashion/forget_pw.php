<?php
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$user = new UsersController();

$params = $user->index();



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
  <form method="post" action="new_register_confirm.php">
    <div class="user_id">
      <p>・氏名</p>
      <input type="text" name="email" class="user_id_">
    </div>
      <div class="user_id">
        <p>・生年月日</p>
        <input type="text" name="email" class="user_id_">
      </div>
        <div class="user_id">
          <p>・住所</p>
          <input type="text" name="email" class="user_id_">
        </div>
          <div class="user_id">
            <p>・電話番号</p>
            <input type="text" name="email" class="user_id_">
          </div>
            <div class="user_id">
              <p>・メールアドレス</p>
              <input type="text" name="email" class="user_id_">
            </div>
</form>
   <div class="sent"><input type="submit" value="登録する"></div>
