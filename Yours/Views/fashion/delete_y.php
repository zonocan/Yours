<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UsersController.php');
$_POST['Reviw_id'] = $_GET['id'];
$user = new UsersController();
$user->Delete_review();
var_dump($user);
 ?>
