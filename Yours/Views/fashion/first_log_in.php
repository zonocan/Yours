<?php
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users = new UsersController();
$params = $users->Log_in();



//var_dump($params_goal);
//var_dump($params);
 ?>

 <?php include 'first_header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/first_log_in.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<div class="cover">
  <form method="post" action="check.php">
    <div class="user_id">
      <p>ユーザーID</p>
      <input type="text" name="user_name" class="user_id_">
    </div>
      <div class="PW">
        <p>パスワード</p>
        <input type="text" name="password" class="PW_"><br>
      </div>
     <div class="sent"><input type="submit" value="ログイン"></div>
　</form>
</div>
<div class="new_or_probrem">
 <a href="create_acount.php"><h1>#新規登録はこちら</h1></a>
 <a href=""><p>ユーザーID  パスワードをお忘れの方はこちら ->-></p></a>
</div>
