<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$user = new UsersController();
$params = $user->index();
$_SESSION = array();
session_destroy();
header("location:first_log_in.php");
//var_dump($params_goal);
//var_dump($params);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/header.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
