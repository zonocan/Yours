<?php
session_start();
$_SESSION['post'] = $_POST;
$_SESSION['get'] = $_GET;
//var_dump($_POST);
 $error_flag = 0;

if (empty($_POST['name'])) {
  $error_flag = 1;
  echo 'この記述欄は必須です';
}
if (empty($_POST['club'])) {
  $error_flag = 1;
  echo 'この記述欄は必須です';
}
if (empty($_POST['birth'])) {
  $error_flag = 1;
  echo 'この記述欄は必須です';
}
if (empty($_POST['height'])) {
  echo 'この記述欄は必須です';
}
if (empty($_POST['weight'])) {
  $error_flag = 1;
  echo 'この記述欄は必須です';
}
if (empty($_POST['uniform_num'])) {
  $error_flag = 1;
  echo 'この記述欄は必須です';
}
if (empty($_POST['position'])) {
  $error_flag = 1;
  echo 'この記述欄は必須です';
}

if (!ctype_digit($_POST['height'])) {
  $error_flag = 1;
  echo '数字で入力してください。';
}

if (!ctype_digit($_POST['weight'])) {
  $error_flag = 1;
  echo '数字で入力してください。';
}

if (!ctype_digit($_POST['uniform_num'])) {
  $error_flag = 1;
  echo '数字で入力してください。';
}

if (!strtotime($_POST['birth'])) {
  $error_flag = 1;
  echo '正確な年月日を入力して下さい。';
}
 ?>


 <?php
     if ($error_flag == 1) {
       echo $error_flag;
       header("Location: ./Enter.php");
     }else {
       header("Location: ./update.php");
     }

  ?>
