<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users = new UsersController();
$params = $users->Log_in();
//var_dump($params);


if(!empty($params)){
  $_SESSION['id'] = $params['id'];
  $msg = 'ログインしました。';
  $link = '<a href="index.php">メイン画面へ</a>';
}else{
  $msg = 'メールアドレスもしくはパスワードが間違っています。';
  $link = '<a href="first_log_in.php">戻る</a>';
}
 include 'first_header.php'
 ?>
<link rel="stylesheet" type="text/css" href="../css/check.css">
<div class="check">
  <h1><?php echo $msg;?></h1>
</div>
<div class="home">
  <h1><?php echo $link; ?><h1>
</div>
