<?php
 session_start();
 $review_img = $_FILES['profeal_photo']['name'];
 //画像を保存
 $_FILES['profeal_photo']['name']=md5(uniqid(rand(),true));
 $_FILES['profeal_photo']['name'].='.xml';
 move_uploaded_file($_FILES['profeal_photo']['tmp_name'],dirname(__FILE__,3).'/public/profeal/'.$_FILES['profeal_photo']['name']);
//画像のデータベースの保存
 $_POST['profeal_photo'] = $_FILES['profeal_photo']['name'];
 $_SESSION['profeal_photo'] = $_FILES['profeal_photo']['name'];
 //var_dump($_POST);
 ?>
 <?php include 'first_header.php'?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/new_create.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <div class="confirm">
   <h1>この内容で登録しますか？</h1>
  </div>
  <div class="cover">
  <form method="post" action="create_acount_complete.php" enctype="multipart/form-data">
  <div class="register_img">
   <h1>・プロフィール写真</h1>
    <label>
     <supan class="sent_button" title="画像を選択">
       <img src="../profeal/<?= $_POST['profeal_photo'] ?>">
     </supan>
     <input type="file" name="profeal_photo" id="img_send" multiple>
    </label>
  </div>
    <div class="user_id">
      <p>・名前</p>
      <input type="text" name="name" value="<?php echo(htmlspecialchars($_POST['name'],ENT_QUOTES, 'UTF-8')); ?>" class="user_id_" readonly>
    </div>
     <div class="user_id">
       <p>・メールアドレス</p>
       <input type="text" name="email" value="<?php echo(htmlspecialchars($_POST['email'],ENT_QUOTES, 'UTF-8')); ?>" class="user_id_" readonly>
     </div>
     <div class="user_id">
       <p>・ユーザーID</p>
       <input type="text"  name="user_name" value="<?php echo(htmlspecialchars($_POST['user_name'],ENT_QUOTES, 'UTF-8')); ?>" class="user_id_" readonly>
     </div>
       <div class="user_id">
         <p>・ユーザーネーム</p>
         <input type="text" name="nicke_name" value="<?php echo(htmlspecialchars($_POST['nicke_name'],ENT_QUOTES, 'UTF-8')); ?>"  class="user_id_" readonly>
       </div>
       <div class="user_id">
        <p>・パスワード</p>
        <input type="text" name="password" value="<?php echo(htmlspecialchars($_POST['password'],ENT_QUOTES, 'UTF-8')); ?>" class="user_id_" readonly>
       </div>
     <div class="sent"><input type="submit" value="アカウント作成"></div>
     <div class="sent"><button>戻 る</button></div>
</form>
</div>
<?php
?>
