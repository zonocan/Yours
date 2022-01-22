<?php
session_start();
$_POST['to_id']=$_SESSION['id'];
$_POST['from_id']=$_SESSION['from'];
var_dump($_POST);
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$users_controller= new UsersController();
$users_controller->Dm_send();
$str='DM_contents.php?id='.$_GET['id'];
header("Location: $str");
//ダイレクトメッセージFindALLみたいな感じで呼び出す
//var_dump($params_goal);
//var_dump($params);
 ?>
